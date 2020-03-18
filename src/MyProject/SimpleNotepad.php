<?php
namespace MyProject;

class SimpleNotepad
{
    public array $buffer = [];
    public bool $ucfirst = false;
    public bool $period = false;
    public InputUtils $input;

    public function add(string $word): void
    {
        $this->buffer[] = $word;
    }

    public function show(): void
    {
        $str = implode(" ", $this->buffer);
        if ($this->ucfirst) {
            $str = ucfirst($str);
        }
        if ($this->period) {
            $str .= ".";
        }
        echo $str . PHP_EOL;
    }

    public function setUcfirst(bool $uffirst): void
    {
        $this->ucfirst = $uffirst;
    }

    public function setPeriod(bool $period): void
    {
        $this->period = $period;
    }

    public function reset(): void
    {
        $this->buffer = [];
    }

    public function run(): void
    {
        $this->setUcfirst(true);
        $this->setPeriod(true);

        while (true) {
            $word = $this->getWordValue();
            if ($word !== "") {
                $this->add($word);
            } else {
                $this->show();
                break;
            }
        }
    }

    public function getWordValue(): string
    {
        return $this->input->getValue();
    }
}
