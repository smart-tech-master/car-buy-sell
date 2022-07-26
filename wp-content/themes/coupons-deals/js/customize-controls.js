( function( api ) {

	// Extends our custom "coupons-deals" section.
	api.sectionConstructor['coupons-deals'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );