<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers GrayRoute
 */
class GrayRouteTest extends TestCase
{

    const A_LENGTH = 1;

    /** @var  GrayRoute */
    private $grayRoute;
    /** @var  City */
    private $lisbon;

    /** @var  City */
    private $cascais;

    public function setUp()
    {
        $this->aColor = Color::BLUE();
        $this->lisbon = new City('Lisbon');
        $this->cascais = new City('Cascais');

        $this->grayRoute = new GrayRoute(
            self::A_LENGTH,
            $this->lisbon,
            $this->cascais
        );
    }

    public function testShouldHaveGrayColor()
    {
        $this->assertEquals(Color::GRAY(), $this->grayRoute->getColor());
    }

    /**
     * @dataProvider allColors
     */
    public function testShouldAcceptAllColors(Color $color)
    {
        $trainCard = Phake::mock(TrainCarCard::class);
        Phake::when($trainCard)->hasColor($color)->thenReturn(true);
        $this->assertTrue($this->grayRoute->accepts($trainCard));
    }

    public function allColors()
    {
        return [
            [Color::PURPLE()],
            [Color::GRAY()],
            [Color::BLACK()],
            [Color::BLUE()],
            [Color::GREEN()],
            [Color::ORANGE()],
            [Color::YELLOW()],
            [Color::WHITE()],
            [Color::RED()]
        ];
    }
}