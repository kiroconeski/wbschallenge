<?php 

declare(strict_types=1);

namespace wbs\solution\yours;

use wbs\solution\yours\FizzBuzzBase;

class FizzBuzz extends FizzBuzzBase 
{
    public function __construct(int $leftBorder=1, int $rightBorder=100)
    {
        parent::__construct($leftBorder, $rightBorder);
        parent::registerAlteration(3, "Fizz");
        parent::registerAlteration(5, "Buzz");
    }
}