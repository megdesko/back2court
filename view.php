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
    
      <h2>Upcoming Appointments</h2>
      <a class="create-new" href="/create.php">Schedule new appointment</a>
      
      <table class="appointment-list">
        <tr>
          <th>Date</th>
          <th>Time</th>
          <th>Client Name</th>
          <th>Client Phone Number</th>
          <th>Appointment Address</th>
          <th></th>
          <th></th>
        </tr>
        <tr>
          <td>March 15</td>
          <td>2:30 PM</td>
          <td>Jim Pugh</td>
          <td>(707) 684-6107</td>
          <td>123 Main Street</td>
          <td class="table-button"><button onclick="return editApt(1)">Edit</button></td>
          <td class="table-button"><button onclick="return removeApt(1,this)">Cancel</button></td>
        </tr>
        <tr>
          <td>March 15</td>
          <td>4:00 PM</td>
          <td>Mary Catherine Heinzenroeder</td>
          <td>(222) 333-4444</td>
          <td>765 Elm Ave</td>
          <td class="table-button"><button onclick="return editApt(2)">Edit</button></td>
          <td class="table-button"><button onclick="return removeApt(2,this)">Cancel</button></td>
        </tr>
        <tr>
          <td>March 16</td>
          <td>11:00 AM</td>
          <td>Sarah Turner</td>
          <td>(432) 654-7656</td>
          <td>123 Main Street</td>
          <td class="table-button"><button onclick="return editApt(3)">Edit</button></td>
          <td class="table-button"><button onclick="return removeApt(3,this)">Cancel</button></td>
        </tr>
        <tr>
          <td>March 18</td>
          <td>9:00 AM</td>
          <td>John Peters</td>
          <td>(299) 377-4455</td>
          <td>123 Main Street</td>
          <td class="table-button"><button onclick="return editApt(3)">Edit</button></td>
          <td class="table-button"><button onclick="return removeApt(3,this)">Cancel</button></td>
        </tr>
        <tr>
          <td>March 19</td>
          <td>3:00 PM</td>
          <td>Charles Zimmer</td>
          <td>(752) 375-2938</td>
          <td>765 Elm Ave</td>
          <td class="table-button"><button onclick="return editApt(4)">Edit</button></td>
          <td class="table-button"><button onclick="return removeApt(4,this)">Cancel</button></td>
        </tr>
      </table>
    
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