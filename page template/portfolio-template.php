<?php
/**
 * Template Name: Portfolio Page
 *
 * The template for displaying portfolio
 *
 * This is the template that displays all portfolio items.
 * 
 * @package DesignFly
 * 
 * @since 1.0.3
 * 
 */

 get_header();

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$query = new WP_Query( array( 
	'post_type' => 'df-portfolio',
	'posts_per_page' => '15',
	'paged'          => $paged 
	)
 );

 if ( $query -> have_posts() ):
	?>

	<div class="view-image-container">
		<div class="content-wrapper">
			<!-- <img src="" /> -->
			<span class="close"><span class="dashicons dashicons-no-alt"></span></span>
		</div>
	</div>

    <div class="portfolio-wrapper">

		<!-- top bar -->
		<div class="portfolio-wrapper-top">
			<p class="title"> <span class="portfolio-title"><?php echo esc_html( get_theme_mod( 'dsign-fly-home-portfolio-title', 'd\'sign is the soul' ) ); ?> </span> </p>
			<div class="portfolio-btns">
				<?php
					$terms = get_terms(array('taxonomy' => 'post_tag' , 'hide_empty' => false));
					foreach ( $terms as $term ) {
						?>
						<a
							href="<?php echo esc_url( get_term_link( $term ) ); ?>" 
							role="button" 
							class="portfolio-btns__link"
						>
							<?php esc_html_e( $term->name ); ?>
						</a>
						<?php
					}
				?>
				
			</div>
			<hr />
		</div>
	
	<?php
    while ( $query -> have_posts() ):
        $query -> the_post();
    	get_template_part( 'template-parts/content', 'df-portfolio' );  
	endwhile;
	wp_reset_postdata();
	?>
	</div> <!-- #portfolio-wrapper -->
	
	<?php
		dsign_fly_pagination_bar( $query );
	?>
	</div>

	<?php
else:
    ?>
    <p>
		<?php _e( 'Sorry, no portfolio items found.', 'design-fly' ); ?>
	</p>
    <?php
endif;
?>


<?php
get_footer();
?>