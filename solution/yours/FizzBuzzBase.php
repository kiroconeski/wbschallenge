<?php declare(strict_types=1);

namespace wbs\solution\yours;

/**
 * Base class for the FizzBuzz algorithm
 * <code>
 * <?php
 * class MyFizzBuzz extends FizzBuzzBase 
 * {
 *     public function __construct(int $leftBorder = 1, int $rightBorder = 100)
 *     {
 *         parent::__construct($leftBorder, $rightBorder);
 *         parent::registerAlteration(3, "Fizz");
 *     }
 * }
 * ?>
 * </code>
 * @abstract
 */
abstract class FizzBuzzBase 
{
    /**
     * Start FizzBuzz from this number
     * @var int
     */
    private $leftBorder;

    /**
     * Run FizzBuzz to this number
     * @var int
     */
    private $rightBorder;

    /**
     * Chain of functions to be applied to a given number representation
     * Functions will be executed in ascending order     
     * @var array
     */
    protected $alterations;


    /** 
     * Constructor for FizzBuzzBase class. Initializes $leftBorder and $rightBorder
     * members, and sets $alterations to empty array
     * @param int $leftBorder Start FizzBuzz from this number
     * @param int $rightBorder Run FizzBuzz to this number
    */
    public function __construct(int $leftBorder, int $righBorder)
    {
        $this->leftBorder = $leftBorder;
        $this->rightBorder = $righBorder;
        $this->alterations = array();
    }

    /**
     * Prints out the result of the FizzBuzz algorithm
     */
    public function echoNumbers()
    {
        echo $this->getNumbersAsHtml();
    }

    /**
     * Returns a Html representation of the FizzBuzz algorithm
     */
    public function getNumbersAsHtml(): string
    {
        $buffer = '';
        for ($number = $this->leftBorder; $number <= $this->rightBorder; $number++){
            $buffer .= $this->getNumberRepresentation($number);
        }

        return $buffer;
    }

    /**
     * Get the number representation according to FizzBuzz algorithm and
     * registered alterations in $alterations
     */
    private function getNumberRepresentation(int $number)
    {
        $representation = '';
        $this->executeAlterations($representation, $number);
        $this->alterOnEmptyString($representation, $number);

        $representation .= '<br />' . PHP_EOL;

        return $representation;
    }    

    /**
     * Execute the alterations in $alterations to a given $representation and $number
     * @access private
     * @param string& $representation The current state of the number's representation
     * @param int $number The number we seek representation for
     * 
     */
    private function executeAlterations(string & $representation, $number)
    {
        for ( $i=0; $i < sizeof($this->alterations); $i++ ){
            call_user_func_array($this->alterations[$i], array(&$representation, $number));
        }
    }

    /**
     * Set the representation to the number itself if the number didn't fit
     * any of the registered alterations
     * @access private
     * @param string& $representation The current state of the number's representation
     * @param int $number The number we seek representation for
     * 
     */
    private function alterOnEmptyString(string & $representation, int $number)
    {
        if (empty($representation)) {
            $representation = (string) $number;
        }
    }

    /**
     * Register alteration to the $alterations array.
     * @access protected
     * @param int $divider The divider to check if the number is divisivle by
     * @param int $replacementWord The word that shoud be printed if the number is divisible by the divider
     * 
     */
    protected function registerAlteration(int $divider, string $replacementWord)
    {
        array_push($this->alterations, function(string & $representation, int $number) use ($divider, $replacementWord){
            if ($number % $divider === 0) {
                $representation .= $replacementWord;
            }
        });
    }

}
