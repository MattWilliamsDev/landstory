require.config({
	baseUrl: 'js/'
	, paths: {
		jquery: '../bower_components/jquery/dist/jquery'
		, handlebars: '../bower_components/handlebars/handlebars.amd'
		, text: '../bower_components/requirejs-text/text'
		, tmpl: 'utilities/tmpl'
		, bootstrap: '../bower_components/bootstrap/dist/js/bootstrap'
		, director: '../bower_components/director/build/director'
	}
	, shim: {
		'jquery': {
			exports: '$'
		}
		, 'handlebars': {
			exports: 'Handlebars'
		}
		, 'bootstrap': {
			deps: [ 'jquery' ]
		}
	}
});

define( function( require ) {
	'use strict';

	var $ = require( 'jquery' );
	var config = require( 'content-config' );
	var Router = require( 'director' );

	this.routes = {
		'/': function() {}
		, '/certifications': function() {}
		, '/projects': function() {}
		, '/story': function() {}
		, '/contact': function() {}
	};
	this.router = new Router( this.routes );

	return app;
} );