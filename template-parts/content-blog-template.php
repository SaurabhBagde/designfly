<?php
/**
 * Template part for displaying blog items
 *
 * @package DesignFly
 */

?>
<div class="blog-wrapper">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<a href=" <?php echo get_post_permalink(); ?> " class="blog-permalink">
			<header class="blog-entry-header">
				<div class="blog-date">
					<span><?php echo get_the_date( 'd' ); ?></span>
					<span><?php echo get_the_date( 'M' ); ?></span>
				</div>
				<?php the_title( '<p class="blog-entry-title">', '</p>' ); ?>
			</header><!-- .entry-header -->
		</a><!-- .permalink -->
					
	<?php
	/* thumbnail */
	if ( has_post_thumbnail() ) :
		?>
		<div class="blog-temp-row">
			<div class="blog-col-thumb thumbnail">
				<?php dsign_fly_post_thumbnail(); ?>
			</div>
			<div class="blog-col-para">
				<div class="blog-author-bar">
					<p class="author">by <?php echo get_the_author_link(); ?> on <?php echo get_the_date( 'd M Y' ); ?></p>
					<p class="blog-comments"><span class="blog-comments__text"><?php echo get_comments_number(); ?> Comment(s)</span> </p> 
				</div>
				<hr class="blog-bar">
				<div class="blog-entry-content">
				<?php the_excerpt(); ?>
				<?php if ( ! empty( get_the_excerpt() ) ) : ?>
				<a href="<?php echo get_post_permalink(); ?>" class="read-more">read more</a>
				<?php endif; ?>
				</div><!-- .entry-content -->
			</div><!-- .para -->
		</div><!-- .row -->
						
		<?php
		else :
			?>
		<div class="blog-temp-row">
			<div class="blog-col-para">
				<div class="blog-author-bar">
				
					<p class="author">by <?php echo get_the_author_link(); ?> on <?php echo get_the_date( 'd M Y' ); ?></p>
					<p class="blog-comments"><span class="blog-comments__text"><?php echo get_comments_number(); ?> Comment(s)</span> </p> 
				</div><!-- .author-bar -->
				
				<hr class="blog-bar">
				
				<div class="blog-entry-content">
					<?php
						the_excerpt();

						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'designfly' ),
								'after'  => '</div>',
							)
						);
					?>
				</div><!-- .entry-content -->
			</div><!-- .para -->
		</div><!-- .content -->

			<?php
		endif; /* has_post_thumbnail() ends */
		?>
						
				
	</article><!-- #post-<?php the_ID(); ?> -->
</div><!-- #blog-wrapper -->
