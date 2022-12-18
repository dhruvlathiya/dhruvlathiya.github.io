<?php
    $email = $_POST['email'];

    $password = $_POST['password'];
    
    include '../db.php';

    $cmd = "select Password from admin WHERE Email='$email';";
    $query = mysqli_query($con, $cmd);
    $row=mysqli_fetch_array($query);
    $pass=$row[Password];
    //echo "My Password is $pass";
    if($password != $pass || is_null($password))
    {
        //$a = "Error!!!";
        $b = "Incorrect Email address or Password";
        header("location: index.php?b=$b");
        //header("location: index.php");
    }
    else
    {
        session_start();
        $_SESSION["pass"] = "$pass";
        $_SESSION["password"] = "$password";
        //echo "<input type='hidden' name='logindata' value='$password'>";
        header("location: setmovie.php");
    }
    
?>