<?php

namespace Codewars;

require_once './../BitCounting.php';

use function Codewars\countBits;

class ConsecutiveTestCases extends \PHPUnit_Framework_TestCase
{
    public function testResultCountBits() {
        $this->assertEquals(countBits(0), 0);
        $this->assertEquals(countBits(4), 1);
        $this->assertEquals(countBits(7), 3);
        $this->assertEquals(countBits(9), 2);
        $this->assertEquals(countBits(10), 2);
        $this->assertEquals(countBits(26), 3);
        $this->assertEquals(countBits(77231418), 14);
        $this->assertEquals(countBits(12525589), 11);
        $this->assertEquals(countBits(3811), 8);
        $this->assertEquals(countBits(392902058), 17);
        $this->assertEquals(countBits(1044), 3);
        $this->assertEquals(countBits(10030245), 10);
        $this->assertEquals(countBits(183337941), 16);
        $this->assertEquals(countBits(20478766), 14);
        $this->assertEquals(countBits(103021), 9);
        $this->assertEquals(countBits(287), 6);
        $this->assertEquals(countBits(115370965), 15);
        $this->assertEquals(countBits(31), 5);
        $this->assertEquals(countBits(417862), 7);
        $this->assertEquals(countBits(626031), 12);
        $this->assertEquals(countBits(89), 4);
        $this->assertEquals(countBits(674259), 10);
    }
    public function testRandomTests()
    {
         for($i = 0; $i < 10; $i++) {
            list($number, $numberOfOne) = $this->generateRandomNumber();
            $this->assertEquals(countBits($number), $numberOfOne);
         }
    }
    private function generateRandomNumber()
    {
        $result = [];
        $count = 0;
        $length = rand(1,20);
        for ($i = 0; $i < $length; $i++) {
           $bit = array_rand([0,1]);
           $result[] = $bit;
           if ($bit) {
              $count++;
           }
        }
        return [bindec(implode('', $result)), $count];
    }
}
