var storage = firebase.storage();

var storageRef = storage.ref();

$('#list').find('tbody').html('');

let new_html = '';
        new_html += '<tr>';
        
        new_html += '<td>';
        new_html += '<p>File Name </p>';
        new_html += '</td>';
        new_html += '<td>';
        new_html += '<p>Link</p> ';
        new_html += '</td>';
        new_html += '</tr>';
        $('#list').find('tbody').append(new_html);

var i=0;
storageRef.child('images/').listAll().then(function(result){
    result.items.forEach(function(imageRef){
       // console.log("Image refrence " + imageRef.toString());
        
        i++;

        displayImage(i, imageRef);
    });
});

function displayImage(row, images){
    images.getDownloadURL().then(function(url){

        //var filename = url.substring(url.lastIndexOf('/')+1);
      
          var filename = url.split('/').pop().split('#')[0].split('?')[0];
        console.log(filename);

//       var fname=get(url);

//console.log(fname);

        //console.log(url);

        let new_html = '';
        new_html += '<tr>';
        
        new_html += '<td>';
        new_html += filename;
        new_html += '</td>';
        new_html += '<td>';
        new_html += '<a href="'+url+'" target="_blank" >Click to download </a> ';
        new_html += '</td>';
        new_html += '</tr>';
        $('#list').find('tbody').append(new_html);

    });
}

function get(url) 
{ return url?url.split('/').pop().split('#').shift().split('?').shift():null }