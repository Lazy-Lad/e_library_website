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

<html>
<head>
    <title>Electrical Library</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="icon" href="images/digital.png" type="image/icon type">

    <link rel="stylesheet" type="text/css" href="style/cse.css">
</head>
<body>



<div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
          <div class="bg-dark p-4">
            <div class="menu-bar"><a href="elibrary.php">Home</a></div>
            <div class="menu-bar"><a href="cse.php">Computer Science And Engineering</a></div>
            <div class="menu-bar"><a href="civil.php">Civil Engineering</a></div>
            <div class="menu-bar"><a href="mech.php">Mechanical Engineering</a></div>
            <div class="menu-bar"><a href="elect.php">Electronics</a></div>
            <div class="menu-bar"><a href="help.html">Help Center</a></div>
            <div class="menu-bar"><a href="logout.php">Logout</a></div>
          </div>
        </div>
        <nav class="navbar navbar-dark bg-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </nav>
      </div>

<div class="branch-name">
        <p>Electrical Engineering</p>
</div>

<div class="detail-branch">
        <p>Electrical engineering is one of the newer branches of engineering. It deals with the study of application of electricity, electronics and electromagnetism. Electrical engineers work on broad range of components, from tiny microchips to huge power station generators. Engineers need to have a depth knowledge of electrical and electronic theory, mathematics and materials. They have started depending on computer aided design systems (CAD) to create schematics and circuits.
        <br>They need to study core subjects like electromagnetism, control systems, transmission and distribution, instrumentation, microprocessor interfacing, electrical engineering materials, etc.
        <br>The demand of qualified electrical engineers are high as most of the industries use electricity and electric machines. 

        </p>
</div>
<br>
<div class="container mt-3 border-file-upload" >
<p class="upload">Upload File</p>

    <form action="" method="POST" enctype="multipart/form-data">
    <!--
    <p>Detail: &emsp; &emsp;  <input type="text" id="detail" name="detail"></p>
    <label for="year">Year</label>
                    <select name="year" class="list" id="year">
                        <option value="1" name="year">1</option>
                        <option value="2" name="year">2</option>
                        <option value="3" name="year">3</option>
                        <option value="4" name="year">4</option>
                    </select>
-->
        <div class="custom-file mb-3">
      <input type="file" class="custom-file-input" id="image" name="file">
      <label class="custom-file-label" for="customFile">Choose file</label>
      <p style="color:red;">Note: Give a proper name to file. </p>
    </div>
    
    
    <br><br>
    
<div class="container">
    <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">?</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">File Upload Help</h4>
        </div>
        <div class="modal-body">
          <p>You can upload any books, class notes, question paper or anything else but it should be study material.<br>If you want to upload multiple images related to specific topic then you should make a zip folder containing all the images.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

        
    <div class="mt-3">
      <button type="button" name="submit" class="btn btn-primary" onclick="upload()">Submit</button>
    </div>
    </form>
    <div class="progress">
      <p id="progress"></p>
    </div>
    <div class="link">
      <p id="link" name="link"></p>
    </div>
</div>

<br><br>

<p id="file">File List</p>

<br><br>

<div class="container">
<table id="list">
  <tbody>

</tbody>
</table>
</div>

<style>

#file
{
  background-color:#D0D3D4;
  margin:5px;
  text-align:center;
  font-size:40px;
  font-weight:bold;
}

table,th,td
{
  
  border: 1px solid black;
  text-align: center;
  width: 80%;
  padding:5px;
  height: 90px;
  margin: 5px;
}

  </style>


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
    apiKey: "AIzaSyDU56oRR9sTWAfP8u8KqroxoZPLtPDU7do",
    authDomain: "elect-bc56e.firebaseapp.com",
    databaseURL: "https://elect-bc56e.firebaseio.com",
    projectId: "elect-bc56e",
    storageBucket: "elect-bc56e.appspot.com",
    messagingSenderId: "692043018634",
    appId: "1:692043018634:web:130205f5491d7351365873",
    measurementId: "G-X3V40CV6C3"
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
            location.replace('elect.php');

        });
    });
}

</script>

<script type="text/javascript" src="firebase.js"></script>

</body>
</html>