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
    <title>upload data to firebase</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


    <link rel="stylesheet" type="text/css" href="style/cse.css">
</head>
<body>



<div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
          <div class="bg-dark p-4">
            <div class="menu-bar"><a href="">Home</a></div>
            <div class="menu-bar"><a href="#">Computer Science And Engineering</a></div>
            <div class="menu-bar"><a href="">Civil Engineering</a></div>
            <div class="menu-bar"><a href="">Mechanical Engineering</a></div>
            <div class="menu-bar"><a href="">Electronics</a></div>
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
        <p>Computer Science And Engineering</p>
</div>

<div class="detail-branch">
        <p>Computer science is driving innovation—from the sciences to the arts. A look at any major news source reveals the effect of computer science and technology on the global economy.
        computer science is based on a core set of problem-solving concepts; it has been defined as "the study of computers and algorithmic processes, including their principles, their hardware and software designs, their applications, and their impact on society" (Association of Computing Machinery, 2003). But it doesn't stop there. Computer science is a lens and an entry into skills in critical and logical thinking that apply across all disciplines, including writing and the humanities (Carey, 2010).
        </p>
</div>

<div class="container mt-3 border-file-upload" >
<p class="upload">Upload File</p>

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
    <p>Detail: &emsp; &emsp;  <input type="text" name="detail"></p>
    <label for="year">Year</label>
                    <select name="year" class="list" id="year">
                        <option value="1" name="year">1</option>
                        <option value="2" name="year">2</option>
                        <option value="3" name="year">3</option>
                        <option value="4" name="year">4</option>
                    </select>

        <div class="custom-file mb-3">
      <input type="file" class="custom-file-input" id="image" name="file">
      <label class="custom-file-label" for="customFile">Choose file</label>
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
            
          

        });
    });
}

</script>
</body>
</html>