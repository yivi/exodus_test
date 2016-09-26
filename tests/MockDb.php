<?php

use \Yivi\Buscador\Resource\Db;

class MockDb extends Db {

	private $fake_alojamientos = [];
	private $fake_meta = [];

	public function __construct( $connection ) {
		$this->fake_alojamientos = [];

		$this->fake_alojamientos[] = [ 'nombre' => "Azul", 'ubicacion' => "Valencia, Valencia", 'tipo_id' => "1", 'tipo_nombre' => "hotel" ];
		$this->fake_alojamientos[] = [ 'nombre' => "Verde", 'ubicacion' => "Almería, Almería", 'tipo_id' => "1", 'tipo_nombre' => "hotel" ];
		$this->fake_alojamientos[] = [ 'nombre' => "Amarillo", 'ubicacion' => "Madrid, Madrid", 'tipo_id' => "1", 'tipo_nombre' => "hotel" ];
		$this->fake_alojamientos[] = [ 'nombre' => "Morado", 'ubicacion' => "Oviedo, Asturias", 'tipo_id' => "1", 'tipo_nombre' => "hotel" ];
		$this->fake_alojamientos[] = [ 'nombre' => "Violeta", 'ubicacion' => "雅芙 Logroño", "La Rioja", 'tipo_id' => "1", 'tipo_nombre' => "hotel" ];
		$this->fake_alojamientos[] = [ 'nombre' => "Veracruz", 'ubicacion' => "Barcelona, Barcelona", 'tipo_id' => "1", 'tipo_nombre' => "hotel" ];
		$this->fake_alojamientos[] = [ 'nombre' => "Verde", 'ubicacion' => "Murcia, Murcia", 'tipo_id' => "2", 'tipo_nombre' => "apartamento" ];
		$this->fake_alojamientos[] = [ 'nombre' => "Ärgern", 'ubicacion' => "Toledo, Castilla-La Mancha", 'tipo_id' => "2", 'tipo_nombre' => "apartamento" ];
		$this->fake_alojamientos[] = [ 'nombre' => "雅芙雅芙 Miralejos", 'ubicacion' => "A Coruña Galicia", 'tipo_id' => "2", 'tipo_nombre' => "apartamento" ];
		$this->fake_alojamientos[] = [ 'nombre' => "Amarcord", 'ubicacion' => "Bilbao, Vizcaya", 'tipo_id' => "2", 'tipo_nombre' => "apartamento" ];

		$this->fake_meta[1]['estrellas']       = '3';
		$this->fake_meta[1]['tipo_habitacion'] = 'habitación doble con vistas';
		$this->fake_meta[2]['estrellas']       = '5';
		$this->fake_meta[2]['tipo_habitacion'] = 'suite con terraza';
		$this->fake_meta[3]['estrellas']       = '2';
		$this->fake_meta[3]['tipo_habitacion'] = 'habitación doble económica';
		$this->fake_meta[4]['estrellas']       = '4';
		$this->fake_meta[4]['tipo_habitacion'] = 'habitación doble con vistas';
		$this->fake_meta[5]['estrellas']       = '2';
		$this->fake_meta[5]['tipo_habitacion'] = 'habitación sencilla';
		$this->fake_meta[6]['estrellas']       = '5';
		$this->fake_meta[6]['tipo_habitacion'] = 'habitación doble estándar';
		$this->fake_meta[7]['apartamentos']    = '10';
		$this->fake_meta[7]['capacidad']       = '6 adultos';
		$this->fake_meta[8]['apartamentos']    = '4';
		$this->fake_meta[8]['capacidad']       = '12 adultos';
		$this->fake_meta[9]['apartamentos']    = '5';
		$this->fake_meta[9]['capacidad']       = '8 adultos';
		$this->fake_meta[10]['apartamentos']   = '8';
		$this->fake_meta[10]['capacidad']      = '10 adultos';

	}

	public function recuperar_alojamiento_por_id( $id ) {

		return $this->fake_alojamientos[ $id ];
	}

	public function recuperar_metas_por_alojamiento( $id ) {

		$result = [];
		foreach ( $this->fake_meta[ $id ] as $key => $value ) {
			$result[] = [ 'nombre' => $key, 'valor' => $value ];
		}

		return $result;
	}

	public function recuperar_alojamientos_por_nombre( $string ) {

		$alojamientos = array_filter( $this->fake_alojamientos, function ( $el ) use ( $string ) {
			if ( mb_stripos( $el['nombre'], $string ) === 0 ) {
				return $el;
			}

			return false;
		} );

		$results = [];
		foreach ( $alojamientos as $key => $val ) {
			$results[] = $key;
		}


		return $results;
	}


}
