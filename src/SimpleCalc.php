<?php
namespace Sample1;

class SimpleCalc  
{
  private $number = 0;

  public function __construct($number = 0) {
    $this->number = $number;
  }

  public function getNumber()
  {
    return $this->number;
  }

  public function add($x)
  {
    $this->number += $x;
  }

  public function subtract($x)
  {
    $this->number -= $x;
  }

  public function multiply($x)
  {
    $this->number *= $x;
  }

  public function divide($x)
  {
    if ($x == 0) {
      throw new \LogicException("Invalid value");
    }
    $this->number /= $x;
  }

  public function show()
  {
    echo $this->number . PHP_EOL;
  }
}

