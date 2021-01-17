<?php
/**
 * Template Name: date
 * 
 * The template for displaying date
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DsignFly
 */

get_header();
?>

	<div id="archive-wrapper" class="content-area">
		
		<div class="single-row">
			<div class="single-post-display">
				<main id="main" class="site-main">

				<?php if ( have_posts() ) : ?>

					<header class="archive-page-header">
                        <div class="blog-author-bar blog-header">
                            <p class="author"> <?php echo get_the_date( 'd M Y' ); ?></p> 
                        </div>
						<hr class="archive-bar">
					</header><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', 'blog-template' );

					endwhile;
					wp_reset_postdata();

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
		?>

				</main><!-- #main -->
		</div><!-- .col-md-8 -->

		<div class="single-sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div><!-- #archive-wrapper -->

<?php
get_footer();
