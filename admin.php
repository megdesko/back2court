<html>

<head>

<title>SMS Reminder Demonstration</title>

</head>

<body>

<h1>SMS Reminder Demonstration</h1>

<table>
  <tr><td>Jim Pugh</td><td class="phone phone1">(707) 684-6107</td><td><button onclick="return removeNum(1,this)">Remove</td></tr>
  <tr><td>Meg Desko</td><td class="phone phone2">(650) 714-4716</td><td><button onclick="return removeNum(2,this)">Remove</td></tr>
  <tr>
    <td><input type="text" name="demo_name" placeholder="Name" value="" /></td>
    <td><input type="text" name="demo_phone" placeholder="Phone" value="" /></td>
    <td><button onclick="return addNum(this)">Add</td>
  </tr>
</table>
<br/><br/>

<textarea name="message" placeholder="Your SMS message" style="width:300px; height:40px;"></textarea><br/><br/>
<button onclick="return sendMessage()">Send Message</button>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
// Read all existing numbers
function getNums() {
  $.ajax({
    url: '/routes.php',
    type: 'POST',
    data: { method: 'get_all_demo_texts' }
  }).success(function(data) {
    // Handle list
  });
}
// Remove a number
function removeNum(id,btn) {
  $.ajax({
    url: '/routes.php',
    type: 'POST',
    data: { method: 'delete_demo_text', demo_text_id: id }
  });
  $(btn).parent().parent().remove();
  return false;
}
// Add a new number
function addNum(btn) {
  var name = $('input[name="demo_name"]').val(),
      phone = $('input[name="demo_phone"]').val(),
      row = $('<tr></tr');
  if (!name || phone.replace(/\D/g,'').length != 10) {
    alert('Please enter a name and 10-digit telephone number');
    return false
  }
  $.ajax({
    url: '/routes.php',
    type: 'POST',
    data: { method: 'create_demo_text', demo_name: name, phone: phone }
  }).success(function(data) {
    var id = data['id'];
    row.append($('<td></td>').text(name));
    row.append($('<td></td>').addClass('phone phone'+id).text(phone));
    row.append($('<td></td>').append($('<button></button>').attr('onclick','return removeNum('+id+',this)').text('Remove')));
    $(btn).parent().parent().before(row);
    $('input[name="demo_name"]').val('');
    $('input[name="demo_phone"]').val('');
  });
  return false;
}
// Send an SMS to all listed numbers
function sendMessage() {
  var nums = $('.phone').toArray().map(function(p) {return $(p).text().replace(/\D/g,'')}).join(','),
      msg = $('textarea[name="message"]').val();
  $.ajax({
    url: '/send-sms.php',
    type: 'POST',
    data: { nums: nums, msg: msg }
  }).success(function() {
    alert('SMS messages sent!');
  }).fail(function() {
    alert('Failure sending SMS messages');
  });

}
</script>

</body>

</html>