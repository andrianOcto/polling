<?php
mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('polling') or die(mysql_error());

session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}
?>
<html><head>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head><body bgcolor="tan">
<center><img src = "images/polling.png" alt="site logo" height="100" width="100"></center><br>     
<center><b><p class="judul">Simple PHP Polling System</p></b></center>
<div id="page">
<div id="header">
<h1 class="textbiru"><marquee> STUDENT HOME </marquee></h1>
<a href="student.php">Home</a> | <a href="vote.php">Current Polling</a> | <a href="manage-profile.php">Manage My Profile</a> | <a href="logout.php">Logout</a>
</div>
<div id="container">
<p class="textbiru2"> Click the link above to do the stuff.</p>
</div>
<div id="footer">
<div class="bottom_addr">&copy; 2012 Simple PHP Polling System. All Rights Reserved</div>
</div>
</div>
</body></html>