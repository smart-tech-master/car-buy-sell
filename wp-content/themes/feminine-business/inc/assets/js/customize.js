( function( api ) {

    // Extends our custom "example-1" section.
    api.sectionConstructor['pro-section'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );

} )( wp.customize );

jQuery(document).ready(function($){

    //Scroll to front page section
    $('body').on('click', '#sub-accordion-panel-frontpage_settings .control-subsection .accordion-section-title', function(event) {
        var section_id = $(this).parent('.control-subsection').attr('id');
        scrollToSection( section_id );
    }); 

    //Scroll to Contact page section
    $('body').on('click', '#sub-accordion-panel-contact_page_settings .control-subsection .accordion-section-title', function(event) {
        var section_id = $(this).parent('.control-subsection').attr('id');
        scrollToContactSection( section_id );
    });

    /* Home page preview url */
    wp.customize.panel( 'frontpage_settings', function( section ){
        section.expanded.bind( function( isExpanded ) {
            if( isExpanded ){
                wp.customize.previewer.previewUrl.set( fbp_data.home );
            }
        });
    });

    wp.customize.panel( 'contact_page_settings', function( section ) {
        section.expanded.bind( function( isExpanded ) {
            if ( isExpanded ) {
                wp.customize.previewer.previewUrl.set( fbp_data.contactpage  );
            }
        } );
    } );
});

function scrollToContactSection( section_id ){
    
    var preview_section_id = "contact";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch ( section_id ) {

    case 'accordion-section-contact_info_section':
    preview_section_id = "contact";
    break;

    case 'accordion-section-contact_page_form':
    preview_section_id = "contact";
    break;

    case 'accordion-section-google_map_settings':
    preview_section_id = "location";
    break;

    }

    if( $contents.find('#'+preview_section_id).length > 0 && $contents.find('.page-template-contact').length > 0 ){
        $contents.find("html, body").animate({
        scrollTop: $contents.find( "#" + preview_section_id ).offset().top
        }, 1000);
    }
}


function scrollToSection( section_id ){

    var preview_section_id = "banner_section";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch ( section_id ) {

        case 'accordion-section-feminine_business_blog_posts':
        preview_section_id = "blog-section";
        break;

        case 'accordion-section-cta_section':
        preview_section_id = "showup-section";
        break;

        case 'accordion-section-instagram_section':
        preview_section_id = "instagram_section";
        break;

        case 'accordion-section-home_featured_post_section':
        preview_section_id = "welcome-section";
        break;

        case 'accordion-section-feminine_business_newsletter':
        preview_section_id = "sign-up-section";
        break;

        case 'accordion-section-shop_section':
        preview_section_id = "product-section";
        break;

    }

    if( $contents.find('#'+preview_section_id).length > 0 && $contents.find('.home').length > 0 ){
        $contents.find("html, body").animate({
        scrollTop: $contents.find( "#" + preview_section_id ).offset().top
        }, 1000);
    }
}