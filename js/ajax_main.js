$(document).ready(function (e) {
    
    /*********   Retrieve  Some ID *********/
   var result = document.getElementById('result');
   var msg = document.getElementById('msg');
  

  /*********   Insert & Update AJAX Start*********/
    $("#form").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: "insert.php", 
            type: "POST",             
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending   data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request  succeeds
            {
               msg.innerHTML = data;
               managedata(); 
            }
        });
    }));
    /*********   Insert & Update AJAX End*********/

});