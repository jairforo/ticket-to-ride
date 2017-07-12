<?php

use PHPUnit\Framework\TestCase;

/**
 * @cover City
 */
class CityTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function testCanHaveAName()
    {
        $city = new City('Lisbon');
        $this->assertEquals('Lisbon', $city->getName());
    }

    public function testShouldNotHaveAnEmptyName()
    {
        $this->expectException(InvalidArgumentException::class);
        new City('');
    }

    public function testShouldNotHaveABlankName()
    {
        $this->expectException(InvalidArgumentException::class);
        new City(' ');
    }
}