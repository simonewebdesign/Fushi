<?php

function euroToDecimal ($price) {

    $price = str_replace('.', '', $price); // remove fullstop
    $price = str_replace(' ', '', $price); // remove spaces
    $price = str_replace(',', '.', $price); // change comma to fullstop

    return $price;
}