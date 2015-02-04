<?php 

/**
 *@For UserClass
 *@Author KoHein
 */

class UserClass {
	private $_db,
	$_data,
	$_sessionName,
	$_cookieName,
	$_isLoggedIn;

	public function __construct($user = null) {
		$this->_db= DB::getInstance();
		$this->_sessionName = Config::database('session_name');
		$this->_cookieName = Config::database('cookie_name');
		if(!$user) {
			if(SessionClass::existss($this->_sessionName)) {
				$user = SessionClass::gets($this->_sessionName);
				if($this->find($user)) {
					$this->_isLoggedIn = true;
				} else {
			// process Logout
				}
			}
		} else {
			$this->find($user);
		}
	}
	public function update($fields = array(), $id = null) {
		if(!$id && $this->isLoggedIn()) {
			$id = $this->data()->id;
		}
		if(!$this->_db->update('register', $id, $fields)) {
			throw new Exception('Updating Process Complete.');
		}
	}
	public function create($fields = array()) {
		if(!$this->_db->insert('register', $fields)) {
			throw new Exception ('Creating Account Process Complete');
		}
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
	public function login($username = null, $password = null, $remember = false) {
		if(!$username && !$password && $this->exists()) {
			SessionClass::put($this->_sessionName, $this->data()->id);
		} else {
			$user = $this->find($username);
			if($user) {
				if($this->data()->password === HashClass::make($password, $this->data()->salt)){
					SessionClass::put($this->_sessionName, $this->data()->id);
					if($remember) {
						$hash = HashClass::unique();
						$hashCheck = $this->_db->get('session',array('user_id', '=', $this->data()->id));
						if(!$hashCheck->count()) {
							$this->_db->insert('session', array(
								'user_id' => $this->data()->id,
								'hash' => $hash
								));
						} else {
							$hash = $hashCheck->first()->hash;
						}
						CookieClass::put($this->_cookieName, $hash, Config::database('cookie_expiry'));
					}
					return true;
				}
			}
		}
		return false;
	}
	public function hasPermission($key) {
		$group = $this->_db->get('accessgroup', array('id', '=', $this->data()->group));
		if($group->count()) {
			$permission = json_decode($group->first()->permission, true);
			if($permission[$key] == true) {
				return true;
			}
		}
		return false;
	}
	public function exists() {
		return (!empty($this->_data)) ? true : false;
	}
	public function logout() {
		$this->_db->delete('session', array('user_id', '=', $this->data()->id));
		SessionClass::delete($this->_sessionName);
		CookieClass::delete($this->_cookieName);
	}
	public function data() {
		return $this->_data;
	}
	public function isLoggedIn() {
		return $this->_isLoggedIn;
	}
	public function picture($temp, $extension) {
		$path = 'img/upload/' . substr(md5(time()), 0, 10) . '.' . $extension;
		move_uploaded_file($temp, $path);
	}
}

?>