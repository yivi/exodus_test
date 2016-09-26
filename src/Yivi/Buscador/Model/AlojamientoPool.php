<?php

namespace Yivi\Buscador\Model;

use Yivi\Buscador\Resource\Db;
use Yivi\Buscador\Exception\InvalidParameterValueException;
use Yivi\Buscador\Model\Hotel as Hotel;
use Yivi\Buscador\Model\Apartamento;

class AlojamientoPool {

	private $db;


	/**
	 * AlojamientoPool constructor.
	 *
	 * @param Db $db
	 */
	public function __construct( $db ) {

		$this->db = $db;
	}

	/**
	 * @param $id
	 *
	 * @return Alojamiento
	 * @throws InvalidParameterValueException
	 */
	public function recuperar_por_id( $id ) {

		if ( ! is_numeric( $id ) || $id < 1 ) {
			throw new InvalidParameterValueException();
		}

		$alojamiento_row = $this->db->recuperar_alojamiento_por_id( $id );

		// instancio los objectos que inyectaré en alojamiento
		$tipo = new AlojamientoTipo( $alojamiento_row['tipo_id'], $alojamiento_row['tipo_nombre'] );
		$meta = new AlojamientoMeta();

		// si obtuvimos algún meta, lo seteamos en AlojamientoMeta antes de inyectarlo
		$meta_row = $this->db->recuperar_metas_por_alojamiento( $id );

		foreach ( $meta_row as $meta_key => $meta_value ) {
			$meta->setData( $meta_key, $meta_value );
		}

		// devuelvo una clase u otra
		$clase = __NAMESPACE__ . '\\' . ucfirst( $tipo->getNombre() );

		// mission accomplished. go home.
		return new $clase( $id, $alojamiento_row['nombre'], $alojamiento_row['ubicacion'], $tipo, $meta );

	}

	/**
	 * @param $string
	 *
	 * @return array
	 * @throws InvalidParameterValueException
	 */
	public function buscar_por_nombre( $string ) {
		// si es un string muy corto, no hacemos ninguna búsqueda. usamos mb por si venían caracteres multibyte.
		if ( mb_strlen( $string ) < 3 ) {
			throw new InvalidParameterValueException( "Necesitamos por lo menos tres caracteres para hacer la búsqueda" );
		}

		$resultados_alojamientos = $this->db->recuperar_alojamientos_por_nombre( $string );

		// si no hay resultados, devolvemos un array vacío
		if ( empty( $resultados_alojamientos ) ) {
			return [];
		}

		// el array donde meteremos los resultados
		$result = [];
		foreach ( $resultados_alojamientos as $alojamiento_id ) {

			// dry
			$result[] = $this->recuperar_por_id( $alojamiento_id );
		}

		// life is good.
		return $result;

	}
}