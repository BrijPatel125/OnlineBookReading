/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	var $style = $( '#journalistic-color-scheme-css' ),
		api = wp.customize;

	if ( ! $style.length ) {
		$style = $( 'head' ).append( '<style type="text/css" id="journalistic-color-scheme-css" />' )
		                    .find( '#journalistic-color-scheme-css' );
	}

		
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.frontpage-site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.frontpage-site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.frontpage-site-title,' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.frontpage-site-title,' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );

	wp.customize( 'header_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-header' ).css( {
				'background':to
			});
		} );
	} );
	wp.customize( 'footer_widget_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.footer-widgets, .footer-widgets p' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'header_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-header' ).css( {
				'background':to
			});
		} );
	} );
	wp.customize( 'footer_widget_title_colors', function( value ) {
		value.bind( function( to ) {
			$( '.footer-widgets h3' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'footer_copyright_background_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer' ).css( {
				'background':to
			});
		} );
	} );
	wp.customize( 'footer_colors', function( value ) {
		value.bind( function( to ) {
			$( '.footer-widget-wrapper' ).css( {
				'background':to
			});
		} );
	} );
	wp.customize( 'footer_copyright_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.row.site-info' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'sidebar_headline_colors', function( value ) {
		value.bind( function( to ) {
			$( '#secondary h3.widget-title, #secondary h4.widget-title' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'sidebar_link_color', function( value ) {
		value.bind( function( to ) {
			$( '#secondary .widget a, #secondary .widget #recentcomments a, #secondary .widget .rsswidget, #secondary .widget .widget-title .rsswidget, #secondary .widget a' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'navigation_background_color', function( value ) {
		value.bind( function( to ) {
			$( '.navbar-default,.navbar-default li>.dropdown-menu, .navbar-default .navbar-nav .open .dropdown-menu > .active > a, .navbar-default .navbar-nav .open .dr' ).css( {
				'background-color':to
			});
		} );
	} );
	wp.customize( 'navigation_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.navbar-default .navbar-nav>li>a, .navbar-default li>.dropdown-menu>li>a' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'navigation_logo_color', function( value ) {
		value.bind( function( to ) {
			$( '.navbar-default .navbar-brand, .navbar-default .navbar-brand:hover, .navbar-default .navbar-brand:focus' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'headline_color', function( value ) {
		value.bind( function( to ) {
			$( 'h1.entry-title, .entry-header .entry-title a, #main h1, #main h2, #main h3, #main h4, #main h5, #main h6, .comments-title, .comment-reply-title, .comment-content h1, .comment-content h2, .comment-content h3, .comment-content h4, .comment-content h5, .comment-author.vcard, .comment-content h6, .next-prev-text, #main th, .comment th' ).css( {
				'color':to
			});
		} );
	} );
	
	wp.customize( 'social_media_link_color', function( value ) {
		value.bind( function( to ) {
			$( '.header-social-media-link .fa' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'social_media_link_color', function( value ) {
		value.bind( function( to ) {
			$( 'a.header-social-media-link' ).css( {
				'border-color':to
			});
		} );
	} );
	wp.customize( 'post_content_color', function( value ) {
		value.bind( function( to ) {
			$( '.entry-content, .entry-summary, dd, .comment td, #main ul, #main ol, #main li, .comment li, .comment ul, .comment ol, .comment address, #main address, #main td, dt, .post-feed-wrapper p, .comment p, .comment-form-comment label' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'author_line_color', function( value ) {
		value.bind( function( to ) {
			$( 'h5.entry-date, h5.entry-date a, #main h5.entry-date, .comment-metadata time' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'top_widget_background_color', function( value ) {
		value.bind( function( to ) {
			$( '.top-widgets' ).css( {
				'background':to
			});
		} );
	} );
	wp.customize( 'top_widget_title_color', function( value ) {
		value.bind( function( to ) {
			$( '.top-widgets h3' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'top_widget_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.top-widgets, .top-widgets p' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'bottom_widget_background_color', function( value ) {
		value.bind( function( to ) {
			$( '.bottom-widgets' ).css( {
				'background':to
			});
		} );
	} );
	wp.customize( 'bottom_widget_title_color', function( value ) {
		value.bind( function( to ) {
			$( '.bottom-widgets h3' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'header_image_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.frontpage-site-title' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'header_image_tagline_color', function( value ) {
		value.bind( function( to ) {
			$( '.frontpage-site-description' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'bottom_widget_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.bottom-widgets, .bottom-widgets p' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'footer_widget_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.footer-widgets, .footer-widgets p' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'navigation_frontpage_menu_color', function( value ) {
		value.bind( function( to ) {
			$( '.home .lh-nav-bg-transform .navbar-nav>li>a' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'navigation_frontpage_logo_color', function( value ) {
		value.bind( function( to ) {
			$( '.home .lh-nav-bg-transform.navbar-default .navbar-brand' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'sidebar_text_color', function( value ) {
		value.bind( function( to ) {
			$( '#secondary, #secondary p, #secondary ul, #secondary li, #secondary .widget table caption, #secondary td, #secondary th' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'postpage_background', function( value ) {
		value.bind( function( to ) {
			$( '#main .post-content, #main, .comments-area, .post-comments, .single-post-content, .post-comments .comments-area, .page .nav-links, .single-post .nav-links , .nav-next, .nav-previous, .next-post, .prev-post' ).css( {
				'background':to
			});
		} );
	} );
	wp.customize( 'footer_widget_link_colors', function( value ) {
		value.bind( function( to ) {
			$( '.footer-widgets a, .footer-widget-wrapper a, .footer-widgets a:visited, .footer-widgets a:hover, .footer-widgets a:active, .footer-widgets a:focus' ).css( {
				'color':to
			});
		} );
	} );
	wp.customize( 'navigation_logo_color', function( value ) {
		value.bind( function( to ) {
			$( '.lh-nav-bg-transform.navbar-default .navbar-brand' ).css( {
				'color':to
			});
		} );
	} );











	// Color Scheme CSS.
	api.bind( 'preview-ready', function() {
		api.preview.bind( 'update-color-scheme-css', function( css ) {
			$style.html( css );
		} );
	} );


} )( jQuery );

