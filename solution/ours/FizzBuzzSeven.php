<?php declare(strict_types=1);

namespace wbs\solution\ours;

class FizzBuzzSeven extends FizzBuzz
{
    protected function replaceNumbers(string & $representation, int $number)
    {
        parent::replaceNumbers($representation, $number);

        $this->alterStringOnSeven($representation, $number);
    }


    private function alterStringOnSeven(string & $representation, int $number)
    {
        if ($number % 7 === 0) {
            $representation .= 'Seven';
        }
    }
}
