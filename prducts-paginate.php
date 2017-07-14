<?php 
include('lib/Database.php');
$db = new Database();

  
  /******  Some Default Values Start   ******/
$page = 2;
$value='';
$search_txt= "";
$output = "";
$sort = '';
$rsMax = "";
$rsMin = "";
$rpr = "";
/******  Some Default Values End   ******/

  
  /******  Check Range Slider Have Any Value- Start******/
if(isset($_GET['range_price'])){
  $rpr = $_GET['range_price'];
}
  /******  Check Range Slider Have Any Value- End******/


  /******  Check Main Search Bar Have Any Text- Start******/
if(isset($_GET['srch'])){
  $search_txt = $_GET['srch'];
}
  /******  Check Main Search Bar Have Any Text- End******/



  /***** Check Refine Search Value & Customize It - Start ****/
if(isset($_GET['ref_s_max'],$_GET['ref_s_min'])){
  $rsMax = $_GET['ref_s_max'];
  $rsMin = $_GET['ref_s_min'];

  
     /* min value change */
     if($rsMin==2){
       $rsMin = 96;
    }else if($rsMin==3){
      $rsMin = 1100;
    }else if($rsMin==4){
       $rsMin = 3001;
    }else if($rsMin==5){
       $rsMin = 6001;
    }else if($rsMin==6){
        $rsMin = 9001;
    }else if($rsMin==7){
       $rsMin = 12000;
    }
      /* max value change */

    if($rsMax==2){
      $rsMax=1000;
    }else if($rsMax==3){
      $rsMax=3000;
    }else if($rsMax==4){
      $rsMax=6000;
    }else if($rsMax==5){
      $rsMax=9000;
    }else if($rsMax==6){
      $rsMax=12000;
    }     
}
  /***** Check Refine Search Value & Customize It - End ****/

 /***  Get Pagination Page,Filter Value And Sort Value - Start ****/
if(isset($_GET['page'])){
	$page = $_GET['page'];
  $value = $_GET['value'];
  $sort = $_GET['sort'];
}else{
	$page = 1;
}
  /***  Get Pagination Page,Filter Value And Sort Value - Start ****/

//echo "<h1>".$rsMax." ".$rsMin."</h1>";
//echo "<h1>".$rpr."</h1>";

   /** Set Filter Value To Product Per Page & Customize Paginate ***/
$record_per_page = $value;
$start_from = ($page-1)* $record_per_page;
?>


 <!--Product Grid Start-->
      
      <div class="product-grid">
   <?php
 
  if(!empty($rpr) || !$rpr==0){
    $default=0;
     if($sort==1){
       $query = "SELECT * from products where price BETWEEN $default AND $rpr  limit $start_from,$record_per_page";
     }else if($sort==2){
       $query = "SELECT * from products where price BETWEEN $default AND $rpr order by name ASC limit $start_from,$record_per_page";
     }else if($sort==3){
       $query = "SELECT * from products where price BETWEEN $default AND $rpr order by name DESC limit $start_from,$record_per_page";
     }else if($sort==4){
       $query = "SELECT * from products where price BETWEEN $default AND $rpr order by price ASC limit $start_from,$record_per_page";
     }else if($sort==5){
       $query = "SELECT * from products where price BETWEEN $default AND $rpr order by price DESC limit $start_from,$record_per_page";
     }
   }else if(!empty($rsMax) &&  !empty($rsMin)){
     if($sort==1){
       $query = "SELECT * from products where price BETWEEN $rsMin AND $rsMax  limit $start_from,$record_per_page";
     }else if($sort==2){
       $query = "SELECT * from products where price BETWEEN $rsMin AND $rsMax order by name ASC limit $start_from,$record_per_page";
     }else if($sort==3){
       $query = "SELECT * from products where price BETWEEN $rsMin AND $rsMax order by name DESC limit $start_from,$record_per_page";
     }else if($sort==4){
       $query = "SELECT * from products where price BETWEEN $rsMin AND $rsMax order by price ASC limit $start_from,$record_per_page";
     }else if($sort==5){
       $query = "SELECT * from products where price BETWEEN $rsMin AND $rsMax order by price DESC limit $start_from,$record_per_page";
     }
   }
   else if(!empty($search_txt)){
       if($sort==1){
       $query = "SELECT * from products where name LIKE '%{$search_txt}%' limit $start_from,$record_per_page";
     }else if($sort==2){
       $query = "SELECT * from products where name LIKE '%{$search_txt}%' order by name ASC limit $start_from,$record_per_page";
     }else if($sort==3){
       $query = "SELECT * from products where name LIKE '%{$search_txt}%' order by name DESC limit $start_from,$record_per_page";
     }else if($sort==4){
       $query = "SELECT * from products where name LIKE '%{$search_txt}%' order by price ASC limit $start_from,$record_per_page";
     }else if($sort==5){
       $query = "SELECT * from products where name LIKE '%{$search_txt}%' order by price DESC limit $start_from,$record_per_page";
     }
   }
   else{

       if($sort==1){
         $query = "SELECT * from products limit $start_from,$record_per_page";
       }else if($sort==2){
         $query = "SELECT * from products order by name ASC limit $start_from,$record_per_page";
       }else if($sort==3){
         $query = "SELECT * from products order by name DESC limit $start_from,$record_per_page";
       }else if($sort==4){
         $query = "SELECT * from products order by price ASC limit $start_from,$record_per_page";
       }else if($sort==5){
         $query = "SELECT * from products order by price DESC limit $start_from,$record_per_page";
       }
   }

$result = $db->select($query);
if($result){
	while ($value = $result->fetch_assoc()) { 
?>
  <div>
    <div class="image"><img src="myadmin/<?php echo $value['image']; ?>"></div>
    <div class="name"><?php echo $value['name']; ?>&quot;</div>
    <div class="price"><span class="price-new">$<?php echo $value['price']; ?></span> <br/></div>
    <div class="cart">
      <input type="button" value="Add to Cart" class="button" />
    </div>
 <div class="rating"><img src="image/stars-4.png" alt="Based on 1 reviews." /></div>
</div>
    <?php } } else{
         
         echo "<h1 style='margin-top:25px;padding:6px;'>OOps!!!! No Products Found</h1>";
      }?>
</div>
        <!--Product Grid End-->

 <!--Pagination Part Start-->

        <div class="pagination">
 <?php
 
 if(!empty($search_txt)){
      $page_query = "SELECT * from products where name LIKE '%{$search_txt}%' order by id DESC";
   }else if(!empty($rsMax) &&  !empty($rsMin)){
      $page_query = "SELECT * from products where price BETWEEN $rsMin AND $rsMax order by id DESC";
   }else if(!empty($rpr) || !$rpr==0){
    $default=0;
      $page_query = "SELECT * from products where price BETWEEN $default AND $rpr order by id DESC";
   }else {
  $page_query = "SELECT * from products order by id DESC";
 }
  $p_result = $db->select($page_query);
  if($p_result){
     $total_records = mysqli_num_rows($p_result);
   }else
   $total_records=0;
 
  $total_pages = ceil($total_records/$record_per_page);
  for($i=1;$i<= $total_pages;$i++){
  	 ?>
  	
  	   <div class="links">
          <span class="paginate" id="<?php echo $i;?>"><a href="#" style="none"> <b><?php echo $i;?></b> </a></span>
        </div>
          
 <?php } ?>

   </div>
 <!--Pagination Part End-->



