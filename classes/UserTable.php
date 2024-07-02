<?php

require_once('User.php');

class UserTable extends User {

	function register($userObj) {
		$name = $userObj->getName();
		$username = $userObj->getUsername();
		$password = $userObj->getPassword();
		
		require_once('config.php');
     
        $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
		$result = mysqli_query($dbConn, $user_check_query);
		$user = mysqli_fetch_assoc($result);

		if ($user && $user['username'] === $username) {
			echo "<p class='error-msg'>Username already exists!</p>";
		} else {
			$sql = "INSERT INTO users (name, password, username)
				VALUES ('$name', '$password', '$username')";

			mysqli_query($dbConn,$sql);

			echo "<p class='info-msg'>User added! Please <a href='login.php'>login</a></p>";
		}
	}

	function login($userObj) {  
		include 'config.php';

		$username = $userObj->getUsername();
		$password = $userObj->getPassword(); 
		$user_check_query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$check = mysqli_query($dbConn, $user_check_query);  
		$data = mysqli_fetch_array($check);  
		$result = mysqli_num_rows($check);

		$user_check_id = "SELECT id_user FROM users WHERE username='$username' LIMIT 1"; 
		$check_id = mysqli_query($dbConn, $user_check_id);  
		$data_id = mysqli_fetch_array($check_id);
		$logged = false;

		if ($result == 1) {  
			$user_id = (int)$data_id[0];
			$_SESSION['user_id'] = $user_id;

			header("Location: http://localhost/BSave/home.php"); 
			exit();
			return true;  
		} else {  
			echo "<p class='error-msg'>Wrong username or password!</p>";
			return false;  
		}  
    }  
}

?>