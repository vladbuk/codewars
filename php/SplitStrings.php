<?php

namespace Codewars;

/*
Complete the solution so that it splits the string into pairs of two characters. If the string contains an odd number of characters then it should replace the missing second character of the final pair with an underscore ('_').

Examples:

solution('abc') // should return ['ab', 'c_']
solution('abcdef') // should return ['ab', 'cd', 'ef']

 */

 function solution($str) {
     strlen($str) % 2 ? $str .= "_" : $str;
     return str_split($str, 2);
 }

// решение из тестов
function solution2($str) {
    return str_split(strlen($str) % 2 ? $str . '_' : $str, 2);
}


print_r(solution('abcd'));
print_r(solution('abc'));

echo strlen('abcd');
