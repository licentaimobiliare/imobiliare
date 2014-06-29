jQuery(document).ready(function() {
    
    jQuery('#avansat').off('click').on('click', function() {
        if (jQuery(this).val() == 'Cautare Avansata')
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
            window._filter.page = 1;
            jQuery('#cautare_avansata').animate({height: '0px'}, 300);
            jQuery(this).val('Cautare Avansata');
            search();
        }
    });
    
    window._filter = {page: 1};
    
    jQuery('#cautare_avansata input[type="button"]').off('click').on('click', function() {
        window._filter['page'] = 1;
        window._filter['idf'] = jQuery('input[placeholder="Finisaj"]').val();
        window._filter['ids'] = jQuery('input[placeholder="Strada"]').val();
        window._filter['idts'] = jQuery('input[placeholder="Tip strada"]').val();
        window._filter['idt_constructie'] = jQuery('input[placeholder="Tip Constructie"]').val();
        window._filter['idtl'] = jQuery('input[placeholder="Tip Locuinta"]').val();
        window._filter['idti'] = jQuery('input[placeholder="Tip Imobil"]').val();

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
                                    var nume = (domain == 'tipstrada' ? item.tip_strada :
                                            (domain == 'strada' ? item.nume :
                                                    (domain == 'finisaj' ? item.finisaj :
                                                            (domain == 'tipconstructie' ? item.tip_constructie :
                                                                    (domain == 'tiplocuinta' ? item.tip_locuinta : item.tip_imobil)))));

                                    return {
                                        label: nume,
                                    }
                                }));
                            },
                            error: function() {
                                console.log('error');
                            }
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

function clear() {
    jQuery('.table .row:not(.clona)').remove();
}

function search(clear_screen) {
    clear_screen = (clear_screen == undefined ? true : clear_screen)
    jQuery.ajax({
        url: '/ajax/tranzactii/' + window._filter['page'],
        type: "POST",
        data: window._filter,
        success: function(data) {
            var tranzactii = JSON.parse(data);

            if (clear_screen)
                clear();
            tranzactii.forEach(function(tranzactie) {

                var clona = jQuery('.table .row.clona').clone();

                jQuery(clona).find('.detalii_imobil span').each(function(span, v) {
                    jQuery(v).text(tranzactie.imobil[jQuery(v).attr('class')]);
                });

                clona.find('.link_imobil').attr('href', clona.find('.link_imobil').attr('href') + tranzactie.imobil['idi']);
                var src = clona.find('.imobil_avatar').attr('src');
                src = src.replace('@idi', tranzactie.imobil['idi']);
                if (tranzactie.imobil['avatar'] != '' && tranzactie.imobil['avatar'] != null)
                    src = src.replace('@avatar', tranzactie.imobil['avatar']);
                else
                    src = '/media/images/imobil_default.jpg';

                clona.find('.imobil_avatar').attr('src', src);

                var proprietar = clona.find('.detalii_proprietar').html();
                for(var key in tranzactie.client){
                    proprietar = proprietar.replace("@"+key,tranzactie.client[key]);
                }
                clona.find('.detalii_proprietar').html(proprietar);
                
                var vanzare=clona.find('.detalii_vanzare').html();
                for(var key in tranzactie.serviciu){
                    vanzare = vanzare.replace("@"+key,tranzactie.serviciu[key]);
                }
                vanzare = vanzare.replace('@data_vanzare',tranzactie.data_vanzare);
                vanzare = vanzare.replace('@data_final_vanzare',tranzactie.data_final_vanzare);
                clona.find('.detalii_vanzare').html(vanzare);
                
                clona.removeClass('clona');
                jQuery('.table').append(clona);

            });
        },
    })
}


