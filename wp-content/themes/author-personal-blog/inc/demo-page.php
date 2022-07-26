<?php
add_filter('advanced_import_welcome_message', 'author_personal_blog_modify_welcome_message');

function author_personal_blog_modify_welcome_message(){
   $message = '
   <div class="ai-header">
      <h1>
         '.esc_html__('Welcome to Author Personal Blog Demo Import Page. What is the', 'author-personal-blog').' <a href="'.esc_url('https://rswpthemes.com/author-personal-blog-pro-wordpress-theme/').'" target="_blank">'.esc_html__('Difference Between Free & Pro Version.?', 'author-personal-blog').'</a>
      </h1>
      <p>'.esc_html__( 'Thank you for choosing the Author Personal Blog theme. This quick demo import setup will help you configure your new website like theme demo. It will install the required WordPress plugins, default content and tell you a little about Help &amp; Support options. It should only take less than 5 minutes.', 'author-personal-blog' ).'</p>
   </div>
   ';
   return $message;
}