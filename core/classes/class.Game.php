<?php
use DB\MySQL;

class Game {
    /** @var  User */
    private $User;
    /** @var MySQL  */
    private $mysql;

	function __construct($user) {
		$this->User = $user;
		$this->mysql = new MySQL(MYSQL_IP, $user->SERVER_DB, MYSQL_USER, MYSQL_PW);
	}
	
	public function getEventRunning() {
		return -1;
	}
}
?>