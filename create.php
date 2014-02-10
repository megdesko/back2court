<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 lt-ie9 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 lt-ie9 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 lt-ie9 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
  <head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta charset='utf-8' />
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible' />
    <title>Court Date</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    
    <link href='css/style.css' rel='stylesheet' />    
  </head>

  <body>
  
    <div id="header">
      <div id="header_content">
        <img src="logo_courtdate.png" />
        <h1>Court Date</h1>
      </div> <!-- #header_content -->
    </div> <!-- #header -->
    
    <div id="main">
    
      <h2>Schedule New Appointment</h2>
      
      <form action="schedule.php" method="POST" name="schedule" id="schedule_form">
      
        <label for="name">Client Name:</label>
        <input type="text" name="client_name" value="" /><br/><br/>
        
        <label for="name">Client Cell Number:</label>
        <input type="text" name="client_phone" value="" /><br/><br/>
        
        <label for="name">Appointment Date:</label>
        <input type="text" name="date" value="" /><br/><br/>
        
        <label for="name">Appointment Time:</label>
        <input type="text" name="date" value="" /><br/><br/>
        
        <input type="submit" value="Schedule Appointment" />
      
      </form>
    
    </div>
    
    <div id="footer">
      <div id="footer_content">
        &copy; 2014. All rights reserved.
      </div> <!-- #footer_content -->
    </div> <!-- #footer -->
  
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="/js/script.js"></script>

  </body>
  
</html>