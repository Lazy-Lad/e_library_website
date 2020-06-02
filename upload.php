
<html>
<head>
    <title>Upload File</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="images/digital.png" type="image/icon type">                         
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/cse.css">
    <link rel="stylesheet" type="text/css" href="upload_style.css">
    
</head>
<body>

    <div id="nav_z" class="pos-f-t">
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


    <div id="card_4_upload">
    <div class="container mt-3 border-file-upload" >
      <p class="upload">Upload File</p>

      <form action="" method="POST" enctype="multipart/form-data">

        <!-- <p>Name of file: &emsp; &emsp;  <input type="text" id="detail" name="detail"></p> -->
        <div id="float_property" class="fill_area">
          <label for="detail">Name of file :</label> <br> 
          <input id="mrg_4_box" type="text" id="detail" name="detail"><br>
          <label for="branch">Branch :</label> <br>
              <select id="mrg_4_box" name="year" class="list">
                <option value="cse" name="branch">CSE</option>
                <option value="mech" name="branch">Mechanical</option>
                <option value="civil" name="branch">Civil</option>
              </select>
          <br>
          <label for="year">Year : </label> <br>
            <select id="mrg_4_box" name="year" class="list" id="year">
                <option value="1" name="year">1st</option>
                <option value="2" name="year">2nd</option>
                <option value="3" name="year">3rd</option>
                <option value="4" name="year">4th</option>
            </select>
        </div>

        <div class="bar">
          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="image" name="file">
            <label class="custom-file-label" for="customFile">Choose file</label>
            <p style="color:red;">Note: Give a proper name to file. </p>
          </div>
          <div class="progress">
            <p id="progress"></p>
          </div>   
        </div>     
            
        <div class="btn_cnt">
          <div  class="mt-3">
                <button id="float_prp" type="button" name="submit" class="btn btn-primary" onclick="upload()">Upload</button>
              </div>
                <div class="link">
                  <p id="link" name="link"></p>
                </div>
          </div>

          <div id="dialog"  class="container">
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Help</button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    
                    <h4 class="modal-title">File Upload Help</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <p>You can upload any books, class notes, question paper or anything else but it should be study material.
                    <br>If you want to upload multiple images related to specific topic then you should make a zip folder containing all the images.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div> 
          </div>
        </div>
      </form>  

    </div>






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
                location.replace('cse.html');
            });
        });
    }

    </script>

    <script type="text/javascript" src="getFileFromfirebase.js"></script>
</body>
</html>