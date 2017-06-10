<?php

namespace Codewars;

/*
There is an array with some numbers. All numbers are equal except for one. Try to find it!

find_uniq([1, 1, 1, 2, 1, 1]); // => 2
find_uniq([0, 0, 0.55, 0, 0]); // => 0.55

It’s guaranteed that array contains 3 or more numbers.
 */

function find_uniq2($a) {
   $n = array_count_values(array_map(function($v) { return (string) $v; }, $a));
   return array_search(1, $n);
}


// лучшее решение
function find_uniq($a)
{
    return array_search(1, array_count_values(array_map('strval', $a)));
}

print_r(find_uniq([1, 1, 1, 2, 1, 1])); //2
print_r(find_uniq([0, 0, 0.55, 0, 0])); //0.55
print_r(find_uniq([0, 1, 0])); // 1
