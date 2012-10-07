<?php

// REFERENCE: http://it2.php.net/manual/en/function.date.php
define('YEAR',date('Y')); // Example: 2012, 1990
// define('NOW',time()); // the current timestamp (USE time() directly)
define('ONE_YEAR',	31556926); // one year in seconds
define('ONE_MONTH',	2629744); // one month in seconds
define('ONE_WEEK',	604800); // one week in seconds
define('ONE_DAY',	86400); // one day in seconds
define('ONE_HOUR',	3600); // one hour in seconds
define('ONE_MINUTE',60);  // one minute in seconds


// REFERENCE: http://dev.mysql.com/doc/refman/5.5/en/date-and-time-functions.html#function_date-format
define('DATE_FORMAT_DATETIME', '%d/%m/%Y %H:%i'); // prints: 25/04/2012 16:30
define('DATE_FORMAT_DATE', '%d/%m/%Y'); // prints: 25/04/2012
define('DATE_FORMAT_TIME', '%H:%i'); // prints: 16:30


// REFERENCE: http://php.net/manual/en/function.strftime.php
define('STRFTIME_DATETIME', '%A %d %B %Y &nbsp; %H:%M'); // prints: Lunedì 16 Aprile 2012   15:51