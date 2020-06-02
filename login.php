<?php

session_start();

?>


<!DOCTYPE html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="login.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="icon" href="images/login.jpg" type="image/icon type">
    </head>
    <body>
    
    <?php

        include 'connectToMySQL.php';

        if(isset($_POST['submit']))
        {
            $email = $_POST['email'];
            $password = $_POST['password'];

           

            $emailquery= " select * from userdata where email = '$email' and status='active' ";
            $query=mysqli_query($con,$emailquery);

            $emailcount=mysqli_num_rows($query);

            if($emailcount)
            {
                $email_pass=mysqli_fetch_assoc($query);

                $db_pass=$email_pass['password'];

                // $pass_decode=password_verify($password,$db_pass);

                $_SESSION['username']=$email_pass['name'];

                if($password==$db_pass)
                {
                    echo"";
                    ?>
                        <script>
                            location.replace("elibrary.php");
                        </script>
                    <?php
                }
                else
                {
                    ?>
                        <script>
                            alert("Password Incorrect ");
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
                    <h1>Login</h1>
                </div>
                <div >
                    <p class="bg-success text-white px-4" style="text-align:center;"> 
                    
                    <?php
                    
                        if(isset($_SESSION['msg']))
                        {
                            echo $_SESSION['msg'];
                        }

                        else
                        {
                           echo $_SESSION['msg'] = "You are logged out. Please login again.";
                        }
                    
                    ?> </p>
                </div>
                <div class="form-element">
                    <input class="class_4_input" type="text" name="email" id="username-login" placeholder="Username">
                    <br>
                    <input class="class_4_input" type="password" name="password" id="password" placeholder="Password">
                    <p><input class="submitButton" type="submit" id="submitButtonForLoginUsername" name="submit" value="Login"></p>
                    <br><br>
                    <div class="link_for_l"><a href="index.html">Home</a></div>
                    <div a class="link_for_r"><a  href="signup.php">Sign Up Here</a></div>
                </div>
            </form>
            
           
            
            <!--
                <a href="recover_email.php" style="float: right;padding-right: 5px;">Forgottten Password</a>
                    -->
            </div>
        
        


        <script type="text/javascript">
            $("#submitButtonForLoginUsername").click(function()
            {
                var errorMessage="";
                var fieldMissing="";

                if($("#username-login").val()=="")
                {
                    fieldMissing += " Username ";
                }

                if($("#password").val()=="")
                {
                    fieldMissing += " and password."
                }

                if(fieldMissing !="")
                {
                    errorMessage += "Invalid " + fieldMissing + "!!";
                }

                if(errorMessage != "")
                {
                    alert(errorMessage);
                }

                else
                {
                    $("#usernameForLogin").hide();
                }
            });
        
        </script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>