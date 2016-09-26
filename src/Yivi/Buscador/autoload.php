<?php

namespace Yivi\Buscador;

function autoload( $class ) {
	// project-specific namespace prefix
	$prefix = __NAMESPACE__ . '\\';

	// base directory for the namespace prefix
	$base_dir = __DIR__ ;

	$clean_class = str_replace($prefix, '', $class);

	// does the class use the namespace prefix?
	$len = strlen( $prefix );
	if ( strncmp( $prefix, $class, $len ) !== 0 ) {
		// no, move to the next registered autoloader
		return;
	}

	// replace the namespace prefix with the base directory, replace namespace
	// separators with directory separators in the relative class name, append
	// with .php
	$file = $base_dir . DIRECTORY_SEPARATOR . str_replace( '\\', DIRECTORY_SEPARATOR, $clean_class ) . '.php';

	// if the file exists, require it
	if ( file_exists( $file ) ) {
		require_once $file;
	}

}

spl_autoload_register( 'Yivi\Buscador\autoload' );