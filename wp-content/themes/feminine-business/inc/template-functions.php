<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Feminine_Business
 */

if( ! function_exists( 'feminine_business_doctype' ) ) {
	/**
	 * Doctype Declaration
	*/
	function feminine_business_doctype(){
		?>
		<!DOCTYPE html>
		<html <?php language_attributes(); ?>>
		<?php
	}
}
add_action( 'feminine_business_doctype', 'feminine_business_doctype' );

if( ! function_exists( 'feminine_business_head' ) ) {
	/**
	 * Before wp_head 
	*/
	function feminine_business_head(){
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php
	}
}
add_action( 'feminine_business_before_wp_head', 'feminine_business_head' );

if( ! function_exists( 'feminine_business_page_start' ) ) {
	/**
	 * Page Start
	*/
	function feminine_business_page_start(){
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'feminine-business' ); ?></a>
		<?php
	}
}
add_action( 'feminine_business_before_header', 'feminine_business_page_start' );

if( ! function_exists( 'feminine_business_top_header' ) ) {
	/**
	 * Header
	 */
	function feminine_business_top_header(){ ?>
		<header id="masthead" class="site-header style-one" itemscope itemtype="https://schema.org/WPHeader">
			<?php 
			/**
			 * Top Bar Notification
			 */
			feminine_business_topbar(); 
			?>
			<!-- top-left -->
			<!-- top-header -->
			<div class="main-header">
				<div class="container">
					<?php 
					/**
					 * Site Branding 
					*/
					feminine_business_site_branding();           
					?>
					<div class="right">
						<div class="menu-wrap">
							<?php 
							/**
							 * Primary navigation 
							*/
							feminine_business_primary_navigation(); 
							?>
						</div>
						<?php if( is_woocommerce_activated() ) feminine_business_woo_header_cart(); ?>		
					</div>
					<!-- Menu-wrap -->
				</div>
			</div>
			<?php 
			/**
			 * Mobile navigation
			 */
			feminine_business_mobile_navigation(); 
			?>
		</header>
	<?php }
}
add_action( 'feminine_business_header', 'feminine_business_top_header', 10 );

if( ! function_exists( 'feminine_business_content_start' ) ){
	/**
	 * Content Start
	 */
	function feminine_business_content_start(){ ?>
		<div id="content" class="site-content">
	<?php }
}
add_action( 'feminine_business_header', 'feminine_business_content_start', 30 );

if( ! function_exists( 'feminine_business_footer_page_end' ) ){
	/**
	 * Content end
	 */
	function feminine_business_footer_page_end(){ ?>
		</div>
<?php }
}
add_action( 'feminine_business_after_footer', 'feminine_business_footer_page_end' );

if( ! function_exists( 'feminine_business_primary_page_header' ) ) :
/**
 * Page Header
*/
function feminine_business_primary_page_header(){ 
	if( is_front_page() ) return;

	if( is_search() || is_home() || is_archive() ){ ?>
	
		<?php 
		if( is_search() ) { ?>
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results For %s', 'feminine-business' ), get_search_query() );
				?>
			</h1>
		<?php } elseif( is_home() && ! is_front_page() ) { 	?>			
			<h1 class="page-title">
				<?php single_post_title(); ?>
			</h1>				
		<?php } elseif ( is_archive() ) { 	
			if( is_woocommerce_activated() && is_shop() ){
				echo '<h1 class="page-title">';
				echo esc_html( get_the_title( wc_get_page_id( 'shop' ) ) );
				echo '</h1>';
			}elseif( is_author() ){
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				feminine_business_author_box();
			}else{
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );		
			}
		} ?>
		
	<?php 
	}
}
endif;
add_action( 'feminine_business_before_posts_content', 'feminine_business_primary_page_header', 10 );

if( ! function_exists( 'feminine_business_entry_header' ) ) :
/**
 * Entry Header
*/
function feminine_business_entry_header(){ 
	if ( is_singular() ) { 
		$ed_date	  = get_theme_mod( 'ed_post_date', false );
		$ed_comments  = get_theme_mod( 'ed_banner_comments', false ); 

		if ( is_single() ) {
			echo '<div class="cat-links">';
				feminine_business_category(); 
			echo '</div>';
		}
		the_title('<h1 class="entry-title">', '</h1>');
		feminine_business_post_thumbnail(); 
		if ( is_single() ) { ?>
			<div class="entry-meta">
				<?php 
				if( ! $ed_date ) feminine_business_posted_on(); 
				if( ! $ed_comments ) feminine_business_comment_count();
				feminine_business_single_reading_calc( get_post( get_the_ID() )->post_content );
				?>
			</div>
		<?php } 
	} else { ?>
		<header class="entry-header">
			<div class="entry-meta">
				<?php feminine_business_category(); ?>
			</div><!-- .entry-meta -->
			<div class="entry-details">
				<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );	?>
			</div>
		</header><!-- .entry-header -->
	<?php }
}
endif;
add_action( 'feminine_business_post_entry_header', 'feminine_business_entry_header' );

if( ! function_exists( 'feminine_business_entry_content' ) ) :
/**
 * Entry Content
*/
function feminine_business_entry_content(){ 
	?>
	<div class="entry-content" itemprop="text">
		<?php
			if( is_singular() ){
				the_content();    
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'feminine-business' ),
					'after'  => '</div>',
				) );
			}else{
				the_excerpt();
			}
		?>
	</div><!-- .entry-content -->
	<?php
}
endif;
add_action( 'feminine_business_post_entry_content', 'feminine_business_entry_content', 15 );

if( ! function_exists( 'feminine_business_entry_footer' ) ) :
/**
 * Entry Footer
*/
function feminine_business_entry_footer(){ 

	if( is_single() ){ ?>
		<footer class="entry-footer">
			<?php
				feminine_business_tag();
				feminine_business_nav();
				if( get_edit_post_link() ){
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Edit <span class="screen-reader-text">%s</span>', 'feminine-business' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						),
						'<span class="edit-link">',
						'</span>'
					);
				}
			?>
		</footer><!-- .entry-footer -->
	<?php }
}
endif;
add_action( 'feminine_business_post_entry_content', 'feminine_business_entry_footer', 20 );

if( ! function_exists( 'feminine_business_location' ) ) :
/**
 * Location Settings
 */
function feminine_business_location(){
	$location_title = get_theme_mod( 'location_title', __( 'Address', 'feminine-business' ) );
	$location       = get_theme_mod( 'location', __( 'Your Business Name 220 Woodland Ave Fairmount MN 56031', 'feminine-business' ) );

	if( $location_title || $location ){ ?>
		<div class="contact-info">
			<?php if( $location_title ) echo '<h3 class="contact-info-title location">' . esc_html( $location_title ) . '</h3>';
			if( $location ) echo '<div class="desc location-content"><span class="name">' . esc_html( $location ) . '</span></div>'; ?>
		</div>
	<?php }
}
endif;
add_action( 'feminine_business_contact_page_details', 'feminine_business_location', 30);

if( ! function_exists( 'feminine_business_phone_email' ) ) :
/**
 * Mail Settings
 */
function feminine_business_phone_email(){
	$phone_title = get_theme_mod( 'phone_title', __( 'Drop us a line', 'feminine-business' ) );
	$phone_number = get_theme_mod( 'phone_number', __( '+31 310 909 1234', 'feminine-business' ) );
	$email_address = get_theme_mod( 'email_address', __( 'info@glfeminine.com', 'feminine-business' ) );
	$numbers = explode( ',', $phone_number );
	$emails  = explode( ',', $email_address );

	if( $phone_title || $phone_number || $email_address ){ ?>
		<div class="contact-info">
			<?php if( $phone_title ) echo '<h3 class="contact-info-title phone">' . esc_html( $phone_title ) . '</h3>';
			if( $phone_number || $email_address ){ ?>
				<div class="desc">
					<?php if( $phone_number ){
						foreach( $numbers as $phone ){ ?>
							<a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $phone ) ); ?>" class="tel-link">
								<?php echo esc_html( $phone ); ?>
							</a>
						<?php }
					} if( $email_address ){
						foreach( $emails as $email ){ ?>
							<a href="<?php echo esc_url( 'mailto:' . sanitize_email( $email ) ); ?>" class="email-link">
								<?php echo esc_html( $email ); ?>
							</a>
						<?php }
					} ?>
				</div>
			<?php } ?>
		</div>
	<?php }
}
endif;
add_action( 'feminine_business_contact_page_details', 'feminine_business_phone_email', 10 );

if( ! function_exists( 'feminine_business_contact_hours' ) ) :
/**
 * Phone Settings
 */
function feminine_business_contact_hours(){
	$contact_hours = get_theme_mod( 'contact_hours', __( 'Hours', 'feminine-business' ) );
	$contact_hrs_content = get_theme_mod( 'contact_hrs_content', __( 'Monday - Friday: 9am - 4pm EST', 'feminine-business' ) );
	$contact_hrs = explode( ',', $contact_hrs_content );

	if( $contact_hours || $contact_hrs_content ){ ?>
		<div class="contact-info">
			<?php if( $contact_hours ) echo '<h3 class="contact-info-title hours">' . esc_html( $contact_hours ) . '</h3>';
			if( $contact_hrs_content ){ ?>
				<div class="desc">
					<?php foreach( $contact_hrs as $hour ){
						echo '<span class="time-hours">' . esc_html( $hour ) . '</span>';
					} ?>
				</div>
			<?php } ?>
		</div>
	<?php }
}
endif;
add_action( 'feminine_business_contact_page_details', 'feminine_business_contact_hours', 20 );

if( ! function_exists( 'feminine_business_banner' ) ) :
	/**
	 * Banner Section
	 */
	function feminine_business_banner(){
	$banner               = get_theme_mod( 'ed_banner_section', 'slider_banner' );
	$slider_btn           = get_theme_mod( 'slider_btn_label', __( 'Read More', 'feminine-business' ) );
	$banner_title         = get_theme_mod( 'banner_title', __( 'Donec Cras Ut Eget Justo Nec Semper Sapien Viverra Ante', 'feminine-business' ) );
	$banner_desc          = get_theme_mod( 'banner_content',  __( 'Structured gripped tape invisible moulded cups for sauppor firm hold strong powermesh front liner sport detail.', 'feminine-business' ) );
	$btn_one              = get_theme_mod( 'banner_btn_label', __( 'Read More', 'feminine-business' ) );
	$btn_one_url          = get_theme_mod( 'banner_link', '#' );
	$btn_two              = get_theme_mod( 'banner_btn_two_label', __( 'About Us', 'feminine-business' ) );
	$btn_two_url          = get_theme_mod( 'banner_btn_two_link', '#' );

	if( is_front_page() ){
		if( ( $banner == 'static_banner' ) && has_custom_header() ){ ?>
			<section id="banner_section" class="site-banner<?php if( has_header_video() ) echo esc_attr( ' video-banner' ); ?>">
				<div class ="static-banner">
					<div class="banner-wrapper">
						<div class="banner-image-wrapper">
							<?php the_custom_header_markup(); ?>
						</div>                     
						<?php if( $banner_title || $banner_desc || ( $btn_one && $btn_one_url ) || ( $btn_two && $btn_two_url ) ) { ?> 
							<div class="container">
								<div class="banner-details-wrapper">
									<div class="container">
										<div class="overlay-details">
											<?php if( $banner_title ) { ?>
												<h2 class="item-title">
													<?php echo esc_html( $banner_title ); ?>
												</h2>
											<?php } if( $banner_desc ) { ?>
												<div class="banner-desc">
													<?php echo wp_kses_post( wpautop( $banner_desc ) ); ?>
												</div>
											<?php } if ( ( $btn_one && $btn_one_url ) || ( $btn_two && $btn_two_url ) ) { ?>
												<div class="button-wrap">
													<?php if( $btn_one && $btn_one_url ) { ?>
														<a href="<?php echo esc_url( $btn_one_url ); ?>" class="primary-btn btn-1"><?php echo esc_html( $btn_one ); ?></a>
													<?php } if( $btn_two && $btn_two_url ) { ?>
														<a href="<?php echo esc_url( $btn_two_url ); ?>" class="primary-btn btn-2"><?php echo esc_html( $btn_two ); ?></a>
													<?php } ?>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</section>
			<!-- section banner ends  -->
		<?php } elseif ( $banner == 'slider_banner' ) { 
					
			$image_size = 'feminine-business-homepage-slider';
					
			$args = array(
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true,
				'posts_per_page'      => 3,
				'post_type'           => 'post'
			);
					
			$qry = new WP_Query( $args );
		
			if( $qry->have_posts() ){ ?>
				<section id="banner_section" class="site-banner banner-slider slider-one">
					<div class="item-wrap">
						<div class="container">
							<div class="item owl-carousel">
								<?php while( $qry->have_posts() ) { $qry->the_post(); ?>
									<div class="slider--wrapper">                        
										<div class="container">
											<div class="banner-caption">
												<?php the_title( sprintf( '<h2 class="banner-title"><a href="%s">',  esc_url( get_permalink() ) ), '</a></h2>' ); ?>                                       
												<div class="banner-desc">
													<?php if( has_excerpt() ){
														the_excerpt();
													}else{
														echo wpautop( wp_trim_words( get_the_content(),25, '..' ) );
													} ?>
												</div>
												<?php if( $slider_btn ) { ?>
													<div class="button-wrap">
														<a href="<?php the_permalink(); ?>" class="primary-btn btn-1"><?php echo esc_html( $slider_btn ); ?></a>
													</div>
												<?php } ?>
											</div>
										</div>
										<?php 
											echo '<div class="item-image-wrap"><a href="' . esc_url( get_the_permalink() ) . '">';
											if( has_post_thumbnail() ){ 
												the_post_thumbnail( $image_size, array( 'loading' => false, 'itemprop' => 'image' ) ); 
											} else {
												feminine_business_get_fallback_svg( $image_size );
											}
											echo '</a></div>'; 
										?>                                    
									</div>
								<?php 
							} ?>
							</div>
						</div>
					</div>
				</section>
				<!-- section banner slider ends  -->
			<?php } 
			wp_reset_postdata();		        
		}
	}
}
endif;
add_action ( 'feminine_business_header', 'feminine_business_banner', 20 );