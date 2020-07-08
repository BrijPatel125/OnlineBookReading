
<?php
/**
 * Template part for displaying posts.
 *
 * Please browse readme.txt for credits and forking information
 * @package journalistic
 */

?>

<article id="post-<?php the_ID(); ?>"  <?php post_class('post-content'); ?>>
	<div class="row row-eq-height post-feed-wrapper">
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="col-md-4 col-xs-12 post-thumbnail-wrap">

			<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<div class="post-thumbnail" style="background-image: url('<?php echo esc_url($thumb['0']);?>')"></div>
			</a>
		</div>
	<?php endif; ?>

	<?php if ( has_post_thumbnail() ) : ?>
	<div class="col-md-8 col-xs-12">
		<div class="blog-feed-contant">
	<?php else : ?>
	<div class="col-md-12 col-xs-12">
		<div class="blog-feed-contant no-img">
	<?php endif; ?>

	

		<header class="entry-header">	
			<span class="screen-reader-text"><?php the_title();?></span>

			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
	<?php endif; // is_single() ?>

	<?php if ( 'post' == get_post_type() ) : ?>
	<div class="entry-meta">
		<h5 class="entry-date"><?php journalistic_posted_on(); ?>
		<?php
		if ( is_sticky() && is_home() && ! is_paged() ) {
			printf( '%s', __( '| Featured', 'journalistic' ) );
		} ?>

</h5>
</div><!-- .entry-meta -->
<?php endif; ?>
</header><!-- .entry-header -->

<div class="entry-summary">
	<?php the_excerpt(); ?>
</div><!-- .entry-summary -->		   	
</div>
</div>
</div>
</article><!-- #post-## -->
