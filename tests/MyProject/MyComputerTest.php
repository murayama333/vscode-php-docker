<?php
namespace MyProject;

use PHPUnit\Framework\TestCase;

class MyComputerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new MyComputer();
    }

    public function test_install(): void
    {
        $appMock = $this->createMock(MyApp::class);
        $expected = $appMock;

        $this->sut->install($appMock);
        $actual = $this->sut->apps[0];
        $this->assertEquals($expected, $actual);
    }

    public function test_runApp(): void
    {
        $appMock = $this->createMock(MyApp::class);
        $appMock->expects($this->exactly(2))->method("getName")->willReturn("Hello App");
        $appMock->expects($this->once())->method("run");
        $this->sut->install($appMock);

        $expected = "APP RUN: Hello App" . PHP_EOL;
        $this->expectOutputString($expected);
        $this->sut->runApp("Hello App");
    }

    public function test_runApp_with_invalid_name(): void
    {
        $appMock = $this->createMock(MyApp::class);
        $appMock->expects($this->exactly(1))->method("getName")->willReturn("Hello App");
        $appMock->expects($this->never())->method("run");
        $this->sut->install($appMock);

        $expected = "APP RUN: Hello App" . PHP_EOL;
        $this->expectException(\RuntimeException::class);
        $this->sut->runApp("Hello Appp");
    }
}
