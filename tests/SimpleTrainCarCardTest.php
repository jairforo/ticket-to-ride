<?php
use PHPUnit\Framework\TestCase;

/**
 * @covers SimpleTrainCarCard

 */
class SimpleTrainCarCardTest extends TestCase
{
    /**
     * @dataProvider validColors
     */
    public function testMustHaveAValidColor($color)
    {
        $trainCarCard = new SimpleTrainCarCard($color);
        $this->assertTrue($trainCarCard->hasColor($color));
    }

    public function testShouldHaveOnlyOneColor()
    {

        $trainCarCard = new SimpleTrainCarCard(Color::YELLOW());
        $this->assertFalse($trainCarCard->hasColor(Color::WHITE()));
    }

    public function validColors()
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

    public function testCanNotHaveGrayColor()
    {
        $this->expectException(InvalidArgumentException::class);
        new SimpleTrainCarCard(Color::GRAY());
    }
}