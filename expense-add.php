<!DOCTYPE html>
<html>
<?php
	if (isset($_POST["add-category"])){
		$category_new = $_POST["category-new"];

		if (!empty($category_new)) {
			require_once('classes/Category.php');
			require_once('classes/CategoryTable.php');

			$category = new Category();
			$category->setCategory($category_new);

			$categoryTable = new CategoryTable();
			$categoryTable->addCategoryExpense($category);
		}
	}

	if (isset($_POST["add-expenses"])){
		$value = $_POST["value"];
		$category = $_POST["category"];
		$description = $_POST["description"];
		$date = $_POST["date"];

		if ( !empty($value)&&!empty($category)&&!empty($description)&&!empty($date)){
			require_once('classes/Expense.php');
			require_once('classes/ExpenseTable.php');

			$expense = new Expense();
			$expense->setValue($value);
			$expense->setCategoryId($category);
			$expense->setDescription($description);
			$expense->setDdate($date);

			$expenseTable = new ExpenseTable();
			$expenseTable->addExpense($expense);
		} else {
			echo "<p class='error-msg'>Please fill all fields!</p>";
		}
	}
?>
<head>
	<title>BSave</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

	<link rel="stylesheet" href="css/income-add.css">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="icon" type="image/png" href="css/images/favicon.ico"/>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Gochi+Hand&family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<div class="wrapper">
		<header class="header header--alt header--about">
			<div class="header__aside">
				<img src="css/images/elipse.png" alt="">
			</div><!-- /.header__aside -->
		
			<div class="shell shell--fluid header__shell">
				<div class="header__logo">
					<a href="home.php" class="logo">
						<img src="css/images/logo.png" alt="">
					
						<h1>
							<span>B</span>Save
						</h1>
					</a><!-- /.logo -->
				</div><!-- /.header__logo -->
				
				<div class="header__menu">
					<?php
						if(isset($_SESSION['user_id'])) {
							echo '<div class="header__balance header__balance--alt">';
								include 'classes/config.php';

								$userId = $_SESSION['user_id'];

								$sql = "SELECT cast(user_balance as decimal(10,2)) AS value FROM users
											WHERE id_user = $userId;";

								$result = mysqli_query($dbConn,$sql);
								
								while($row = mysqli_fetch_assoc($result)){
									echo "<p>$ ".$row['value']."</p>";
								}
							echo '</div>';
						}
					?>

					<div class="header__nav">
						<nav class="nav">
							<ul>
								<li>
									<a href="home.php">Home</a>
								</li>
		
								<li class="menu-item-has-children <?php if(!isset($_SESSION['user_id'])) { echo 'is-hidden'; } ?>">
									<a href="#">Incomes</a>
		
									<ul>
										<li>
											<a href="income-add.php">Add income</a>
										</li>
										
										<li>
											<a href="revenue-history.php">Revenue History</a>
										</li>
										
										<li>
											<a href="income-references.php">Incomes by Date</a>
										</li>

										<li>
											<a href="category-references-income.php">Incomes by Category</a>
										</li>
									</ul>
								</li>
		
								<li class="menu-item-has-children <?php if(!isset($_SESSION['user_id'])) { echo 'is-hidden'; } ?>">
									<a href="#">Expenses</a>
		
									<ul>
										<li>
											<a href="expense-add.php">Add Expense</a>
										</li>
										
										<li>
											<a href="expenses-history.php">Еxpenses History</a>
										</li>
										
										<li>
											<a href="expense-references.php">Expenses by Date</a>
										</li>

										<li>
											<a href="category-references-expense.php">Expenses by Category</a>
										</li>
									</ul>
								</li>
		
								<li>
									<a href="about.php">About Us</a>
								</li>
		
								<li>
									<a href="contact.php">Contacts</a>
								</li>
							</ul>
						</nav><!-- /.nav -->
					</div><!-- /.header__nav -->
					
					<div class="header__actions">
						<a href="login.php">
							<i>
								<img src="css/images/user.png" alt="">
							</i>
						</a>
					</div><!-- /.header__actions -->
					
					<?php
						if(isset($_SESSION['user_id'])) {
							echo "
								<div class='header__exit'>
									<form action='' method='post'>
										<button type='submit' name='exit'>
											<img src='css/images/exit.png' alt=''>
										</button>
									</form>
								</div>";
						}

						if (isset($_POST["exit"])){
							session_destroy();
							echo "<meta http-equiv='refresh' content='0'>";
						}
					?>
				</div><!-- /.header__menu -->
			</div><!-- /.shell -->
		</header><!-- /.header -->

		<div class="section">
			<div class="section__image">
				<img src="css/images/profit.png" alt="">
			</div>

			<div class="shell section__shell">
				<div class="section__title">
					<h2>Add your expenses here</h2>
				</div>

				<div class="section__form">
					<form action="" method="post" class="form-add">
						<div class="form__row">
							<input type="text" placeholder="Value of expense" name="value">
						</div>

						<div class="form__row">
							<select name="category" id="category">
								<option value="placeholder" hidden>Select category</option>
								
								<?php 
									include 'classes/config.php';

									$sql = mysqli_query($dbConn, "SELECT * FROM categories_expenses");
									
									while ($row = $sql->fetch_assoc()){
										echo "<option value=" . $row['id_category'] . ">" . $row['category_name'] . "</option>";
									}
								?>

								<option value="add" id="add-categories">Add Others</option>
							</select>
						</div>

						<div class="form__row form__row--alt" id="add-category">
							<input type="text" placeholder="Enter new category" name="category-new">

							<input type="submit" value="Add Category" name="add-category">
						</div>

						<div class="form__row">
							<textarea placeholder="Description" name="description" rows="3" cols="20"></textarea>
						</div>

						<div class="form__row">
							<input type="text" name="date" placeholder="Date of Expense" onfocus="(this.type='date')" onblur="(this.type='text')">
						</div>

						<div class="form__row">
							<input type="submit" value="Add Expense" name="add-expenses">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!-- /.wrapper -->

	<script type="text/javascript" src="script/scripts.js" charset="utf-8"></script>
</body>
</html>