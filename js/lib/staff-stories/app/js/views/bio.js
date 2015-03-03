define( function( require ) {
	'use strict';

	var _          = require( 'underscore' );
	var Backbone   = require( 'backbone' );
	var Marionette = require( 'marionette' );

	var tmplBio    = require( 'tmpl!app/templates/bio' );
	
	var Bio = Marionette.ItemView.extend({
		template: tmplBio
		, templateHelpers: function() {
			var name = this.model.get( 'name' ) || { first: '', middle: '', last: '' };
			var qualifications = this.listQualifications();
			return {
				fullName: name.first + ' ' + name.middle + ' ' + name.last
				, qualificationsList: qualifications
			};
		}
		, initialize: function( options ) {
			this.model = options.model || new Backbone.Model();
		}
		, listQualifications: function() {
			var qualifications = this.model.get( 'qualifications' ) || [];
			var string = '';
			if ( qualifications.length > 1 ) {
				_.each( qualifications, function( item, index ) {
					if ( index < qualifications.length - 1 ) {
						string += '<span>' + item + '</span>, ';
					} else {
						string += '<span>' + item + '</span>';
					}
				});
			}
			return string;
		}
	});

	return Bio;
} );