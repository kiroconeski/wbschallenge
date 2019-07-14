<?php 

declare(strict_types=1);

namespace wbs\solution\yours;

use wbs\solution\yours\FizzBuzz;

class FizzBuzzSeven extends FizzBuzz 
{
    public function __construct(int $leftBorder=1, int $rightBorder=100)
    {
        parent::__construct($leftBorder, $rightBorder);
        parent::registerAlteration(7, "Seven");
    }
}
