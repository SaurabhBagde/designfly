<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DsignFly
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'dsign-fly' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php

			if ( has_custom_logo() ) :
				the_custom_logo();
			else :
				$image_url = get_theme_file_uri( '/assets/img/logo.png' );

				?>
				<img src="<?php esc_attr_e( $image_url ); ?>" class="dsignfly-header-img" width="400" height="300">
				<?php
			endif;
			?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'dsign-fly' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'menu'            => 'menu-1',
					'menu_class'      => 'dsignfly-menu__list',
					'container_class' => 'dsignfly-menu',
					'theme_location'  => 'menu-1',
					'menu_id'         => 'primary-menu',
				)
			);
			?>
			<form class="dsignfly-search" action="<?php echo home_url( '/' ); ?>" method="get">
				<input type="text" class="search-input" name="s" id="search" value="<?php the_search_query(); ?>"/>
				<button id="header-search-btn" class="search-submit-btn"><img src="<?php esc_attr_e( get_theme_file_uri( '/assets/img/search-icon-normal.png' ) ); ?>" class="search-submit-img" /></button>                    
			</form>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	
	<?php
	if ( is_front_page() ) :
		?>
				<div class="intro-container">
					<div class="intro-content">
						<h1 class="intro-site-title">
							<a  href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
							</a>
						</h1>

				<?php
					$designfly_description = get_bloginfo( 'description', 'display' );
				if ( $designfly_description || is_customize_preview() ) :
					?>
						<p class="intro-site-description"><?php echo $designfly_description; ?></p>
						<?php endif; ?>
					</div>

					<?php
					if ( has_header_image() ) :
						?>

						<div class="intro-header-img" style="background: url( <?php echo get_header_image(); ?> )"></div>
						
						<?php
					else :
						?>
						<div class="intro-header-img" style="background: url( <?php echo get_template_directory_uri() . '/assets/img/full-slider.png'; ?> )"></div>

					<?php endif; ?>
				</div>
				
				<hr class="break"/>

				<?php
			else :
				?>
				<?php
			endif;
			?>


<div class="container-fluid features-wrapper">
	<div class="container features-container">
		<div class="features-row">

			<div class="feature-col-sm-4">
				<div class="feature-thumbnail">
					<img src=" <?php esc_attr_e( get_template_directory_uri() . '/assets/img/feature-icons-1.png' ); ?> "/>
				</div><!-- .thumbnail -->
				<div class="feature-content">
					<p class="feature-title"> Avertising </p>
					<p class="feature-description"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, eum? </p>
				</div><!-- .content -->
			</div><!-- .col-sm-4 -->

			<div class="feature-col-sm-4">
				<div class="feature-thumbnail">
				<img src=" <?php esc_attr_e( get_template_directory_uri() . '/assets/img/feature-icons-1.png' ); ?> "/>
				</div><!-- .thumbnail -->
				<div class="feature-content">
					<p class="feature-title"> Multimedia </p>
					<p class="feature-description"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, quasi! </p>
				</div><!-- .content -->
			</div><!-- .col-sm-4 -->
			
			<div class="feature-col-sm-4">
				<div class="feature-thumbnail">
				<img src=" <?php esc_attr_e( get_template_directory_uri() . '/assets/img/feature-icons-1.png' ); ?> "/>
				</div><!-- .thumbnail -->
				<div class="feature-content">
					<p class="feature-title"> Photography </p>
					<p class="feature-description"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, quod. </p>
				</div><!-- .content -->
			</div><!-- .col-sm-4 -->

		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .container-fluid -->

	

		<div id="content" class="site-content">
