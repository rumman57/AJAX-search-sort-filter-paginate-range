<?php
 include('header.php');
?>

   <div class="container">
   <div class="row">
         <h2 style="margin-top: 20px;padding: 7px;text-align:center;color:#d45c93;">ADMIN PANEL</h2>
    </div>
    <div class="row">
      <div style="margin-top: 20px;" id ="msg" >
             
      </div>
    </div>
   <div class="row" style="margin-top: 00px;padding: 7px;margin-bottom: 20px;">
      <div class="row fm" style="margin-top: 30px; padding: 5px;">
      <div class="col-md-8 col-md-offset-1">
         <form enctype="multipart/form-data" method="post" action="insert.php" id="form">
         <input type="hidden"  id="hidid" name="hidid" >
            <div class="form-group">
              <label for="email">Image:</label>
              <input type="file" class="form-control" id="image" name="image">
            </div>
            <div id="upi">
               
            </div>
            <div class="form-group">
              <label for="pwd">Name:</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
              <label for="pwd">Price:</label>
              <input type="text" class="form-control" id="price" name="price">
            </div>
            
            <input type="submit" class="btn btn-primary" id="sbbtn" value="Submit">
          </form>
      </div>
    </div>
    </div>
    <div class="row" >
      <div class="col-md-10 col-md-offset-1">
          <table class="table table-bordered">
              <thead>
                <tr class="success" style="text-align: center;">
                  <th width="8%">No.</th>
                  <th width="20%">Name</th>
                  <th width="40%">Image</th>
                  <th width="12%">Price</th>
                  <th width="20%" colspan="2">Action</th>
                </tr>
              </thead>
              <tbody id="result">
               
              </tbody>
        </table>
      </div>
    </div>
   </div>
<?php 
  include('footer.php');
?>
