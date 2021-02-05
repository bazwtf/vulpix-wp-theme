<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Admin
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */

/**
 * ACF: Theme settings page
 */
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page(
			[
					'page_title' => 'Theme Settings',
					'menu_title' => 'Theme Settings',
					'menu_slug'  => 'theme-general-settings',
					'capability' => 'manage_options' ,
					'redirect'   => false,
			]
	);
}

/**
 * ACF: Theme settings fields
 */
if ( function_exists( 'acf_add_local_field_group' ) ) {

	acf_add_local_field_group(
		[
			'key'                   => 'group_thank_you_message',
			'title'                 => 'Thank You Message',
			'fields'                => [
				[
					'key'          => 'field_subs_thank_you_title',
					'label'        => 'Title',
					'name'         => 'thank_you_title',
					'type'         => 'text',
					'required'     => 1,
				],
				[
					'key'           => 'vpx_site_header_logo',
					'label'         => 'Header Logo',
					'name'          => 'header_logo',
					'type'          => 'image',
					'return_format' => 'url',
					'preview_size'  => 'medium',
					'library'       => 'all',
				],
				[
					'key'           => 'vpx_site_footer_logo',
					'label'         => 'Footer Logo',
					'name'          => 'footer_logo',
					'type'          => 'image',
					'return_format' => 'url',
					'preview_size'  => 'medium',
					'library'       => 'all',
				],
			],
			'location'              => [
				[
					[
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'theme-general-settings',
					],
				],
			],
			'menu_order'            => 2,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'active'                => true,
			'description'           => 'Vulpix Theme Settings',
		]
	);
}
