<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'e_learning' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         't}8UZ^+c1SyMwFl;W} DJVOjlUJpHEN| %sn9$#xwG~4-d&:IXW++{}(CGo2f9sS' );
define( 'SECURE_AUTH_KEY',  'Vbz-mUnACjF.k_Y-GyZArI>PH&W[+^kVz;3{N1y5h1O?=!e.pXD);YF5cUg8t;$V' );
define( 'LOGGED_IN_KEY',    'DQE#hYc92%]Z?q]aNVG5n[>c4>+lrUS|&8DXbeRkWqtR6;ILXH/Vy+~ 8Xy)&+@S' );
define( 'NONCE_KEY',        'mB<a)`IWu{]`!33a?}zqOi@X|m{_Hw}k sH(pz/du:FE}^ ,qlrlAETz3>/D_F;)' );
define( 'AUTH_SALT',        '>98#.F#&QVo@.UWD}{4`Xcl!iJ&74A5|*5I`0t|nJr5o>oJ6$LRSPwCxwiy8^.  ' );
define( 'SECURE_AUTH_SALT', 'Q.8S2@<lSu#OhhC4@4@9[iWSM<Aalp]ry_yjCo$92Y#!(t#)f3zW{lV-Ks^&|NSA' );
define( 'LOGGED_IN_SALT',   'A,|!ld<ylUTx_Ha@6_?e<g%86UMYT[}SqYl2j<DgD9_B|N/J=!P1gn!5=s6F6mN#' );
define( 'NONCE_SALT',       '/@lqnZ2IB*Gs7ekK{^X%Dj</t=aWK}?5jv{YY#s>em3mKh!7Idu(3#M~KpsH`p[^' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
