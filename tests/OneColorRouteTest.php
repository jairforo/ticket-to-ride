<?php

use PHPUnit\Framework\TestCase;

class OneColorRouteTest extends TestCase
{
    const A_COLOR = 'blue';

    const A_LENGTH = 1;

    /** @var OneColorRoute */
    private $route;

    /** @var  City */
    private $lisbon;

    /** @var  City */
    private $cascais;

    public function setUp()
    {
        parent::setUp();

        $this->lisbon = new City('Lisbon');
        $this->cascais = new City('Cascais');

        $this->route = new OneColorRoute(
            self::A_COLOR,
            self::A_LENGTH,
            $this->lisbon,
            $this->cascais
        );
    }

    /**
     * @dataProvider colorProvider
     */
    public function testMustHaveAValidColor($color)
    {
        $route = new OneColorRoute(
                $color,
            self::A_LENGTH,
            $this->lisbon,
            $this->cascais
        );
        $this->assertEquals($color, $route->getColor());
    }

    public function testCanNotHaveAnInvalidColor()
    {
        $this->expectException(InvalidArgumentException::class);
        new OneColorRoute(
            'locomotive',
            self::A_LENGTH,
            $this->lisbon,
            $this->cascais
        );
    }

    public function colorProvider()
    {
        return [
            ['purple'], ['white'], ['blue'], ['yellow'], ['orange'], ['black'], ['red'], ['green'], ['gray']
        ];
    }

    /**
     * @dataProvider lengthProvider
     */
    public function testMustHaveALengthBetweenOneAndSix($length)
    {
        $route = new OneColorRoute(
            self::A_COLOR,
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
        new OneColorRoute(
            self::A_COLOR,
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
        new OneColorRoute(
            self::A_COLOR,
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
        $route = new OneColorRoute(
            self::A_COLOR,
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
    
}