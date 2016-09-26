<?php

namespace Yivi\Buscador\Model;


class AlojamientoMeta {

	/**
	 * @var array
	 */
	private $data = [];

	/**
	 * AlojamientoMeta constructor.
	 *
	 * @param array $data
	 *
	 */
	public function __construct( $data = [] ) {

	}

	/**
	 * @param $name
	 * @param $value
	 */
	public function setData( $name, $value ) {
		$this->data[ $name ] = $value;
	}

	/**
	 * @param $name
	 *
	 * @return mixed|null
	 */
	public function getData( $name ) {
		if ( isset( $this->data[ $name ] ) ) {
			return $this->data[ $name ];
		} else {
			return null;
		}

	}
}