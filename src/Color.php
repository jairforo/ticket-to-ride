<?php

final class Color
{

    /** @var  Color[] */
    private static $colors = [];

    private $name;

    private function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    private static function getColor(string $name): Color
    {
        if (!key_exists($name, self::$colors)) {
            self::$colors[$name] = new Color($name);
        }
        return self::$colors[$name];
    }

    public final static function ALL_COLORS(): Color
    {
        return self::getColor('nocolor');
    }

    public final static function PURPLE(): Color
    {
        return self::getColor('purple');
    }
    public final static function WHITE(): Color
    {
        return self::getColor('white');
    }
    public final static function BLUE(): Color
    {
        return self::getColor('blue');
    }
    public final static function YELLOW(): Color
    {
        return self::getColor('yellow');
    }
    public final static function ORANGE(): Color
    {
        return self::getColor('orange');
    }
    public final static function BLACK(): Color
    {
        return self::getColor('black');
    }
    public final static function RED(): Color
    {
        return self::getColor('red');
    }
    public final static function GREEN(): Color
    {
        return self::getColor('green');
    }
    public final static function GRAY(): Color
    {
        return self::getColor('gray');
    }

}