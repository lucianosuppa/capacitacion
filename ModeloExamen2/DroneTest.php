<?php

include './vendor/autoload.php';
include 'Drone.php';

use PHPUnit\Framework\TestCase;

final class DroneTest extends TestCase
{
  public function testExisteElDrone() 
  {
    $this->assertTrue(class_exists("Drone"));
  }

  public function testTieneBateriaAlEmpezar()
  {
    $drone = new Drone(10);
    $this->assertEquals(10,$drone->cantidadDeBateria());
  }

  public function testSeMueveCorrectamente()
  {
    $drone = new Drone(10);
    $drone->mover(1,1);
    $this->assertEquals([['x' => 1,'y' => 1]], $drone->historial());
  }

  public function testGastaBateriaCorrectamente()
  {
    $drone = new Drone(10);
    $drone->mover(1,1);
    $this->assertEquals(8,$drone->cantidadDeBateria());
  }

  public function testSeCargaLaBateria()
  {
    $drone = new Drone(10);
    $drone->mover(1,1);
    $drone->mover(0,0);
    $this->assertEquals(10,$drone->cantidadDeBateria());
  }

  public function testArrancaEnLaPosicionCeroCero()
  {
    $drone = new Drone(10);
    $drone->mover(1,0);
    $this->assertEquals(9,$drone->cantidadDeBateria());
    $drone->mover(0,0);
    $this->assertEquals(10,$drone->cantidadDeBateria());
    $drone->mover(0,1);
    $this->assertEquals(9,$drone->cantidadDeBateria());
    $drone->mover(0,0);
    $this->assertEquals(10,$drone->cantidadDeBateria());
    $drone->mover(-1,0);
    $this->assertEquals(9,$drone->cantidadDeBateria());
    $drone->mover(0,0);
    $this->assertEquals(10,$drone->cantidadDeBateria());
    $drone->mover(0,-1);
    $this->assertEquals(9,$drone->cantidadDeBateria());
    $drone->mover(0,0);
    $this->assertEquals(10,$drone->cantidadDeBateria());
  }

  public function testSiNoMuevoNoHayHistorialInicial()
  {
    $drone = new Drone(10);
    $this->assertNotEquals([['x' => 0,'y' => 0]], $drone->historial());
  }

  public function testGuardarHistorial()
  {
    $drone = new Drone(100);
    $drone->mover(1,1);
    $drone->mover(0,0);
    $this->assertEquals([['x' => 1,'y' => 1],['x' => 0,'y' => 0]], $drone->historial());
    $drone->mover(2,1);
    $drone->mover(2,4);
    $drone->mover(3,5);
    $drone->mover(4,1);
    $this->assertEquals([['x' => 1,'y' => 1],['x' => 0,'y' => 0],['x' => 2,'y' => 1],['x' => 2,'y' => 4],['x' => 3,'y' => 5],['x' => 4,'y' => 1]], $drone->historial());
  } 

  public function testNoGuardaHistorialSiMeMuevoAlMismoLugar()
  {
    $drone = new Drone(100);
    $drone->mover(1,1);
    $drone->mover(2,2);
    $drone->mover(2,2);
    $this->assertEquals([['x' => 1,'y' => 1],['x' => 2,'y' => 2],['x' => 2,'y' => 2]], $drone->historial());
  }

  public function testNoGastaBateriaSiMeMuevoAlMismoLugar()
  {
    $drone = new Drone(100);
    $drone->mover(0,1);
    $drone->mover(1,1);
    $drone->mover(1,1);
    $this->assertEquals(98,$drone->cantidadDeBateria());
  }

  public function testNoTieneBateriaParaElMovimiento ()
  {
    $drone = new Drone(2);
    $this->assertFalse($drone->mover(5,5));
  }

  public function testTieneBateriaParaElMovimiento ()
  {
    $drone = new Drone(10);
    $this->assertTrue($drone->mover(1,1));
  }

  public function testNoSeMueveSinBateria()
  {
    $drone = new Drone(3);
    $drone->mover(0,1);
    $drone->mover(1,1);
    $drone->mover(0,1);
    $this->assertFalse($drone->mover(1,1));
  }
}
