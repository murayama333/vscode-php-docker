<?php
namespace MyProject;

class InputUtils
{
    public function getValue(): string
    {
        return trim(fgets(STDIN));
    }

    public function getNumberValue(): int
    {
        return (int)trim(fgets(STDIN));
    }
}
