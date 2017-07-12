<?php

class SimpleRoute implements Route
{
    const MIN_LENGTH = 1;

    const MAX_LENGTH = 6;

    const POINTS = [
        1 => 1,
        2 => 2,
        3 => 4,
        4 => 7,
        5 => 10,
        6 => 15
    ];

    /** @var Color */
    private $color;

    /** @var int */
    private $length;

    /** @var City */
    private $city1;

    /** @var City */
    private $city2;

    public function __construct(Color $color, int $length, City $city1, City $city2)
    {
        $this->ruleValidation($length, $city1, $city2);

        $this->color = $color;
        $this->length = $length;
        $this->city1 = $city1;
        $this->city2 = $city2;
    }

    public function getColor(): Color
    {
        return $this->color;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function getCity1(): City
    {
        return $this->city1;
    }

    public function getCity2(): City
    {
        return $this->city2;
    }

    public function getPoints(): int
    {
        return self::POINTS[$this->length];
    }

    private function ruleValidation(int $length, City $city1, City $city2)
    {

        if ($length < self::MIN_LENGTH || $length > self::MAX_LENGTH) {
            throw new InvalidArgumentException($length. ' is not valid color');
        }

        if ($city1->getName() == $city2->getName()) {
            throw new InvalidArgumentException('The cities should be different');
        }
    }

    public function accepts(TrainCarCard $trainCard): bool
    {
        return $trainCard->hasColor($this->getColor());
    }
}