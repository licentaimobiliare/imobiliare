jQuery(document).ready(function() {
    jQuery('#submit').off('click').on('click', function() {
        if (jQuery('.imobil_form input[data-type="date"]:lt(1)').hasClass('hidden')) {
            var type = jQuery('.imobil_form input:not(.hidden):lt(1)').data('type');
            if (jQuery('input[data-type="' + type + '"]').val().trim(" ") != "") {
                switch (type) {
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
            }
            else alert("Completati campurile corespunzator!");
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
    
    jQuery('.imobil_form input[name="imobil[proprietar][cnp]"]').autocomplete({
        source: function(request, response) {
            jQuery.ajax({
                type: "POST",
                url: '/ajax/autocomplete/proprietar',
                dataType: 'json',
                data: {
                    name: request['term'],
                },
                success: function(data) {
                                response(jQuery.map(data, function(item) {
                                    
                                    return {
                                        label: item.cnp,
                                        ap : item.ap,
                                        bl: item.bl,
                                        et: item.et,
                                        judet: item.judet,
                                        nr: item.nr,
                                        nume: item.nume,
                                        oras: item.oras,
                                        sc: item.sc,
                                        strada: item.strada,
                                    }
                                }));
                            },
                error: function(){console.log('error');}
            });
        },
        select: function(event, ui) {
            jQuery('input[name="imobil[proprietar][nume]"]').val(ui['item']['nume']);
            jQuery('input[name="imobil[proprietar][strada]"]').val(ui['item']['strada']);
            jQuery('input[name="imobil[proprietar][sc]"]').val(ui['item']['sc']);
            jQuery('input[name="imobil[proprietar][oras]"]').val(ui['item']['oras']);
            jQuery('input[name="imobil[proprietar][nr]"]').val(ui['item']['nr']);
            jQuery('input[name="imobil[proprietar][judet]"]').val(ui['item']['judet']);
            jQuery('input[name="imobil[proprietar][et]"]').val(ui['item']['et']);
            jQuery('input[name="imobil[proprietar][bl]"]').val(ui['item']['bl']);
            jQuery('input[name="imobil[proprietar][ap]"]').val(ui['item']['ap']);
        }
    });

    jQuery('.imobil_form input[name="imobil[adresa][tip_strada]"]').autocomplete({
        source: function(request, response) {
            jQuery.ajax({
                type: "POST",
                url: '/ajax/autocomplete/tipstrada',
                dataType: 'json',
                data: {
                    name: request['term'],
                },
                success: function(data) {
                    response(jQuery.map(data, function(item) {

                        return {
                            label: item.tip_strada,
                        }
                    }));
                },
                error: function() {
                    console.log('error');
                }
            });
        },
    });
    
    jQuery('.imobil_form input[name="imobil[adresa][nume_strada]"]').autocomplete({
        source: function(request, response) {
            jQuery.ajax({
                type: "POST",
                url: '/ajax/autocomplete/strada',
                dataType: 'json',
                data: {
                    name: request['term'],
                },
                success: function(data) {
                    response(jQuery.map(data, function(item) {

                        return {
                            label: item.nume,
                        }
                    }));
                },
                error: function() {
                    console.log('error');
                }
            });
        },
    });
    
    jQuery('.imobil_form input[name="imobil[adresa][numar]"]').autocomplete({
        source: function(request, response) {
            jQuery.ajax({
                type: "POST",
                url: '/ajax/autocomplete/numarstrada',
                dataType: 'json',
                data: {
                    name: request['term'],
                },
                success: function(data) {
                    response(jQuery.map(data, function(item) {

                        return {
                            label: item.numar,
                        }
                    }));
                },
                error: function() {
                    console.log('error');
                }
            });
        },
    });
    
    jQuery('.imobil_form input[name="imobil[adresa][cod_postal]"]').autocomplete({
        source: function(request, response) {
            jQuery.ajax({
                type: "POST",
                url: '/ajax/autocomplete/codpostal',
                dataType: 'json',
                data: {
                    name: request['term'],
                },
                success: function(data) {
                    response(jQuery.map(data, function(item) {

                        return {
                            label: item.cod_postal,
                        }
                    }));
                },
                error: function() {
                    console.log('error');
                }
            });
        },
    });
    
    jQuery('.imobil_form input[name="imobil[date][finisaj]"],'+
            'input[name="imobil[date][tip_constructie]"],' +
            'input[name="imobil[date][tip_locuinta]"],' +
            'input[name="imobil[date][tip_imobil]"]').off('change keyup keydown').on('change keyup keydown',
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
});

