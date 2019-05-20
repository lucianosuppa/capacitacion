<?php

class Stock 
{

  private $capacidadMaxima;
  private $stock = array();
  private $totalStock;

  public function __construct($capacidadMaxima) 
  {
    $this->capacidadMaxima = $capacidadMaxima;
  }

  public function agregarStock($producto, $cantidad) 
  {
  if($cantidad <= $this->capacidadMaxima && $cantidad > 0)
  {
    $this->totalStock = $this->totalStock + $cantidad;
    
    if ($this->totalStock <= $this->capacidadMaxima)
    {
      foreach ($this->stock as $key=>$value)
      {
        if ($key == $producto)
        {
          foreach ($value as $v)
          {
            $v = $v + $cantidad;
            $this->stock[$producto] = ["cantidad" => $v];
            return true;
          }
        }
      }
      $this->stock[$producto] = ["cantidad" => $cantidad];
      return true;
    }
  }
  return false;
  }

  public function sacarStock($producto, $cantidad) 
  {
  if ($this->totalStock >= $cantidad && $cantidad > 0)
    {
      foreach ($this->stock as $key=>$value)
      {
        if ($key == $producto)
        {
          foreach ($value as $v)
          {
            $this->totalStock = $this->totalStock - $cantidad;
            $this->stock[$key] = ["cantidad" => $v - $cantidad];
            if ($v == 0)
            {
              return false;
            }
            return true;
          }
        }
      }
    }
    return false;
  }

  public function cuantoTieneStock($producto) 
  {
    foreach($this->stock as $key=>$value)
    {
      if ($key == $producto)
      {
        foreach ($value as $v)
        {
          return $v;
        }
      }
    }
    return false;
  }

  public function vacio() 
  {
  if ($this->totalStock == 0)
    {
      return true;
    }
    
    return false;
  }

  public function lleno() 
  {
  if ($this->totalStock == $this->capacidadMaxima)
    {
      return true;
    }
    
    return false;
  }
}