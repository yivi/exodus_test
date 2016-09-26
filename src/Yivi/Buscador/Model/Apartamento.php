<?php
/**
 * Created by PhpStorm.
 * User: yivi
 * Date: 24/9/16
 * Time: 19:31
 */

namespace Yivi\Buscador\Model;


class Apartamento extends Alojamiento {

	public function __toString() {
		$apartamentos = $this->getMeta( 'apartamentos' );
		$capacidad    = $this->getMeta( 'capacidad' );
		$result       = "Apartamentos $this->nombre, $apartamentos apartamentos, $capacidad, $this->ubicacion";

		return $result;
	}
}