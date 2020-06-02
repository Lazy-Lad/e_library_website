<!-- <?php
// session_start();

// if(!isset($_SESSION['username']))
// {
//   ?>
//   <script>
//     alert("You are logged out");
//   </script>
//   <?php
//   header('location:login.php');
// }

?> -->

<html>
<head>
    <title>Mechanical Engineering Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="images/digital.png" type="image/icon type">                         
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/cse.css">
    
</head>
<body >



<div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
          <div class="bg-dark p-4">
            <div class="menu-bar"><a href="index.html">Home</a></div>
            <div class="menu-bar"><a href="cse.php">Computer Science And Engineering</a></div>
            <div class="menu-bar"><a href="civil.php">Civil Engineering</a></div>
            <div class="menu-bar"><a href="mech.php">Mechanical Engineering</a></div>
            <div class="menu-bar"><a href="aboutus.html">About Us</a></div>
            <div class="menu-bar"><a href="help.html">Help & Feedback Center</a></div>
            <div class="menu-bar"><a href="logout.php">Logout</a></div>
          </div>
        </div>
        <nav class="navbar navbar-dark bg-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </nav>
      </div>

  <div class="main_container">
    <div class="branch-name">
            <p>Mechanical Engineering</p>
    </div>
    <p id="hide-btn_up" style="margin-bottom: 0" class="detail-branch">You can upload or download<br>files from here.</p>
      <div id="hide-btn_up" class="buttons">
        
        <div id="float_prp" class="btn_ds"><a href="upload.php">Upload</a></div>
        <div class="btn_ds"><a href="download.php">Download</a></div>
      </div>
      <div class="detail-branch">
        <p>Mechanical engineering is one of the most varied and versatile engineering fields. It is the evergreen branch among all other branches of engineering. It deals with the concept of thermodynamics, robotics, kinematics, refrigeration, air conditioning sector, aero scope, etc. Mechanical engineers design everything from things of daily use to things of occasional use, from air conditioners to personal computers, tablets, mobile phones, etc, from medical equipment to equipment of wars. Its nearly impossible to imagine our life without mechanical engineers. They serve a key role in accelerating our life.
        <br>Subjects like machine drawing, electrical machines, solid mechanics, thermodynamics, engineering drawing along with maths, physics, chemistry are included in their curriculum. 
        <br>Scope of mechanical engineers are wide in India both in government as well as private sector.

        </p>
      </div>
    <br>
    <p id="hide-btn_dwn" style="margin-bottom: 0" class="detail-branch">You can upload or download files from here.</p>
    <div id="hide-btn_dwn" class="branch_poster_container">
      <div id="float_property"class="card">
        <div class="front front_content">
          <div class="centered">Upload</div>
        </div>
        <div class="back">
          <a href="upload.php">
            <div id="bg_cl" class="back-content middle">
              <div class="centered">
                <img src="https://img.icons8.com/material/50/000000/upload-2--v1.png"/>
              </div>
            </div>
          </a>
        </div>
      </div> 
      <div id="float_property"class="card">
        <div class="front front_content">
          <div class="centered">Download</div>
        </div>
        <div class="back">
          <a href="download.php">
            <div id="bg_cl" class="back-content middle">
              <div class="centered">
              <img src="https://img.icons8.com/material/50/000000/download-2--v1.png"/>
              </div>
            </div>
          </a>
        </div>
      </div> 
    </div>
  </div>
</body>
</html>