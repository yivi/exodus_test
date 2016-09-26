<?php

namespace Yivi\Buscador\Model;

class Alojamiento {

	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @var string
	 */
	protected $nombre;

	/**
	 * @var string
	 */
	protected $ubicacion;

	/**
	 * @var AlojamientoTipo
	 */
	protected $tipo;

	/** @var null|AlojamientoMeta */
	protected $meta;

	/**
	 * @param int             $id
	 * @param string          $nombre
	 * @param string          $ubicacion
	 * @param AlojamientoTipo $tipo
	 * @param AlojamientoMeta $meta
	 */
	public function __construct( $id = 0, $nombre = '', $ubicacion = '', $tipo = null, $meta = null ) {

		$this->id        = $id;
		$this->nombre    = $nombre;
		$this->ubicacion = $ubicacion;
		$this->tipo      = $tipo;
		$this->meta      = $meta;
	}

	/**
	 * @param $nombre
	 * @param $value
	 *
	 * @return $this
	 */
	public function setMeta( $nombre, $value ) {

		if ( is_null( $this->meta ) ) {
			$this->meta = new AlojamientoMeta( );
		}

		$this->meta->setData( $nombre, $value );

		return $this;
	}

	public function getMeta( $nombre ) {

		if ( is_null( $this->meta ) ) {
			return null;
		}

		return $this->meta->getData( $nombre );
	}

	/**
	 * @return string
	 */
	public function getNombre() {
		return $this->nombre;
	}

	/**
	 * @param string $nombre
	 *
	 * @return $this
	 */
	public function setNombre( $nombre ) {
		$this->nombre = $nombre;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getUbicacion() {
		return $this->ubicacion;
	}

	/**
	 * @param string $ubicacion
	 *
	 * @return $this
	 */
	public function setUbicacion( $ubicacion ) {
		$this->ubicacion = $ubicacion;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return AlojamientoTipo
	 */
	public function getTipo() {
		return $this->tipo;
	}

	/**
	 * @param AlojamientoTipo $tipo
	 */
	public function setTipo( $tipo ) {
		$this->tipo = $tipo;
	}

	public function __toString() {

		return $this->nombre;
		
	}


}