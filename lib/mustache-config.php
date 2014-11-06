<?php

$mustache = new Mustache_Engine( array(
    'template_class_prefix' => '__Mustache_'
    , 'cache' => dirname( __FILE__ ) . '/tmp/cache/mustache'
    , 'cache_lambda_templates' => true
    , 'loader' => new Mustache_Loader_FilesystemLoader( dirname( __FILE__ ) . '/views' )
    , 'partials_loader' => new Mustache_Loader_FilesystemLoader( dirname( __FILE__ ) . '/views/partials' )
    , 'escape' => function( $value ) {
        return htmlspecialchars( $value, ENT_COMPAT, 'UTF-8' );
    }
    , 'charset' => 'ISO-8859-1'
    , 'logger' => new Mustache_Logger_StreamLogger( 'php://stderr' )
    , 'strict_callables' => true
));

echo '<pre>';
var_dump( $_SERVER );
echo '</pre>';

// $tpl = $mustache->loadTemplate( 'foo' ); // loads __DIR__.'/views/foo.mustache';
// echo $tpl->render( array( 'bar' => 'baz' ) );