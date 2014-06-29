jQuery(document).ready(function() {
    jQuery('#lista_items').off('click').on('click', 'p', function() {
        jQuery('#lista_items p.selected').removeClass('selected');
        jQuery(this).addClass('selected');
        jQuery('#actualizare').attr('href', '/AdminDateImobil/adaugare/' + jQuery('input[type="hidden"]').data('type') + '/' + jQuery(this).data('id'));
        jQuery('#stergere').attr('href', '/AdminDateImobil/lista/' + jQuery('input[type="hidden"]').data('type') + '/' + jQuery(this).data('id'));
    });
});


