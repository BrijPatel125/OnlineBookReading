<?php
/**
 * Header Options.
 *
 * @package Agency_Plus
 */

//Logo Options Setting Starts
$wp_customize->add_setting('theme_options[site_identity]', 
	array(
		'default' 			=> $default['site_identity'],
		'sanitize_callback' => 'agency_plus_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[site_identity]', 
	array(
		'type' 		=> 'radio',
		'label' 	=> esc_html__('Logo Options', 'agency-plus'),
		'section' 	=> 'title_tagline',
		'choices' 	=> array(
			'logo-only' 	=> esc_html__('Logo Only', 'agency-plus'),
			'title-only' 	=> esc_html__('Title Only', 'agency-plus'),
			'title-text' 	=> esc_html__('Title + Tagline', 'agency-plus'),
			)
	)
);

// Header Section.
$wp_customize->add_section( 'section_header',
	array(
		'title'      => esc_html__( 'Main Header', 'agency-plus' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting show_social_icons.
$wp_customize->add_setting( 'theme_options[show_social_icons]',
	array(
		'default'           => $default['show_social_icons'],
		'sanitize_callback' => 'agency_plus_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_social_icons]',
	array(
		'label'    			=> esc_html__( 'Show Social Icons', 'agency-plus' ),
		'section'  			=> 'section_header',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting nav_button_text.
$wp_customize->add_setting( 'theme_options[nav_button_text]',
	array(
		'default'           => $default['nav_button_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[nav_button_text]',
	array(
		'label'    => esc_html__( 'Additional Button Text', 'agency-plus' ),
		'section'  => 'section_header',
		'type'     => 'text',
		'priority' => 100,
	)
);

// Setting nav_button_link.
$wp_customize->add_setting( 'theme_options[nav_button_link]',
	array(
		'default'           => $default['nav_button_link'],
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( 'theme_options[nav_button_link]',
	array(
		'label'    => esc_html__( 'Additional Button Link', 'agency-plus' ),
		'section'  => 'section_header',
		'type'     => 'text',
		'priority' => 100,
	)
);