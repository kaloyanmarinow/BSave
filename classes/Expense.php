<?php
class Expense {
	private $id;
	private $userId;
	private $value;
	private $categoryId;
	private $description;
	private $ddate;

	function setId($id){
		$this->id = $id;
	}

	function setUserId($userId){
		$this->userId = $userId;
	}

	function setValue($value){
		$this->value = $value;
	}

	function setCategoryId($categoryId){
		$this->categoryId = $categoryId;
	}

	function setDescription($description){
		$this->description = $description;
	}

	function setDdate($ddate){
		$this->ddate = $ddate;
	}

	function getId() {
		return $this->id;
	}

	function getUserId() {
		return $this->userId;
	}

	function getValue() {
		return $this->value;
	}

	function getCategoryId() {
		return $this->categoryId;
	}

	function getDescription() {
		return $this->description;
	}

	function getDdate() {
		return $this->ddate;
	}
}
?>