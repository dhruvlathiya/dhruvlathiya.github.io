<?php
		// $username = $_POST['suuname'];
		$email = $_POST['loginemail'];
		$password = $_POST['loginpass'];
		include 'db.php';
		$cmd = "select Password from subscribers WHERE Email='$email';";
		$query = mysqli_query($con,$cmd);

		$row=mysqli_fetch_array($query);
		$pass=$row[Password];

		if($password == $pass)
		{
			//$msg = "welcome here";
			session_start();
			$_SESSION["cpass"] = "$pass";
			$_SESSION["cpassword"] = "$password";
			header("location: Home");
			// echo "SQL's Password $pass";
			// echo "User typed Password $password";
		}
		else
		{
			$error = "Incorrect Email or Password...";
			header("location: index.php?error=$error");
		}
			
?>