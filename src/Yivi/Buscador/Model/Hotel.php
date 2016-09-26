<?php
/**
 * Created by PhpStorm.
 * User: yivi
 * Date: 24/9/16
 * Time: 19:31
 */

namespace Yivi\Buscador\Model;


class Hotel extends Alojamiento {

	public function __toString() {
		$estrellas  = $this->getMeta( 'estrellas' );
		$habitacion = $this->getMeta( 'tipo_habitacion' );
		$result     = "Hotel $this->nombre, $estrellas estrellas, $habitacion, $this->ubicacion";

		return $result;
	}
}