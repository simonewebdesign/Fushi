<?php

$user_login_query = "SELECT * FROM `users` WHERE `login` = :login && `password` = PASSWORD(:password)";
$user_db = $db->prepare($user_login_query);
$user_db->execute($sql_data);
$user = $user_db->fetchObject();