<?php

use Zoo\ZooProcess;
use Zoo\Animals;
use Carbon\Carbon;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

require __DIR__ . '/vendor/autoload.php';

$zooProcesses = new ZooProcess();
$zooProcesses->addAnimals(new Animals ("Lion", "Meat"));
$zooProcesses->addAnimals(new Animals ("Elephant", "Leaves"));
$zooProcesses->addAnimals(new Animals ("Giraffe", "Leaves"));
$zooProcesses->addAnimals(new Animals ("Monkey", "Fruit"));
$zooProcesses->addAnimals(new Animals ("Panda", "Bamboo"));

while (true) {

    $commandTable = new Table(new Symfony\Component\Console\Output\ConsoleOutput());
    $commandTable->setHeaders(['Command', 'Description']);
    $commandTable->addRow(['List', 'List of all animals']);
    $commandTable->addRow(['Feed', 'Feed an animal']);
    $commandTable->addRow(['Pet', 'Pet an animal']);
    $commandTable->addRow(['Play', 'Play with an animal']);
    $commandTable->addRow(['Work', 'Work with an animal']);
    $commandTable->addRow(['Exit', 'Exit']);
    $commandTable->render();

    $input = readline("Enter your choice:\n");
    $formatedInput = ucfirst(strtolower($input));

    switch ($formatedInput) {

        case "List":

            $table = new Table(new Symfony\Component\Console\Output\ConsoleOutput());
            $table->setHeaders(['Animal', 'Happiness', 'Food Reserve', 'Favourite Food', 'Last Interaction']);
            foreach ($zooProcesses->getAnimals() as $animals) {
                $table->addRow([
                    $animals->getSpecies(),
                    $animals->getHappiness(),
                    $animals->getFoodReserves(),
                    $animals->getLikedFoods(),
                    $animals->getLastInteraction() ?? 'N/A'
                ]);
            }
            $table->render();
            break;

        case "Feed":
            $species = readline("Enter the name of the animal: \n");
            $food = readline("Enter the food to feed the animal: \n");
            $zooProcesses->feedAnimal($species, $food);
            break;

        case "Pet":
            $species = readline("Enter the name of the animal: \n");
            $zooProcesses->petAnimal($species);
            break;

        case "Play":
            $species = readline("Enter the name of the animal: \n");
            $zooProcesses->playAnimal($species);
            break;

        case "Work":
            $species = readline("Enter the name of the animal: \n");
            $zooProcesses->workAnimal($species);
            break;

        case "Exit":
            echo "Goodbye" . PHP_EOL;
            exit;

        default:
            echo "Wrong input!" . PHP_EOL;
            exit;
    }
}