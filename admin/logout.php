<html><head>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head><body bgcolor="tan">
<center><img src = "images/polling.png" alt="site logo" height="100" width="100">  <img src = "images/admin.png" alt="site logo" height="100" width="100"> </center><br>     
<center><b><p class="judul">Simple PHP Polling System</b></center>
<div id="page">
<div id="header">
<h1 class="textbiru">Logged Out Successfully from Admin Page </h1>
<p align="center">&nbsp;</p>
</div>
<?
session_start();
session_destroy();
?>
<p class="textlogout">You have been successfully logged out of your control panel.<br><br>
Return to <a href="login.html" class="textlogout">Admin Login Page</a></p>
<div id="footer">
<div class="bottom_addr">&copy; 2012 Simple PHP Polling System. All Rights Reserved</div>
</div>
</div>
</body></html>