jQuery(document).ready(function() {
    jQuery("select").off('change').on('change', function() {
        jQuery.ajax({
            url: '/ajax/user/' + jQuery(this).data("id"),
            type: "POST",
            data: {tip : jQuery(this).val()},
            success: function(data) {
                var data = JSON.parse(data);
                
                if(data["success"]){
                    alert("modificat cu succes!");
                }
            },
        });

    });
});

