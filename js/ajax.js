$(document).ready(function(){
	
 /********** Some Variable Initial Value **************/

	var value = $( "#product_filter" ).val();
	var sort = $( "#product_sort" ).val();
	var page=1;
	var txt1="";
	var rs_max1="";
	var rs_min1="";
	var price1 = "";

		
	/**********  Product Filter Start    **************/
	$('#product_filter').on('change', function() {
	  var val = $(this).val();
	  load_data(page,val,sort,txt1,rs_max1,rs_min1,price1);
	  value = val;
     });
	/**********  Product Filter End    **************/

     
     
     /**********  Product Sorting Start    **************/
	 $('#product_sort').on('change', function() {
	  var srt = $(this).val();
	  load_data(page,value,srt,txt1,rs_max1,rs_min1,price1);
	  sort = srt;
     });
     /**********  Product Sorting End    **************/


     /**********  Product Main Search Start    **************/
     $('#search_txt').keyup(function() {
	    var txt = $(this).val();
		    if(txt!=""){
		    	txt1=txt;
		    	rs_max1="";
	        rs_min1="";
		     load_data(page,value,sort,txt);
         }else{
         	txt1="";
         	rs_max1="";
	        rs_min1="";
         	load_data(page,value,sort,txt1);
         }
     });
     /**********  Product Main Search End   **************/

     /********  Refine Search Product Start    *********/
     $(".button").click(function(){
        var favorite = [];
        $.each($("input[name='rs']:checked"), function(){            
            favorite.push($(this).val());
        });
        var rs_max = Math.max.apply(Math,favorite); 
        var rs_min = Math.min.apply(Math,favorite); 
        rs_max1=rs_max;
        rs_min1=rs_min;
        if(isFinite(rs_max) && isFinite(rs_min)){
          load_data(page,value,sort,txt1,rs_max,rs_min);
        }else{
        	rs_max1="";
	        rs_min1="";
	        load_data(page,value,sort,txt1,rs_max1,rs_min1);
        }
    
     });
    /********  Refine Search Product End    *********/


    
    /**********  Range Slider Start    **************/
	$('#min_price').change(function(){
		var price = $(this).val();
		$("#price_range").text(price);
		if(price!=0){
          price1 = price;
		  load_data(page,value,sort,txt1,rs_max1,rs_min1,price);
		}else{
          price1 = "";
		  load_data(page,value,sort,txt1,rs_max1,rs_min1,price1);
		}
		
	});
	/**********  Range Slider End  **************/


 
   /*****  Retrieve Value When Page First Load  *******/
    load_data(page,value,sort);


  

     /****  AJAX Main Function Who Perform All Tasks Start *******/
function load_data(page,value,sort,txt,rs_max,rs_min,price){
  	 $.ajax({
	       url: "prducts-paginate.php?page="+page+"&value="+value+"&sort="+sort,
	       method:"GET",
	       data:{
			       	page:page,
			       	srch:txt,
			       	ref_s_max:rs_max,
			       	ref_s_min:rs_min,
			       	range_price:price
	       },
	       success: function(data){
	       	 $('#products').html(data);
	       }
	})
}
  /****  AJAX Main Function Who Perform All Tasks End *******/


 
 /*****  Pagination Link Function Start  *******/
 $(document).on('click','.paginate',function(){	
    var page = $(this).attr("id");
    load_data(page,value,sort,txt1,rs_max1,rs_min1,price1);
 });
  /*****  Pagination Link Function End  *******/
 

});