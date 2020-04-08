
function updateUser(){
$('.update-user').fadeIn();
}

function addReview(){
  $('.add-review').fadeIn();
}

function showExpeditions(value){
  $('#expedition').find('option:first').attr('selected', 'selected');
  $('.expedition-selector').fadeIn();
  switch (value){
    case 'Australia':
      $('#expedition > option').hide();
      $('option[value="Alice Springs"], option[value="Yulara"]').show();
      break;
    
    case 'Germany':
      $('#expedition > option').hide();
      $('option[value="Bad Kissingen"], option[value="Berlin"]').show();
      break;

    case 'Greenland':
      $('#expedition > option').attr('hidden');
      $('option[value="Kangerlussuaq"], option[value="Qeqertarsuatsiaat"]').removeAttr('hidden');
      break;

    case 'Africa':
      $('#expedition > option').addAttr('hidden');
      $('option[value="Kazumba"], option[value="Mwanza"]').removeAttr('hidden');
      break;

    case 'United States':
      $('#expedition > option').attr('hidden');
      $('option[value="Los Angeles"], option[value="San Diego"]').removeAttr('hidden');
      break;

    case 'Russia':
      $('#expedition > option').attr('hidden');
      $('option[value="Samburg"], option[value="Snezhngorsk"]').removeAttr('hidden');
      break;
    default: 
      $('.expedition-selector').hide();
      break;
  }
}