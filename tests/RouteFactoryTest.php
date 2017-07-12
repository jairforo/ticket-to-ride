<?php
use PHPUnit\Framework\TestCase;

/**
 * @cover RouteFactory
 */
class RouteFactoryTest extends TestCase
{
    const A_LENGTH = 3;

    /** @var  City */
    private $lisbon;

    /** @var  City */
    private $cascais;

    public function setUp()
    {
        $this->lisbon = new City('Lisbon');
        $this->cascais = new City('Cascais');
    }


    public function testShouldReturnAGrayRouteWhenAskedForARouteWithGrayColor()
    {
        $factory = new RouteFactory();
        $this->assertInstanceOf(GrayRoute::class,$factory->create(Color::GRAY(), self::A_LENGTH, $this->lisbon, $this->cascais));
    }

    /**
     * @dataProvider colorsExceptGray
     */
    public function testShouldReturnASimpleRouteWhenAskedForColorsOtherThanGray($color)
    {
        $factory = new RouteFactory();
        $this->assertInstanceOf(SimpleRoute::class, $factory->create($color, self::A_LENGTH, $this->lisbon, $this->cascais));
    }

    public function colorsExceptGray()
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
        ];
    }
}