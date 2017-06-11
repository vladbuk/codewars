<?php

namespace Codewars;

/*
The idea for this Kata came from 9gag today.here

You'll have to translate a string to Pilot's alphabet (NATO phonetic alphabet) wiki.

Like this:

Input: If you can read

Output: India Foxtrot Yankee Oscar Uniform Charlie Alfa November Romeo Echo Alfa Delta

Some notes

    Keep the punctuation, and remove the spaces.
    Use Xray without dash or space.

Reference

alt text

You can use the NATO hash with the alphabet

 */

 define("NATO", serialize (array(
     'A' =>	'Alfa',
     'B' =>	'Bravo',
     'C' =>	'Charlie',
     'D' =>	'Delta',
     'E' =>	'Echo',
     'F' =>	'Foxtrot',
     'G' =>	'Golf',
     'H' =>	'Hotel',
     'I' =>	'India',
     'J' =>	'Juliet',
     'K' =>	'Kilo',
     'L' =>	'Lima',
     'M' =>	'Mike',
     'N' =>	'November',
     'O' =>	'Oscar',
     'P' =>	'Papa',
     'Q' =>	'Quebec',
     'R' =>	'Romeo',
     'S' =>	'Sierra',
     'T' =>	'Tango',
     'U' =>	'Uniform',
     'V' =>	'Victor',
     'W' =>	'Whiskey',
     'X' =>	'Xray',
     'Y' =>	'Yankee',
     'Z' =>	'Zulu',
 )));

 function to_nato2($words){
     return strtr(strtoupper(implode(' ', str_split(str_replace(' ', '', $words)))), unserialize(NATO));
 }

// Хорошие решения
function to_nato($words){
  $alphabet = array(
    "A" => "Alfa",
    "B" => "Bravo",
    "C" => "Charlie",
    "D" => "Delta",
    "E" => "Echo",
    "F" => "Foxtrot",
    "G" => "Golf",
    "H" => "Hotel",
    "I" => "India",
    "J" => "Juliet",
    "K" => "Kilo",
    "L" => "Lima",
    "M" => "Mike",
    "N" => "November",
    "O" => "Oscar",
    "P" => "Papa",
    "Q" => "Quebec",
    "R" => "Romeo",
    "S" => "Sierra",
    "T" => "Tango",
    "U" => "Uniform",
    "V" => "Victor",
    "W" => "Whiskey",
    "X" => "Xray",
    "Y" => "Yankee",
    "Z" => "Zulu",
  );

  return implode(" ", array_map(function($n) use ($alphabet) {
    return strtr($n, $alphabet);
  }, str_split(strtoupper(str_replace(" ", "", $words)))));
}

function to_nato($words) {
  $alphabet = [
    "a" => "Alfa",
    "b" => "Bravo",
    "c" => "Charlie",
    "d" => "Delta",
    "e" => "Echo",
    "f" => "Foxtrot",
    "g" => "Golf",
    "h" => "Hotel",
    "i" => "India",
    "j" => "Juliet",
    "k" => "Kilo",
    "l" => "Lima",
    "m" => "Mike",
    "n" => "November",
    "o" => "Oscar",
    "p" => "Papa",
    "q" => "Quebec",
    "r" => "Romeo",
    "s" => "Sierra",
    "t" => "Tango",
    "u" => "Uniform",
    "v" => "Victor",
    "w" => "Whiskey",
    "x" => "Xray",
    "y" => "Yankee",
    "z" => "Zulu"
  ];

  $prepared = str_replace(" ", "", strtolower($words));
  $result = trim(preg_replace(["@([A-Z\W])@"], " $1", strtr($prepared, $alphabet)));

  return $result;
}

print_r(to_nato('If you can read')); // "India Foxtrot Yankee Oscar Uniform Charlie Alfa November Romeo Echo Alfa Delta");
print_r(to_nato('Did not see that coming')); // "Delta India Delta November Oscar Tango Sierra Echo Echo Tango Hotel Alfa Tango Charlie Oscar Mike India November Golf");

// var_dump(strtr(strtoupper(str_replace(' ', '', 'If you can read')), unserialize(NATO)));
