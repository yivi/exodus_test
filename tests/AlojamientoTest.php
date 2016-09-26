<?php
use PHPUnit\Framework\TestCase;
use Yivi\Buscador\Model\Alojamiento;
use Yivi\Buscador\Model\AlojamientoMeta;
use Yivi\Buscador\Model\AlojamientoTipo;
use Yivi\Buscador\Model\Apartamento;
use Yivi\Buscador\Model\Hotel;


class AlojamientoTest extends TestCase {
	/** @var  Alojamiento */
	private $alojamiento;

	public function setUp() {

	}

	public function testSetMetaHotel() {

		$alojamiento_tipo  = new AlojamientoTipo( 1, 'hotel' );
		$alojamiento_meta  = new AlojamientoMeta();
		$this->alojamiento = new Hotel( 1, 'Azul', 'Valencia, Valencia', $alojamiento_tipo, $alojamiento_meta );
		$this->alojamiento->setMeta( 'estrellas', '3' )->setMeta( 'tipo_habitacion', 'doble deluxe' );

		$this->assertEquals( $this->alojamiento->getMeta( 'estrellas' ), '3' );
		$this->assertEquals( $this->alojamiento->getMeta( 'tipo_habitacion' ), 'doble deluxe' );
	}

	public function testPrintHotel() {

		$alojamiento_tipo  = new AlojamientoTipo( 1, 'hotel' );
		$alojamiento_meta  = new AlojamientoMeta();
		$this->alojamiento = new Hotel( 1, 'Amarillo', 'Madrid, Madrid', $alojamiento_tipo, $alojamiento_meta );
		$this->alojamiento->setMeta( 'estrellas', '5' )->setMeta( 'tipo_habitacion', 'simple sencilla' );


		$this->expectOutputString( 'Hotel Amarillo, 5 estrellas, simple sencilla, Madrid, Madrid' );
		print $this->alojamiento;
	}

	public function testPrintApartamento() {

		$alojamiento_tipo  = new AlojamientoTipo( 2, 'apartamento' );
		$alojamiento_meta  = new AlojamientoMeta();
		$this->alojamiento = new Apartamento( 10, 'Wonderful', 'Paris, France', $alojamiento_tipo, $alojamiento_meta );
		$this->alojamiento->setMeta( 'apartamentos', '15' )->setMeta( 'capacidad', '100 adultos' );


		$this->expectOutputString( 'Apartamentos Wonderful, 15 apartamentos, 100 adultos, Paris, France' );
		print $this->alojamiento;
	}


}