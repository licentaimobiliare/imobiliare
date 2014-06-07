jQuery(document).ready(function() {
    jQuery('form input[name="tranzactie[client][cnp]"]').autocomplete({
        source: function(request, response) {
            jQuery.ajax({
                type: "POST",
                url: '/ajax/autocomplete/client',
                dataType: 'json',
                data: {
                    name: request['term'],
                },
                success: function(data) {
                    response(jQuery.map(data, function(item) {

                        return {
                            label: item.cnp,
                            nume: item.nume,
                            prenume: item.prenume,
                            telefon: item.telefon,
                        }
                    }));
                },
                error: function() {
                    console.log('error');
                }
            });
        },
        select: function(event, ui) {
            jQuery('input[name="tranzactie[client][nume]"]').val(ui['item']['nume']);
            jQuery('input[name="tranzactie[client][prenume]"]').val(ui['item']['prenume']);
            jQuery('input[name="tranzactie[client][telefon]"]').val(ui['item']['telefon']);
            jQuery('button[name="Submit"]').removeAttr("disabled");
        }
    });
    
    jQuery('input[type="text"]').off('change keyup keydown').on('change keyup keydown',function (){
       if(jQuery(this).val() == '')
            jQuery('form button[name="Submit"]').attr("disabled",true);
        else {
            var ok=true;
            jQuery.each(jQuery('input[type="text"]'),function(k,v){
               if(jQuery(v).val() == ''){ok=false;}
            });
            if(ok)
                jQuery('form button[name="Submit"]').attr("disabled",false);
            else
                jQuery('form button[name="Submit"]').attr("disabled",true);
        }
    });
    
});


