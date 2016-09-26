#!/usr/bin/env php
<?php

namespace Yivi;

use Yivi\Buscador\Exception\InvalidParameterValueException;
use Yivi\Buscador\Helper;
use Yivi\Buscador\Model\AlojamientoPool;
use Yivi\Buscador\Resource\Db;

require_once( 'src/Yivi/Buscador/autoload.php' );

$config = Helper::get_config();

// Sin configuración no podremos conectarnos a la DB.
if ( empty( $config ) ) {
	die( "No tenemos ficheros de configuración.\n" );
}

// Si no hay parámetros, no podemos hacer nada
if ( $argc === 1 ) {
	Helper::print_usage();
	die( "No se ha especificado ningún parámetro de búsqueda\n" );
}

$conn = new Db( Helper::get_connection( $config ) );

// El pool en el que nadan los alojamientos.
$pool = new AlojamientoPool( $conn );

try {
	$results = $pool->buscar_por_nombre( $argv[1] );
} catch ( InvalidParameterValueException $e ) {
	Helper::print_usage();
	die( "\n" );
}

if ( ! empty( $results ) ) {
	foreach ( $results as $result ) {
		print $result;
		print "\n";
	}
} else {
	print "No existe ningún alojamiento cuyo nombre comience por '$argv[1]'\n";
}

print "\n";