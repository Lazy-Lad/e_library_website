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

<!DOCTYPE html>

    <head>
        <title>E Library</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="icon" href="images/digital.png" type="image/icon type">
        <link rel="stylesheet" type="text/css" href="style-elib.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800;900&display=swap" rel="stylesheet">
    </head>
<body>
    <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
          <div class="bg-dark p-4">
            <div class="menu-bar"><a href="index.html">Home</a></div>
            <div class="menu-bar"><a href="cse.php">Computer Science And Engineering</a></div>
            <div class="menu-bar"><a href="civil.php">Civil Engineering</a></div>
            <div class="menu-bar"><a href="mech.php">Mechanical Engineering</a></div>
            <!-- <div class="menu-bar"><a href="elect.php">Electronics</a></div> -->
            <div class="menu-bar"><a href="help.html">Help & Feedback Center</a></div>
            <div class="menu-bar"><a href="aboutus.html">About Us</a></div>
            <div class="menu-bar"><a href="logout.php">Logout</a></div>
          </div>
        </div>
        <nav class="navbar navbar-dark bg-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </nav>
      </div>

      <div class="header">
        <div id="title">
          E-Library
        </div>
        <div id="hide-small" class="username-show">
          <p>Welcome</p>
        </div>
      </div>
      <div class="content">
        <p>Digital libraries are systems providing user with coherent access to a very large, organized repository of information and knowledge Digital library is a global virtual library. The library of thousands of networked electronic libraries from the down of civilization, the intellectual brains have poured their omniscience in different directions in shape of print and non-print form to enlightened mass to explore multifarious research and development. Several terms have been coined at different times to represent the concept of library without books. </p>
        <p>Digital libraries are logical extension and augmentations of physical library. They extend and augment their physical counterparts by extending existing resources and services and enable development of new possibilities for information access and Retrieval in other worlds Electronic library based on digitalized data is text replacing the paper based records and that is why with the help of networking one can have access to resources round the clock.</p>
        <p>From this platform we are providing books and other resources to help students and faculties of our college. This a small initative form us developers, If we want to help each other this platform will certainly help. <br>With help of yours this can become a great project.</p>
        <div>
          <div id="hide-small">
            You can always Download resources form here. You just have be logged in on our server.
            <div class="branch_poster_container">
              <div id="float_property"class="card">
                <div class="front ">
                  <img src="images/CSE.jpg" alt="Computer science">
                  <div class="centered">CSE</div>
                </div>
                <div class="back">
                  <div id="bg_cl_1" class="back-content middle">
                    <p>You can download,<br>Computer science <br> material from here.</p>
                    <a id="bck_lnk_prp" href="cse.php">Visit page</a>
                  </div>
                </div>
              </div> 
              <div id="float_property"class="card">
                <div class="front ">
                  <img src="images/mech.jpg" alt="Mechanical Engineering">
                  <div class="centered">Mech.</div>
                </div>
                <div class="back">
                  <div id="bg_cl_2" class="back-content middle">
                    <p>You can download Mechanical Engineering material from here.</p>
                    <a id="bck_lnk_prp" href="mech.php">Visit page</a>
                  </div>
                </div>
              </div> 
              <div id="float_property"class="card">
                <div class="front ">
                  <img  src="images/civil.jpg" alt="Civil Engineering">
                  <div class="centered">Civil</div>
                </div>
                <div class="back">
                  <div id="bg_cl_3" class="back-content middle">
                    <p>You can download <br> Civil Engineering <br> material from here.</p>
                      <a id="bck_lnk_prp" href="civil.php">Visit page</a>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
        

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>