<?php

/**
 * Created by PhpStorm.
 * User: massahud
 * Date: 12-07-2017
 * Time: 12:03
 */
class OneColorTrainCarCard
{

    const COLORS = ['purple', 'white', 'blue', 'yellow', 'orange', 'black', 'red', 'green', 'locomotive'];

    private $color;

    function __construct($color)
    {
        if (!in_array($color, self::COLORS)) {
            throw new InvalidArgumentException($color . ' is not valid color');
        }

        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }
}