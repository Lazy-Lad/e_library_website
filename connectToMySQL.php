<?php

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'elibrary';

    //$con = mysqli_connect($server,$user,$password,$db);

    

    if(mysqli_connect($server,$user,$password,$db))
    {
        echo "connection";
    }
    else
    {
        ?>

        <script>

            alert("No Connection. Try again later..");
        </script>
        <?php
    }


?>