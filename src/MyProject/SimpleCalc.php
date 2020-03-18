<?php
namespace MyProject;

class SimpleCalc implements MyApp
{
    protected int $number = 0;
    protected InputUtils $input;

    public function __construct(int $number = 0)
    {
        $this->number = $number;
        $this->input = new InputUtils();
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function add($x): void
    {
        $this->number += $x;
    }

    public function subtract($x): void
    {
        $this->number -= $x;
    }

    public function multiply($x): void
    {
        $this->number *= $x;
    }

    public function divide($x): void
    {
        if ($x == 0) {
            throw new \LogicException("Invalid value");
        }
        $this->number /= $x;
    }

    public function show(): void
    {
        echo $this->number . PHP_EOL;
    }

    public function reset(): void
    {
        $this->number = 0;
    }
    public function run(): void
    {
        while (true) {
            $command = $this->getCommandInput();
            if ($command === "+") {
                $this->add($this->getNumberInput());
            } elseif ($command === "-") {
                $this->subtract($this->getNumberInput());
            } elseif ($command === "*") {
                $this->multiply($this->getNumberInput());
            } elseif ($command === "/") {
                $this->divide($this->getNumberInput());
            } elseif ($command === "=") {
                $this->show();
                break;
            }
        }
    }

    public function getCommandInput(): string
    {
        return $this->input->getValue();
    }

    public function getNumberInput(): int
    {
        return $this->input->getNumberValue();
    }

    public function setInput(InputUtils $input)
    {
        $this->input = $input;
    }

    public function getInput(): InputUtils
    {
        return $this->input;
    }

    public function getName(): string
    {
        return "calc";
    }
}
