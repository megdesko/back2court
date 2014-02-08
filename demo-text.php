<html>

<head>
<title>Demo Text</title>
</head>

<body>

Phone Number:<br/>
<input type="text" name="num" value="" /><br/><br/>

Message:<br/>
<textarea name="msg"></textarea><br/><br/>

<button onclick="sendMessage()">Send Message</button><br/><br/>
<p id="messageSent" style="display:none">Message sent!</p>
<p id="messageFail" style="display:none">Message failed.</p>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
function sendMessage() {
  var num = $('input[name="num"]').val(),
      msg = $('textarea[name="msg"]').val();
  num = num.replace(/[\(|\)|\-|\.| ]/g,'');
  $.ajax({
    url: '/send-sms.php',
    type: 'POST',
    data: { nums: num, msg: msg }
  }).success(function() {
    $('#messageSent').show();
  }).fail(function() {
    $('#messageFail').show();
  });
    
}
</script>

</body>

</html>