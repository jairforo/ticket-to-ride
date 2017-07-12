<?php

/**
 * Created by PhpStorm.
 * User: massahud
 * Date: 12-07-2017
 * Time: 12:15
 */
class Game
{

    /**
     * Game constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param Route $route
     * @param TrainCarCard[] $playerCards
     * @return bool
     */
    public function canClaim(Route $route, array $playerCards): bool
    {
        $counts = [];
        foreach ($playerCards as $playerCard) {
            if ($route->accepts($playerCard)) {
                $color = $playerCard->getColor()->getName();
                $count = $counts[$color] ?? 0;
                $count++;
                $counts[$color] = $count;
            }
        }
        $locomotives = $counts[Color::NO_COLOR()->getName()] ?? 0;
        if ($locomotives >= $route->getLength()) {
            return true;
        }
        foreach ($counts as $key => $count) {
            if ($key != Color::NO_COLOR()->getName() &&
                $count + $locomotives >= $route->getLength()) {
                return true;
            }
        }
        return false;
    }
}