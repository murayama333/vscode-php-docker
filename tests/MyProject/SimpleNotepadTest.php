<?php
namespace MyProject;

use PHPUnit\Framework\TestCase;

class SimpleNotepadTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new SimpleNotepad();
        $this->sut->add("i");
        $this->sut->add("have");
        $this->sut->add("a");
        $this->sut->add("pen");
    }

    public function test_add(): void
    {
        $expected = ["i", "have", "a", "pen"];
        $actual = $this->sut->buffer;
        $this->assertEquals($expected, $actual);
    }

    public function test_show(): void
    {
        $expected = "i have a pen" . PHP_EOL;
        $this->expectOutputString($expected);
        $actual = $this->sut->show();
    }

    public function test_show_setUcfirst(): void
    {
        $expected = "I have a pen" . PHP_EOL;
        $this->sut->ucfirst = true;
        $this->expectOutputString($expected);
        $this->sut->show();
    }

    public function test_show_setPeriod(): void
    {
        $expected = "i have a pen." . PHP_EOL;
        $this->sut->period = true;
        $this->expectOutputString($expected);
        $this->sut->show();
    }
    

    public function test_setUcfirst(): void
    {
        $expected = true;
        $this->sut->setUcfirst(true);
        $actual = $this->sut->ucfirst;
        $this->assertEquals($expected, $actual);
    }

    public function test_setPeriod(): void
    {
        $expected = true;
        $this->sut->setPeriod(true);
        $actual = $this->sut->period;
        $this->assertEquals($expected, $actual);
    }
    
    public function test_reset(): void
    {
        $expected = [];
        $this->sut->reset();
        $actual = $this->sut->buffer;
        $this->assertEquals($expected, $actual);
    }

    public function test_run(): void
    {
        $expected = "I have a pen." . PHP_EOL;
        $sut = new SimpleNotepad();

        $inputStub = $this->createMock(InputUtils::class);
        $inputStub->method("getValue")->will($this->onConsecutiveCalls("I", "have", "a", "pen", ""));
        $sut->input = $inputStub;
        
        $this->expectOutputString($expected);
        $sut->run();
    }
}
