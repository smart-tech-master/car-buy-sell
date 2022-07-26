<?php
/**
 * Extra functions to enhance the theme functionality
 */

if ( ! function_exists( 'feminine_business_site_branding' ) ){
    /**
     * Site Branding
     */
    function feminine_business_site_branding(){
        ?>
        <div class="site-branding has-image-text" itemscope itemtype="https://schema.org/Organization">
            <?php if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){            
                the_custom_logo();               
            } 
           
            if ( is_front_page() ) :
                ?>
                <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php
            else :
                ?>
                <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
            endif;
            $feminine_business_description = get_bloginfo( 'description', 'display' );
            if ( $feminine_business_description || is_customize_preview() ) :
                ?>
                <p class="site-description" itemprop="description"><?php echo $feminine_business_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
            <?php endif; ?>
        </div><!-- .site-branding -->
        <?php
    }
}

if ( ! function_exists( 'feminine_business_primary_navigation' ) ){
    /**
    * Site Branding
    */
    function feminine_business_primary_navigation( $schema = true ){
        if ( current_user_can( 'manage_options' ) || has_nav_menu( 'primary-menu' ) ) {  

            $schema_class = '';
            $mobile_id    = 'mobile-navigation';
        
            if( $schema ){
                $schema_class = ' itemscope itemtype="https://schema.org/SiteNavigationElement"';
                $mobile_id    = 'site-navigation';
            } ?>

            <nav id="<?php echo esc_attr( $mobile_id ); ?>" class="main-navigation" <?php  echo $schema_class; ?>>
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'primary-menu',
                            'menu_id'         => 'primary-menu',
                            'container_class' => 'primary-menu-container',
                            'fallback_cb'     => 'feminine_business_primary_menu_fallback',
                        )
                    );
                ?>
            </nav>
        <?php }
    }
}

if( ! function_exists( 'feminine_business_primary_menu_fallback' ) ) :
/**
 * Fallback for primary menu
*/
function feminine_business_primary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<div class="menu-primary-container">';
        echo '<ul id="primary-menu" class="nav-menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'feminine-business' ) . '</a></li>';
        echo '</ul>';
        echo '</div>';
    }
}
endif;

if( ! function_exists( 'feminine_business_social_links' ) ) {
/**
 * Social Links 
*/
    function feminine_business_social_links( $echo = true ){ 
        $social_links = get_theme_mod( 'social_links' );
        $ed_social    = get_theme_mod( 'ed_social_links', false ); 
         
        if( $ed_social && $social_links && $echo ){ ?>
        <ul class="social-icons">
            <?php 
            foreach( $social_links as $link ){
                $new_tab = isset( $link['fbp_checkbox'] ) && $link['fbp_checkbox'] ? '_blank' : '_self';
                if( isset( $link['fbp_link'] ) && $link['fbp_link'] ){ ?>
                <li>
                    <a href="<?php echo esc_url( $link['fbp_link'] ); ?>" target="<?php echo esc_attr( $new_tab ); ?>" rel="nofollow noopener">
                        <?php echo wp_kses( feminine_business_social_icons_svg_list( $link['fbp_icon'] ), feminine_business_get_kses_extended_ruleset() ); ?>
                    </a>
                </li>    	   
                <?php
                } 
            } 
            ?>
        </ul>
        <?php    
        }elseif( $ed_social && $social_links ){
            return true;
        }else{
            return false;
        }
        ?>
        <?php                                
    }
}

if( ! function_exists( 'feminine_business_topbar' ) ) :
/**
 * Topbar
*/
function feminine_business_topbar(){ 
    $ed_topbar       = get_theme_mod( 'ed_topbar', false );
    $topbar_title    = get_theme_mod( 'topbar_title');
    $topbar_btn      = get_theme_mod( 'topbar_btn' );
    $topbar_btn_link = get_theme_mod( 'topbar_btn_link' );
	$ed_social       = get_theme_mod( 'ed_social_links', false );
    $btn_new_tab     = get_theme_mod( 'topbar_btn_target', false );
    $target          = $btn_new_tab ? 'target=_blank' : '';

    if ( $ed_topbar ) { ?>
    <div class="notification-wrapper">    
        <div class="header-top">
			<div class="container">
				<div class="header-t-wrapper">
					<?php if( $topbar_title || $topbar_btn ) { ?>
						<div class="top-left">
							<div class="text-holder">
								<?php if( $topbar_title ) { ?>
									<p><?php echo esc_html( $topbar_title ); ?></p>
								<?php } if( $topbar_btn && $topbar_btn_link ) { ?>
									<a href="<?php echo esc_url( $topbar_btn_link ); ?>"<?php echo esc_attr( $target ); ?>><?php echo esc_html( $topbar_btn); ?></a>
								<?php } ?>
							</div>
						</div>						
                        <div class="top-right">
                            <?php feminine_business_header_contact(); ?>
                            <?php if ( $ed_social ) { ?>
                                <div class="socio-wrap">
                                    <?php
                                    /**
                                    * Social links 
                                    */
                                    feminine_business_social_links( true ); ?>                               
                                </div>
                            <?php } ?>
                        </div>                   			
                    <?php } ?>  
				</div>            
			</div>   
		</div>

		<button class="top-bar-close"></button>
    </div>

    <?php }
}
endif;

if( ! function_exists( 'feminine_business_header_contact' ) ) :
    /**
     * Email and Phone number at Header
    */
    function feminine_business_header_contact(){
        $topbar_phone    = get_theme_mod( 'topbar_phone' );
        $topbar_email    = get_theme_mod( 'topbar_email' );
        if ( $topbar_phone || $topbar_email ) { ?>
            <div class="right-wrap">
                <?php if( $topbar_phone ) { ?>         
                    <span>
                        <?php echo feminine_business_social_icons_svg_list( 'phone' ); 
                        echo '<a class="phone" href="' . esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $topbar_phone ) ) . '" class="tel-link">' . esc_html( $topbar_phone ) . '</a>'; ?>                             
                    </span>
                <?php } if( $topbar_email ) { ?>
                    <span>
                        <?php echo feminine_business_social_icons_svg_list( 'email' ); 
                        echo '<a class="email" href="' . esc_url( 'mailto:' . sanitize_email( $topbar_email ) ) . '" class="email-link">' . esc_html( $topbar_email ) . '</a>'; ?>              
                    </span>
                <?php } ?>
            </div>
        <?php }
    }
endif;

if( ! function_exists( 'feminine_business_comment_count' ) ) :
/**
 * Comment Count
*/
function feminine_business_comment_count(){
    $ed_comments    = get_theme_mod( 'ed_banner_comments', false );
    if( !$ed_comments && get_comments_number() > 0 ) { ?> 
        <span class="comments">
			<?php
			echo feminine_business_misc_svg( 'comment' );
            echo absint( get_comments_number() ); 
			?>
        </span>
    <?php }   
}
endif;

if( ! function_exists( 'feminine_business_get_posts_list' ) ) :
/**
 * Returns Latest and Related
*/
function feminine_business_get_posts_list( $status ){
    global $post;
    $sidebar = feminine_business_sidebar_layout();
    $no_of_post = $sidebar === 'full-width' ? 3 : 2;
    
    $args = array(
        'post_type'           => 'post',
        'posts_status'        => 'publish',
        'ignore_sticky_posts' => true
    );
    
    switch( $status ){
        case 'latest':        
        $args['posts_per_page'] = 3;
        $related_title          = __( 'Explore Our Blog', 'feminine-business' );
        $class                  = 'related-posts';
        $image_size             = 'feminine-business-recent-posts';
        break;
        
        case 'related':
        $args['posts_per_page'] = $no_of_post;
        $args['post__not_in']   = array( $post->ID );
        $args['orderby']        = 'rand';
        $class                  = 'related-posts';
        $related_title          = get_theme_mod( 'related_post_title', __( 'You might also like', 'feminine-business' ) );
        $image_size             = 'feminine-business-related';
           
        $cats = get_the_category( $post->ID );        
        if( $cats ){
            $c = array();
            foreach( $cats as $cat ){
                $c[] = $cat->term_id; 
            }
            $args['category__in'] = $c;
        }
        
        break;        
    }
    
    $qry = new WP_Query( $args );
    
    if( $qry->have_posts() ){     
        echo '<div class="' . esc_attr( $class ) . '">';
           
            if( $related_title ) echo '<h3 class="related-title">' . esc_html( $related_title ) . '</h3>'; ?>
            <div class="related-posts-wrapper">          
                <?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <figure class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                    if( has_post_thumbnail() ){
                                        the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
                                    }else{ 
                                        feminine_business_get_fallback_svg( $image_size );//fallback
                                    }
                                ?>
                            </a>
                        </figure>
                        <div class="meta-wrap">
                            <?php if( is_404() ){ ?>
                                <header class="entry-header">
                                    <div class="entry-meta">
                                        <?php 
                                            feminine_business_posted_on(); 
                                            feminine_business_comment_count();
                                        ?>
                                    </div>              
                                </header>
                                <div class="categories">
                                    <?php feminine_business_category(); ?>
                                </div>
                            <?php } elseif( is_single() ) { 
                                feminine_business_posted_on(); 
                            } ?>
                            <div class="details-wrap">
                                <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
                                if( is_404() ){ ?>
                                    <div class="entry-details">
                                        <p><?php the_excerpt(); ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </article>
                <?php } ?>    		
            </div>
            <?php

        echo '</div>';
    } wp_reset_postdata();
}
endif;

if( ! function_exists( 'feminine_business_sidebar_layout' ) ) :
/**
 * Return sidebar layouts for pages/posts
 */
function feminine_business_sidebar_layout(){
	global $post;
	$return      = false;
	$page_layout = get_theme_mod( 'page_sidebar_layout', 'right-sidebar' ); //Default Layout Style for Pages
	$post_layout = get_theme_mod( 'post_sidebar_layout', 'right-sidebar' ); //Default Layout Style for Posts
    $layout      = get_theme_mod( 'layout_style', 'right-sidebar' ); //Default Layout Style for Archive and Search Pages

    if ( is_404() ) return;
    
	if( is_singular() ){         
		if( get_post_meta( $post->ID, '_fbp_sidebar_layout', true ) ){
			$sidebar_layout = get_post_meta( $post->ID, '_fbp_sidebar_layout', true );
		}else{
			$sidebar_layout = 'default-sidebar';
		}
		if( is_page() ){
			if( is_active_sidebar( 'sidebar' ) ){
				if( $sidebar_layout == 'no-sidebar' ){
					$return = 'full-width';
				}elseif( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ){
					$return = 'rightsidebar';
				}elseif( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ){
					$return = 'leftsidebar';
				}elseif( $sidebar_layout == 'default-sidebar' && $page_layout == 'no-sidebar' ){
					$return = 'full-width';
				}
			}else{
				$return = 'full-width';
			}
		}elseif( is_single() ){
			if( is_active_sidebar( 'sidebar' ) ){
				if( $sidebar_layout == 'no-sidebar' ){
					$return = 'full-width';
				}elseif( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ){
					$return = 'rightsidebar';
				}elseif( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ){
					$return = 'leftsidebar';
				}elseif( $sidebar_layout == 'default-sidebar' && $post_layout == 'no-sidebar' ){
					$return = 'full-width';
				}
			}else{
				$return = 'full-width';
			}
		}
	}elseif( is_archive() || is_search() || ( is_home() && !is_front_page() ) ){
        //archive page                  
		if( is_active_sidebar( 'sidebar' ) ){
			if( $layout == 'no-sidebar' ){
				$return = 'full-width';
			}elseif( $layout == 'right-sidebar' ){
				$return = 'rightsidebar';
			}elseif( $layout == 'left-sidebar' ) {
				$return = 'leftsidebar';
			}
		}else{
			$return = 'full-width';
		}                       
    }else{
		if( is_active_sidebar( 'sidebar' ) ){            
			$return = 'rightsidebar';             
		}else{
			$return = 'full-width';
		} 
	}

	return $return;
}
endif;

if( ! function_exists( 'feminine_business_contact_form' ) ) :
    /**
     * Contact form
    */
    function feminine_business_contact_form( $form_title, $shortcode ){ 
        
        if( $form_title || $shortcode ){ ?>
            <div class="contact-wrapper">
                <?php if( $form_title ) echo '<h2 class="page-title">' . esc_html( $form_title ) . '</h2>';
                if( $shortcode ) echo do_shortcode( $shortcode );?>
            </div>
        <?php }
    }
endif;

if ( ! function_exists( 'feminine_business_author_box' ) ){
    /**
     * Author Box for Single Post and Archive Page
     */
    function feminine_business_author_box(){
        $author_title = get_theme_mod( 'author_box_title', __( 'About The Author', 'feminine-business' ) ); 
        ?>
        <section class="author-section">
            <div class="image-details">
                <figure class="auth-image">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 209, '', 'avatar' ); ?>
                </figure>
            </div>
            <div class="details-wrap">  
                <?php if( $author_title ) { ?>       
                    <h3 class="author-name">
                        <?php echo esc_html( $author_title ); ?>
                    </h3>
                <?php } ?>
                <div class="author-content">
                    <?php echo wp_kses_post( wpautop( get_the_author_meta( 'description' ) ) ); ?>
                </div>                     
                <?php if( is_single() ){ ?>
                    <div class="author-signature">
                        <?php feminine_business_posted_by(); ?>                      
                    </div>   
                <?php } ?>    
            </div>
        </section>
        <?php
    }
}

if( ! function_exists( 'feminine_business_mobile_navigation' ) ) :
/**
 * Mobile Navigation
*/
function feminine_business_mobile_navigation(){ 
?>
    <div class="mobile-header">
        <div class="header-main">
            <div class="container">
                <div class="mob-nav-site-branding-wrap">
                    <div class="header-center">
                        <?php feminine_business_site_branding(); ?>
                    </div>
                    <button id="menu-opener" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".close-main-nav-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
        <div class="mobile-header-wrap">
            <div class="mobile-menu-wrapper">
                <nav id="mobile-site-navigation" class="main-navigation mobile-navigation">        
                    <div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">                  
                        <button class="close close-main-nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal"></button>
                        <div class="mobile-social-wrap">
                            <?php if( feminine_business_social_links( false ) ){
                                echo '<div class="header-left"><div class="header-social">';
                                feminine_business_social_links();
                                echo '</div></div>';
                            } ?>  
                        </div>
                        <div class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'feminine-business' ); ?>">
                            <?php
                                feminine_business_primary_navigation( false );
                            ?>
                        </div>
                    </div>
                </nav><!-- #mobile-site-navigation -->
            </div>
        </div>  
    </div>
<?php   
}
endif;


if( ! function_exists( 'feminine_business_comment' ) ) {
	/**
	 * Callback function for Comment List *
	 * 
	 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments 
	 */
	function feminine_business_comment( $comment, $args, $depth ){
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}?>
		<<?php echo esc_html( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
		
		<?php if ( 'div' != $args['style'] ) : ?>
		<article id="div-comment-<?php comment_ID() ?>" class="comment-body" itemscope itemtype="http://schema.org/UserComments">
		<?php endif; ?>
			
			<footer class="comment-meta">
				<div class="comment-author vcard">
                    <div class="comment-author-image">
				        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'], '', 'avatar' ); ?>
                    </div>
				</div>
                <div class="author-details-wrap"><!-- .comment-author vcard -->
                    <?php printf( __( '<b class="fn" itemprop="creator" itemscope itemtype="http://schema.org/Person">%s <span class="says">says:</span></b>', 'feminine-business' ), get_comment_author_link() ); ?>
                    <div class="comment-meta-data">
                        <a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>">
                            <time itemprop="commentTime" datetime="<?php echo esc_attr( get_gmt_from_date( get_comment_date() . get_comment_time(), 'Y-m-d H:i:s' ) ); ?>"><?php printf( esc_html__( '%1$s at %2$s', 'feminine-business' ), get_comment_date(),  get_comment_time() ); ?></time>
                        </a>
                    </div>
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'feminine-business' ); ?></em>
                        <br />
                    <?php endif; ?>
                    <div class="comment-content" itemprop="commentText">                     
                        <?php comment_text(); ?>                      
			        </div>    
                    <div class="reply">
                        <div class="comments"><?php echo get_comments_number() . esc_html__( ' Comments', 'feminine-business' ); ?></div>
                        <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __('Reply', 'feminine-business'), 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </div>
                </div>
			</footer> 
		<?php if ( 'div' != $args['style'] ) : ?>
		</article><!-- .comment-body -->
		<?php endif;
	}
}

if( ! function_exists( 'feminine_business_get_page_template_url' ) ) :
/**
 * Fuction to return page url
*/
function feminine_business_get_page_template_url( $template_key = '', $post_type = 'page' ){

    if( ! empty( $template_key ) ){
        $args = array(
            'meta_key'      => '_wp_page_template',
            'meta_value'    => $template_key,
            'post_type'     => $post_type,
        );

        $posts_array = get_posts( $args );

        if ( ! empty( $posts_array ) ) {
            foreach ( $posts_array as $posts ) {
                $post_options[ $posts->ID ] = $posts->ID;    
                $page_template_url = get_permalink( $post_options[ $posts->ID ] );
                return $page_template_url;
            }
        }
    } else {
        return false;
    }
}
endif;

if( ! function_exists( 'feminine_business_footer_top' ) ) :
    /**
     * Footer Main
    */
    function feminine_business_footer_top(){    
        $footer_sidebars = array( 'footer-one', 'footer-two', 'footer-three', 'footer-four' );
        $active_sidebars = array();
        $sidebar_count   = 0;
        
        foreach ( $footer_sidebars as $sidebar ) {
            if( is_active_sidebar( $sidebar ) ){
                array_push( $active_sidebars, $sidebar );
                $sidebar_count++ ;
            }
        } 
        
        if( $active_sidebars ){ ?>
            <div class="footer-main">
                <div class="grid column-<?php echo esc_attr( $sidebar_count ); ?>">        
                    <?php foreach( $active_sidebars as $active ){ ?>
                        <div class="col">
                           <?php dynamic_sidebar( $active ); ?> 
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php 
        }   
    }
endif;

if( ! function_exists( 'feminine_business_footer_site_info' ) ) :
    /**
     * Footer site info
    */
    function feminine_business_footer_site_info(){ 
        echo '<div class="site-info">';
            feminine_business_get_footer_copyright();
            feminine_business_ed_author_link();
            feminine_business_ed_wp_link();
        echo '</div>';
}
endif;

if( ! function_exists( 'feminine_business_footer_menu' ) ) :
    /**
     * Footer Credits 
    */
    function feminine_business_footer_menu(){ 
        if( current_user_can( 'manage_options' ) || has_nav_menu( 'footer-menu' ) ): ?>
            <div class="footer-bottom-menu">
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'footer-menu',
                            'menu_class'     => 'footer-bottom-links',
                            'menu_id'        => 'footer-menu',
                            'fallback_cb'    => 'feminine_business_footer_menu_fallback',
                        ) );
                    ?>
            </div> 
    <?php 
    endif;
}
endif;

if( ! function_exists( 'feminine_business_footer_menu_fallback' ) ) :
/**
 * Fallback for footer menu
*/
function feminine_business_footer_menu_fallback(){
	if( current_user_can( 'manage_options' ) ){
		echo '<div class="footer-bottom-links">';
		echo '<ul id="footer-menu" class="nav-menu">';
		echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'feminine-business' ) . '</a></li>';
		echo '</ul>';
		echo '</div>';
	}
}
endif;

if( ! function_exists( 'feminine_business_get_related_posts' ) ) :
    /**
     * Related post
    */
    function feminine_business_get_related_posts(){    
		feminine_business_get_posts_list( 'related' );
    }
endif;

if( ! function_exists( 'feminine_business_get_comments' ) ) :
    /**
     * Comments
    */
    function feminine_business_get_comments(){ 
    // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;      
    }
endif;

if( ! function_exists( 'feminine_business_map_section' ) ) :
    /**
     * Contact Map Section
    */
    function feminine_business_map_section(){ 
        $ed_map     = get_theme_mod( 'ed_googlemap', true );
        $map_title  = get_theme_mod( 'contact_map_title', __( 'Locate Us', 'feminine-business' ) );
        $google_map = get_theme_mod( 'contact_google_map_iframe' ); 
        if( $ed_map ){ ?>
            <div class="location-wrapper" id="location">
                <div class="container">
                    <?php if( $map_title ) echo '<h2 class="page-title">' . esc_html( $map_title ) . '</h2>';
                    if( $google_map ){ ?> 
                        <div class="map">
                            <?php echo htmlspecialchars_decode( $google_map ); ?>            
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php }
    }
endif;

if( ! function_exists( 'feminine_business_scroll_to_top' ) ) :
    /**
     * Scroll to top function
    */
    function feminine_business_scroll_to_top(){
        $ed_scroll_top = get_theme_mod( 'ed_scroll_top', false );
        if( $ed_scroll_top ) echo '<div id="scroll-top-top" class="scroll-to-top">
        </div>';
    }
endif;

if( !function_exists( 'feminine_business_nav' ) ) :
    /**
     * navigation
     */
    function feminine_business_nav(){
        if( is_singular() ){ 
            $next_post	= get_next_post();
            $prev_post  = get_previous_post();
            
            if( $next_post || $prev_post ){ ?>
                <nav class="post-navigation pagination">
                    <?php if( $prev_post ){ ?>
                        <span class="prev-posts">
                            <a href="<?php the_permalink( $prev_post->ID ); ?>" rel="prev">
								<?php echo feminine_business_misc_svg( 'prev-posts' ); ?>
                            </a>
                        </span>
                    <?php }
                    if( $next_post ){ ?>
                        <span class="next-posts">
                            <a href="<?php the_permalink( $next_post->ID ); ?>" rel="next">
								<?php echo feminine_business_misc_svg( 'next-posts' ); ?>
                            </a>
                        </span>
                    <?php } ?>
                </nav>
            <?php }
        }else{        
      
            echo '<div class="default">';
        
            the_posts_navigation();
            
            echo '</div>';    
            
        }
    }
endif;


if( ! function_exists( 'feminine_business_google_fonts_url' ) ) :
    /**
     * Register google font.
     */
    function feminine_business_google_fonts_url() {
        $fonts_url = '';
        /* 
            * Translators: If there are characters in your language that are not
            * supported by Open fonts, translate this to 'off'. Do not translate
            * into your own language.
        */
        $opensans_font = _x( 'on', 'Open Sans: on or off', 'feminine-business' );
    
        if ( 'off' !== $opensans_font ) {
            $font_families = array();
    
            if ( 'off' !== $opensans_font ) {
                $font_families[] = 'Open Sans:300,400,500,600i,700';
            }
            $query_args = array(
                'family'  => urlencode( implode( '|', $font_families ) ),
                'subset'  => urlencode( 'latin,latin-ext' ),
                'display' => urlencode( 'fallback' ),
            );
    
            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }
    
        return esc_url( $fonts_url );
    }
endif;

if( !function_exists( 'is_btnw_activated' ) ) :
    /**
     * Is BlossomThemes Email Newsletters active or not
    */
    function is_btnw_activated(){
        return class_exists( 'Blossomthemes_Email_Newsletter' ) ? true : false;        
    }
endif;

if( ! function_exists( 'is_woocommerce_activated' ) ) :
    /**
     * Query WooCommerce activation
     */
    function is_woocommerce_activated() {
        return class_exists( 'woocommerce' ) ? true : false;
    }
endif;

if( ! function_exists( 'is_cf7_activated' ) ) :
    /**
     * Check if Contact Form 7 Plugin is installed
    */
    function is_cf7_activated(){
        return class_exists( 'WPCF7' ) ? true : false;
    }
endif;