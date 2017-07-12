<?php

/**
 * Created by PhpStorm.
 * User: massahud
 * Date: 12-07-2017
 * Time: 15:39
 */
class Locomotive implements TrainCarCard
{

    public function hasColor(Color $color): bool
    {
        return true;
    }

    public function getColor(): Color
    {
        return Color::ALL_COLORS();
    }
}