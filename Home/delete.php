
<?php
	session_start();
    $pass = $_SESSION["pass"];
    $password = $_SESSION["password"];

    // echo $pass;
    // echo $password;

    if($password != $pass || is_null($password))
    {
        $error = "You are not admin, Only Admins allowed to do this.";
		header("location: index.php?error=$error");
    }
    // else
    // {
	//     echo "<script>alert('Are you sure you want to delete record?')</script>";
    // }

    include '../db.php';
    $recid = $_GET['delete'];

    $cmd = "DELETE FROM movies WHERE ID='$recid';";
    $query = mysqli_query($con, $cmd);

    if($query)
    echo "Record no $recid has been successfully deleted.";
    else
    echo "Error! Record no $recid has not been deleted.";

    echo "<br><br><a href='../index.php'>Back</a>";
?>