<?php
/**
 * Getting Started Help Notic
 **/
function author_personal_blog_general_admin_notice(){

      $pro_msg = esc_html__('Watch Getting Started Video.', 'author-personal-blog');
       $msg = sprintf('<div data-dismissible="disable-done-notice-forever" class="notice notice-info" >
              <h3>%1$s</h3>
              <p>%2$s</p><p>
              <a class="author-personal-blog-btn-get-started button button-primary button-hero author-personal-blog-button-padding" href="#" data-name="" data-slug="">%3$s</a>
              <a href="%6$s" class="button">%7$s</a>
              <a href="%4$s" class="button button-highlight button-primary" style="color:#fff;"><span style="margin-top:4px;margin-right:5px;" class="dashicons dashicons-video-alt3"></span> %5$s</a>
              <a href="?author_personal_blog_notice_dismissed" style="text-decoration: none; float: right;" >%8$s</a>
              </p></div>',
              esc_html__('Get Most out of the theme','author-personal-blog'),
              esc_html__('Congratulations! You have successfully activated Author Personal Blog theme. Go to Appearance->Customize->Global Settings. you will find all options in one panel.','author-personal-blog'),
              esc_html__('Getting Started with Demos...', 'author-personal-blog'),
              'themes.php?page=author-personal-blog-getting-started',
              $pro_msg,
              esc_url(admin_url()."customize.php"),
              esc_html__('Go to Customizer', 'author-personal-blog'),
              esc_html__('Dismiss Notice', 'author-personal-blog'));
       echo wp_kses_post($msg);
}

if ( isset( $_GET['author_personal_blog_notice_dismissed'] ) ){
          //set notice value false
          update_option('author_personal_blog_help_notice', 'notice_author_personal_blog_dismissed');
}

$author_personal_blog_help_notice = get_option('author_personal_blog_help_notice', '');

if (($author_personal_blog_help_notice != 'notice_author_personal_blog_dismissed' || $author_personal_blog_help_notice === '') ){
          add_action('admin_notices', 'author_personal_blog_general_admin_notice');
}