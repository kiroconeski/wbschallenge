<?php declare(strict_types=1);

namespace wbs\tests;

use PHPUnit\Framework\TestCase;

use wbs\solution\yours\FizzBuzz;
use wbs\solution\yours\FizzBuzzSeven;

class MakeMePassTest extends TestCase
{
    public function test_Rules_hasBeenRead()
    {
        $isRead = include './../Challenge.php';

        /** @noinspection PhpUnhandledExceptionInspection */
        self::assertTrue($isRead);
    }

    public function test_FizzBuzz_Html()
    {
        $fizzBuzz = new FizzBuzz();

        $expected = include './fixture/Output1.php';
        $actual   = $fizzBuzz->getNumbersAsHtml();

        /** @noinspection PhpUnhandledExceptionInspection */
        self::assertEquals($expected, $actual);
    }

    public function test_FizzBuzzSeven_Html()
    {
        $fizzBuzz = new FizzBuzzSeven(1, 110);

        $expected = include './fixture/Output2.php';
        $actual   = $fizzBuzz->getNumbersAsHtml();

        /** @noinspection PhpUnhandledExceptionInspection */
        self::assertEquals($expected, $actual);
    }
}
