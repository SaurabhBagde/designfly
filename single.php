<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package DsignFly
 */

get_header();
?>

<div id="single-post-wrapper" class="single-container">
		<div class="single-row">
			<div class="single-post-display">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">

					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

							// the_post_navigation();
							the_post_navigation(
								array(
									'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'dsign-fly' ) . '</span> <span class="nav-title">%title</span>',
									'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'design-fly' ) . '</span> <span class="nav-title">%title</span>',
								)
							);

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) : ?>
							<div class="comments-wrapper">
								<hr class="comments-hr"/>
								<p class="comments-bars"><?php esc_html_e( 'Comments', 'designfly' ); ?></p>
								<hr class="comments-hr"/>
							<?php comments_template(); ?>
							</div>
						<?php
						endif;

					endwhile; // End of the loop.
					?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .col-md -->

			<div class="single-sidebar">
				<?php get_sidebar(); ?>
			</div>

		</div><!-- .row -->
</div><!-- #single-post-wrapper -->
<?php
get_footer();

