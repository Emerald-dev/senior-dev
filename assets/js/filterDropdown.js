$('.check-manager').click(function(event) {
    var id = $(this).text();

    id = id.replace(/\s/g, "_");

    if($('#checks-' + id).is(':checked')) {

       $('#checks-' + id).prop('checked', false);
    }
    else {
      $('#checks-' + id).prop('checked', true);
    }

    filterPins();
    return false;
});
