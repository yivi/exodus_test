<?php
namespace Yivi\Buscador\Resource;

class Db {

	/** @var \mysqli $connection */
	protected $connection;

	public function __construct( $connection ) {

		$this->connection = $connection;
	}

	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function recuperar_alojamiento_por_id( $id ) {
		// queries para consultar a la db
		$query = "SELECT da.id, da.nombre, da.ubicacion, da.tipo_id, dat.nombre AS tipo_nombre " .
		         "FROM pruebaxxx_alojamiento da " .
		         "LEFT JOIN pruebaxxx_alojamiento_tipo dat ON (da.tipo_id = dat.id) " .
		         "WHERE da.id = $id";


		// ejecución de los queries
		$result_alojamiento = $this->connection->query( $query );
		$alojamiento_row    = $result_alojamiento->fetch_assoc();

		return $alojamiento_row;
	}

	/**
	 * @param $id
	 *
	 * @return array
	 */
	public function recuperar_metas_por_alojamiento( $id ) {

		$query_meta = "SELECT nombre, valor FROM pruebaxxx_alojamiento_meta WHERE alojamiento_id = $id";
		$meta_rows  = $this->connection->query( $query_meta );

		$results = [];
		if ( $meta_rows->num_rows ) {
			while ( $meta_row = $meta_rows->fetch_row() ) {
				$results[ $meta_row[0] ] = $meta_row[1];
			}
		}

		return $results;
	}

	/**
	 * @param $string
	 *
	 * @return array
	 */
	public function recuperar_alojamientos_por_nombre( $string ) {
		// el sql en cuestión
		$query              = "SELECT da.id FROM pruebaxxx_alojamiento da WHERE da.nombre like '$string%'";
		$result_alojamiento = $this->connection->query( $query );

		if ( $result_alojamiento->num_rows === 0 ) {
			return [];
		}

		$result = [];
		while ( list( $id ) = $result_alojamiento->fetch_row() ) {
			$result[] = $id;
		}

		return $result;

	}
}