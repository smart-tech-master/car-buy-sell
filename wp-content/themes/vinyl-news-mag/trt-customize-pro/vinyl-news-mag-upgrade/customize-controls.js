( function( api ) {

	// Extends our custom "vinyl-news-mag-upgrade" section.
	api.sectionConstructor['vinyl-news-mag-upgrade'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
