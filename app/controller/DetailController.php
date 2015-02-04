<?php

/**
 *@For DetailController For View
 *@Author KoHein
 */

class DetailController {
	private $_db,
	$_data;
	public function __construct($user = null) {
		$this->_db= DB::getInstance();
		$this->find($user);
	}
	public function view() {
		View::load('detail');
	}
	public function find($user = null) {
		if($user) {
			$field = (is_numeric($user)) ? 'id' : 'username';
			$data = $this->_db->get('register', array($field, '=', $user));
			if($data->count()) {
				$this->_data = $data->first();
				return true;
			}
		}
		return false;
	}
	public function data() {
		return $this->_data;
	}
}

?>
