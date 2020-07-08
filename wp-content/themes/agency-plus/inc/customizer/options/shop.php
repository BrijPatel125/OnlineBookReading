<?php
/**
 * Blog Options.
 *
 * @package Agency_Plus
 */

// Shop Section.
$wp_customize->add_section( 'section_shop',
	array(
		'title'      => esc_html__( 'Shop', 'agency-plus' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting show_cart_icon.
$wp_customize->add_setting( 'theme_options[show_cart_icon]',
	array(
		'default'           => $default['show_cart_icon'],
		'sanitize_callback' => 'agency_plus_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_cart_icon]',
	array(
		'label'    			=> esc_html__( 'Show Cart On Header', 'agency-plus' ),
		'section'  			=> 'section_shop',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting shop_layout.
$wp_customize->add_setting( 'theme_options[shop_layout]',
	array(
		'default'           => $default['shop_layout'],
		'sanitize_callback' => 'agency_plus_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[shop_layout]',
	array(
		'label'    => esc_html__( 'Shop Sidebar', 'agency-plus' ),
		'section'  => 'section_shop',
		'type'     => 'radio',
		'priority' => 100,
		'choices'  => array(
				'left-sidebar'  => esc_html__( 'Sidebar / Content', 'agency-plus' ),
				'right-sidebar' => esc_html__( 'Content / Sidebar', 'agency-plus' ),
				'no-sidebar'    => esc_html__( 'Content (no sidebars)', 'agency-plus' ),
			),
	)
);

// Setting product_per_page.
$wp_customize->add_setting( 'theme_options[product_per_page]',
	array(
		'default'           => $default['product_per_page'],
		'sanitize_callback' => 'agency_plus_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[product_per_page]',
	array(
		'label'    		=> esc_html__( 'Products Per Page', 'agency-plus' ),
		'description'   => esc_html__( 'Total number of products shown per page', 'agency-plus' ),
		'section'  		=> 'section_shop',
		'type'     		=> 'number',
		'priority' 		=> 100,
		'input_attrs'   => array( 'min' => 4, 'max' => 20 ),
	)
);

// Setting product_number_per_row.
$wp_customize->add_setting( 'theme_options[product_number]',
	array(
		'default'           => $default['product_number'],
		'sanitize_callback' => 'agency_plus_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[product_number]',
	array(
		'label'    		=> esc_html__( 'Products Per Row', 'agency-plus' ),
		'description'   => esc_html__( 'Number of products shown per row', 'agency-plus' ),
		'section'  		=> 'section_shop',
		'type'     		=> 'select',
		'priority' 		=> 100,
		'choices'  		=> array(
							'2'  	=> esc_html__( '2', 'agency-plus' ),
							'3' 	=> esc_html__( '3', 'agency-plus' ),
							'4'    	=> esc_html__( '4', 'agency-plus' ),
						),
	)
);

// Setting hide_product_sorting.
$wp_customize->add_setting( 'theme_options[hide_product_sorting]',
	array(
		'default'           => $default['hide_product_sorting'],
		'sanitize_callback' => 'agency_plus_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[hide_product_sorting]',
	array(
		'label'    			=> esc_html__( 'Disable Product Sorting Option', 'agency-plus' ),
		'section'  			=> 'section_shop',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);


// Setting enable_gallery_zoom.
$wp_customize->add_setting( 'theme_options[enable_gallery_zoom]',
	array(
		'default'           => $default['enable_gallery_zoom'],
		'sanitize_callback' => 'agency_plus_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_gallery_zoom]',
	array(
		'label'    			=> esc_html__( 'Enable Image Zoom', 'agency-plus' ),
		'section'  			=> 'section_shop',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting disable_related_products.
$wp_customize->add_setting( 'theme_options[disable_related_products]',
	array(
		'default'           => $default['disable_related_products'],
		'sanitize_callback' => 'agency_plus_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[disable_related_products]',
	array(
		'label'    			=> esc_html__( 'Disable Related Products', 'agency-plus' ),
		'section'  			=> 'section_shop',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);