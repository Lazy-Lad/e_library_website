<?php

session_start();

?>


<!DOCTYPE html>

<html>
    <head>
        <title>Forgotten Password</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
       <link rel="stylesheet" type="text/css" href="recover.css">
       <link rel="icon" href="images/forgot_password.png" type="image/icon type">

    </head>
    <body>

    <?php

        include 'connectToMySQL.php';

        if(isset($_POST['submit']))
        {
            $email = $_POST['email'];

            $emailquery= " select * from userdata where email = '$email' and status='active' ";
            $query=mysqli_query($con,$emailquery);

            $emailcount=mysqli_num_rows($query);

            if($emailcount)
            {

                $userdata=mysqli_fetch_array($query);

                $name=$userdata['name'];
                $token=$userdata['token'];

                $subject = "Password Reset";
                $body = "Hi, $name. Click here to reset your account
                http://localhost/e-lib/reset_password.php?token=$token ";
                $sender_email = "From: sameerkr679@gmail.com";

                if(mail($email,$subject,$body,$sender_email))
                {
                    $_SESSION['msg'] = "Check Your email to reset your account $email";
                    header('location:login.php');
                }
                        
                else
                {
                    ?>

                        <script>
                                alert("Email not send");
                        </script>

                    <?php
                }

            }

            else
            {
                ?>
                    <script>
                        alert("Invalid Email id ");
                    </script>
                <?php
            }

        }

        


    ?>

        <div class="box" id="usernameForLogin">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="login-text">
                    <h1>Recover Password</h1>
                </div>
                
                
                <div class="form-element">
                    <input type="text" name="email"  placeholder="Username">
                    <br><br>
                   <button type="submit" name="submit" class="btn btn-primary btn-block">Send Email</button>
                   
                </div>
            </form>
            <br><br><br>
           
           <p style="text-align:center;">Have an account? <a style="color:blue;" href="login.php">Login Here</a></p>
        </div>
        
        
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
</html>