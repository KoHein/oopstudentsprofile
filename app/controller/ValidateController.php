<?php 

/**
 *@For Register Form Validation Process
 *@Author KoHein
 */

class ValidateController {
	private $_passed = false,
	$_errors = array(),
	$_db     = null;
	public function __construct() {
		$this->_db = DB::getInstance();
	}
	public function view() {
		View::load('register');
	}
	public static function exists($type= 'post') {
		switch($type) {
			case 'post':
			return (!empty($_POST)) ? true : false;
			break;
			case 'get':
			return (!empty($_GET)) ? true : false;
			break;
			default:
			return false;
			break;
		}
	}
	public static function get($item) {
		if(isset($_POST[$item])) {
			return $_POST[$item];
		} 	else if (isset($_GET[$item])) {
			return $_GET[$item];
		}
		return '';
	}
	public function check($source, $items = array()) {
		foreach($items as $item => $rules) {
			foreach($rules as $rule => $rule_value) {
				$value = $source[$item];
				$value = trim($source[$item]);
				$item = ($item);
				if($rule === 'required' && empty($value)) {
					$this->addError("{$item} is required");
				} elseif(!empty($value)) {
					switch($rule) {
						case 'min':
						if(strlen($value) < $rule_value) {
							$this->addError("{$item} must be a minimum of {$rule_value} characters.");
						}
						break;
						case 'max':
						if(strlen($value) > $rule_value) {
							$this->addError("{$item} must be a maximum of {$rule_value} characters.");
						}
						break;
						case 'matches':
						if($value != $source[$rule_value]){
							$this->addError("{$rule_value} must match {$item}");
						}
						break;
						case 'unique';
						$check = $this->_db->get($rule_value, array($item, '=', $value));
						if($check->count()) {
							$this->addError("{$item} already exists.");
						}
						break;
						case 'image':					
						$allowed = array('jpg', 'jpeg', 'gif', 'png');
						$picture = $value['name'];
						$extension = strtolower(end(explode('.', $picture)));				
						if(!in_array($extension, $allowed)):
							$this->addError("Format error");
						endif;
						break;
					}		
				}
			}
		}
		if(empty($this->_errors)) {
			$this->_passed = true;
		}
		return $this;
	}
	private function addError($error) {
		$this->_errors[]=$error;
	}
	public function errors() {
		return $this->_errors;
	}
	public function passed() {
		return $this->_passed;
	}
}

?>
