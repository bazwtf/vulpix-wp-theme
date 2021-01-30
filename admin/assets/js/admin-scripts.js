/**
 *  JavaScript for WP Admin
 *
 *  @since 1.0.0
 */
( function( $ ) {

	$( document ).ready(
		function() {

			// On press of logo upload
			$( '.logo_upload' ).on(
				'touch, click',
				function( e ) {
				e.preventDefault();

				var custom_uploader = wp.media(
					{
						title: 'Custom Image',
						button: {
							text: 'Upload Image'
						},
						multiple: false  // Set this to true to allow multiple files to be selected
					}
				)
				.on(
					'select', function() {
						var attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
						$( '.header_logo' ).attr( 'src', attachment.url );
						$( '.header_logo_url' ).val( attachment.url );
					}
				)
				.open();
			});
		}
	);
})( jQuery );
