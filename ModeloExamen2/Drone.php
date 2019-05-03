<?php

/**
 * Tenemos un drone para vigilar un country. El drone
 * tiene una bateria fija y gasta bateria por cada movimiento
 * que hace. Por default el drone arranca en la posicion 0,0 y con
 * la bateria llena.
 * 
 * Tambien guardamos el historial de movimientos. El drone
 * no se mueve a menos que tenga una cantidad suficiente
 * de bateria.
 * 
 * El drone se carga la bateria cuando vuelve al punto central
 * que es la posicion 0,0 .
 */
class Drone {
  private $bateria=0;
  private $tamanioTanque;
  private $_historial = array();

  private $poscicionX=0;
  private $poscicionY=0;

  public function __construct($tamanioTanque) {
    $this->bateria = $tamanioTanque;
    $this->tamanioTanque = $tamanioTanque;
  }

  public function cantidadDeBateria() {
    return $this->bateria;
  }

  /**
   * Si tiene suficiente bateria se mueve a la posicion
   * que le pasas.
   * 
   * Se resta un punto de bateria por cada posicion en x
   * y un punto de bateria por cada posicion en y.
   * 
   * Por ej:
   *  - Si esta en la posicion 0,0 y movemos a 2,5 entonces
   *    gastamos 7 puntos de bateria.
   *  - Si estas en la posicion 2,5 y nos movemos a la posicion
   *    5,5 gastamos gastamos 3 puntos de bateria.
   */
  public function mover($x, $y) {
    $naftaAGastar = abs($this->poscicionX - $x) + abs($this->poscicionY - $y);

    if ($naftaAGastar > $this->bateria) {
      return false;
    }
    $this->bateria = $this->bateria - $naftaAGastar;

    if ($x == 0 && $y == 0) {
      $this->bateria = $this->tamanioTanque;
    }
    $this->_historial[] = array('x' => $x, 'y' => $y);
    $this->poscicionX = $x;
    $this->poscicionY = $y;

    return true;
  }

  /**
   * Historial de todos los movimientos del drone
   */
  public function historial() {
      echo 'a';
    return $this->_historial;
  }
}