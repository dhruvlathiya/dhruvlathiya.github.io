<html>
    <head>
      <title>Login Moviesmeet</title>
    </head>
    <body>
    <form method="post" action="dashboard.php">
    <center>
  <h3>LOGIN</h3>
<?php
$er = $_GET['b'];
if(!is_null($er))
echo "<div style='padding: 10px; margin: 10px; color: #ba3939; background: #ffe0e0; border: 1px solid #a33a3a;'>$er</div><br>";

?>
  
  <input type="email" name="email" placeholder="Email / Username" required/><br>
  <input type="password" name="password" placeholder="Password" required/><br><br>
  <button type="submit">Log in</button>
</center>
  
</form>

<?php
	session_start();
    $pass = $_SESSION["pass"];
    $password = $_SESSION["password"];

    // echo $pass;
    // echo $password;

    if($password = $pass || isset($password))
    {
        header("location: setmovie.php");
    }
?>
        
    </body>
</html>

