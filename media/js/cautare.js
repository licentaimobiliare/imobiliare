jQuery(document).ready(function(){
    jQuery('#avansat').off('click').on('click',function () {
       if(jQuery(this).val() == 'Cautare Avansata')
       {
           jQuery('#cautare_avansata').animate({height: '25px'}, 300);
           jQuery(this).val('Inchide cautarea');
       }
       else {
            delete window._filter['idf'];
            delete window._filter['ids'];
            delete window._filter['idts'];
            delete window._filter['idt_constructie'];
            delete window._filter['idtl'];
            delete window._filter['idti'];
            window._filter.page=1;
           jQuery('#cautare_avansata').animate({height: '0px'}, 300);
           jQuery(this).val('Cautare Avansata');
           search();
       }
    });
    
    window._filter={page: 1};
    
    jQuery('input[type="radio"]').on('change',function(){
       window._filter["data_"+jQuery(this).attr('name')]=jQuery(this).val();
       window._filter['page']=1;
       search();
    });
    
    jQuery('#cautare_avansata input[type="button"]').off('click').on('click',function(){
        window._filter['page']=1;
        window._filter['idf']=jQuery('input[placeholder="Finisaj"]').val();
        window._filter['ids']=jQuery('input[placeholder="Strada"]').val();
        window._filter['idts']=jQuery('input[placeholder="Tip strada"]').val();
        window._filter['idt_constructie']=jQuery('input[placeholder="Tip Constructie"]').val();
        window._filter['idtl']=jQuery('input[placeholder="Tip Locuinta"]').val();
        window._filter['idti']=jQuery('input[placeholder="Tip Imobil"]').val();
        
        search();
    });
    
    jQuery(window).scroll(function() {
        if (jQuery(window).scrollTop() >= jQuery(document).height() - jQuery(window).height() - 100) {
            window._filter['page']++;
            search(false);
        }
    });

    jQuery('#cautare_avansata input[type="text"]').off('change keyup').on('change keyup',
            function() {
                var domain = jQuery(this).attr('placeholder').replace(/\s/g, "").toLowerCase();
                var value = jQuery(this).val();
                jQuery(this).autocomplete({
                    source: function(request, response) {
                        jQuery.ajax({
                            type: "POST",
                            url: '/ajax/autocomplete/' + domain,
                            dataType: 'json',
                            data: {
                               name: value
                            },
                            success: function(data) {
                                response(jQuery.map(data, function(item) {
                                    var nume=(domain == 'tipstrada' ? item.tip_strada :
                                        (domain == 'strada' ? item.nume : 
                                        (domain == 'finisaj' ? item.finisaj : 
                                        (domain == 'tipconstructie' ? item.tip_constructie :
                                        (domain == 'tiplocuinta' ? item.tip_locuinta : item.tip_imobil)))));
                                
                                    return {
                                        label: nume,
                                    }
                                }));
                            },
                            error: function(){console.log('error');}
                        });
                    },
                    messages: {
                        noResults: '',
                        results: function() {
                        }
                    },
                    select: function(event, ui) {
                    }
                });
            });
    
    search();
    
});

function clear(){
    jQuery('.container .item:not(.clona)').remove();
}

function search(clear_screen){
    clear_screen = (clear_screen == undefined ? true : clear_screen)
    jQuery.ajax({
        url: '/ajax/imobile/'+window._filter['page'],
        type: "POST",
        data: window._filter,
        success: function (data){
            var imobile=JSON.parse(data);
            
            if(clear_screen)
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