<?php

namespace Codewars;

/*
Everyone knows passphrases. One can choose passphrases from poems, songs, movies names and so on but frequently they can be guessed due to common cultural references. You can get your passphrases stronger by different means. One is the following:

choose a text in capital letters including or not digits and non alphabetic characters,

    1. shift each letter by a given number but the transformed letter must be a letter (circular shift),
    2. replace each digit by its complement to 9,
    3. keep such as non alphabetic and non digit characters,
    4. downcase each letter in odd position, upcase each letter in even position (the first character is in position 0),
    5. reverse the whole result.

#Example:

your text: "BORN IN 2015!", shift 1

1 + 2 + 3 -> "CPSO JO 7984!"

4 "CpSo jO 7984!"

5 "!4897 Oj oSpC"

With longer passphrases it's better to have a small and easy program. Would you write it?

https://en.wikipedia.org/wiki/Passphrase

 */

 function playPass($s, $n) {
    $distance = $n % 26;
    $result = "";

    foreach (str_split(strtolower($s)) as $key => $char) {
        if (preg_match('/[a-z]/', $char)) {
            if ($key % 2 == 0) {
                $result .= strtoupper(chr(97 + (ord($char) - 97 + $distance) % 26));
            } else {
                $result .= chr(97 + (ord($char) - 97 + $distance) % 26);
            }
        } else if (preg_match('/[0-9]/', $char)) {
            $result .= abs($char - 9);
        } else {
            $result .= $char;
        }
    }
    return strrev($result);
}

echo playPass("BORN IN 2015!!!", 1); // CPSO JO


// Clever solution
function playPass2($s, $n) {
    $result = '';
    for ($i = strlen($s) - 1; $i >= 0; $i--) {
        $char = $s[$i];

        if (ctype_alpha($char)) {
            $ord = ord($char) + $n;
            $result .= chr($ord + ($i % 2 === 0 ? 0 : 32) - ($ord > 90 ? 26 : 0));
        } elseif (ctype_digit($char)) {
            $result .= 9 - $char;
        } else {
            $result .= $char;
        }
    }

    return $result;
}
