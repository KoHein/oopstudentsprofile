<?php 

/**
 *For Resolve a namespace key from an array
 *@Param $key, $default_array
 *@Response $default_array
 *@Author KoHein
 */
function _arrayResolver($key, $default_array) {
	foreach ($key as $k => $value) {
		$default_array = $default_array[$value];
	}
	return $default_array;
}

?>