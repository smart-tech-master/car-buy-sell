<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vinyl_news_mag
 */

$vinyl_news_mag_options = vinyl_news_mag_theme_options();
$facebook = $vinyl_news_mag_options['facebook'];
$pinterest = $vinyl_news_mag_options['pinterest'];

$show_preloader = $vinyl_news_mag_options['show_preloader'];
$show_links = $vinyl_news_mag_options['show_links'];



?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>


<?php if($show_preloader){ ?>
<div class="preload">
<div class="preloader-2">
  <span class="line line-1"></span>
  <span class="line line-2"></span>
  <span class="line line-3"></span>
  <span class="line line-4"></span>
  <span class="line line-5"></span>
  <span class="line line-6"></span>
  <span class="line line-7"></span>
  <span class="line line-8"></span>
  <span class="line line-9"></span>
  <div><?php esc_html_e('Loading', 'vinyl-news-mag'); ?></div>
</div>
</div>
<?php  } ?>


<body <?php body_class(); ?>>
<?php wp_body_open();  ?>

<?php if($show_links){ ?>
<div id="page" class="site ">

<?php  }
 else { ?>
<div id="page" class="site nolinksstyle">

<?php  } ?>
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'vinyl-news-mag' ); ?></a>

	<header id="masthead" class="site-header">
        <div class="top-header">


    			<div class="container">
    				<div class="row">
                        <div class="col-md-12">
                        <nav class="navbar navbar-default">
                            <div class="header-logo">
                                <?php
                                $description = get_bloginfo('description', 'display');
                                    the_custom_logo();

                                    ?>
                                    <div class="site-identity-wrap">
                                    <h3 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                                    </h3>
                                    <p class="site-description"><?php echo esc_html($description) ?></p>
                                    </div>
                                    <?php
                                ?>
                            </div>

                            
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#navbar-collapse" aria-expanded="false">
                                <span class="sr-only"><?php echo esc_html__('Toggle navigation','vinyl-news-mag'); ?></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        <!-- Collect the nav links, forms, and other content for toggling -->
            	            <div class="collapse navbar-collapse" id="navbar-collapse">

            	             <?php
            	                if (has_nav_menu('primary')) { ?>
            	                <?php
            	                    wp_nav_menu(array(
            	                        'theme_location' => 'primary',
            	                        'container' => '',
                                        'menu_id'=> 'menu-primary-menu',
            	                        'menu_class' => 'nav navbar-nav navbar-center',
            	                        'walker' => new vinyl_news_mag_nav_walker(),
            	                        'fallback_cb' => 'vinyl_news_mag_nav_walker::fallback',
            	                    ));
            	                ?>
            	                <?php } else { ?>
            	                    <nav id="site-navigation" class="main-navigation clearfix">
            	                        <?php   wp_page_menu(array('menu_class' => 'menu')); ?>
            	                    </nav>
            	                <?php } ?>

            	            </div><!-- End navbar-collapse -->

                                <ul class="header-icons">
                                    <?php if($facebook){ ?>
                                    <li><span class="social-icon"> <a href="<?php echo esc_url($facebook); ?>"><i class="fa fa-facebook"></i></a></span></li>
                                    <?php  } ?>

                                    <?php if($pinterest){ ?>
                                    <li><span  class="social-icon"><a href="<?php echo esc_url($pinterest); ?>"> <i class="fa fa-pinterest"></i></a></span></li>
                                    <?php  } ?>


                                   

                                </ul>
                        </nav>
                     </div>
                </div>
                </div>

        </div>
	</header><!-- #masthead -->

	<div class="header-mobile">
		<div class="site-branding">
			<?php the_custom_logo(); ?>
			<div class="logo-wrap">

			<?php
   if (is_front_page() && is_home()): ?>
				<h3 class="site-title"><a href="<?php echo esc_url(
        home_url('/')
    ); ?>" rel="home"><?php bloginfo('name'); ?></a></h3>
				<?php else: ?>
				<h3 class="site-title"><a href="<?php echo esc_url(
        home_url('/')
    ); ?>" rel="home"><?php bloginfo('name'); ?></a></h3>
				<?php endif;
   $vinyl_news_mag_description = get_bloginfo('description', 'display');
   if ($vinyl_news_mag_description || is_customize_preview()): ?>
				<p class="site-description"><?php echo $vinyl_news_mag_description;
       ?></p>
			<?php endif;
   ?>
			</div>
		</div><!-- .site-branding -->


		<div class="mobile-wrap">
	        <div class="header-social">

			<ul> <?php
       if ($facebook) {
           echo '<a class="social-btn facebook" href="' .
               esc_url($facebook) .
               '"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
       }

       if ($pinterest) {
           echo '<a class="social-btn pinterest" href="' .
               esc_url($pinterest) .
               '"><i class="fa fa-pinterest" aria-hidden="true"></i></a>';
       }
       ?>



			                </ul>
			</div>

            <div id="mobile-menu-wrap">
	        <button class="open-menu"><i class="fa fa-bars" aria-hidden="true"></i></button>

	        <div class="collapse navbar-collapse" id="navbar-collapse1">

	         <?php if (has_nav_menu('primary')) { ?>
	            <?php wp_nav_menu([
                 'theme_location' => 'primary',
                 'container' => '',
                 'menu_class' => 'nav navbar-nav navbar-center',
                 'menu_id' => 'menu-main',
                 'walker' => new vinyl_news_mag_nav_walker(),
                 'fallback_cb' => 'vinyl_news_mag_nav_walker::fallback',
             ]); ?>
	            <?php } else { ?>
	                <nav id="site-navigation" class="main-navigation clearfix">
	                    <?php wp_page_menu([
                         'menu_class' => 'menu',
                         'menu_id' => 'menuid',
                     ]); ?>
	                </nav>
	            <?php } ?>

				<button class="close-menu"><span class="sr-text"><?php echo esc_html__(
                 'Close Menu',
                 'vinyl-news-mag'
             ); ?></span><i class="fa fa-times" aria-hidden="true"></i></button>

		    
	        </div><!-- End navbar-collapse -->
    </div>
	    </div>
	</div>
	<!-- /main-wrap -->

