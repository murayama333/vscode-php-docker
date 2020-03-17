<?php
namespace MyApp;

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

    /** @test */
    public function test_add()
    {
        $expected = ["i", "have", "a", "pen"];
        $actual = $this->sut->buffer;
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function test_show()
    {
        $expected = "i have a pen";
        $this->expectOutputString($expected);
        $actual = $this->sut->show();
    }

    public function test_show_setUcfirst()
    {
        $expected = "I have a pen";
        $this->sut->ucfirst = true;
        $this->expectOutputString($expected);
        $this->sut->show();
    }

    /** @test */
    public function test_show_setPeriod()
    {
        $expected = "i have a pen.";
        $this->sut->period = true;
        $this->expectOutputString($expected);
        $this->sut->show();
    }
    

    /** @test */
    public function test_setUcfirst()
    {
        $expected = true;
        $this->sut->setUcfirst(true);
        $actual = $this->sut->ucfirst;
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function test_setPeriod()
    {
        $expected = true;
        $this->sut->setPeriod(true);
        $actual = $this->sut->period;
        $this->assertEquals($expected, $actual);
    }
    
    public function test_reset()
    {
        $expected = [];
        $this->sut->reset();
        $actual = $this->sut->buffer;
        $this->assertEquals($expected, $actual);
    }
}
