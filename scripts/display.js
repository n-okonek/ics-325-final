
function updateUser(){
$('.update-user').fadeIn();
}

function addReview(){
  $('.add-review').fadeIn();
}

function addJourney(){
  $('.add-journey').fadeIn();
}

function showExpeditions(value){
  $('#expedition, #journeyExpedition').find('option:first').attr('selected', 'selected');
  $('.expedition-selector').fadeIn();
  switch (value){
    case 'AU':
      $('#expedition > option, #journeyExpedition > option').hide();
      $('option[value="ALICES"], option[value="YULARA"]').show();
      break;
    
    case 'DE':
      $('#expedition > option, #journeyExpedition > option').hide();
      $('option[value="BADKIS"], option[value="BERLIN"]').show();
      break;

    case 'GL':
      $('#expedition > option, #journeyExpedition > option').attr('hidden');
      $('option[value="KANGER"], option[value="QEQERT"]').removeAttr('hidden');
      break;

    case 'CF':
      $('#expedition > option, #journeyExpedition > option').addAttr('hidden');
      $('option[value="KAZUMB"], option[value="MWANZA"]').removeAttr('hidden');
      break;

    case 'US':
      $('#expedition > option, #journeyExpedition > option').attr('hidden');
      $('option[value="LOSANG"], option[value="SANDIE"]').removeAttr('hidden');
      break;

    case 'RU':
      $('#expedition > option, #journeyExpedition > option').attr('hidden');
      $('option[value="SAMBUR"], option[value="SNEZHN"]').removeAttr('hidden');
      break;
    default: 
      $('.expedition-selector').hide();
      break;
  }
}
