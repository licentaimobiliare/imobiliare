jQuery(document).ready(function(){
    jQuery('#avansat').off('click').on('click',function () {
       if(jQuery(this).val() == 'Cautare Avansata')
       {
           jQuery('#cautare_avansata').animate({height: '25px'}, 300);
           jQuery(this).val('Inchide cautarea');
       }
       else {
           jQuery('#cautare_avansata').animate({height: '0px'}, 300);
           jQuery(this).val('Cautare Avansata');
       }
    });
    
    window._filter={page: 1};
    
    jQuery('input[type="radio"]').on('change',function(){
       window._filter["data_"+jQuery(this).attr('name')]=jQuery(this).val(); 
       search();
    });
    
    search();
    
});

function clear(){
    jQuery('.container .item:not(.clona)').remove();
}

function search(){
    jQuery.ajax({
        url: '/ajax/imobile/'+window._filter['page'],
        type: "POST",
        data: window._filter,
        success: function (data){
            var imobile=JSON.parse(data);
            
            clear();
            imobile.forEach(function(imobil){
  
               var clona=jQuery('.container .item.clona').clone();
 
               jQuery(clona).find('span').each(function(span,v){
                  jQuery(v).text(imobil[jQuery(v).attr('class')]);
               });
               
               clona.removeClass('clona');
               jQuery('.container').append(clona);
               
            });
        },
    })
}