<?php

namespace Codewars;

/*
The drawing shows 6 squares the sides of which have a length of 1, 1, 2, 3, 5, 8. It's easy to see that the sum of the perimeters of these squares is : 4 * (1 + 1 + 2 + 3 + 5 + 8) = 4 * 20 = 80

Could you give the sum of the perimeters of all the squares in a rectangle when there are n + 1 squares disposed in the same manner as in the drawing:

Perimeter_of_squares_in_a_rectangle.jpg

#Hint: See Fibonacci sequence

#Ref: http://oeis.org/A000045

The function perimeter has for parameter n where n + 1 is the number of squares (they are numbered from 0 to n) and returns the total perimeter of all the squares.
 */

// not work on big int on 32-bit php
// echo PHP_INT_MAX . "\n"; // 2147483647

// script execution time
$time_start = microtime(true);


function fib($num)
{
    $fibSum = 0;
    $fib1 = 0;
    $fib2 = 1;

    for ($i = 0; $i < $num; $i++) {
        $fib1 = $fib2;
        $fib2 = $fibSum;
        $fibSum = $fib2 + $fib1;
    }

    return $fibSum;
}


function perimeter($n) {
    return 4 * (fib($n + 3) - 1);
    // $fibs = 0;
    // for ($i = 0; $i <= $n + 1; $i++) {
    //     $fibs += fib($i);
    //     // $fibs += round(pow((sqrt(5)+1)/2, $i) / sqrt(5));
    // }
    // return $fibs * 4;
}

echo perimeter(5) . "\n";
echo perimeter(7) . "\n";
echo perimeter(70) . "\n";


/**************************************************/
// BEST PRACTICES
// 1
function perimeter2($n) {
  $fibonacciNumbers = [1,1];
  for($i = 2; $i <= $n; $i++){
    $fibonacciNumbers[$i] = $fibonacciNumbers[$i-2] + $fibonacciNumbers[$i-1];
  }
  return 4 * array_sum($fibonacciNumbers);
}

// 2
function perimeter3($n) {
    $fib = [1,1];
    for($i = 2; $i <= $n; $i++) {
      $fib[$i] = $fib[$i-2] + $fib[$i-1];
    }
    return 4 * array_sum($fib);
}

// 3
function perimeter4($n) {
    $sum = 0;
    $a = 1;
    $b = 0;
    $t = 0;
    while ($n-- >= 0) {
        $sum += $a;
        $t = $a;
        $a += $b;
        $b = $t;
    }

    return 4 * $sum;
}

// echo perimeter(170) . "\n";
// echo perimeter(1700) . "\n";
// echo perimeter(17000) . "\n";
// // echo '3226062132197568';
// echo PHP_INT_MAX . "\n";
// echo "9 223 372 036 854 775 807";

// BcMath
function fibbcmath($num)
{
    $fibSum = '0';
    $fib1 = '0';
    $fib2 = '1';

    for ($i = 0; $i < $num; $i++) {
        $fib1 = $fib2;
        $fib2 = $fibSum;
        $fibSum = bcadd($fib2, $fib1);
    }

    return $fibSum;
}


function perimeterBcMath($n) {
    return bcmul((bcsub(fibbcmath($n + 3), 1)), 4);
}

// echo fibbcmath(100000) . "\n";

$time_end = microtime(true);
$time = $time_end - $time_start;
echo "Process Time: {$time}";
