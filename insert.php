<?php
session_start();

if(!isset($_SESSION['username']))
{
  ?>
  <script>
    alert("You are logged out");
  </script>
  <?php
  header('location:login.php');
}

?>

<?php

include 'connectToMySQL.php';

echo $_SESSION['detail'];

?>

<html>
  <head>
</head>
<body>
  <a href="cse.php">CSE</a>
</body>
</html>