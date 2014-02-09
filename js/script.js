// Read all existing appointments for current user
function getUserApts(user_id) {
  $.ajax({
    url: '/routes.php',
    type: 'POST',
    data: { method: 'get_user_appointments', user_id: user_id }
  }).success(function(data) {
    var nums = $.parseJSON(data).data;
    for (var i = 0; i < nums.length; i++) {
      var row = $('<tr></tr>');
      row.append($('<td></td>').text(nums[i].appointment_date));
      row.append($('<td></td>').text(nums[i].appointment_time));
      row.append($('<td></td>').text(nums[i].client_first_name+' '+nums[i].client_last_name));
      row.append($('<td></td>').addClass('phone phone'+nums[i].demo_text_id).text(nums[i].phone));
      row.append($('<td></td>').append($('<button></button>').attr('onclick','return removeNum('+nums[i].demo_text_id+',this)').text('Remove')));
      $('.input-row').before(row);
    }
  });
}

// Edit an appointment
function editApt(id) {
  document.location = "/edit.php?appointment_id="+id;
  return false;
}

// Delete an appointment
function removeApt(id,btn) {
  $.ajax({
    url: '/routes.php',
    type: 'POST',
    data: { method: 'delete_appointment', appointment_id: id }
  });
  $(btn).parent().parent().remove();
  return false;
}
