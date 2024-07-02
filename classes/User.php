<?php
class User {
	private $id;
	private $name;
	private $username;
	private $password;

	function setId($id){
		$this->id = $id;
	}

	function setName($name){
		$this->name = $name;
	}

	function setUsername($username){
		$this->username = $username;
	}

	function setPassword($password){
		$this->password = $password;
	}

	function getId() {
		return $this->id;
	}

	function getName() {
		return $this->name;
	}

	function getUsername() {
		return $this->username;
	}

	function getPassword() {
		return $this->password;
	}
}
?>