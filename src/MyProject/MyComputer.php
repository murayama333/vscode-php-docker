<?php
namespace MyProject;

class MyComputer
{
    public array $apps;

    public function install(MyApp $app): void
    {
        $this->apps[] = $app;
    }

    public function runApp(string $name) :void
    {
        foreach ($this->apps as $app) {
            if ($app->getName() === $name) {
                $runApp = $app;
                break;
            }
        }

        if ($runApp == null) {
            throw new \RuntimeException("App is not found.");
        }
        echo "APP RUN: " . $runApp->getName() . PHP_EOL;
        $app->run();
    }
}
