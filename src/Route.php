<?php

/**
 * Created by PhpStorm.
 * User: massahud
 * Date: 12-07-2017
 * Time: 14:35
 */
interface Route
{
    public function accepts(TrainCarCard $trainCard): bool;
}