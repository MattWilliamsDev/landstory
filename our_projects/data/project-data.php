<?php
include( 'all-project-data.php' );

/**
 * Get Projects Object
 * @return object All project data
 */
function getProjects() {
	try {
		$projects = json_decode( $GLOBALS['project_data'] );
	} catch ( Exception $e ) {
		echo '<pre>';
		var_dump( $e->getMessage(), getEncodingError() );
		echo '</pre>';
	}

	foreach ( $projects as $name => $project ) {
		$project->key = $name;
		$project->name = $project->project_name;
	}
	return $projects;
}

/**
 * Get all categories
 * @return object All category data
 */
function getCategories() {
	$categories = new stdClass();
	$projects = getProjects();
	foreach ( $projects as $key => $project ) {
		$cat = $project->category;
	
		if ( !isset( $categories->$cat ) || !$categories->$cat ) {
			$categories->$cat = new stdClass();
		}

		$categories->$cat->projects->$key = $project;
		
		if ( !isset( $categories->$cat->display_name ) ) {
			$categories->$cat->display_name = $project->category_display ? $project->category_display : $cat;
		}
	}

	return $categories;
}

/**
 * Convert string to uppercase
 * @param  string $str String to convert
 * @return string      Uppercase string
 */
function upper ( $str ) {
	return strtoupper( format( $str, false ) );
}

/**
 * Format strings with spaces
 * @param  string  $str     String to format
 * @param  boolean $ucfirst Should capitalize
 * @return string           Formatted string
 */
function format ( $str, $ucfirst = true ) {
	$_str = str_replace( '_', ' ', $str );
	if ( $ucfirst )
		$_str = ucwords( $_str );

	return $_str;
}

/**
 * Format Category Names
 * Replace '_' with ' ' && '__' with ' & '
 * @param  string $str String to format
 * @return string      Formatted category name
 */
function formatCategoryName( $str ) {
	return strpos( $str, '__' ) !== false ? ucwords( str_replace( '__', ' &amp; ', $str ) ) : ucwords( str_replace( '_', ' ', $str ) );
}

/**
 * Shorthand function for format()
 * @param  string  $str     String to format
 * @param  boolean $ucfirst Should capitalize
 * @return string           Formatted string
 */
function d ( $str, $ucfirst = true ) {
	return format( $str, $ucfirst );
}

/**
 * Shorthand function for upper()
 * @param  string $str String to convert
 * @return string      Uppercase string
 */
function u ( $str ) {
	return upper( $str );
}

/**
 * Utility to assist finding errors in the JSON
 */
function getEncodingError() {
	$error = "Decoding: ";
	switch (json_last_error()) {
        case JSON_ERROR_NONE:
            $error .= ' - No errors';
        break;
        case JSON_ERROR_DEPTH:
            $error .= ' - Maximum stack depth exceeded';
        break;
        case JSON_ERROR_STATE_MISMATCH:
            $error .= ' - Underflow or the modes mismatch';
        break;
        case JSON_ERROR_CTRL_CHAR:
            $error .= ' - Unexpected control character found';
        break;
        case JSON_ERROR_SYNTAX:
            $error .= ' - Syntax error, malformed JSON';
        break;
        case JSON_ERROR_UTF8:
            $error .= ' - Malformed UTF-8 characters, possibly incorrectly encoded';
        break;
        default:
            $error .= ' - Unknown error';
        break;
    }
    return $error;
}
?>

<script type="text/javascript">
	// Check for jQuery. Add if it doesn't exist
	window.jQuery || document.write( "<script src=\"\/bower_components\/jquery\/dist\/jquery.min.js\"><\/script>" );

	$(function() {
		// Asynchronously call the project data, then add as global var.
		// This is mostly just helpful for debugging via DevTools console, 
		// or for quickly finding project data.
		$.ajax({
			url: '/our_projects/data/ajax-project-data.php'
			, type: 'get'
			, contentType: 'application/json'
			, success: function( data ) {
				window.landstory = window.landstory || {
					projects: data
				};
			}
			, error: function( $e ) {
				console.error( $e );
			}
		});
	});
</script>
