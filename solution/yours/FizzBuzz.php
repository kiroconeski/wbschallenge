<?php 

declare(strict_types=1);

namespace wbs\solution\yours;

class FizzBuzz {

    /**
     * Start FizzBuzz from this number
     * @access private
     * @var int
     */
    private $leftBorder;

    /**
     * Run FizzBuzz until this number
     * @access private
     * @var int
     */
    private $rightBorder;

    /**
     * Constructor
     * @param int $leftBorder Start FizzBuzz from this number
     * @param int $rightBorder Run FizzBuzz until this number
     */
    public function __construct(int $leftBorder = 1, int $rightBorder = 100)
    {
        $this->leftBorder = $leftBorder;
        $this->rightBorder = $rightBorder;
    }

    /**
     * Prints out numbers
     */
    public function echoNumbers()
    {
        echo $this->getNumbersAsHtml();
    }

    /**
     * Returns Html representation of the FizzBuzz
     * @return string
     */
    public function getNumbersAsHtml(): string
    {
        $buffer = '';
        for ($number = $this->leftBorder; $number <= $this->rightBorder; $number++) {
            $buffer .= $this->getNumberRepresentation($number);
        }
        return $buffer;
    }

    /**
     * Returns the number's string epresentation according to FizzBuzz algorithm
     * @access private
     * @param int $number 
     * @return string
     */
    private function getNumberRepresentation(int $number)
    {
        $representation = '';

        $this->replaceNumbers($representation, $number);
        $this->alterOnEmptyString($representation, $number);

        $representation .= '<br />' . PHP_EOL;

        return $representation;
    }
    
    /**
     * Replace number with word according to FizzBuzz algorithm
     * @access protected
     * @param string & $representation
     * @param int $number
     */
    protected function replaceNumbers(string & $representation, int $number)
    {
        $this->alterStringOnThree($representation, $number);
        $this->alterStringOnFive($representation, $number);
    }

    /**
     * Replace a number divisible by 3 with the word 'Fizz'
     * @access private
     * @param string & $representation
     * @param int number
     */
    private function alterStringOnThree(string & $representation, int $number)
    {
        if ($number % 3 === 0) {
            $representation .= 'Fizz';
        }
    }

    /**
     * Replace a number divisible by 5 with the word 'Buzz'
     * @access private
     * @param string & $representation
     * @param int number
     */
    private function alterStringOnFive(string & $representation, int $number)
    {
        if ($number % 5 === 0) {
            $representation .= 'Buzz';
        }
    }

    /**
     * Fallback function to use if previous used altering functions
     * return empty string
     * @access private
     */
    private function alterOnEmptyString(string & $representation, int $number)
    {
        if (empty($representation)) {
            $representation = (string) $number;
        }
    }
}