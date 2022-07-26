<?php
/**
 * LLMS_Student_Quizzes model class file
 *
 * @package LifterLMS/Models/Classes
 *
 * @since 3.9.0
 * @version 6.4.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Access student quiz attempt data
 *
 * @see LLMS_Student->quizzes()
 *
 * @since 3.9.0
 */
class LLMS_Student_Quizzes extends LLMS_Abstract_User_Data {

	/**
	 * Retrieve the number of quiz attempts for a quiz
	 *
	 * @since 3.16.0
	 * @since 6.0.0 Don't access `LLMS_Query_Quiz_Attempt` properties directly.
	 *
	 * @param int $quiz_id WP Post ID of the quiz.
	 * @return int
	 */
	public function count_attempts_by_quiz( $quiz_id ) {

		$query = new LLMS_Query_Quiz_Attempt(
			array(
				'student_id' => $this->get_id(),
				'quiz_id'    => $quiz_id,
				'per_page'   => 1,
			)
		);

		return $query->get_found_results();

	}

	/**
	 * Remove Student Quiz attempt by ID
	 *
	 * @since 3.9.0
	 * @since 3.16.11 Unknown.
	 *
	 * @param int $attempt_id Attempt ID.
	 * @return boolean Returns `true` on success and `false` on error.
	 */
	public function delete_attempt( $attempt_id ) {

		$attempt = $this->get_attempt_by_id( $attempt_id );
		return $attempt ? $attempt->delete() : false;

	}

	/**
	 * Retrieve quiz data for a student and optionally filter by quiz_id(s)
	 *
	 * @since 3.9.0
	 * @since 3.16.11 Unknown.
	 * @since 4.21.2 Retrieve only attempts for the initialized student.
	 *
	 * @param int[]|Int $quiz Array or single WP_Post ID for quizzes to retrieve attempts for.
	 * @return LLMS_Quiz_Attempt[] Array of quiz attempts for the requested quiz or quizzes.
	 */
	public function get_all( $quiz = array() ) {

		$query = new LLMS_Query_Quiz_Attempt(
			array(
				'quiz_id'    => $quiz,
				'per_page'   => 5000,
				'student_id' => $this->get( 'id' ),
			)
		);

		/**
		 * Filters the list of quiz attempts for a student
		 *
		 * @since Unknown
		 *
		 * @param int[]|Int $quiz Array or single WP_Post ID for quizzes to retrieve attempts for.
		 */
		return apply_filters( 'llms_student_get_quiz_data', $query->get_attempts(), $quiz );

	}

	/**
	 * Retrieve quiz attempts
	 *
	 * @since    3.16.0
	 *
	 * @param int   $quiz_id WP Post ID of the quiz.
	 * @param array $args    Additional args to pass to LLMS_Query_Quiz_Attempt.
	 * @return LLMS_Quiz_Attempt[]
	 */
	public function get_attempts_by_quiz( $quiz_id, $args = array() ) {

		$args = wp_parse_args(
			array(
				'student_id' => $this->get_id(),
				'quiz_id'    => $quiz_id,
			),
			$args
		);

		$query = new LLMS_Query_Quiz_Attempt( $args );

		if ( $query->has_results() ) {
			return $query->get_attempts();
		}

		return array();

	}

	/**
	 * Retrieve an attempt by attempt id
	 *
	 * @since 3.16.0
	 * @since 4.21.2 Return `false` for invalid IDs & check permissions before returning the attempt.
	 *
	 * @param int $attempt_id Attempt ID.
	 * @return LLMS_Quiz_Attempt|boolean Returns the quiz attempt or `false` if the attempt doesn't exist or
	 *                                   doesn't belong to the initialized student.
	 */
	public function get_attempt_by_id( $attempt_id ) {

		$attempt = new LLMS_Quiz_Attempt( $attempt_id );

		// Invalid ID.
		if ( ! $attempt->exists() || ! current_user_can( 'view_grades', absint( $attempt->get( 'student_id' ) ), absint( $attempt->get( 'quiz_id' ) ) ) ) {
			return false;
		}

		return $attempt;

	}

	/**
	 * Decodes an attempt string and returns the associated attempt
	 *
	 * @since 3.9.0
	 * @since 3.16.0 Unknown.
	 *
	 * @param string $attempt_key Encoded attempt key.
	 * @return LLMS_Quiz_Attempt|false
	 */
	public function get_attempt_by_key( $attempt_key ) {

		$id = $this->parse_attempt_key( $attempt_key );
		if ( ! $id ) {
			return false;
		}
		return $this->get_attempt_by_id( $id );

	}

	/**
	 * Get the number of attempts remaining by a student for a given quiz.
	 *
	 * @since 3.16.0
	 * @since 6.4.0 Added parameter `$allow_negative` to allow remaining negative remaining attempts.
	 *               It can happen when the allowed attempts number is decreased to a number lower than
	 *               the number of the attempts already made by a given student.
	 *
	 * @param int  $quiz_id        WP Post ID of the Quiz.
	 * @param bool $allow_negative Allow returning negative remaining attempts.
	 * @return mixed
	 */
	public function get_attempts_remaining_for_quiz( $quiz_id, $allow_negative = false ) {

		$quiz = llms_get_post( $quiz_id );

		$ret = _x( 'Unlimited', 'quiz attempts remaining', 'lifterlms' );

		if ( $quiz->has_attempt_limit() ) {

			$allowed = $quiz->get( 'allowed_attempts' );
			$used    = $this->count_attempts_by_quiz( $quiz->get( 'id' ) );

			// Ensure undefined, null, '', etc. show as an int.
			if ( ! $allowed ) {
				$allowed = 0;
			}

			$remaining = ( $allowed - $used );

			// Don't show negative attempts.
			$ret = $allow_negative ? $remaining : max( 0, $remaining );

		}

		/**
		 * Filters the number of attempts remaining by a student for a given quiz.
		 *
		 * @since 3.16.0
		 *
		 * @param mixed                $ret             The number of attempts remaining by a student for a given quiz,
		 *                                              or 'Unlimited' for quizzes with no attempts limit.
		 * @param LLMS_Quiz            $quiz            Quiz object.
		 * @param LLMS_Student_Quizzes $student_quizzes Student quizzes object.
		 */
		return apply_filters( 'llms_student_quiz_attempts_remaining_for_quiz', $ret, $quiz, $this );

	}

	/**
	 * Get all the attempts for a given quiz/lesson from an attempt key
	 *
	 * @since 3.9.0
	 *
	 * @param string $attempt_key An encoded attempt key.
	 * @return false|array
	 */
	public function get_sibling_attempts_by_key( $attempt_key ) {

		$id = $this->parse_attempt_key( $attempt_key );
		if ( ! $id ) {
			return false;
		}

	}

	/**
	 * Get the quiz attempt with the highest grade for a given quiz and lesson combination
	 *
	 * @since 3.9.0
	 * @since 3.16.0 Unknown.
	 *
	 * @param int  $quiz_id    WP Post ID of a Quiz.
	 * @param null $deprecated Deprecated.
	 * @return false|LLMS_Quiz_Attempt
	 */
	public function get_best_attempt( $quiz_id = null, $deprecated = null ) {

		$attempts = $this->get_attempts_by_quiz(
			$quiz_id,
			array(
				'per_page' => 1,
				'sort'     => array(
					'grade'       => 'DESC',
					'update_date' => 'DESC',
					'id'          => 'DESC',
				),
				'status'   => array( 'pass', 'fail' ),
			)
		);

		if ( $attempts ) {
			return $attempts[0];
		}

		return false;

	}

	/**
	 * Retrieve the last recorded attempt for a student for a given quiz/lesson
	 *
	 * "Last" is defined as the attempt with the highest attempt number
	 *
	 * @since 3.9.0
	 * @since 3.16.0 Unknown.
	 *
	 * @param int $quiz_id WP Post ID of the quiz.
	 * @return LLMS_Quiz_Attempt|false
	 */
	public function get_last_attempt( $quiz_id ) {

		$attempts = $this->get_attempts_by_quiz(
			$quiz_id,
			array(
				'per_page' => 1,
				'sort'     => array(
					'attempt' => 'DESC',
				),
			)
		);

		if ( $attempts ) {
			return $attempts[0];
		}

		return false;

	}

	/**
	 * Get the last completed attempt for a given quiz or quiz/lesson combination
	 *
	 * @since 3.9.0
	 * @since 3.16.0 Unknown.
	 *
	 * @param int $quiz_id    WP Post ID of a Quiz.
	 * @param int $deprecated Deprecated.
	 * @return false|LLMS_Quiz_Attempt
	 */
	public function get_last_completed_attempt( $quiz_id = null, $deprecated = null ) {

		$query = new LLMS_Query_Quiz_Attempt(
			array(
				'student_id'     => $this->get_id(),
				'quiz_id'        => $quiz_id,
				'per_page'       => 1,
				'status_exclude' => array( 'incomplete' ),
				'sort'           => array(
					'end_date' => 'DESC',
					'id'       => 'DESC',
				),
			)
		);

		if ( $query->has_results() ) {
			return $query->get_attempts()[0];
		}

		return false;
	}

	/**
	 * Parse an attempt key into it's parts
	 *
	 * @since 3.9.0
	 * @since 3.16.7 Unknown.
	 *
	 * @param string $attempt_key An encoded attempt key.
	 * @return int
	 */
	private function parse_attempt_key( $attempt_key ) {
		return LLMS_Hasher::unhash( $attempt_key );
	}

}
