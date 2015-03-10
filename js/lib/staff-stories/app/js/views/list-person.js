define( function( require ) {
	'use strict';

	var Marionette = require( 'marionette' );

	var tmplListPerson = require( 'tmpl!app/templates/list-person' );
	
	var ListPerson = Marionette.ItemView.extend({
		template: tmplListPerson
		, templateHelpers: function() {
			var name = this.model.get( 'name' ) || { first: '', middle: '', last: '' };
			return {
				fullName: name.first + ' ' + name.middle + ' ' + name.last
			};
		}
		, className: 'list-person'
		, tagName: 'li'
		, events: {
			'click': 'updateActivePerson'
			, 'render': 'checkIsActive'
		}
		, initialize: function( options ) {
			this.model = options.model;
			this.appModel = options.appModel;
			this.isActive = options.isActive || false;
		}
		, updateActivePerson: function( $event ) {
			if ( $event ) {
				$event.preventDefault();
				$event.stopPropagation();
			}
			this.appModel.set( 'activePerson', this.model );
			this.isActive = true;
			this.trigger( 'updatedActivePerson', this.model );
		}
		, checkIsActive: function() {
			this.$el.toggleClass( 'selected', this.isActive );
		}
	});

	return ListPerson;
} );