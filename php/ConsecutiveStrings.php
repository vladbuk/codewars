<?php

namespace Codewars;

/*
You are given an array strarr of strings and an integer k. Your task is to return the first longest string consisting of k consecutive strings taken in the array.

#Example: longest_consec(["zone", "abigail", "theta", "form", "libe", "zas", "theta", "abigail"], 2) --> "abigailtheta"

n being the length of the string array, if n = 0 or k > n or k <= 0 return "".
*/

function longestConsec($strarr, $k) {
    $result = $str = "";
    if (sizeof($strarr) == 0 || sizeof($strarr) < $k || $k <= 0) {
        return "";
    }

    for ($i = 0; $i < sizeof($strarr) ; $i++) {
        $j = 0;
        while ($j < $k && $i + $j < sizeof($strarr)) {
            $str .= $strarr[$i + $j];
            $j++;
        }
        if (strlen($str) > strlen($result)) {
            $result = $str;
            $str = "";
        } else {
            $str = "";
        }
    }

    return $result;
}

print_r(longestConsec(["zone", "abigail", "theta", "form", "libe", "zas"], 2));

// Лучшее решение
/*
function longestConsec($strarr, $k) {
    $longest = '';

    for ($i = 0; $i <= count($strarr) - $k; $i++) {
        $string = '';

        for ($j = 0; $j < $k; $j++) {
            $string .= $strarr[$i + $j];
        }

        if (strlen($string) > strlen($longest)) {
            $longest = $string;
        }
    }

    return $longest;
}
*/




    // $strarrsizes = array_map(function($str) {
    //     return strlen($str);
    // }, $strarr);
    //
    //
    //
    // for ($i = 0; $i < $k ; $i++) {
    //     if (sizeof($strarrsizes) == 0) {
    //         return $result;
    //     }
    //     $keymax = array_search(max($strarrsizes), $strarrsizes);
    //     $result .= $strarr[$keymax];
    //     $strarrsizes = array_slice($strarrsizes, $keymax + 1, sizeof($strarr), TRUE);
    // }

    // $arrcombine = array_combine($strarr, $strarrsizes);

    // $arrmax = array_search(max($arrcombine), $arrcombine);

    // return $strarrsize;
    // return $arrcombine;
    // return $arrmax;

    // метод сортировки не применим в случае одинаковых значений
    // исходного массива - нарушается последовательность
    // usort($strarr, function($a, $b) {
    //     if (strlen($a) == strlen($b)) return 0;
    //     return (strlen($a) < strlen($b)) ? 1 : -1;
    // });
    //
    // return implode("", array_slice($strarr, 0, $k));

// echo longestConsec(["zone", "abigail", "theta", "form", "libe", "zas"], 2); // "abigailtheta"
