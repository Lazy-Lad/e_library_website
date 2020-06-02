<?php

session_start();
ob_start();

?>


<!DOCTYPE html>

<html>
    <head>
        <title>Reset Password</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
       <link rel="stylesheet" type="text/css" href="recover.css">
       <link rel="icon" href="images/recover.png" type="image/icon type">
    </head>
    <body>

    <?php

        include 'connectToMySQL.php';

        if(isset($_POST['submit']))
        {

            if(isset($_GET['token']))
            {
                $token = $_GET['token'];

            $newpassword=$_POST['password'];
            $cpassword=$_POST['cpassword'];

            if($newpassword==$cpassword)
            {
                $updatequery="UPDATE userdata set password='$newpassword' where token='$token' ";

                $iquery=mysqli_connect($con,$updatequery);

                if($iquery)
                {
                    $_SESSION['msg'] = "Your password has been updated.";

                    header('location:login.php');
                }
                else
                {
                    $_SESSION['passmsg']="Your password has not been updated.";
                    header('location:reset_password.php');
                }
            }

            else
            {
                $_SESSION['passmsg']="Your password is not matching.";

            }
        }
        else
        {
            ?>
            <script>
                alert("No token found");
            </script>
            <?php
        }
    }

    ?>

        <div class="box" id="usernameForLogin">
            <form action="" method="POST">
                <div class="login-text">
                    <h1>Recover Password</h1>
                </div>
               <p class="big-info text-white px-5" style="background:red;"> <?php 
               
               if(isset($_SESSION['passmsg']))
               {
                echo $_SESSION['passmsg']; 
               }
               else
               {
                echo $_SESSION['passmsg']=""; 
               }
               
               
               ?> </p>

                <div class="form-element">
                    <input type="password" name="password"  placeholder="New Password">
                    <input type="password" name="cpassword"  placeholder="Confirm Password">
                    <br><br>
                   <button type="submit" name="submit" class="btn btn-primary btn-block">Update Password</button>
                   
                </div>
            </form>
            <br><br>
           
           <p style="text-align:center;">Have an account? <a style="color:blue;" href="login.php">Login Here</a></p>
        </div>
        
        
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
</html>