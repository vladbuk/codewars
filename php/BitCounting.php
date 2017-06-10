<?php

namespace Codewars;

/*
Write a function that takes an (unsigned) integer as input, and returns the number of bits that are equal to one in the binary representation of that number.

Example: The binary representation of 1234 is 10011010010, so the function should return 5 in this case
*/

function countBits($n)
{
    // $str = ;
    $result = array_reduce(str_split(decbin((string) $n)), function($acc, $char) {
        return ($char) ? ++$acc : $acc;
    }, 0);
    return $result;
}

// print_r(countBits(10));

// вариант с обработкой строки
function countBits2($n)
{
  return substr_count(decbin($n), 1);
}

echo countBits(10);
