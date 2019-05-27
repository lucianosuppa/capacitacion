<?php

class Cola
{
    private $cola = array();
    private $elemento;

    public function encolar($elemento)
    {
        $this->cola[] = $elemento;
    }

    public function desencolar()
    {
        $this->elemento = array_shift($this->cola);
        return $this->elemento;
    }

    public function estaVacia()
    {
        if (empty($this->cola))
        {
            return true;
        }
        return false;
    }

    public function mostrar()
    {
        return $this->cola;
    }
}