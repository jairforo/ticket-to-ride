<?php
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: massahud
 * Date: 12-07-2017
 * Time: 12:03
 */
class TrainCarCardTest extends TestCase
{
    /**
     * @dataProvider colorProvider
     */
    public function testMustHaveAValidColor($color)
    {
        $trainCarCard = new TrainCarCard($color);
        $this->assertEquals($color, $trainCarCard->getColor());
    }

    public function colorProvider()
    {
        return [
            ['purple'],
            ['white'],
            ['blue'],
            ['yellow'],
            ['orange'],
            ['black'],
            ['red'],
            ['green'],
            ['locomotive']
        ];
    }

    public function testCanNotHaveAnInvalidColor()
    {
        $this->expectException(InvalidArgumentException::class);
        new TrainCarCard('gray');
    }
}