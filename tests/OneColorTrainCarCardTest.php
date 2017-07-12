<?php
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: massahud
 * Date: 12-07-2017
 * Time: 12:03
 */
class OneColorTrainCarCardTest extends TestCase
{
    /**
     * @dataProvider colorProvider
     */
    public function testMustHaveAValidColor($color)
    {
        $trainCarCard = new OneColorTrainCarCard($color);
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
        new OneColorTrainCarCard('magenta');
    }
}