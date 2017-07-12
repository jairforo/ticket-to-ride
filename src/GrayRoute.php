<?php

class GrayRoute extends SimpleRoute
{
    public function __construct($length, City $city1, City $city2)
    {
        parent::__construct(Color::GRAY(), $length, $city1, $city2);
    }

    public function accepts(TrainCarCard $trainCard): bool
    {
        return true;
    }

}