<?php

session_start();

include 'connectToMySQL.php';

if(isset($_GET['token']))
{
    $token = $_GET['token'];

    $updatequery = " UPDTAE userdata set status='active' where token='$token' ";

    $query = mysqli_query($con,$updatequery);

    if($query)
    {
        if(isset($_SESSION['msg']))
        {
            $_SESSION['msg'] = "Account updated successfully";
            header('location:login.php');
        }
        else
        {
            $_SESSION['msg'] = "You are logged out.";
            header('location:login.php');
            
        }
    }
    else{
        $_SESSION['msg'] = "Account can't updated";
        header('location:signup.php');

    }
}

?>