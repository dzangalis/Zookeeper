<?php

namespace Zoo;

use Carbon\Carbon;

class Animals
{
    private string $species;
    private string $likedFoods;
    private int $happiness;
    private int $foodReserves;
    private ?Carbon $lastInteraction = null;

    public function __construct(string $species, string $likedFoods)
    {
        $this->species = $species;
        $this->likedFoods = $likedFoods;
        $this->happiness = 100;
        $this->foodReserves = 100;
    }

    public function play(): void
    {
        $this->happiness += 20;
        $this->foodReserves -= 10;
        $this->lastInteraction = Carbon::now();
    }

    public function work(): void
    {
        $this->happiness -= 10;
        $this->foodReserves -= 10;
        $this->lastInteraction = Carbon::now();
    }

    public function feed(string $food): void
    {
        if (strtolower($food) === strtolower($this->likedFoods)) {
            $this->foodReserves += 10;
        } else {
            $this->happiness -= 10;
            $this->foodReserves -= 20;
        }
        $this->lastInteraction = Carbon::now();
    }

    public function pet(): void
    {
        $this->happiness += 10;
        $this->lastInteraction = Carbon::now();
    }

    // Getter methods
    public function getSpecies(): string
    {
        return $this->species;
    }

    public function getLikedFoods(): string
    {
        return $this->likedFoods;
    }

    public function getHappiness(): int
    {
        return $this->happiness;
    }

    public function getFoodReserves(): int
    {
        return $this->foodReserves;
    }

    public function getLastInteraction(): ?Carbon
    {
        return $this->lastInteraction;
    }
}