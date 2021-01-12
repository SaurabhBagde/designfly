<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DsignFly
 */

?>

</div><!-- #content -->

<footer id="footer-wrapper" class="site-footer">
	
		<hr class="bar" />
		<div class="dsign-footer">
			<div class="welcome">
			<p class="dsign-title"><?php esc_html_e( 'Welcome to D\'SIGNfly',  'dsign-fly' ); ?></p>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque alias architecto dignissimos. 
				Quis obcaecati consectetur, ipsa sit tenetur vero maxime est vel quaerat ducimus quasi veniam 
				libero ab aut non eum autem, dolore expedita quo, nihil temporibus! Nam, modi laudantium.
			</p>
			<button class="read-more">read more</button>
			</div>
			<div class="contact-us">
				<p class="dsign-title"><?php esc_html_e( 'Contact Us',  'dsign-fly' ); ?></p>
				<p class="address"> <?php echo get_theme_mod( 'designfly-footer-contact' ); ?> </p>
				<span><?php esc_html_e( 'Email', 'designfly' ); ?>: <p class="email">
					<a href="mailto:<?php echo get_theme_mod( 'designfly-footer-email' ); ?>">
						<?php echo get_theme_mod( 'designfly-footer-email' ); ?>
					</a></p> </span>
				<ul class="social-media">
					<?php 
						/* social media urls */
						$urls = get_theme_mod( 'designfly-footer-urls' );
						$urls = explode( ';', $urls );

						foreach ( $urls as $url ) :
							$url = trim( $url );
							if ( strpos( $url, 'facebook.com' ) !== false ) { ?>
								<li>
									<a target="_blank" href="<?php echo $url; ?>"><img id="social-facebook" src=" <?php echo get_template_directory_uri() . '/assets/img/facebook.png' ?>" /></a>
								</li> <?php
							} elseif ( strpos( $url, 'google' ) !== false ) { ?>
								<li>
									<a target="_blank" href="<?php echo $url; ?>"><img id="social-gp" src=" <?php echo get_template_directory_uri() . '/assets/img/gp.png' ?> " /></a>
								</li> <?php
							} elseif ( strpos( $url, 'linkedin.com' ) !== false ) { ?>
								<li>
									<a target="_blank" href="<?php echo $url; ?>"><img id="social-linkedin" src=" <?php echo get_template_directory_uri() . '/assets/img/linkedin.png' ?> " /></a>
								</li> <?php
							} elseif ( strpos( $url, 'pinterest.com' ) !== false ) { ?>
								<li>
									<a target="_blank" href="<?php echo $url; ?>"><img id="social-pin" src=" <?php echo get_template_directory_uri() . '/assets/img/pin.png' ?> " /></a>
								</li> <?php
							} elseif ( strpos( $url, 'twitter.com' ) !== false ) { ?>
								<li>
									<a target="_blank" href="<?php echo $url; ?>"><img id="social-twitter" src=" <?php echo get_template_directory_uri() . '/assets/img/twitter.png' ?> " /></a>
								</li> <?php
							}
						endforeach;
					?>
				</ul>
			</div>
		</div>
		<hr class="bar" />
	</div>

	<?php 
	if ( get_theme_mod( 'designfly-footer-display', 'Yes' ) == 'Yes' ) :
	?>
		<div class="site-info container">
			<p> <?php echo esc_html__( get_theme_mod( 'designfly-footer-info' ) ); ?> | <?php esc_html_e( 'Designed by', 'designfly' ); ?><a href="https://www.learn.wpeka.com"> WPEKA</a>
			</p>
		</div>
	<?php
	endif;
	?>

</footer><!-- #footer-wrapper -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
