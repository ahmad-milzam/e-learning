function helloAcademyToggleAriaExpanded(el, withListeners) {
    if ('true' !== el.getAttribute('aria-expanded')) {
        el.setAttribute('aria-expanded', 'true')
        helloAcademySubmenuPosition(el.parentElement)
        if (withListeners) {
            document.addEventListener(
                'click',
                helloAcademyCollapseMenuOnClickOutside
            )
        }
    } else {
        el.setAttribute('aria-expanded', 'false')
        if (withListeners) {
            document.removeEventListener(
                'click',
                helloAcademyCollapseMenuOnClickOutside
            )
        }
    }
}

function helloAcademyCollapseMenuOnClickOutside(event) {
    if (!document.getElementById('site-navigation').contains(event.target)) {
        document
            .getElementById('site-navigation')
            .querySelectorAll('.sub-menu-toggle')
            .forEach(function (button) {
                button.setAttribute('aria-expanded', 'false')
            })
    }
}

function helloAcademySubmenuPosition(li) {
    var subMenu = li.querySelector('ul.sub-menu'),
        rect,
        right,
        left,
        windowWidth

    if (!subMenu) {
        return
    }

    rect = subMenu.getBoundingClientRect()
    right = Math.round(rect.right)
    left = Math.round(rect.left)
    windowWidth = Math.round(window.innerWidth)

    if (right > windowWidth) {
        subMenu.classList.add('submenu-reposition-right')
    } else if (document.body.classList.contains('rtl') && left < 0) {
        subMenu.classList.add('submenu-reposition-left')
    }
}

function helloAcademyExpandSubMenu(el) {
    // jshint ignore:line
    // Close other expanded items.
    el.closest('nav')
        .querySelectorAll('.sub-menu-toggle')
        .forEach(function (button) {
            if (button !== el) {
                button.setAttribute('aria-expanded', 'false')
            }
        })

    // Toggle aria-expanded on the button.
    helloAcademyToggleAriaExpanded(el, true)

    // On tab-away collapse the menu.
    el.parentNode
        .querySelectorAll('ul > li:last-child > a')
        .forEach(function (linkEl) {
            linkEl.addEventListener('blur', function (event) {
                if (!el.parentNode.contains(event.relatedTarget)) {
                    el.setAttribute('aria-expanded', 'false')
                }
            })
        })
}

;
(function () {
    var navMenu = function (id) {
        var wrapper = document.body, // this is the element to which a CSS class is added when a mobile nav menu is open
            mobileButton = document.getElementById(id + '-mobile-menu'),
            navMenuEl = document.getElementById('site-navigation')

        // If there's no nav menu, none of this is necessary.
        if (!navMenuEl) {
            return
        }

        if (mobileButton) {
            mobileButton.onclick = function () {
                wrapper.classList.toggle(id + '-navigation-open')
                wrapper.classList.toggle('lock-scrolling')
                helloAcademyToggleAriaExpanded(mobileButton)
                mobileButton.focus()
            }
        }

        document.addEventListener('keydown', function (event) {
            var modal,
                elements,
                selectors,
                lastEl,
                firstEl,
                activeEl,
                tabKey,
                shiftKey,
                escKey
            if (!wrapper.classList.contains(id + '-navigation-open')) {
                return
            }

            modal = document.querySelector('.' + id + '-navigation')
            selectors = 'input, a, button'
            elements = modal.querySelectorAll(selectors)
            elements = Array.prototype.slice.call(elements)
            tabKey = event.keyCode === 9
            shiftKey = event.shiftKey
            escKey = event.keyCode === 27
            activeEl = document.activeElement // eslint-disable-line @wordpress/no-global-active-element
            lastEl = elements[elements.length - 1]
            firstEl = elements[0]

            if (escKey) {
                event.preventDefault()
                wrapper.classList.remove(
                    id + '-navigation-open',
                    'lock-scrolling'
                )
                helloAcademyToggleAriaExpanded(mobileButton)
                mobileButton.focus()
            }

            if (!shiftKey && tabKey && lastEl === activeEl) {
                event.preventDefault()
                firstEl.focus()
            }

            if (shiftKey && tabKey && firstEl === activeEl) {
                event.preventDefault()
                lastEl.focus()
            }

            // If there are no elements in the menu, don't move the focus
            if (tabKey && firstEl === lastEl) {
                event.preventDefault()
            }
        })

        document.addEventListener('click', function (event) {
            // If target onclick is <a> with # within the href attribute
            if (event.target.hash && event.target.hash.includes('#')) {
                wrapper.classList.remove(
                    id + '-navigation-open',
                    'lock-scrolling'
                )
                helloAcademyToggleAriaExpanded(mobileButton)
                // Wait 550 and scroll to the anchor.
                setTimeout(function () {
                    var anchor = document.getElementById(
                        event.target.hash.slice(1)
                    )
                    anchor.scrollIntoView()
                }, 550)
            }
        })

        navMenuEl
            .querySelectorAll('.menu-wrapper > .menu-item-has-children')
            .forEach(function (li) {
                li.addEventListener('mouseenter', function () {
                    this.querySelector('.sub-menu-toggle').setAttribute(
                        'aria-expanded',
                        'true'
                    )
                    helloAcademySubmenuPosition(li)
                })
                li.addEventListener('mouseleave', function () {
                    this.querySelector('.sub-menu-toggle').setAttribute(
                        'aria-expanded',
                        'false'
                    )
                })
            })
    }

    window.addEventListener('load', function () {
        new navMenu('primary')
    })



    //Social Share

    let academySocialShare = jQuery('.academy-share-wrap');
    if (academySocialShare.length) {
        var share_config = JSON.parse(
            academySocialShare.attr('data-social-share-config')
        )

        jQuery('.academy-social-share').ShareLink({
            title: share_config.title,
            text: share_config.text,
            image: share_config.image,
            class_prefix: 'academy_',
            width: 640,
            height: 480,
        })
        jQuery('.academy-share-button').on('click', (e) => {
            e.preventDefault()
            academySocialShare.toggleClass('academy-share-wrap--open')
        })
        jQuery(document).on('click', (e) => {
            if (jQuery(e.target).is('.academy-share-button') === false) {
                academySocialShare.removeClass('academy-share-wrap--open')
            }
        })
    }
})()

jQuery(document).ready(function () {

    jQuery('.primary-menu-container').append('<button class="close-off-canvas-menu">x</button>');
    jQuery('.primary-menu-container ul li:has(ul)').append('<span class="sub-menu-toggle"></span>');

    jQuery("ul#primary-menu-list a").focus(function () {
        jQuery(this).parents("li").addClass('focused');
        jQuery(this).parents("li").siblings('li').removeClass('focused');
        jQuery(this).parents("li").siblings('li').find("li").removeClass('focused');

    }).blur(function () {
        jQuery(this).parents("li").siblings('li').removeClass('focused');
    })

    function desktop_menu_js() {
        jQuery("ul#primary-menu-list li").hover(function () {
            jQuery(this).toggleClass('focused');
            jQuery(this).siblings('li').removeClass('focused');
        });
    }
    jQuery("button#primary-mobile-menu").click(function () {
        jQuery("body").addClass("active-show-menu");
    });

    jQuery(".sub-menu-toggle").click(function () {
        jQuery(this).parent().toggleClass("focused");
        jQuery(this).parent("li").siblings('li').removeClass('focused');
    });


    if (screen.width > 991) {
        desktop_menu_js();
    } 

    jQuery(window).resize(function () {
        if (screen.width > 991) {
            desktop_menu_js();
        } 
    });

    jQuery("button.close-off-canvas-menu").click(function () {
        jQuery("button#primary-mobile-menu").trigger("click");
        jQuery("body").removeClass("active-show-menu");
    });


});