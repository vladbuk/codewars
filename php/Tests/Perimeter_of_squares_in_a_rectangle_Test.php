<?php

namespace Codewars;

require_once './../Perimeter_of_squares_in_a_rectangle.php';

use function Codewars\perimeter;

class ConsecutiveTestCases extends \PHPUnit_Framework_TestCase
{
    private function revTest($actual, $expected) {
        $this->assertEquals($expected, $actual);
    }
    public function testBasics() {
        $this->revTest(perimeter(5), 80);
        $this->revTest(perimeter(7), 216);
        $this->revTest(perimeter(20), 114624);
        $this->revTest(perimeter(30), 14098308);

        $this->revTest(perimeter(40), 1733977744);
        $this->revTest(perimeter(50), 213265164688);
        $this->revTest(perimeter(60), 26229881279364);
        $this->revTest(perimeter(70), 3226062132197568);
    }
    private function _fib13($n) {
        $a = 1; $b = 1; $tmp = null;
        while ($n-- > 0) {
            $tmp = $a; $a = $b; $b += $tmp;
        }
        return $a;
    }
    private function _perimeter13($n) {
        return 4 * ($this->_fib13($n + 2) - 1);
    }
    public function testRandom() {
        for($i = 0; $i < 50; $i++) {
            $n = rand(1, 70);
            $q = $this->_perimeter13($n);
            if ($q > 1.0e12) {
                //print("Number too big, I pass " + strval($q)); echo "\n";
                continue;
            }
            $this->assertEquals($this->_perimeter13($n), perimeter($n));
        }
    }
}
