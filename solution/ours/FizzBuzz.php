<?php declare(strict_types=1);

namespace wbs\solution\ours;

class FizzBuzz
{
    /**
     * @var int
     */
    private $leftBorder;
    /**
     * @var int
     */
    private $rightBorder;

    public function __construct(int $leftBorder = 1, int $rightBorder = 100)
    {
        $this->leftBorder  = $leftBorder;
        $this->rightBorder = $rightBorder;
    }

    public function echoNumbers()
    {
        echo $this->getNumbersAsHtml();
    }

    public function getNumbersAsHtml(): string
    {
        $buffer = '';

        for ($number = $this->leftBorder; $number <= $this->rightBorder; $number++) {
            $buffer .= $this->getNumberRepresentation($number);
        }

        return $buffer;
    }

    private function getNumberRepresentation(int $number)
    {
        $representation = '';

        $this->replaceNumbers($representation, $number);
        $this->alterOnEmptyString($representation, $number);

        $representation .= '<br />' . PHP_EOL;

        return $representation;
    }

    protected function replaceNumbers(string & $representation, int $number)
    {
        $this->alterStringOnThree($representation, $number);
        $this->alterStringOnFive($representation, $number);
    }


    private function alterStringOnThree(string & $representation, int $number)
    {
        if ($number % 3 === 0) {
            $representation .= 'Fizz';
        }
    }

    private function alterStringOnFive(string & $representation, int $number)
    {
        if ($number % 5 === 0) {
            $representation .= 'Buzz';
        }
    }

    private function alterOnEmptyString(string & $representation, int $number)
    {
        if (empty($representation)) {
            $representation = (string) $number;
        }
    }
}
