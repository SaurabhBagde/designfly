<?php
/**
 * Template Name: home Page
 *
 * The template for displaying portfolio
 *
 * This is the template that displays all portfolio items.
 *
 * @package DesignFly
 *
 * @since 1.0.3
 */

 get_header();
?>
<!-- <div class="banner">
	<h1 class="dsign-banner__h1"><?php the_title(); ?></h1>
	<div class="dsign-banner__desc">
		<?php the_content(); ?>
	</div>
</div> -->
<div id="primary" class="content-area">
	<main id="main" class="site-main">

	<?php
	$args = array(
		'post_type'      => 'df-portfolio',
		'posts_per_page' => '6',
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) :
		?>
 
		<div class="portfolio-wrapper_home">
	
			<!-- top bar -->
				<div class="portfolio-wrapper_home-top">
					<p class="title"> <?php echo esc_html( get_theme_mod( 'designfly-home-portfolio-title', 'd\'sign is the soul' ) ); ?> </p>
					<a href=" <?php echo get_permalink( get_theme_mod( 'designfly-home-portfolio-btn', '#' ) ); ?>" class="portfolio-view-all">
						<?php esc_html_e( 'view all', 'designfly' ); ?>
					</a>
					<hr />
				</div>
		<?php
		if ( $query->have_posts() ) :

			while ( $query->have_posts() ) :
				$query->the_post();
				get_template_part( 'template-parts/content', 'df-portfolio' );
				endwhile;
			?>
			
			</div>

			<?php
		else :
			?>
		<div class="container">
			<p>
				<?php
				esc_html_e(
					'Sorry, no portfolio items found. Please add some portfolio items in admin-dashboard>Portfolio. 
				If you don\'t want to see this message, uncheck \'Show recent portfolio items\' in admin-dashboard>Appearance>Customize>Home Page settings.',
					'designfly'
				);
				?>
			</p>
		</div>
			<?php
		endif;
	endif;
	?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php
get_footer();
?>
