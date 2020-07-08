<?php
/**
 * Load files.
 *
 * @package Agency_Plus
 */

//=============================================================
// Change number of product per row
//=============================================================

if (!function_exists('agency_plus_product_columns')) {

	function agency_plus_product_columns() {

		$product_number = agency_plus_get_option( 'product_number' );

		return absint( $product_number ); // number of products per row

	}
	
}

add_filter('loop_shop_columns', 'agency_plus_product_columns');

//=============================================================
// Change number of related product
//=============================================================

if (!function_exists('agency_plus_related_products_args')) {

	function agency_plus_related_products_args( $args ) {

		$product_number = agency_plus_get_option( 'product_number' );

		$args['columns']   		= absint( $product_number );
		
		$args['posts_per_page'] = absint( $product_number ); // number of related products
		
		return $args;
	}

}

add_filter( 'woocommerce_output_related_products_args', 'agency_plus_related_products_args' );


//=============================================================
// Change number of upsell products
//=============================================================

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

add_action( 'woocommerce_after_single_product_summary', 'agency_plus_output_upsells', 15 );

if ( ! function_exists( 'agency_plus_output_upsells' ) ) {

	function agency_plus_output_upsells() {

		$product_number = agency_plus_get_option( 'product_number' );

	    woocommerce_upsell_display( absint( $product_number ), absint( $product_number ) ); // Display 3 products in rows of 3
	    
	}

}

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );


add_action( 'woocommerce_shop_loop_item_title', 'agency_plus_woocommerce_template_loop_product_title', 10 );

if ( ! function_exists( 'agency_plus_woocommerce_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function agency_plus_woocommerce_template_loop_product_title() {
		echo '<h2 class="woocommerce-loop-product__title">' . esc_html( get_the_title() ) . '</h2>';
		echo '</a>';
	}
}

// Remove sidebar in woocommerce page and add conditional sidebar
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10); 

add_action( 'woocommerce_sidebar', 'agency_plus_woocommerce_sidebar', 10 ); 

function agency_plus_woocommerce_sidebar( ) { 

	$shop_layout = agency_plus_get_option( 'shop_layout' );

	// Include sidebar.
	if ( 'no-sidebar' !== $shop_layout ) {
		get_sidebar();
	}
};

// Return the number of products you want to show per page
add_filter( 'loop_shop_per_page', 'agency_plus_new_loop_shop_per_page', 20 );

function agency_plus_new_loop_shop_per_page( $cols ) {
  
  $product_per_page = agency_plus_get_option( 'product_per_page' );

  $cols = absint( $product_per_page );

  return $cols;
}

// Remove sorting option
$hide_product_sorting = agency_plus_get_option( 'hide_product_sorting' );

if( true === $hide_product_sorting ){

	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

}

// Disable Related Products
$disable_related_products = agency_plus_get_option( 'disable_related_products' );

if( true === $disable_related_products ){

	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
}

// Update number of items in cart and total after Ajax
add_filter( 'woocommerce_add_to_cart_fragments', 'agency_plus_header_add_to_cart_fragment' );

function agency_plus_header_add_to_cart_fragment( $fragments ) {
	
	global $woocommerce;
	
	ob_start(); ?>

	<span class="cart-value agency-plus-cart-fragment"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>

	<?php

	$fragments['span.agency-plus-cart-fragment'] = ob_get_clean();

	return $fragments;
	
}