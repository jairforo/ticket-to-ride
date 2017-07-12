<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers SimpleRoute
 */
class SimpleRouteTest extends TestCase
{
    private $aColor;

    const A_LENGTH = 1;

    /** @var SimpleRoute */
    private $route;

    /** @var  City */
    private $lisbon;

    /** @var  City */
    private $cascais;

    public function setUp()
    {
        parent::setUp();
        $this->aColor = Color::BLUE();
        $this->lisbon = new City('Lisbon');
        $this->cascais = new City('Cascais');

        $this->route = new SimpleRoute(
            $this->aColor,
            self::A_LENGTH,
            $this->lisbon,
            $this->cascais
        );
    }

    /**
     * @dataProvider allColors
     */
    public function testMustHaveAColor(Color $color)
    {
        $route = new SimpleRoute(
                $color,
            self::A_LENGTH,
            $this->lisbon,
            $this->cascais
        );
        $this->assertEquals($color, $route->getColor());
    }

    public function allColors()
    {
        return [
            [Color::PURPLE()],
            [Color::WHITE()],
            [Color::BLUE()],
            [Color::YELLOW()],
            [Color::ORANGE()],
            [Color::BLACK()],
            [Color::RED()],
            [Color::GREEN()],
            [Color::GRAY()],
        ];
    }

    /**
     * @dataProvider lengthProvider
     */
    public function testMustHaveALengthBetweenOneAndSix($length)
    {
        $route = new SimpleRoute(
            $this->aColor,
            $length,
            $this->lisbon,
            $this->cascais
        );

        $this->assertEquals($length, $route->getLength());
    }

    public function lengthProvider()
    {
        return [
            [1], [2], [3], [4], [5], [6]
        ];
    }

    /**
     * @dataProvider invalidLengthProvider
     */
    public function testCanNOtHaveAnInvalidLength($length)
    {
        $this->expectException(InvalidArgumentException::class);
        new SimpleRoute(
            $this->aColor,
            $length,
            $this->lisbon,
            $this->cascais
        );
    }

    public function invalidLengthProvider()
    {
        return [
            [0], [7], [-1]
        ];
    }

    public function testMustConnectTwoCities()
    {
        $this->assertEquals($this->lisbon, $this->route->getCity1());
        $this->assertEquals($this->cascais, $this->route->getCity2());
    }


    public function testCanNotConnectTheSameCity()
    {
        $this->expectException(InvalidArgumentException::class);
        new SimpleRoute(
            $this->aColor,
            self::A_LENGTH,
            $this->lisbon,
            $this->lisbon
        );
    }

    /**
     * @dataProvider pointsProvider
     */
    public function testHavePointsBasedOnItsLength($length, $points)
    {
        $route = new SimpleRoute(
            $this->aColor,
            $length,
            $this->lisbon,
            $this->cascais
        );

        $this->assertEquals($points, $route->getPoints());
    }

    public function pointsProvider()
    {
        return [
            [1,1],
            [2,2],
            [3,4],
            [4,7],
            [5,10],
            [6,15],
        ];
    }

    public function testCanAcceptTrainCardsThatHaveTheSameColor()
    {
        $trainCard = Phake::mock(TrainCarCard::class);
        Phake::when($trainCard)->hasColor($this->route->getColor())->thenReturn(true);
        $this->assertTrue($this->route->accepts($trainCard));
    }

    public function testCanNotAcceptTrainCardsOfAnotherColor() {
        $trainCard = Phake::mock(TrainCarCard::class);
        Phake::when($trainCard)->hasColor($this->route->getColor())->thenReturn(false);
        $this->assertFalse($this->route->accepts($trainCard));
    }
    
}