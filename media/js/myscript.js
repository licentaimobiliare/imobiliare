
jQuery(document).ready(function()
{
    jQuery.ajax({
        url: window.location.origin+'/index.php/home/index',
        type: "POST",
        data: [1, 2, 3],
        datatype: "json",
        success: function(data) {
            console.log(data);

        },
        error :function(x,a,s){
            
        }
    }
    );
}
);