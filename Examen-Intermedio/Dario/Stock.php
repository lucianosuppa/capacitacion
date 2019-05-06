<?php

class Stock {

  public function __construct($capacidadMaxima) {
}

  /**
   * Devuelve true si pudo agregarlo, falso sino
   */
  public function agregarStock($producto, $cantidad) {
  }

  /**
   * Si no tiene suficiente o no existe el producto devuelve false.
   * Devuelve true si pudo descontar esa cantidad
   */
  public function sacarStock($producto, $cantidad) {
  }

  /**
   * Te dice cuanto stock tiene de cierto produco
   */
  public function cuantoTieneStock($producto) {
  }

  /**
   * Te dice si el deposito esta vacio
   */
  public function vacio() {
  }

  /**
   * te dice si esta lleno
   */
  public function lleno() {
  }
}