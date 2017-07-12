<?php
use PHPUnit\Framework\TestCase;

/**
 * @covers Color
 */
class ColorTest extends TestCase
{
    public function testShouldHavePurple()
    {
        $this->assertEquals('purple', Color::PURPLE()->getName());
    }
    public function testShouldHaveWhite()
    {
        $this->assertEquals('white', Color::WHITE()->getName());
    }
    public function testShouldHaveBlue()
    {
        $this->assertEquals('blue', Color::BLUE()->getName());
    }
    public function testShouldHaveYellow()
    {
        $this->assertEquals('yellow', Color::YELLOW()->getName());
    }
    public function testShouldHaveOrange()
    {
        $this->assertEquals('orange', Color::ORANGE()->getName());
    }
    public function testShouldHaveBlack()
    {
        $this->assertEquals('black', Color::BLACK()->getName());
    }
    public function testShouldHaveRed()
    {
        $this->assertEquals('red', Color::RED()->getName());
    }
    public function testShouldHaveGreen()
    {
        $this->assertEquals('green', Color::GREEN()->getName());
    }
    public function testShouldHaveGray()
    {
        $this->assertEquals('gray', Color::GRAY()->getName());
    }
}