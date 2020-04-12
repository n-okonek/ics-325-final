
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
    case 'Australia':
      $('#expedition > option, #journeyExpedition > option').hide();
      $('option[value="Alice Springs"], option[value="Yulara"]').show();
      break;
    
    case 'Germany':
      $('#expedition > option, #journeyExpedition > option').hide();
      $('option[value="Bad Kissingen"], option[value="Berlin"]').show();
      break;

    case 'Greenland':
      $('#expedition > option, #journeyExpedition > option').attr('hidden');
      $('option[value="Kangerlussuaq"], option[value="Qeqertarsuatsiaat"]').removeAttr('hidden');
      break;

    case 'Africa':
      $('#expedition > option, #journeyExpedition > option').addAttr('hidden');
      $('option[value="Kazumba"], option[value="Mwanza"]').removeAttr('hidden');
      break;

    case 'United States':
      $('#expedition > option, #journeyExpedition > option').attr('hidden');
      $('option[value="Los Angeles"], option[value="San Diego"]').removeAttr('hidden');
      break;

    case 'Russia':
      $('#expedition > option, #journeyExpedition > option').attr('hidden');
      $('option[value="Samburg"], option[value="Snezhngorsk"]').removeAttr('hidden');
      break;
    default: 
      $('.expedition-selector').hide();
      break;
  }
}
