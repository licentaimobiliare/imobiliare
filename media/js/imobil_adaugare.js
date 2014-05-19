jQuery(document).ready(function (){
   jQuery('#submit').off('click').on('click',function () {
      if(jQuery('.imobil_form input[data-type="date"]:lt(1)').hasClass('hidden')){
          var type=jQuery('.imobil_form input:not(.hidden):lt(1)').data('type');
          switch(type){
              case 'proprietar':
                  jQuery('#imobil_back').removeClass('hidden');
                  jQuery('.imobil_form input[data-type="proprietar"]').addClass('hidden');
                  jQuery('.imobil_form input[data-type="adresa"]').removeClass('hidden');
                  break;
              case 'adresa':
                  jQuery('.imobil_form input[data-type="adresa"]').addClass('hidden');
                  jQuery('.imobil_form input[data-type="date"]').removeClass('hidden');
                  jQuery('#adauga_camera').removeClass('hidden');
                  break;
          }
          return false;
      }
   });
   
    jQuery('#imobil_back').off('click').on('click', function() {
        var type = jQuery('.imobil_form input:not(.hidden):lt(1)').data('type');
        switch (type) {
            case 'adresa':
                jQuery('#imobil_back').addClass('hidden');
                jQuery('.imobil_form input[data-type="adresa"]').addClass('hidden');
                jQuery('.imobil_form input[data-type="proprietar"]').removeClass('hidden');
                break;
            case 'date':
                jQuery('.imobil_form input[data-type="date"]').addClass('hidden');
                jQuery('#adauga_camera').addClass('hidden');
                jQuery('.imobil_form input[data-type="adresa"]').removeClass('hidden');
                break;
        }
        return false;
    });
    
    window._numar_inputuri_camere=0;
    jQuery('#adauga_camera').off('click').on('click',function(){
        var input_nr_camere=jQuery('.nr_camere').clone();
        jQuery(input_nr_camere).removeClass('nr_camere').addClass('i'+window._numar_inputuri_camere).hide();
        var input_tip_camera=jQuery('.tip_camera').clone();
        jQuery(input_tip_camera).removeClass('tip_camera').addClass('i'+window._numar_inputuri_camere).hide();
        
        console.log([jQuery(input_nr_camere),jQuery(input_tip_camera).val()]);
        jQuery('.nr_camere').before("<p>"+jQuery(input_nr_camere).val()+" "+jQuery(input_tip_camera).val()+"<span id='"+window._numar_inputuri_camere+"'>X</span></p>")
        jQuery('.imobil_form').append(jQuery(input_nr_camere));
        jQuery('.imobil_form').append(jQuery(input_tip_camera));
        
        window._numar_inputuri_camere++;
        
        jQuery('.nr_camere,.tip_camera').val('');
       return false; 
    });
    
    jQuery('.imobil_form').off('click').on('click','p span',function () {
        jQuery('input.i'+jQuery(this).attr('id')).remove();
        jQuery(this).parent().remove();
    });
    
});

