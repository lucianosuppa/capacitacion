<?php

class Cola {

  private $_data = array();

  public function encolar($element) {
    $this->_data[] = $element;
  }

  public function desencolar() {
    return array_shift($this->_data);
  }

  public function estaVacia() {
    return count($this->_data) == 0;
  }

}

class Persona {
  private $nombre;
  private $dni;
  public function __construct($nombre, $dni) {
    $this->nombre = $nombre;
    $this->dni = $dni;
  }

  public function dameNombre() { return $this->nombre; }
  public function dameDNI() { return $this->dni; }
}

class DB {
  private $data = array();

  public function insert($id, $obj) {
    $this->data[$id] = $obj;
  }

  public function delete($id) {
    unset($this->data[$id]);
  }

  public function get($id) {
    return $this->data[id];
  }

  public function getAll() {
    return $this->data;
  }
}

class Cluster {

  private $cola;
  private $dbs=array();

  public function __construct($cola) {
    $this->cola = $cola;
  }

  public function guardar(Persona $persona) {
    $a_donde = $persona->dameDNI() % count($this->dbs);
    $this->dbs[$a_donde]->insert($persona->dameDNI(),$persona);
  }

  public function borrar(Persona $persona) {
    $a_donde = $persona->dameDNI() % count($this->dbs);
    $this->dbs[$a_donde]->delete($persona->dameDNI());
  }

  public function agregarDB(DB $db) {
    $this->dbs[] = $db;
    foreach ($this->dbs as $dbKey => $db) {
      foreach ($db->getAll() as $keyUsuario => $usuario) {
        $a_donde = $usuario->dameDNI() % count($this->dbs);
        if ($a_donde != $dbKey) {
          $this->cola->encolar($usuario);
        }
      }
    }
  }

  public function migrar() {

    while(!$this->cola->estaVacia()) {
      
      $usuario = $this->cola->desencolar();

      $viejoLugar = $usuario->dameDNI() % (count($this->dbs)-1);
      $nuevoLugar = $usuario->dameDNI() % count($this->dbs);

      $this->dbs[$viejoLugar]->delete($usuario->dameDNI());
      $this->dbs[$nuevoLugar]->insert($usuario->dameDNI(),$usuario);
    }
  }

  public function mostrarResumen() {
    foreach ($this->dbs as $dbKey => $db) {
      echo "DB: {$dbKey} - Cantidad: " . count($db->getAll()) . "\n";
    }
  }
}

$cluster = new Cluster(new Cola());

$db = new DB();
$cluster->agregarDB($db);

$cluster->guardar(new Persona("Pepe", 32));
$cluster->guardar(new Persona("Matias", 10));
$cluster->guardar(new Persona("Julian", 9));
$cluster->guardar(new Persona("Jose", 44));
$cluster->guardar(new Persona("Adrian", 55));
$cluster->guardar(new Persona("KP", 60));
$cluster->guardar(new Persona("Tomy", 70));


$cluster->agregarDB(new DB());
$cluster->migrar();
$cluster->agregarDB(new DB());
$cluster->migrar();
$cluster->mostrarResumen();