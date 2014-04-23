jQuery(document).ready(function ()
{
jQuery.ajax(
    url:controller/home.php,
	type:"POST",
	data: [1,2,3],
	datatype:"json",
	success:function(data){
	console.log(data);
	
	}
	
	
	
);
}
)