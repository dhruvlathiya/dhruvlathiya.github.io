<!DOCTYPE html>
<html>
<head>
	<title>Moviesmint - Login</title>
</head>
<body>
	<?php
	$msg = $_GET['msg'];
	if(!is_null($msg))
	echo "<script>alert('$msg')</script>";
	else{}
	?>
	<?php
	$error = $_GET['error'];
	if(!is_null($error))
	echo "<script>alert('$error')</script>";
	?>

	<form method="post" action="login.php">
        <table>
            <tr>
                <td>
                    <h3>LOGIN</h3>
                </td>
            </tr>
            <tr>
                <td>
					<input type="email" name="loginemail" placeholder="Email" required="">
                </td>
            </tr>
            <tr>
                <td>
					<input type="password" name="loginpass" placeholder="Password" required="">
                </td>
            </tr>
            <tr>
                <td>
					<input type="submit" value="Login">
                </td>
            </tr>
        </table>
    </form>



	<form method="post" action="registration.php">
        <table>
            <tr>
                <td>
                    <h3>SIGN UP</h3>
                </td>
            </tr>
            <tr>
                <td>
					<input type="text" name="suuname" placeholder="User name" required="">
                </td>
            </tr>
            <tr>
                <td>
					<input type="email" name="suemail" placeholder="Email" required="">
                </td>
            </tr>
			<tr>
                <td>
					<input type="password" name="supass" placeholder="Password" required="">
                </td>
            </tr>
            <tr>
                <td>
					<input type="submit" value="Sign up">
                </td>
            </tr>
        </table>
    </form>

<?php
	session_start();
    $pass = $_SESSION["cpass"];
    $password = $_SESSION["cpassword"];

    // echo $pass;
    // echo $password;

    if($password = $pass || isset($password))
    {
        header("location: Home");
    }
?>

</body>
</html>
  