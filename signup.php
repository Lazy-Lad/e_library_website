<?php

session_start();

?>


<!DOCTYPE html>

<html>
    <head>
        <title>Signup</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="signup.css">
        <link rel="icon" href="images/sign.png" type="image/icon type">
    </head>
    <body>

    <?php

        include 'connectToMySQL.php';

        if(isset($_POST['submit']))
        {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $cpassword=$_POST['confirmpassword'];
            $gender=$_POST['gender'];
            $branch=$_POST['branch'];
            $semester=$_POST['semester'];
            $mobile=$_POST['phone'];

            // $pass=password_hash($password, PASSWORD_BCRYPT);
            // $cpass=password_hash($cpassword, PASSWORD_BCRYPT);

            $token = bin2hex(random_bytes(15));

            $emailquery= " select * from userdata where email = '$email' ";
            $query=mysqli_query($con,$emailquery);

            $emailcount=mysqli_num_rows($query);

            if($emailcount>0)
            {
                ?>
                <script>
                    alert("Email id already exists.");
                </script>

                <?php
            }
            else
            {
                if($password==$cpassword)
                {
                    $insertquery= "INSERT INTO userdata (name, email, password, gender, branch, semester, mobileNo, token, status) 
                    VALUES ('$name','$email','$password','$gender','$branch','$semester','$mobile','$token','active') ";

                    $iquery = mysqli_query($con,$insertquery);

                    if($iquery)
                    {

                        $_SESSION['msg'] = "You may login now.";
                            header('location:login.php');

                        /*
                        $subject = "Email Activation";
                        $body = "Hi, $name. Click here to acctivate your account
                        http://localhost/e-lib/activate.php?token=$token ";
                        $sender_email = "From: sameerkr679@gmail.com";

                        if(mail($email,$subject,$body,$sender_email))
                        {
                            //$_SESSION['msg'] = "Check Your email to activate your account $email";
                            $_SESSION['msg'] = "You may login now.";
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
                        */
                        
                    }
                    else
                    {
                        ?>
                            <script>
                                alert("No insertion");
                            </script>

                        <?php
                    }
                }
                else
                {
                    ?>
                        <script>
                            alert("Password do not match");
                        </script>

                    <?php
                }
            }

        }

    ?>

        <div class="box"  id="usernameForLogin">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="login-text">
                    <h1>Register</h1>
                </div>
                <div class="filling_area">
                    <div class="form-element">
                        <label for="name">Name<span>*</span></label>
                        <input class="class_4_input" type="text" name="name" id="name">
                    </div>
                    <div class="form-element">
                        <label for="email">Email<span>*</span></label>
                        <input class="class_4_input" type="text" name="email" id="email" placeholder="example@email.com">
                    </div>
                    <!--
                    <div class="form-element">
                        <label for="username">Username<span>*</span></label>
                        <input class="class_4_input" type="text" name="username" id="usernameForSignup">
                    </div>
                -->
                    <div class="form-element">
                        <label for="password">Password<span>*</span></label>
                        <input class="class_4_input" type="password" name="password" id="passwordForSignup">
                    </div>
                    <div class="form-element">
                        <label for="confirmPassword">Confirm Password<span>*</span></label>
                        <input class="class_4_input" type="password" name="confirmpassword" id="confirmPassword">
                    </div>
                    
                    <div class="form-element">
                        <label  for="gender">Gender</label>
                        <select name="gender" class="class_4_input" >
                            <option value="M" name="gender">Male</option>
                            <option value="F" name="gender">Female</option>
                            <option value="O" name="gender">Other</other>
                        </select>
                    </div>
                    <div class="form-element">
                        <label for="branch">Branch<span>*</span></label>
                            <select class="class_4_input"  name="branch">
                                <option value="cse" name="branch">Computer Science And Engineering</option>
                                <option value="civil" name="branch">Civil Engineering</option>
                                <option value="mech" name="branch">Mechanical Engineering</option>
                                <option value="electrical" name="branch">Electrical Engineering</option>
                            </select>
                    </div>
                    <div class="form-element">
                        <label for="semester">Semester</label>
                        <select class="class_4_input" name="semester" class="list">
                            <option value="1" name="semester">1st</option>
                            <option value="2" name="semester">2nd</option>
                            <option value="3" name="semester">3rd</option>
                            <option value="4" name="semester">4th</option>
                            <option value="5" name="semester">5th</option>
                            <option value="6" name="semester">6th</option>
                            <option value="7" name="semester">7th</option>
                            <option value="8" name="semester">8th</option>
                        </select>
                    </div>
                
                    <div class="form-element">
                        <label for="phone">Mobile No.</label>
                        <input class="class_4_input" type="text" name="phone" id="phone" placeholder="eg. 1234567890">
                    </div>
                </div>
                <br>
                    <div class="button_container">
                        <div class="button_1">
                            <input class="button_1" type="submit" id="submitButton" name="submit" value="Sign Up">
                        </div>
                        <div class="button_1">
                            <input class="button_1"type="reset">
                        </div>
                    </div>
                        <br><br>
                        <div class="link_for_l"><a href="index.html">Home</a></div>
                        <div class="link_for_r"><a href="login.php"> Log In</a><span style="float:right; margin-right:10px;color:rgb(27, 27, 27)">Have an account?</span></div>
                                
                    </div>
            </form>
        </div>
        


        <script type="text/javascript">

            function isEmail(email)
            {
                var regex = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

                return regex.test(email);
            }

            $("#submitButton").click(function()
            {
                var errorMessage="";
                var fieldMissing="";

                if($("#name").val()=="")
                {
                    fieldMissing += " Name,"
                }

                if($("#usernameForSignup").val()=="")
                {
                    fieldMissing += " Username, ";
                }

                if($("#passwordForSignup").val()=="")
                {
                    fieldMissing += "Password,"
                }

                if($("#confirmPassword").val()=="")
                {
                    fieldMissing += " and Confirm password."
                }

                if(fieldMissing!="")
                {
                    errorMessage += "The following field(s) are missing: " + fieldMissing;
                }

                if(isEmail($("#email").val())==false)
                    errorMessage += " Your email address is not valid.";

                if($.isNumeric($("#phone").val())==false)
                    errorMessage += " Your mobile number is not valid.";

                if($("#passwordForSignup").val()!=$("#confirmPassword").val())
                    errorMessage+=" Your password don't match.";
                
                if(errorMessage != "")
                {
                    alert(errorMessage);
                }

            });
        
        </script>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
</html>