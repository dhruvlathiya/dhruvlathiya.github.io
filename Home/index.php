<html>

<head>
     <title>
          Moviesmint
     </title>
</head>

<body>

<?php
	$error = $_GET['error'];
	if(isset($error))
	echo "<script>alert('$error')</script>";
?>

<?php
    include '../db.php';
    session_start();
    $pass = $_SESSION["cpass"];
    $password = $_SESSION["cpassword"];

    // echo $pass;
    // echo $password;

    if($password != $pass || is_null($password))
    {
        //$a = "Error!!!";
        $error = "Incorrect Email or Password...";
        header("location: ../index.php?error=$error");
        //header("location: index.php");
    }
?>

<?php
        $adpass = $_SESSION["pass"];
        $adpassword = $_SESSION["password"];

        // echo $pass;
        // echo $password;

        if($adpassword = $adpass && isset($adpassword))
        {
          $adminlogin=1;
        }
        else{
          $adminlogin=0;
        }
    ?>


<center>
<div>
<h1>MoviesMint</h1>
<h2>Download Movies from <a href="#" target="_blank">Moviesmint</a></h2>
</div>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
	<input type="search" name="search" required>
	<button type="submit">
		<span>Search</span>
	</button>
</form>

<br>

     <table border="1">
          <tr>
               <!--<th>
                    Movies ID
               </th>-->
               <th>
                    Movies Name
               </th>
               <th>
                    Year
               </th>
               <th>
                    Plot
               </th>
               <th>
                    480p
               </th>
               <th>
                    720p
               </th>
               <?php
                    if($adminlogin==1)
                    {
                         echo "<th>Edit</th>";
                         echo "<th>Delete</th>";
                    }
               ?>
          </tr>
          <?php

               //Connection already done...

               $s=$_GET["search"]; //receiving searched value 

               if(isset($s))
               {
                $cmd = "SELECT ID,title,year,plot,one,two FROM `movies` WHERE `title` LIKE '%$s%' OR `plot` LIKE '%$s%';";
               }
               else
               {
                $cmd = "SELECT ID,title,year,plot,one,two FROM `movies`;";
               }
               

               $query = mysqli_query($con, $cmd);

               while($row=mysqli_fetch_array($query))
               {
                    $mid=$row[ID];
                    $mname=$row[title];
                    $yr=$row[year];
                    $mplot=$row[plot];
                    $one= $row[one];
                    $two= $row[two];
          ?>
          <tr>
               <!--<td>
                    <?php echo $mid; ?>
               </td>-->
               <td>
                    <?php echo $mname; ?>
               </td>
               <td>
                    <?php echo $yr; ?>
               </td>
               <td>
                    <?php echo $mplot; ?>
               </td>
               <td>
                    <?php 
                         if($one=='corrupted' || $one=='0')
                         echo "<a href='http://moviesmeet.site/?s=$mname' target='_blank'><button>Corrupted</button></a>"; 
                         else
                         echo "<a href='$one' target='_blank'><button>Download 480p</button></a>";
                    ?>
               </td>
               <td>
                    <?php 
                         if($two=='corrupted' || $two=='0')
                         echo "<a href='http://moviesmeet.site/?s=$mname' target='_blank'><button>Corrupted</button></a>"; 
                         else
                         echo "<a href='$two' target='_blank'><button>Download 720p</button></a>";
                    ?>
               </td>

               <?php
                    if($adminlogin==1)
                    {
                         echo "<td><a href='edit.php/?edit=$mid' onclick='updateRec()'><button>Edit</button></a></td>";

                         // function updateRec(){
                         //      $_SESSION["title"] = "$mname";
                         //      $_SESSION["year"] = "$yr";
                         //      $_SESSION["plot"] = "$mplot";
                         //      $_SESSION["url"] = "$dl";
                         // }

                         echo "<td><a onclick='deleteRec()'><button>Delete</button></a></td>";

                         echo '<script>function deleteRec() {';
                         echo 'var ask = window.confirm("Are you sure you want to delete this record?");';
                         echo 'if (ask) {';
                         echo "window.location.href = 'delete.php/?delete=$mid';";
                         echo '}';
                         echo '}</script>';

                    }
               ?>
               
          </tr>
          <?php } ?> <!-- While loop from here been exited -->
          <tr>
               <td colspan="6">
                    <?php echo mysqli_num_rows($query)." Movies Found"; ?>
               </td>
          </tr>
     </table>
     <br><br> <a href='logout.php'>Logout</a>
     <br><br> <a href='../Admin'>Admin</a>
     <center>
</body>

</html>