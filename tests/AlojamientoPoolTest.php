<?php
use PHPUnit\Framework\TestCase;
use Yivi\Buscador\Model\AlojamientoPool;

require "MockDb.php";

class UserPoolTest extends TestCase {

	private $config;
	private $conn;

	/** @var  AlojamientoPool */
	private $pool;

	public function setUp() {
		$db         = new MockDb( true );
		$this->pool = new AlojamientoPool( $db );
	}


	public function testGetUserById() {

		$alojamiento = $this->pool->recuperar_por_id( 1 );

		$this->assertTrue( is_object( $alojamiento ) );
		$this->assertTrue( is_subclass_of( $alojamiento, 'Yivi\Buscador\Model\Alojamiento' ) );
		$this->assertEquals( $alojamiento->getNombre(), 'Verde' );

	}

	public function testBusqueda() {

		$results = $this->pool->buscar_por_nombre( 'ver' );

		$this->assertTrue( count( $results ) === 3 );

		$results = $this->pool->buscar_por_nombre( '雅芙雅' );

		$this->assertTrue( count( $results ) === 1 );
	}
}