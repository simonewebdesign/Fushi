<?php

/* function to add a stylesheet.
11/10/2012 by simonewebdesign */

function add_css ($style) {
  return str_replace('$1', $style, STYLESHEET);
}