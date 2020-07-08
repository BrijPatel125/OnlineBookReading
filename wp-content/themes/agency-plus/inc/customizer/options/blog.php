<?php
/**
 * Blog Options.
 *
 * @package Agency_Plus
 */

// Layout Section.
$wp_customize->add_section( 'section_layout',
	array(
		'title'      => esc_html__( 'Blog/Archive', 'agency-plus' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting global_layout.
$wp_customize->add_setting( 'theme_options[global_layout]',
	array(
		'default'           => $default['global_layout'],
		'sanitize_callback' => 'agency_plus_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[global_layout]',
	array(
		'label'    => esc_html__( 'Default Sidebar Layout', 'agency-plus' ),
		'section'  => 'section_layout',
		'type'     => 'radio',
		'priority' => 100,
		'choices'  => array(
				'left-sidebar'  => esc_html__( 'Sidebar / Content', 'agency-plus' ),
				'right-sidebar' => esc_html__( 'Content / Sidebar', 'agency-plus' ),
				'no-sidebar'    => esc_html__( 'Content (no sidebars)', 'agency-plus' ),
			),
	)
);

// Setting excerpt_length.
$wp_customize->add_setting( 'theme_options[excerpt_length]',
	array(
		'default'           => $default['excerpt_length'],
		'sanitize_callback' => 'agency_plus_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[excerpt_length]',
	array(
		'label'       => esc_html__( 'Excerpt Length', 'agency-plus' ),
		'description' => esc_html__( 'in words', 'agency-plus' ),
		'section'     => 'section_layout',
		'type'        => 'number',
		'priority'    => 100,
		'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
	)
);

// Setting readmore_text.
$wp_customize->add_setting( 'theme_options[readmore_text]',
	array(
		'default'           => $default['readmore_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[readmore_text]',
	array(
		'label'    => esc_html__( 'Read More Text', 'agency-plus' ),
		'section'  => 'section_layout',
		'type'     => 'text',
		'priority' => 100,
	)
);