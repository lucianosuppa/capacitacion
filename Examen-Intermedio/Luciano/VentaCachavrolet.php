<?php

include_once 'ConcesionariaInterface.php';

class VentaCachavrolet implements ConcesionariaInterface
{
  private $_autos = array();
  private $_totalGanado = 0;
  private $concesionaria ;

  public function __construct($concesionaria)
  {
      $this->concesionaria = $concesionaria;
  }

  public function agregarAutos($idReferencia, $marca, $modelo, $anio, $precio) 
  {
    return $this->concesionaria->agregarAutos($idReferencia, $marca, $modelo, $anio, $precio);
  }

  public function mostrarAutosDeMarca($marca) 
  {
    return $this->concesionaria->mostrarAutosDeMarca($marca);
  }

  public function venderAutoMarca($marca) 
  {
    if ($marca === 'Cachavrolet')
    {
        $primerValor = $this->concesionaria->totalGanado();

        $suma = $this->concesionaria->venderAutoMarca($marca);

        $segundoValor = $this->concesionaria->totalGanado();

        $this->_totalGanado += $segundoValor - $primerValor;

        return $suma;
    }
    return $this->concesionaria->venderAutoMarca($marca);
  }

  public function totalGanado() {
    return $this->_totalGanado;
  }
}