<?php

/* 
* @param haystack the full string.
* @param needle the substring.
* Usage example:
* echo endsWith('albero','ero'); // true 
*/

function endsWith ($haystack, $needle) {
    $length = strlen($needle);
    $start  = $length * -1; //negative
    return (substr($haystack, $start) === $needle);
}