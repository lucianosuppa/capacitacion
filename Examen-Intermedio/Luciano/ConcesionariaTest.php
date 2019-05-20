<?php

include_once './vendor/autoload.php';
include_once 'Concesionaria.php';

use PHPUnit\Framework\TestCase;

final class ConcesionariaTest extends TestCase
{
    public function testExisteLaClaseConcesionaria() 
    {
      $this->assertTrue(class_exists("Concesionaria"));
    }

    public function testAgregueAutos()
    {
        $concesionaria = new Concesionaria();
        $this->assertTrue($concesionaria->agregarAutos(1,'ford','t',1954,3000));
    }

    public function testNoAgregueAutosExistentes()
    {
        $concesionaria = new Concesionaria();
        $this->assertTrue($concesionaria->agregarAutos(2,'ford','t',1954,3000));
        $this->assertFalse($concesionaria->agregarAutos(2,'ford','t',1954,3000));
    }

    public function testNoAgregueAutosConIgualId()
    {
        $concesionaria = new Concesionaria();
        $concesionaria->agregarAutos(2,'ford','t',1954,3000);
        $this->assertFalse($concesionaria->agregarAutos(2,'ford','a',2018,7000));
    }
    
    public function testNoAgregueAutosConValoresNegativos()
    {
        $concesionaria = new Concesionaria();
        $this->assertFalse($concesionaria->agregarAutos(-2,'ford','t',1954,3000));
        $this->assertFalse($concesionaria->agregarAutos(2,'ford','t',1954,-3000));
        $this->assertFalse($concesionaria->agregarAutos(2,'ford','t',-1954,3000));
    }

    public function testNoAgregueAutosConPrecioCero()
    {
        $concesionaria = new Concesionaria();
        $this->assertFalse($concesionaria->agregarAutos(-2,'ford','t',1954,0));
    }

    public function testMuestreAutosDeUnaMarca()
    {
        $concesionaria = new Concesionaria();
        $concesionaria->agregarAutos(2,'ford','t',1954,3000);
        $concesionaria->agregarAutos(3,'ford','a',1955,4000);
        $concesionaria->agregarAutos(6,'ford','f',1956,5000);
        $this->assertEquals(3,count($concesionaria->mostrarAutosDeMarca('ford')));
    }

    public function testNoMuestreLaSumaDeLosAutosDeLaConcesionaria()
    {
        $concesionaria = new Concesionaria();
        $concesionaria->agregarAutos(2,'ford','t',1954,3000);
        $concesionaria->agregarAutos(4,'chevrolet','joy',2018,7000);
        $this->assertNotEquals(2,count($concesionaria->mostrarAutosDeMarca('ford')));
    }

    public function testVendaAutoDeUnaMarca()
    {
        $concesionaria = new Concesionaria();
        $concesionaria->agregarAutos(2,'ford','t',1954,3000);
        $concesionaria->agregarAutos(4,'ford','a',2018,7000);
        $this->assertTrue($concesionaria->venderAutoMarca('ford'));
    }

    public function testNoVendeUnAutoQueNoExiste()
    {
        $concesionaria = new Concesionaria();
        $concesionaria->agregarAutos(2,'ford','t',1954,3000);
        $concesionaria->agregarAutos(4,'ford','a',2018,7000);
        $this->assertFalse($concesionaria->venderAutoMarca('chevrolet'));
    }

    public function testVendioAutoMasCaro()
    {
        $concesionaria = new Concesionaria();
        $concesionaria->agregarAutos(2,'ford','t',1954,3000);
        $concesionaria->agregarAutos(4,'ford','a',2018,7000);
        $concesionaria->venderAutoMarca('ford');
        $this->assertEquals(7000,$concesionaria->totalGanado());
    }

    public function testDescuenteAutoVendido()
    {
        $concesionaria = new Concesionaria();
        $concesionaria->agregarAutos(2,'ford','t',1954,3000);
        $concesionaria->venderAutoMarca('ford');
        $this->assertFalse($concesionaria->venderAutoMarca('ford'));
    }

    public function testPermiteAgregarUnAutoQueRecienSeVendio()
    {
        $concesionaria = new Concesionaria();
        $concesionaria->agregarAutos(2,'ford','t',1954,3000);
        $concesionaria->venderAutoMarca('ford');
        $concesionaria->agregarAutos(2,'ford','t',1954,3000);
        $this->assertTrue($concesionaria->venderAutoMarca('ford'));
    }

    public function testDevuelvePrecioDeVentaCorrectamente()
    {
        $concesionaria = new Concesionaria();
        $concesionaria->agregarAutos(2,'ford','t',1954,3000);
        $concesionaria->venderAutoMarca('ford');
        $this->assertEquals(3000,$concesionaria->totalGanado());
    }

    public function testMuestraGananciasCorrectamente()
    {
        $concesionaria = new Concesionaria();
        $concesionaria->agregarAutos(2,'ford','t',1954,3000);
        $concesionaria->venderAutoMarca('ford');
        $concesionaria->agregarAutos(4,'chevrolet','joy',2018,7000);
        $concesionaria->venderAutoMarca('chevrolet');
        $this->assertEquals(10000,$concesionaria->totalGanado());
    }

    public function testNoSumeDosVecesElMismoAuto()
    {
        $concesionaria = new Concesionaria();
        $concesionaria->agregarAutos(2,'ford','t',1954,3000);
        $concesionaria->venderAutoMarca('ford');
        $this->assertEquals(3000,$concesionaria->totalGanado());
        $concesionaria->venderAutoMarca('ford');
        $this->assertEquals(3000,$concesionaria->totalGanado());
    }

    public function testMuestraCeroSiNoHayGanancias()
    {
        $concesionaria = new Concesionaria();
        $this->assertEquals(0,$concesionaria->totalGanado());
    }

}