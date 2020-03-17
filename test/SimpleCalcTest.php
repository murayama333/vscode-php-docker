<?php
namespace Sample1;

use PHPUnit\Framework\TestCase;

class SimpleCalcTest extends TestCase
{

  protected function setUp(): void
  {
      parent::setUp();
      $this->sut = new SimpleCalc(100);
  }

  public function test_getNumber()
  {
    $expected = 100;
    $actual = $this->sut->getNumber();
    $this->assertEquals($expected, $actual);
  }

  public function test_construct()
  {
    $expected = 0;
    $sut = new SimpleCalc();
    $actual = $sut->getNumber();
    $this->assertEquals($expected, $actual);
  }
  
  public function test_add()
  {
    $expected = 110;
    $this->sut->add(10);
    $actual = $this->sut->getNumber();
    $this->assertEquals($expected, $actual);
  }

  public function test_subtract()
  {
    $expected = 90;
    $this->sut->subtract(10);
    $actual = $this->sut->getNumber();
    $this->assertEquals($expected, $actual);
  }

  public function test_multiply()
  {
    $expected = 300;
    $this->sut->multiply(3);
    $actual = $this->sut->getNumber();
    $this->assertEquals($expected, $actual);
  }

  public function test_divide()
  {
    $expected = 50;
    $this->sut->divide(2);
    $actual = $this->sut->getNumber();
    $this->assertEquals($expected, $actual);
  }

  public function test_divide_by_0()
  {
    $this->expectException(\LogicException::class);
    $this->sut->divide(0);
  }

  public function test_show()
  {
    $expected = 100 . PHP_EOL;    
    $this->expectOutputString($expected);
    $this->sut->show();
  }
}