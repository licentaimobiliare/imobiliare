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
});