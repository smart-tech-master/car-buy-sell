<?php
/**
* Template Name: Header Two
*
*/
?>
<header id="masthead" class="site-header header-one" style="background-image: url(<?php echo esc_url( get_header_image() ); ?>);">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-lg-3 align-self-center">
				<div class="site-branding header-logo">
					<?php
					if ( has_custom_logo() ) :
						the_custom_logo();
					endif;
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
						$author_personal_blog_description = get_bloginfo( 'description', 'display' );
						if ( $author_personal_blog_description || is_customize_preview() ) :
							?>
						<p class="site-description"><?php echo esc_html( $author_personal_blog_description ); /* WPCS: xss ok. */ ?></p>
							<?php
					endif;
					?>
				</div><!-- .site-branding -->
			</div>
			<div class="col-md-8 col-lg-9 m-auto align-self-center d-flex justify-content-between justify-content-md-end text-right">
				<div class="cssmenu text-right align-self-center" id="cssmenu">
					<?php
					wp_nav_menu(
						array(
							'theme_location'    => 'main-menu',
							'container'         => 'ul',
						)
					);
					?>
				</div>
			</div>
		</div>
	</div>
</header><!-- #masthead -->

