<?php
		$username = $_POST['suuname'];
		$email = $_POST['suemail'];
		$password = $_POST['supass'];


		include 'db.php';

		$cmd = "INSERT INTO subscribers(Username, Email, Password) VALUES('$username','$email','$password');";
		$query = mysqli_query($con,$cmd);

		if(!$query)
		{
             //$msg = "<div style='padding: 10px; margin: 10px; color: #ba3939; background: #ffe0e0; border: 1px solid #a33a3a;'>$msg</div><br><br>";
             $msg = "Registration Failed. May be Email or Username has been already used.";
             header("location: index.php?msg=$msg");
		}
		else
		{
            //$msg = "<div style='padding: 10px; margin: 10px; color: #ba3939; background: #11ff11; border: 1px solid #a33a3a;'>$msg</div><br><br>";
            $msg = "Successfully Registerd. Now you can Login.";
            header("location: index.php?msg=$msg");
		}
	?>