/**
 * Scripts
 */

( function ( $ ) {

    $( document ).ready(
        function() {

            /**
             * Main navigation menu
             */

            /** On menu button click */
            $( '#site-header .nav-menu--button' ).on( 'click', function ( e ) {

                // Toggle 'aria-expanded' attribute to tell screen readers the menu is open/closed
                $( this ).attr(
                'aria-expanded',
                $( this ).attr( 'aria-expanded' ) === 'true' ? 'false' : 'true' );

                e.preventDefault();

                // Toggle `--hide` class
                $( this ).siblings( '.nav-menu' ).toggleClass( '--hide' );

                return false;
            } );
        }
    );
} )( window.jQuery );
