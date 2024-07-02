<?php
require_once('Expense.php');

class ExpenseTable extends Expense {
	function addExpense($expense) {
		$userId = $_SESSION['user_id'];
		$value = $expense->getValue();
		$category = $expense->getCategoryId();
		$description = $expense->getDescription();
		$date = $expense->getDdate();

		include 'config.php';

		$sql = "INSERT INTO expenses (user_id, value, categoty_id ,description, ddate)
				VALUES ($userId, $value, $category, '$description', '$date')";

		mysqli_query($dbConn,$sql) or die(mysqli_error($dbConn));


		$sql_balance = "UPDATE users SET user_balance=user_balance-'$value'
							WHERE id_user='$userId';";

		mysqli_query($dbConn,$sql_balance) or die(mysqli_error($dbConn));		
	}
}

?>