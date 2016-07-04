function toggle_value(valField, value){
  if(valField=='radio-sep'){
    if(value==0){
      $('#txt-tranfac').val('');
      $('.transOption').hide();
    }else{
      $('.transOption').show();
    }
  }

  if(valField=='radio-bdf'){
    if(value==0){
      $('#txt-bdfindentift').val('');
      $('#radio-bdn1').trigger('click');
      $('.bdfCondition1').hide();
    }else{
      $('.bdfCondition1').show();
    }
  }

  if(valField=='radio-alive'){
    if(value==1){
      $('#radio-alivecon0').trigger('click');
      $('.aliveCondition1').hide();
    }else{
      $('.aliveCondition1').show();
    }
  }
}

function autofill_unknown(element_id){
  $('#' + element_id).val('Unknown');
}
