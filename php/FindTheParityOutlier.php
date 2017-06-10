<?php

namespace Codewars;

/*

https://www.codewars.com/kata/find-the-parity-outlier/train/php

You are given an array (which will have a length of at least 3, but could be very large) containing integers. The array is either entirely comprised of odd integers or entirely comprised of even integers except for a single integer N. Write a method that takes the array as an argument and returns N.

For example:

[2, 4, 0, 100, 4, 11, 2602, 36]

Should return: 11

[160, 3, 1719, 19, 11, 13, -21]

Should return: 160
*/

// Мое решение, не проходит тест
// и вообще оно уходит далеко в сторону
function find($integers) {
    // print_r(implode(" ", $integers));
    //
    if (count($integers) < 3) {
        return -1;
    }

    $result = $integers[0];

    for ($i = 2, $l = count($integers); $i < $l; $i++) {

        if (($integers[$i - 1] % 2) != ($result % 2) && ($integers[$i] % 2) == ($integers[$i - 1] % 2)) {
            return $result;
        }

        if (($integers[$i - 1] % 2) != ($result % 2) && ($integers[$i] % 2) != ($integers[$i - 1] % 2)) {
            return $integers[$i - 1];
        }

        if (($integers[$i - 1] % 2) == ($result % 2) && ($integers[$i] % 2) == ($integers[$i - 1] % 2)) {
            $result = $integers[$i - 1];
        } else if (($integers[$i] % 2) !== ($result % 2)) {
            return $integers[$i];
        }

    }

    return $result;
}

// Лучшее решение
function findX($a) {
  $odds = [];
  $evens = [];
  foreach ($a as $n) {
    if ($n % 2) array_push($odds, $n);
    else array_push($evens, $n);
  }
  return count($evens) === 1 ? $evens[0] : $odds[0];
}

// Еще хорошее решение
function findY($i) {
   foreach ($i as $x)
      $x % 2 == 0 ? $even[] = $x : $odd[] = $x;
   return $odd < $even ? $odd[0] : $even[0];
}

var_dump(findY([1,1,-1,1,1,-44,7,7,7,7,7,7,7,7])) . "\n"; // -44

// var_dump(find([10, 20, 30, 15, 40, 22])) . "\n";
// var_dump(find([2, 3, 6, 8])) . "\n";
// var_dump(find([0, 3, 5, 7])) . "\n";
// var_dump(find([1, 3, -44, 5])) . "\n";
// var_dump(find([-3, -1, 0, 5])) . "\n";
// var_dump(find([11, 13, 2, 15])) . "\n";
// var_dump(find([2, 4, 0, 100, 4, 11, 2602, 36])) . "\n";
// var_dump(find([160, 3, 1719, 19, 11, 13, -21] )) . "\n";
// var_dump(find([-2, 1] )) . "\n";
// var_dump(find([2, 4, 6] )) . "\n";

// function find3($integers) {
//
//     $result = $integers[0];
//     $state = "notequal"; //notequal, equal
//
//     for ($i = 1, $l = count($integers); $i < $l; $i++) {
//         switch ($state) {
//             case "notequal":
//                 if (($integers[$i] % 2) === ($result % 2)) {
//                     $state = "equal";
//                     // $result = $integers[$i];
//                 }
//                 break;
//             case "equal":
//                 if (($integers[$i] % 2) !== ($result % 2)) {
//                     $state = "notequal";
//                     $result = $integers[$i];
//                 } else {
//                     $result = $integers[$i - 1];
//                 }
//                 break;
//         }
//     }
//
//     return $result;
// }






// function find($integers) {
//     // $flag = ($integers[0] % 2 == 0);
//     // var_dump($flag);
//     $result;
//     $state = "odd";
//
//     for ($i = 0, $l = count($integers); $i < $l; $i++) {
//         $flag2 = $integers[$i] % 2 == 0;
//
//         if ($flag1 === $flag2) {
//             // $flag1 = $integers[$i] % 2 == 0;
//             $result = $integers[$i];
//             // $i++;
//         } else {
//             $flag = ($integers[$i] % 2);
//             // $result = $integers[$i];
//             // $result = $integers[$i];
//             return $result;
//             # code...
//         }
//     }
//
//     return $result;
// }

// $flag = false;
// var_dump((1 % 2) === $flag);

// find([1, 3, 5, 6]) . "\n";
// find([2, 4, 6, 7]) . "\n";
// find([10, 20, 30, 15, 40, 22]) . "\n";

// var_dump(1 % 2 == 0);
// var_dump(2 % 2 == 0);
// var_dump(3 % 2 == 0);
// var_dump(4 % 2 == 0);
// var_dump(5 % 2 == 0);
