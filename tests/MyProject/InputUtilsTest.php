<?php
namespace MyProject;

use PHPUnit\Framework\TestCase;

class InputUtilsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new InputUtils();
    }

    public function test_getValue(): void
    {
        $this->assertTrue(true);
        // $this->markTestSkipped("InputUtils::getValue skipped.");
    }

    public function test_getNumberValue(): void
    {
        $this->assertTrue(true);
        // $this->markTestSkipped("InputUtils::getNumberValue skipped.");
    }
}
