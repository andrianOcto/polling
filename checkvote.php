<?php
session_start();
$host="localhost"; 
$username="root"; 
$password=""; 
$db_name="polling"; 
$tbl_name="tbMembers";
$member = $_SESSION['member_id'];


mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$sql="SELECT voting FROM tbMembers WHERE member_id = $member ";
$result=mysql_query($sql) or die(mysql_error());
while($baris=mysql_fetch_array($result))
{
$count=$baris[0];
}
if($count==0){
//echo "anda belum memilih ".$count;
header("location:vote.php");
}

else {
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Simple PHP Polling System Access Denied</title>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="tan">
<center><a href ="https://sourceforge.net/projects/pollingsystem/"><img src = "images/logo" alt="site logo"></a></center><br>     
<center><b><font color = "brown" size="6">Simple PHP Polling System</font></b></center><br><br>
<body>
<div id="page">
<div id="header">
  <h1>Access Denied</h1>
  <a href="student.php">Home</a> | <a href="checkvote.php">Current Polls</a> | <a href="manage-profile.php">Manage My Profile</a>
</div>
<div id="container">
<div class="err">Access Denied!</div>
  <p>anda sudah memilih</p>
</div>
<div id="footer"> 
  <div class="bottom_addr">&copy; 2012 Simple PHP Polling System. All Rights Reserved</div>
</div>
</div>
</body>
</html>';
}

?> 
