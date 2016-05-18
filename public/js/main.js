jQuery(document).ready(function(){

   	jQuery("#order").change(function(){
		var order = jQuery(this).val();
		var order_by = jQuery("#order-by").val();

		window.location.href = "?page=taches&order=" + order + "&order-by=" + order_by;
   	});
    
   	jQuery("#order-by").change(function(){
		var order_by = jQuery(this).val();
		var order = jQuery("#order").val();

		window.location.href = "?page=taches&order=" + order + "&order-by=" + order_by;
   	});    
});