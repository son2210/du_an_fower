( function( api ) {

	// Extends our custom "glowmag" section.
	api.sectionConstructor['blog-web'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
