<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package journalistic
 *
 * Please browse readme.txt for credits and forking information
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function journalistic_body_classes( $classes ) {
  // Adds a class of group-blog to blogs with more than 1 published author.
  if ( is_multi_author() ) {
    $classes[] = 'group-blog';
  }

  return $classes;
}
add_filter( 'body_class', 'journalistic_body_classes' );

if ( ! function_exists( 'journalistic_header_menu' ) ) :
    /**
     * Header menu (should you choose to use one)
     */
  function journalistic_header_menu() {
      // display the WordPress Custom Menu if available
    wp_nav_menu(array(
      'theme_location'    => 'primary',
      'depth'             => 2,
      'container'         => 'div',
      'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
      'menu_class'        => 'nav navbar-nav',
      'fallback_cb'       => 'journalistic_wp_bootstrap_navwalker::fallback',
      'walker'            => new journalistic_wp_bootstrap_navwalker()
      ));
  } /* end header menu */
  endif;



/**
 * Adds the URL to the top level navigation menu item
 */
function  journalistic_add_top_level_menu_url( $atts, $item, $args ){
  if ( isset($args->has_children) && $args->has_children  ) {
    $atts['href'] = ! empty( $item->url ) ? $item->url : '';
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'journalistic_add_top_level_menu_url', 99, 3 );



add_action( 'admin_menu', 'journalistic_backendfunctions_wrapper' );
function journalistic_backendfunctions_wrapper() {
  add_theme_page( __('Journalistic Info', 'journalistic'), __('Journalistic', 'journalistic'), 'edit_theme_options', 'journalistic-infopage.php', 'journalistic_backendfunctions_text');
}

function journalistic_backendfunctions_text(){ ?>
<div class="text-centering">
  <div class="backend-css customize-journalistic">
    <h2><?php echo __( 'Welcome to Journalistic', 'journalistic' ); ?></p></h2>
    <p><?php echo __( 'If you have questions or need help with anything <br>theme related please', 'journalistic' ); ?> <a href="https://outstandingthemes.com/contact/" target="_blank"><?php echo __( 'contact us here', 'journalistic' ); ?></a></p>
  </div>
</div>

<div class="text-centering">
  <div class="backend-css customize-journalistic">
    <h2><?php echo __( 'Do you like Journalistic?', 'journalistic' ); ?></p></h2>
    <p>
      <?php echo __( 'We work hard & do our best to give you an awesome theme.', 'journalistic' ); ?><br>
      <?php echo __( 'If you like Journalistic then let the developer know, he gets so happy! ', 'journalistic' ); ?>
    </p> 
    <a href="https://wordpress.org/support/theme/journalistic/reviews/?filter=5" class="review-button" target="_blank">Rate Journalistic</a>
</div>
</div>


<h2 class="headline-second"><?php echo __( 'Quick Links', 'journalistic' ); ?></h2>
<div class="text-centering">
 <div class="backend-css">
 <a class="wide-button-journalistic" href="<?php echo admin_url('/customize.php'); ?>" target="_blank">Customize Theme Design</a><br>
  <a class="wide-button-journalistic" href="https://outstandingthemes.com/themes/journalistic/" target="_blank">Read About Journalistic Pro</a><br>
  <a class="wide-button-journalistic" href="https://outstandingthemes.com/contact/" target="_blank">Contact Us</a>


</div>
</div>

<div class="text-centering"><br><br>
  <a href="https://outstandingthemes.com/themes/journalistic/" target="_blank">
<?php echo '<a class="themeimage" href="https://outstandingthemes.com/themes/journalistic/" target="_blank"><img src="' . get_template_directory_uri() . '/images/theme-image-2.png"></a>'; ?>
  </a>
</div>

<?php }



