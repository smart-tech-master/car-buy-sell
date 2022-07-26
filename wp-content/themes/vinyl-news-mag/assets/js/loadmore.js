jQuery( document ).ready( function(){
    var page = 2;
    jQuery( function($) {
      jQuery( 'body' ).on( 'click', '.loadmore', function() {
        var data = {
          'action': 'load_posts_by_ajax',
          'page': page,
          'security': vinyl_news_mag_blog.security
        };
        jQuery.post( vinyl_news_mag_blog.ajaxurl, data, function( response ) {
          if( $.trim(response) != '' ) {
            jQuery( '.card-sidebar-wrap' ).append( response );
            page++;
          } else {
            jQuery( '.loadmore' ).hide();
            jQuery( ".no-more-post" ).addClass("shownow");
          }
        });
      });
    });
  });