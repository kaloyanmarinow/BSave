<?php
require_once('Category.php');

class CategoryTable extends Category {

	function addCategoryIncome($category) {
		$category = $category->getCategory();

		include 'config.php';

		$sql_check =  "SELECT * FROM categories_incomes WHERE category_name='$category' LIMIT 1";
		$result = mysqli_query($dbConn, $sql_check);
		$category_check = mysqli_fetch_assoc($result);

		if (!$category_check) {
			$sql = "INSERT INTO categories_incomes (category_name)
				VALUES ('$category')";

			mysqli_query($dbConn,$sql);
		}
	}

	function addCategoryExpense($category) {
		$category = $category->getCategory();

		include 'config.php';

		$sql_check =  "SELECT * FROM categories_expenses WHERE category_name='$category' LIMIT 1";
		$result = mysqli_query($dbConn, $sql_check);
		$category_check = mysqli_fetch_assoc($result);

		if (!$category_check) {
			$sql = "INSERT INTO categories_expenses (category_name)
				VALUES ('$category')";

			mysqli_query($dbConn,$sql);
		}
	}
}

?>