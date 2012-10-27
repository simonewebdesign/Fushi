<?php

$user_id = isset($get[2]) ? $get[2] : 0;

if ($user_id > 0) { 
  var_dump($user);
} else {
  echo "bo, da definire come prendere i dati dal db, comunque il profilo è pubblico.";
}