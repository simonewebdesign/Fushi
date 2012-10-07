<?php

if ( isset($_POST['submit_search']) ) {
	// field, operator, higher, lower, equals, contains, starts, ends
	$field = isset($_POST['field']) ? trim($_POST['field']) : false;

	if ( !empty($field) ) {

		$operator 	= isset($_POST['operator']) ? $_POST['operator'] : 'OR';

		$query.= " HAVING ";
		$_count = 0;

		foreach ($_POST as $condition => $value) {
			if ( !empty($value) ) {
				switch ($condition) {
					case 'higher':
						$query.= $_count > 0 ? " $operator " : '';
						$query.= "`$field` > $value";
						$_count++;
						break;
					case 'lower':
						$query.= $_count > 0 ? " $operator " : '';
						$query.= "`$field` < $value";
						$_count++;
						break;
					case 'equals':
						$query.= $_count > 0 ? " $operator " : '';
						$query.= "`$field` = '$value'";
						$_count++;
						break;
					case 'contains':
						$query.= $_count > 0 ? " $operator " : '';
						$query.= "`$field` LIKE '%$value%'";
						$_count++;
						break;
					case 'starts':
						$query.= $_count > 0 ? " $operator " : '';
						$query.= "`$field` LIKE '$value%'";
						$_count++;
						break;
					case 'ends':
						$query.= $_count > 0 ? " $operator " : '';
						$query.= "`$field` LIKE '%$value'";
						$_count++;
						break;
				}
				/* DEBUG
				var_dump($condition);
				var_dump($value);
				var_dump($_count);
				var_dump($_count > 0);
				//*/
			}
		}
	}
}