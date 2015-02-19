module.exports = function( grunt ) {
	'use strict';

	grunt.loadNpmTasks( 'grunt-contrib-less' );

	var BuildVars = function() {
		this.dirs = {
			main: './'
			, css: './css/'
			, js: './js/'
		};
	}

	grunt.initConfig({
		config: new BuildVars()
		, less: {
			dev: {
				options: {
					rootpath: '<%= config.dirs.css %>'
					, compress: false
					, compile: true
				}
				, files: {
					'<%= config.dirs.css %>update.css': '<%= config.dirs.css %>update.less'
				}
			}
			, prod: {
				options: {
					rootpath: '<%= config.dirs.css %>'
					, compress: true
					, cleancss: true
				}
				, files: {
					'<%= config.dirs.css %>update.css': '<%= config.dirs.css %>update.less'
				}
			}
		}
	});

}
