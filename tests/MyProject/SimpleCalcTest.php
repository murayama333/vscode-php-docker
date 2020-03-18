<?php
namespace MyProject;

use PHPUnit\Framework\TestCase;

class SimpleCalcTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new SimpleCalc(100);
    }

    public function test_getNumber(): void
    {
        $expected = 100;
        $actual = $this->sut->getNumber();
        $this->assertEquals($expected, $actual);
    }

    public function test_construct(): void
    {
        $expected = 0;
        $sut = new SimpleCalc();
        $actual = $sut->getNumber();
        $this->assertEquals($expected, $actual);
    }
  
    public function test_add(): void
    {
        $expected = 110;
        $this->sut->add(10);
        $actual = $this->sut->getNumber();
        $this->assertEquals($expected, $actual);
    }

    public function test_subtract(): void
    {
        $expected = 90;
        $this->sut->subtract(10);
        $actual = $this->sut->getNumber();
        $this->assertEquals($expected, $actual);
    }

    public function test_multiply(): void
    {
        $expected = 300;
        $this->sut->multiply(3);
        $actual = $this->sut->getNumber();
        $this->assertEquals($expected, $actual);
    }

    public function test_divide(): void
    {
        $expected = 50;
        $this->sut->divide(2);
        $actual = $this->sut->getNumber();
        $this->assertEquals($expected, $actual);
    }

    public function test_divide_by_0(): void
    {
        $this->expectException(\LogicException::class);
        $this->sut->divide(0);
    }

    public function test_show(): void
    {
        $expected = 100 . PHP_EOL;
        $this->expectOutputString($expected);
        $this->sut->show();
    }

    public function test_reset(): void
    {
        $expected = 0;
        $this->sut->reset();
        $actual = $this->sut->getNumber();
        $this->assertEquals($expected, $actual);
    }

    public function test_setInput(): void
    {
        $inputStub = $this->createMock(InputUtils::class);
        $expected = $inputStub;
        $this->sut->setInput($inputStub);
        $actual = $this->sut->getInput();
        $this->assertEquals($expected, $actual);
    }

    public function test_run(): void
    {
        $expected = "10" . PHP_EOL;
        $sut = new SimpleCalc();
        $inputStub = $this->createMock(InputUtils::class);
        $inputStub->method("getValue")->will($this->onConsecutiveCalls("+", "-", "*", "/", "="));
        $inputStub->method("getNumberValue")->will($this->onConsecutiveCalls(10, 5, 10, 5));
        $sut->setInput($inputStub);
        $this->expectOutputString($expected);
        $sut->run();
    }

    public function test_getCommandInput(): void
    {
        $inputStub = $this->createMock(InputUtils::class);
        $inputStub->method("getValue")->willReturn("*");
        $this->sut->setInput($inputStub);

        $expected = "*";
        $actual = $this->sut->getCommandInput();
        $this->assertEquals($expected, $actual);
    }

    public function test_getNumberInput(): void
    {
        $inputStub = $this->createMock(InputUtils::class);
        $inputStub->method("getNumberValue")->willReturn(100);
        $this->sut->setInput($inputStub);

        $expected = 100;
        $actual = $this->sut->getNumberInput();
        $this->assertEquals($expected, $actual);
    }

    public function test_getName(): void
    {
        $expected = "calc";
        $actual = $this->sut->getName();
        $this->assertEquals($expected, $actual);
    }

    public function test_implmenents_App(): void
    {
        $expected = MyApp::class;
        $actual = $this->sut;
        $this->assertInstanceOf($expected, $actual);
    }
}
