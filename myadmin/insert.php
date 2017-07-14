<?php

include('../lib/Database.php');
$db = new Database();

  /*********   Insert & Update  Value Start*********/

 if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
   
    $id = $_POST['hidid'];
    if(!empty($id)){
    	$name  = mysqli_real_escape_string($db->link, $_POST['name']);
  		$price = mysqli_real_escape_string($db->link,  $_POST['price']);
          
	     $fileformat = array('jpg','jpeg','png','gif');
	     $file_name = $_FILES['image']['name'];
	     $file_size = $_FILES['image']['size'];
	     $file_temp = $_FILES['image']['tmp_name'];
 
	        $div = explode('.', $file_name);
	        $file_extension = strtolower(end($div));
	        $unique_name_image = substr(md5(time()),0,10).'.'.$file_extension;
	        $uploaded_directory_Imagename = "images/".$unique_name_image;

	  		if(empty($name) || empty($price) || empty($file_name)){
	  			 $msg = "<span class='alert alert-danger mstyledang'>Filled  Must Not Be Empty...";

	  		}elseif($file_size>1048576){
	             $msg = "<span class='alert alert-danger mstyledang'>File Size Not More Than 1MB</span>";
	  			 
	        }elseif(in_array($file_extension, $fileformat)===false){
	            $msg = "<span class='alert alert-danger mstyledang'>You Can Upload Only : ".implode(' , ', $fileformat)."</span>";
	  			 
	        }else{
                move_uploaded_file($file_temp, $uploaded_directory_Imagename);
                $query="UPDATE  products SET
                name  = '$name',
                image = '$uploaded_directory_Imagename',
                price = '$price'
                where id='$id'";
                $result = $db->insert($query);
                if($result){
                    $msg = "<span class='alert alert-success mstylesucc'>Product Updated Successfully...</span>";
	  			     
                }else{
                   $msg = "<span class='alert alert-danger mstyledang'>Product Not Upadated</span>";
	  			   
                }
          }
    }else{

  	$name  = mysqli_real_escape_string($db->link, $_POST['name']);
  		$price = mysqli_real_escape_string($db->link,  $_POST['price']);
          
	     $fileformat = array('jpg','jpeg','png','gif');
	     $file_name = $_FILES['image']['name'];
	     $file_size = $_FILES['image']['size'];
	     $file_temp = $_FILES['image']['tmp_name'];
 
	        $div = explode('.', $file_name);
	        $file_extension = strtolower(end($div));
	        $unique_name_image = substr(md5(time()),0,10).'.'.$file_extension;
	        $uploaded_directory_Imagename = "images/".$unique_name_image;

	  		if(empty($name) || empty($price) || empty($file_name)){
	  			 $msg = "<span class='alert alert-danger mstyledang'>Filled  Must Not Be Empty...";

	  		}elseif($file_size>1048576){
	             $msg = "<span class='alert alert-danger mstyledang'>File Size Not More Than 1MB</span>";
	  			 
	        }elseif(in_array($file_extension, $fileformat)===false){
	            $msg = "<span class='alert alert-danger mstyledang'>You Can Upload Only : ".implode(' , ', $fileformat)."</span>";
	  			 
	        }else{
                move_uploaded_file($file_temp, $uploaded_directory_Imagename);
                $query="INSERT INTO products 
                (name,image,price) VALUES 
                ('$name','$uploaded_directory_Imagename','$price')";
                $result = $db->insert($query);
                if($result){
                    $msg = "<span class='alert alert-success mstylesucc'>Product Inserted Successfully...</span>";
	  			     
                }else{
                   $msg = "<span class='alert alert-danger mstyledang'>Product Not Inserted</span>";
	  			   
                }
      
      }
   }
 }
  if(isset($msg)){
    echo $msg;
  }
?>
