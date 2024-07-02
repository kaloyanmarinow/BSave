<!DOCTYPE html>
<html>
<head>
	<title>BSave</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

	<link rel="stylesheet" href="css/contact.css">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="icon" type="image/png" href="css/images/favicon.ico"/>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Gochi+Hand&family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<div class="wrapper">
		<div class="wrapper__aside"></div>

		<header class="header header--contacts">
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
							echo '<div class="header__balance">';
								require_once('classes/config.php');

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

		<div class="section-contacts">
			<div class="shell section__shell">
				<div class="section__info">
					<div class="section__entry">
						<p>Elena Raycheva</p>

						<a href="mailto:elenaraycheva23@gmail.com">
							<i>
								<img src="css/images/envelope.svg" alt="">
							</i>

							elenaraycheva23@gmail.com
						</a>

						<a href="tel:0885355650">
							<i>
								<img src="css/images/phone.svg" alt="">
							</i>

							+(359)88 5355 650
						</a>
					</div>

					<div class="section__entry">
						<p>Oktay Osman</p>

						<a href="mailto:oktai.osman21@gmail.com">
							<i>
								<img src="css/images/envelope.svg" alt="">
							</i>

							oktai.osman21@gmail.com
						</a>

						<a href="tel:0898982693">
							<i>
								<img src="css/images/phone.svg" alt="">
							</i>

							+(359)89 8982 693
						</a>
					</div>

					<div class="section__entry">
						<p>Kaloyan Marinov</p>
						
						<a href="mailto:kaloyanmarinow@gmail.com">
							<i>
								<img src="css/images/envelope.svg" alt="">
							</i>

							kaloyanmarinow@gmail.com
						</a>

						<a href="tel:0897009280">
							<i>
								<img src="css/images/phone.svg" alt="">
							</i>

							+(359)89 7009 280
						</a>
					</div>
				</div>

				<div class="section__title">
					<h2>Contact with us</h2>
				</div>
			</div>
		</div>
	</div><!-- /.wrapper -->
</body>
</html>