function fillFacility(value) {
  $fieldname = $('#txt-fieldname').val();
  $('#' + $fieldname).val(value);
  $('#brmModalClose').trigger('click');
  $('button').blur();
}

function fillMedalData(divField){
  $('#txt-fieldname').val(divField);
}
