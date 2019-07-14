<?php declare(strict_types=1);

namespace wbs\solution\yours;

class FizzBuzzSeven extends FizzBuzz
{
    /**
     * Replace numbers with words according to FizzBuzz algorithm
     * First calls parent function, and then alters the result
     * @access protected
     * @param string & $representation
     * @param int $number
     */
    protected function replaceNumbers(string & $representation, int $number)
    {
        parent::replaceNumbers($representation, $number);

        $this->alterStringOnSeven($representation, $number);
    }

    /**
     * Replace a number divisible by 7 with the word 'Seven'
     * @access private
     * @param string & $representation
     * @param int $number
     */
    private function alterStringOnSeven(string & $representation, int $number)
    {
        if ($number % 7 === 0) {
            $representation .= 'Seven';
        }
    }
}
