<?php

class Router {

  private $controllers = array();

  public function agregarController($path, $controller) {
    $this->controllers[$path] = $controller;
  }

  public function dispatch($path) {
    if (empty($this->controllers[$path])) {
      return false;
    }
    return $this->controllers[$path];
  }
}