<?php

/**
 * Created by PhpStorm.
 * User: massahud
 * Date: 12-07-2017
 * Time: 15:44
 */
class SimpleTrainCarCard extends AbstractTrainCard
{

    /**
     * @var Color
     */
    private $color;
    function __construct(Color $color)
    {
        if (Color::GRAY() == $color) {
            throw new InvalidArgumentException("A train car cannot be gray");
        }
        $this->color = $color;
    }

    public function hasColor(Color $color): bool
    {
        return $color == $this->color;
    }
}