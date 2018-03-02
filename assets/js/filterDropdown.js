/**
 * File adds an on click function that checks to see if the checkboxs are selected or not and then changes it depending.
 * Everytime the checkboxes are selected it also filters the pins
 */
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
