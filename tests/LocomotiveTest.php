<?php
use PHPUnit\Framework\TestCase;

/**
 * @covers Locomotive
 */
class LocomotiveTest extends TestCase
{
    /**
     * @dataProvider allColors
     */
    public function testMustHaveAllColors($color) {
        $locomotive = new Locomotive();
        $this->assertTrue($locomotive->hasColor($color));
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

    public function testShouldHaveNoColor()
    {
        $locomotive = new Locomotive();
        $this->assertEquals(Color::NO_COLOR(), $locomotive->getColor());
    }
}