<?php

/**
 * Created by PhpStorm.
 * User: massahud
 * Date: 12-07-2017
 * Time: 14:35
 */
interface Route
{
    public function getLength(): int;
    public function getColor(): Color;
    public function getPoints(): int;
    public function accepts(TrainCarCard $trainCard): bool;
    public function getCity1(): City;
    public function getCity2(): City;
}