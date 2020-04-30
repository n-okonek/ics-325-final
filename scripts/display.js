function showForm(form){
  $(".".concat(form)).fadeIn();
}

function closeForm(form){
  $("#".concat(form))[0].reset();
  $(".".concat(form)).fadeOut();
}

function showExpeditions(value){
  $('#expedition, #journeyExpedition').find('option:first').attr('selected', 'selected');
  $('.expedition-selector').fadeIn();
  switch (value){
    case 'AU':
      $('#expedition > option, #journeyExpedition > option').hide();
      $('option[value="10"]').show();
      break;
    
    case 'DE':
      $('#expedition > option, #journeyExpedition > option').hide();
      $('option[value="8"]').show();
      break;

    case 'GL':
      $('#expedition > option, #journeyExpedition > option').hide();
      $('option[value="7"]').show();
      break;

    case 'TZ':
      $('#expedition > option, #journeyExpedition > option').hide();
      $('option[value="13"]').show();
      break;

    case 'US':
      $('#expedition > option, #journeyExpedition > option').hide();
      $('option[value="12"]').show();
      break;

    case 'RU':
      $('#expedition > option, #journeyExpedition > option').hide();
      $('option[value="16"]').show();
      break;
    default: 
      $('.expedition-selector').hide();
      break;
  }
}
