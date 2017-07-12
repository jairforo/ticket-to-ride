<?php

/**
 * Created by PhpStorm.
 * User: massahud
 * Date: 12-07-2017
 * Time: 16:13
 */
class RouteFactory
{

    public function create(Color $color, int $length, City $city1, City $city2)
    {
        if (Color::GRAY() == $color) {
            return new GrayRoute($length, $city1, $city2);
        } else {
            return new SimpleRoute($color, $length, $city1, $city2);
        }
    }
}