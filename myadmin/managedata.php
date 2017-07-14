<?php

include('../lib/Database.php');
$db = new Database();
 

/*********   Delete Value Start*********/

if(isset($_GET['value'])){
	$value = $_GET['value'];
	$imquery = "select * from products where id= '$value'";
    $imresult = $db->select($imquery);
     if($imresult){
     	$imvalue = $imresult->fetch_assoc();
     		$getimage = $imvalue['image'];
     		unlink($getimage);
     }
	$query = "DELETE  from products where id = '$value'";
	$result = $db->delete($query);
}
/*********   Delete Value End*********/


/*********   Retrieve Value Start*********/

$query = "SELECT * from products order by id DESC";
$result = $db->select($query);
if($result){
	$i=1;
	while ($value= $result->fetch_assoc())
	   
        { ?>
         <tr> 
	          <td><?php echo $i; ?></td>
	          <td><?php echo $value['name']; ?></td>
	          <td style="text-align: center;"><img src="<?php echo $value['image']; ?>" height="80" width="80"></td></td>
	          <td><?php echo $value['price']; ?></td>
	          <td><a href="javascript:void(0);" onclick="retrieveValueForUpdating(<?php echo $value['id'];?>,'<?php echo $value['name'];?>','<?php echo $value['image'];?>','<?php echo $value['price'];?>');"><button id="dd"  class="btn btn-success" >Edit</button></a></td>
	          <td><a href="javascript:void(0);" onclick="managedata(<?php echo $value['id']; ?>);"><button class="btn btn-danger">Delete</button></</a></td>
        </tr>

	<?php $i++; }
}else{
	echo "<td colspan='6' style='text-align:center;font-weight:bold;font-size:15px;color:crimson;'><p>No Products Found</p></td>";
}

 /*********   Retrieve Value End*********/
?>