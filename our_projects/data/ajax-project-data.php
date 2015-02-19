<?php
include( 'all-project-data.php' );

header( 'Content-Type: application/json' );
exit( $GLOBALS['project_data'] );