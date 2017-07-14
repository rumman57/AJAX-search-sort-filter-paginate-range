<?php

include('../lib/Database.php');
$db = new Database();


?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/adminstyle.css">
<script src="../js/jquery-3.1.1.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>
 <script type="text/javascript">
 	
     /*********   Retrieve & Delete Value Start*********/
 	 function managedata(value){
        $.ajax({
            url: "managedata.php", 
            type: "GET", 
            data: {value:value} ,            
            success: function(data)   
            {
                result.innerHTML = data;
            }
        });
    }
     /*********   Retrieve & Delete Value End*********/


/*********   Retrieve  Value For Updating Start*********/
    function retrieveValueForUpdating(id,name,image,price){
         console.log(price);
         $("#name").val(name);
         $("#price").val(price);
         $("#hidid").val(id);

    
      var upi = document.getElementById('upi');
      upi.innerHTML = '<img src="'+image+'" height="80" width="80">';

       $("#sbbtn").val("Update");
      $('#sbbtn').toggleClass('btn btn-primary btn btn-danger');
         
    }
    /*********   Retrieve  Value For Updating End*********/

 </script>
</head>
<body onload="managedata();">