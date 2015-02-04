<?php 

/**
 *@For Create Class For View
 *@Author KoHein
 */
class View {
	/**
	 *For Create Function for check data
	 *@Param $view, $data
	 *@Response null
	 *@Author KoHein
	 */
	public static function load($view, $data = null) {
	ob_start();
		if($data != null) {
			extract($data);
		}
	require DD . '/app/view/' . $view . '.php';
	ob_end_flush();
	}
}

?>