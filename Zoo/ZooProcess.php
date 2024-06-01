<?php

namespace Zoo;

class ZooProcess
{
    private array $animals = [];

    public function addAnimals(Animals $animal): void
    {
        $this->animals[] = $animal;
    }

    public function getAnimal(string $species): ?Animals
    {
        foreach ($this->animals as $animal) {
            if (strtolower($animal->getSpecies()) === strtolower($species)) {
                return $animal;
            }
        }
        return null;
    }

    public function getAnimals(): array
    {
        return $this->animals;
    }

    public function feedAnimal(string $species, string $food): void
    {
        $animal = $this->getAnimal($species);
        if ($animal) {
            $animal->feed($food);
            echo "$species's were fed with $food. Last interaction: " . $animal->getLastInteraction(). PHP_EOL;
        } else {
            echo "Input is empty or not appropriate.". PHP_EOL;
        }
    }

    public function petAnimal(string $species): void
    {
        $animal = $this->getAnimal($species);
        if ($animal) {
            $animal->pet();
            echo "$species's enjoyed the time getting pet. Last interaction: " . $animal->getLastInteraction(). PHP_EOL;
        } else {
            echo "Input is empty or not appropriate.". PHP_EOL;
        }
    }

    public function playAnimal(string $species): void
    {
        $animal = $this->getAnimal($species);
        if ($animal) {
            $animal->play();
            echo "$species's got some time to play. Last interaction: " . $animal->getLastInteraction(). PHP_EOL;
        } else {
            echo "Input is empty or not appropriate.". PHP_EOL;
        }
    }

    public function workAnimal(string $species): void
    {
        $animal = $this->getAnimal($species);
        if ($animal) {
            $animal->work();
            echo "$species's worked together with the zookeeper. Last interaction: " . $animal->getLastInteraction(). PHP_EOL;
        } else {
            echo "Input is empty or not appropriate.". PHP_EOL;
        }
    }
}