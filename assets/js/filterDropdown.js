$('.check-manager').click(function(event) {
    var id = $(this).text();

    id = id.replace(/\s/g, "_");

    console.log(id);

    if($('#checks-' + id).is(':checked')) {
      $('#checks-' + id).attr('checked', false);
    }
    else {
      $('#checks-' + id).attr('checked', true);
    }

    filterPins();
    return false;
});
