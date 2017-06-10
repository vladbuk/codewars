<?php
/*
Write Number in Expanded Form

You will be given a number and you will need to return it as a string in Expanded Form (https://www.mathplacementreview.com/arithmetic/whole-numbers.php#expanded-form). For example:

expanded_form(12); // Should return "10 + 2"
expanded_form(42); // Should return "40 + 2"
expanded_form(70304); // Should return "70000 + 300 + 4"

NOTE: All numbers will be whole numbers greater than 0.

If you liked this kata, check out part 2!!
*/

function expanded_form($n) {

    $res = array_map(function ($e, $i) use ($n) {
        return $e . str_repeat("0", strlen(strval($n)) - $i - 1);
    }, $a = str_split(strval($n)), array_keys($a));

    return $res;
    // $arrstr = str_split((string) $n);
    // $bit = sizeof($arrstr);
    // $result = [];
    //
    // for ($i = 0; $i < $bit; $i++) {
    //     if ($arrstr[$i] !== "0") {
    //         $result[$i] = str_pad($arrstr[$i], $bit - $i, "0");
    //     }
    // }
    //
    // return implode(" + ", $result);

}

var_dump(expanded_form(42));
var_dump(expanded_form(70304));

// echo 70304 - 70304 % (10 ** 4);


// Решение из тестов
/*
function solution(int $n): string {
  return preg_replace('/ \+ 0+/', "", implode(" + ", array_map(function ($e, $i) use ($n) {return $e . str_repeat("0", strlen(strval($n)) - $i - 1);}, $a = str_split(strval($n)), array_keys($a))));
}
*/

// Умный вариант
/*
function expanded_form(int $n): string {
  for($i = strlen($n), $a = []; $i > 0;)
  {
    $a[] = $n - ($j = $n % (10 ** (--$i)));
    $n   = $j;
  }
  return implode(' + ', array_filter($a));
}
*/
