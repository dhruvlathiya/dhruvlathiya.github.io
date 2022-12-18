


<html>
    <head>
        <title>Post Movie</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <?php
        session_start();
        $pass = $_SESSION["pass"];
        $password = $_SESSION["password"];

        // echo $pass;
        // echo $password;

        if($password != $pass || is_null($password))
        {
            //$a = "Error!!!";
            $b = "Incorrect Email address or Password";
            header("location: index.php?b=$b");
            //header("location: index.php");
        }
    ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table>
            <tr>
                <th>
                    Movie Name:
                </th>
                <td>
                    <input type="text" name="title">
                </td>
            </tr>
            <tr>
                <th>
                    Release Year:
                </th>
                <td>
                    <input type="text" name="year">
                </td>
            </tr>
            <tr>
                <th>
                    Plot:
                </th>
                <td>
                    <input type="radio" name="plot" value="Hollywood"> Hollywood <br>
                    <input type="radio" name="plot" value="Bollywood"> Bollywood
                </td>
            </tr>
            <tr>
                <th>
                    Download Link 480p:
                </th>
                <td>
                    <textarea name="one" rows="4"></textarea>
                </td>
            </tr>

            <tr>
                <th>
                    Download Link 720p:
                </th>
                <td>
                    <textarea name="two" rows="4"></textarea>
                </td>
            </tr>

            <tr>
                <td>
                    
                </td>
                <td>
                    <input type="submit" value="Send">
                </td>
            </tr>
            <tr>
                <td>
                    <br><a href='logout.php'>Logout</a>
                </td>
                <td>
                    <br><a href='../index.php'>View Movies</a>
                </td>
            </tr>
        </table>
    </form>



    </body>
</html>
<?php

    $title=$_POST['title'];
    $year=$_POST['year'];
    $plot=$_POST['plot'];
    $one=$_POST['one'];
    $two=$_POST['two'];


    // echo $title;
    // echo $year;
    // echo $plot;
    // echo $url;

    include '../db.php';

    $cmd = "INSERT INTO movies(title,year,plot,one,two) VALUES ('$title','$year','$plot','$one','$two');";
    

if(isset($title) && isset($plot))
{
    $query = mysqli_query($con,$cmd);
    if($query)
    {
        echo "Data sucessfully submitted / True = $query";
    }
    else
    {
        echo "Data not submitted = $query";
    }
}
    
?>
