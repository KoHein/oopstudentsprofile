<?php 

/**
 *@For RedirectController
 *@Author KoHein
 */
class RedirectController {
	public function view() {
		View::load('404');
	}
	public static function to($location = null) {
		if($location) {
			if(is_numeric($location)) {
				switch($location){
					case 404;
					header('HTTP/1.0 404 Not Found');
					View::load('404');
					exit();
					break;
				}
			}
			header('Location:  ' . $location);
			exit();
		}
	}
}

?>