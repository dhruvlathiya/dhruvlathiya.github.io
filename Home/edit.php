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

    include '../db.php';
    $recid = $_GET['edit'];
    
    // $mname = $_SESSION["title"];
    // $yr = $_SESSION["year"];
    // $mplot = $_SESSION["plot"];
    // $dl = $_SESSION["url"];
?>
<html>
    <head><title>Edit Record <?php echo $recid; ?></title></head>
    <body>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table>
            
            <tr>
                <th>
                    Movie Record ID:
                </th>
                <td>
                    <?php echo $recid; ?>
                </td>
            </tr>
            <tr>
                <th>
                    Movie Name:
                </th>
                <td>
                    <input type="text" name="title" value="<?php echo $mname; ?>">
                </td>
            </tr>
            <tr>
                <th>
                    Release Year:
                </th>
                <td>
                    <input type="text" name="year" value="<?php echo $yr; ?>">
                </td>
            </tr>
            <tr>
                <th>
                    Plot:
                </th>
                <td>
                    <?php 
                        if($mplot==Hollywood)
                        {
                            echo "<input type='radio' name='plot' value='Hollywood' checked> Hollywood <br>
                            <input type='radio' name='plot' value='Bollywood'> Bollywood";
                        }
                        else
                        {
                            echo "<input type='radio' name='plot' value='Hollywood'> Hollywood <br>
                            <input type='radio' name='plot' value='Bollywood' checked> Bollywood";
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <th>
                    Download Link:
                </th>
                <td>
                    <textarea name="url" rows="4"><?php echo $dl; ?></textarea>
                </td>
            </tr>
            
            <tr>
                <td>
                    
                </td>
                <td>
                    <input type="submit" value="Update Record">
                </td>
            </tr>
            
        </table>
    </form>
    </body>
</html>