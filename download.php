
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="images/digital.png" type="image/icon type">                         
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="download.css">
    <link rel="stylesheet" type="text/css" href="style/cse.css">
    <title>Download</title>
</head>
<body>
    
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
    <script id="alert_mobile">
        $(document).ready(function() {
            function checkWidth() {
              var windowSize = $(window).width();
              if (windowSize < 850) {
                alert("Downlod file is not optimized for mobile view.\nwe are working on it.\nSorry for inconvenience.");
                console.log("screen width is less than 850px");
              }
            }
            // Execute on load
            checkWidth();
            // Bind event listener
            $(window).resize(checkWidth);
          });
    </script>



<p id="file">File List</p>
    
  <br>
  
  <div class="container">
  <table id="list">
    <tbody>
  
  </tbody>
  </table>
  </div>
  
  
    
    
    <script>
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
    
    <script src="https://www.gstatic.com/firebasejs/7.14.4/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.4/firebase-analytics.js"></script>
    
    
    <script>
      // Your web app's Firebase configuration
      var firebaseConfig = {
        apiKey: "AIzaSyD0JbE50ZDbXL3D27OZBy1ZH18ffwHRlZQ",
        authDomain: "cse-year1.firebaseapp.com",
        databaseURL: "https://cse-year1.firebaseio.com",
        projectId: "cse-year1",
        storageBucket: "cse-year1.appspot.com",
        messagingSenderId: "170999489227",
        appId: "1:170999489227:web:8bd0fcd2db08a5581c714e",
        measurementId: "G-X0RNF8KF0M"
      };
      // Initialize Firebase
      firebase.initializeApp(firebaseConfig);
      firebase.analytics();
    </script>
    <script  type="text/javascript">
    
    function upload() {
        //get your select image
        var image=document.getElementById("image").files[0];
        //now get your image name
        var imageName=image.name;
        //firebase  storage reference
        //it is the path where yyour image will store
        var storageRef=firebase.storage().ref('images/'+imageName);
        //upload image to selected storage reference
    
        var uploadTask=storageRef.put(image);
    
        uploadTask.on('state_changed',function (snapshot) {
            //observe state change events such as progress , pause ,resume
            //get task progress by including the number of bytes uploaded and total
            //number of bytes
            var progress=(snapshot.bytesTransferred/snapshot.totalBytes)*100;
            console.log("upload is " + progress +" done");
            document.getElementById("progress").innerHTML="upload is " + progress + " done ";
        },function (error) {
            //handle error here
            console.log(error.message);
        },function () {
           //handle successful uploads on complete
    
            uploadTask.snapshot.ref.getDownloadURL().then(function (downlaodURL) {
                //get your upload image url here...
                console.log(downlaodURL);
                document.getElementById("link").innerHTML=downlaodURL;
                location.replace('cse.php');
            });
        });
    }
    
    </script>
    
    <script type="text/javascript" src="firebase.js"></script>
</body>
</html>