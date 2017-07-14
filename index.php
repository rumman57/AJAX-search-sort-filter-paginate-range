<?php 
include('lib/Database.php');
$db = new Database();

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>Ajax Search,Sort,Pagination</title>
<link href="image/favicon.png" rel="icon" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="css/carousel.css" media="screen" />
<!-- CSS Part End-->
 
<!-- JS Part Start-->
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script src="js/ajax.js"></script>
<body>
<div class="wrapper-box">
  <div class="main-wrapper">
    <!--Header Part Start-->
    <header id="header">
      <div class="htop">
       
        <div class="links"> <a href="myadmin/index.php"><span style="color:green;font-weight: bold;">Admin Panel</span></a> <a href="#">Login</a> <a href="#">Register</a> <a href="#" id="wishlist-total">Wish List (0)</a> <a href="#">My Account</a> <a href="#">Checkout</a> </div>
      </div>
      <section class="hsecond">
        <div id="logo"><a href="#">
        <!--<img src="image/logo.png" title="Polishop" alt="Polishop" />-->
        <h1>AJAX Tasks</h1>
        <h3>Search,Sort,Filter,Pagination</h3>
        </a></div>
        <div id="search">
          <div class="button-search"></div>
          <input type="text" id="search_txt"  name="search" placeholder="Search" />
        </div>

        <div class="clear"></div>
      </section>
      <!--Top Menu(Horizontal Categories) Start-->
      <nav id="menu">
        <ul>
          <li class="home"><a title="Home" href=""><span>Home</span></a></li>
          <li class="categories_hor"><a>Categories</a>
          </li>
          <li><a target="" href="#">Headers</a>
          </li>
          <li><a target="" href="#">Menus</a>
          </li>
          <li><a target="" href="#">Sliders</a>
          </li>
          <li><a target="" href="#">Footers</a>
          </li>
          <li><a href="#">Custom Block</a>
          </li>
          <li><a>My Account</a>
          </li>
          <li><a>Information</a>
          </li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </nav>
      <!--Top Menu(Horizontal Categories) End-->
      <!-- Mobile Menu Start-->
      <!-- Mobile Menu End-->
    </header>
    <!--Header Part End-->
    <div id="container">
      <div id="column-left">
        <!--Category Start -->
        <script type="text/javascript" src="js/jquery.dcjqaccordion.js"></script>
        <!--Category End -->
        <!--Note Start -->
         <div class="box">
          <div class="box-heading">*Note*</div>
          <div class="box-content">
           <p style="text-align: justify;font-size: 14px;margin-right: 5px;"><b>Main Search,Refine serach & Range Slider</b> all works Individullay. If one of these task is opened when another is performed,then It's not worked properly. Range slider value will have to be set 0,when other one performs.</p>
        </div>
        </div>
        <!-- Note End -->
        <!-- Range Slider Start-->
           <div class="box">
          <div class="box-heading">Price Range</div>
          <div class="box-content range-slider">
           <input type="range" min="0" max="15000" step="500" value="200" id ="min_price" name="min_price" class="range-slider__range">
           <p id="price_range" class="rang_sl">0</p>
        </div>
        </div>
        <!-- Range Slider End-->
        <!--Refine Search Start-->
        <div class="box">
          <div class="box-heading">Refine Search</div>
          <div class="box-content">
            <ul class="box-filter">
              <li><span id="filter-group">Price</span>
                <ul>
                  <li>
                    <input type="checkbox" id="checkbox" value="2" name="rs" />
                    <label for="filter3">$96 - $1000 </label>
                  </li>
                  <li>
                    <input type="checkbox" id="checkbox" value="3" name="rs" />
                    <label for="filter4">$1100 - $3000 </label>
                  </li>
                  <li>
                    <input type="checkbox" id="checkbox" name="rs" value="4"/>
                    <label for="filter5">$3001 - $6000 </label>
                  </li>
                  <li>
                    <input type="checkbox" id="checkbox" name="rs" value="5"/>
                    <label for="filter6">$6001 - $9000 </label>
                  </li>
                  <li>
                    <input type="checkbox" id="checkbox" value="6" name="rs" />
                    <label for="filter6">$9001 - $12000 </label>
                  </li>
                </ul>
              </li>
            </ul>
            <a id="button-filter" class="button">Refine Search</a> </div>
        </div>
        <!--Refine Search End-->
      </div>
      <!--Middle Part Start-->
      <div id="content">

        <div class="product-filter">
          <div class="limit"><b>Show:</b>
            <select id="product_filter">
              <option value="12" selected="selected">12</option>
              <option value="15">15</option>
              <option value="18">18</option>
              <option value="20">20</option>
              <option value="25">25</option>
            </select>
          </div>
          <div class="sort"><b>Sort By:</b>
            <select id="product_sort">
              <option value="1" selected="selected">Default</option>
              <option value="2">Name (A - Z)</option>
              <option value="3">Name (Z - A)</option>
              <option value="4">Price (Low &gt; High)</option>
              <option value="5">Price (High &gt; Low)</option>
            </select>
          </div>
        </div>
        <div id="products">
       
       
        </div>
      </div>
      <!--Middle Part End-->
      <div class="clear"></div>
    </div>
  </div>
  <!--Footer Part Start-->
  <footer id="footer">
    <div class="fpart-inner">
     
      <div class="column">
        <h3>Information</h3>
        <ul>
          <li><a href="about-us.html">About Us</a></li>
          <li><a href="about-us.html">Delivery Information</a></li>
          <li><a href="about-us.html">Privacy Policy</a></li>
          <li><a href="elements.html">Elements</a></li>
        </ul>
      </div>
      <div class="column">
        <h3>Customer Service</h3>
        <ul>
          <li><a href="contact-us.html">Contact Us</a></li>
          <li><a href="#">Returns</a></li>
          <li><a href="sitemap.html">Site Map</a></li>
        </ul>
      </div>
      <div class="column">
        <h3>Extras</h3>
        <ul>
          <li><a href="#">Brands</a></li>
          <li><a href="#">Gift Vouchers</a></li>
          <li><a href="#">Affiliates</a></li>
          <li><a href="#">Specials</a></li>
        </ul>
      </div>
      <div class="column">
        <h3>My Account</h3>
        <ul>
          <li><a href="#">My Account</a></li>
          <li><a href="#">Order History</a></li>
          <li><a href="#">Wish List</a></li>
          <li><a href="#">Newsletter</a></li>
        </ul>
      </div>
      <!-- Contact Details Start-->
      <div class="contact contact_icon">
        <h3>Contact Us</h3>
        <ul>
          <li class="address">Central Square, 22 Hoi Wing Road, Tuen Mun, New Delhi, India</li>
          <li class="mobile">+91 9896989598</li>
          <li class="fax">+91 9896989598</li>
          <li class="email"><a href="mailto:info@contact.com">info@contact.com</a></li>
        </ul>
      </div>
      <!-- Contact Details End-->
      <div class="clear"></div>
   
      <!-- Back to Top Button Start-->
      <div class="back-to-top" id="back-top"><a title="Back to Top" href="javascript:void(0)" class="backtotop">Top</a></div>
      <!-- Back to Top Button End-->
    </div>
  </footer>
  <!--Footer Part End-->
</div>

</body>
</html>