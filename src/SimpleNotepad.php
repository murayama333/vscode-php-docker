<?php
namespace Sample1;

class SimpleNotepad
{
  public $buffer;
  public $ucfirst;
  public $period;
  public function add($word)
  {
    $this->buffer[] = $word;
  }

  public function show()
  {
    $str = implode(" ", $this->buffer);
    if ($this->ucfirst) {
      $str = ucfirst($str);
    }
    if ($this->period) {
      $str .= ".";
    }
    echo $str; 
  }

  public function setUcfirst($uffirst)
  {
    $this->ucfirst = $uffirst;
  }

  public function setPeriod($period)
  {
    $this->period = $period;
  }
}
