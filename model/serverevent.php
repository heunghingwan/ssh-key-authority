<?php
/**
* Class that represents a log event that was recorded in relation to a server
*/
class ServerEvent extends Record {
	/**
	* Defines the database table that this object is stored in
	*/
	protected $table = 'server_event';

	/**
	* Magic getter method - if server field requested, return Server object of the affected server;
	* if actor field requested, return User object of the person who triggered the logged event.
	* @param string $field to retrieve
	* @return mixed data stored in field
	*/
	public function &__get($field) {
		global $user_dir;
		switch($field) {
		case 'actor':
			$actor = new User($this->data['actor_id']);
			return $actor;
		case 'server':
			$server = new Server($this->data['server_id']);
			return $server;
		default:
			return parent::__get($field);
		}
	}
}
