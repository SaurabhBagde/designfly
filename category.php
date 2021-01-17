<?php
/**
 * Template Name: category.
 * The template for displaying author archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DsignFly
 */

get_header();
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$id    = get_query_var( 'cat' );
// $id    = $_GET['cat'];
$query = new WP_Query(
	array(
		'post_type'      => array( 'df-portfolio', 'post' ),
		'posts_per_page' => '15',
		'paged'          => $paged,
		'cat'            => $id,
	)
);
?>

	<div id="archive-wrapper" class="content-area">
		
		<div class="single-row">
			<div class="single-post-display">
				<main id="main" class="site-main">

				<?php if ( $query->have_posts() ) : ?>

					<header class="archive-page-header">
						<?php
						single_cat_title( '<h1 class="archive-page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
						<hr class="archive-bar">
					</header><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( $query->have_posts() ) :
						$query->the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', 'blog-template' );

					endwhile;
					wp_reset_postdata();
					the_posts_navigation();

					dsign_fly_pagination_bar( $query );

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
