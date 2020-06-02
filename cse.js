


var name = "sam" ;
    var detail = document.getElementById("#detail").value;
    var year = document.getElementById("year").value;
    var link = document.getElementById("link").value;
    
    firebase.database().ref('user/'+name).set({
       userName: name,
        userdetail: dtail,
        useryear: year,
        userlink: link
    });

