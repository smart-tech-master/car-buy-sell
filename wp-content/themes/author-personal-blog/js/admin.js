( function( $ ){
    $( document ).ready( function(){
      $( '.author-personal-blog-btn-get-started' ).on( 'click', function( e ) {
          e.preventDefault();
          $( this ).html( 'Processing.. Please wait' ).addClass( 'updating-message' );
          $.post( author_personal_blog_ajax_object.ajax_url, { 'action' : 'install_act_plugin' }, function( response ){
              location.href = 'themes.php?page=advanced-import';
          } );
      } );
    } );

}( jQuery ) )