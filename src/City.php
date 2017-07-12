<?php

class City
{
    private $name;

    public function __construct(string $name)
    {
        if(empty(trim($name))) {
            throw new InvalidArgumentException('The name can not be empty');
        }

        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

}