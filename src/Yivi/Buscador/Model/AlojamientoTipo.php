<?php


namespace Yivi\Buscador\Model;


class AlojamientoTipo {

	private $id;

	private $nombre;

	/**
	 * AlojamientoTipo constructor.
	 *
	 * @param $id
	 * @param $nombre
	 */
	public function __construct( $id, $nombre ) {

		$this->id     = $id;
		$this->nombre = $nombre;
	}

	/**
	 * @return mixed
	 */
	public function getNombre() {
		return $this->nombre;
	}

	/**
	 * @param mixed $nombre
	 *
	 * @return $this
	 */
	public function setNombre( $nombre ) {
		$this->nombre = $nombre;

		return $this;
	}
}