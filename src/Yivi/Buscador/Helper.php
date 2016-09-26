<?php
namespace Yivi\Buscador;


class Helper {

	/**
	 * Imprimimos instrucciones de uso.
	 */
	public static function print_usage() {
		print <<<USAGE
**************************************************************************************************************************
Forma de uso:

search patron-busqueda 

El patrón de búsqueda debe ser de por lo menos tres caracteres. Busca en el principio del nombre del alojamiento
exclusivamente

***************************************************************************************************************************

USAGE;
	}


	/**
	 * Recuperamos la configuración de la carpeta config.
	 * Leemos todos los ficheros *.global.php y *.local.php, y los valores de "local" sobreescribe a los de global.
	 *
	 * @param string $env
	 *
	 * @return array
	 */
	public static function get_config( $env = '' ) {

		$config = [];

		$pattern = dirname( __FILE__ ) . '/../../../config/{*}{global,local}.php';

		if ( $env != '' ) {
			$pattern = str_replace( '{global,local}', "{global,local,$env}", $pattern );
		}

		$files = glob( $pattern, GLOB_BRACE );

		foreach ( $files as $file ) {
			$more   = include( $file );
			$config = array_merge( $config, $more );
		}


		return $config;
	}

	/**
	 * @param array $config
	 *
	 * @return \mysqli
	 */
	public static function get_connection( array $config ) {
		$conn = new \mysqli( $config['host'], $config['user'], $config['pass'], $config['database'], $config['port'] );
		if ( $conn->connect_errno ) {
			echo "Error al conectarnos a la DB: (" . $conn->connect_errno . ") " . $conn->connect_error;
		}
		$conn->set_charset( 'utf8mb4' );

		return $conn;
	}
}