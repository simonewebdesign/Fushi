<?php

/*
* @param haystack the full string.
* @param needle the substring.
* Usage example:
* echo startsWith('albero','alb');
*/

function startsWith ($haystack, $needle) {
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}