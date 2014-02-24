<?php
// connection details
$link = mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('polling') or die(mysql_error());

session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
} 
//retrive student details from the tbmembers table
$result=mysql_query("SELECT * FROM tbMembers WHERE member_id = '$_SESSION[member_id]'")
or die("There are no records to display ... \n" . mysql_error()); 
if (mysql_num_rows($result)<1){
    $result = null;
}
$row = mysql_fetch_array($result);
if($row)
 {
 // get data from db
 $stdId = $row['member_id'];
 $firstName = $row['first_name'];
 $lastName = $row['last_name'];
 $email = $row['email'];
 }
?>
<?php
// updating sql query
if (isset($_POST['update'])){
$myId = addslashes( $_GET[id]);
$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$myEmail = $_POST['email'];
$myPassword = $_POST['password'];

$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

$sql = mysql_query( "UPDATE tbMembers SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail', password='$newpass' WHERE member_id = '$myId'" )
        or die( mysql_error() );

// redirect back to profile
 header("Location: manage-profile.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Candidate Profile</title>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/user.js">
</script>
</head>
<body bgcolor="tan">
<center><img src = "images/polling.png" alt="site logo" height="100" width="100"></center><br>     
<center><b><p class="judul">Simple PHP Polling System</p></b></center>
<div id="page">
<div id="header">
  <h1 class="textbiru">CANDIDATE PROFILE</h1>
  <a href="student.php">Home</a> | <a href="vote.php">Current Polls</a> | <a href="manage-profile.php">Manage My Profile</a> | <a href="logout.php">Logout</a>
</div>
<div id="container">
<table>
<tr>
<td>
<table width="380" align="center">

<center>
<?php 
			$candidate_name=$_GET["name"];
			
			mysql_connect('localhost', 'root', '') or die(mysql_error());
			mysql_select_db('polling') or die(mysql_error());
			$data = mysql_query("SELECT * FROM tbCandidates WHERE candidate_name='$candidate_name'") or die(mysql_error());
			$info = mysql_fetch_array( $data );
			Echo "<img src=http://localhost/polling/admin/photos/".$info['candidate_photo'] ."> <br>"; 
			Echo "<b>Name :</b> ".$info['candidate_name'] . "<br> "; 
			Echo "<b>Position :</b> ".$info['candidate_position'] . " <br>"; 
			Echo "<b>Date of Birth :</b> ".$info['candidate_date_of_birth'] . " <br>";
			Echo "<b>Gender :</b> ".$info['candidate_gender'] . "<br> "; 
			Echo "<b>Vision :</b> ".$info['candidate_vision'] . " <br>"; 
			Echo "<b>Mission :</b> ".$info['candidate_mission'] . " <br>";
			Echo "<b>Achievements :</b> ".$info['candidate_achievements'] . " <br>";
?>
</center>
</table>

</td>

</tr>
</table>
<hr>
</div>
<div id="footer"> 
  <div class="bottom_addr">&copy; 2012 Simple PHP Polling System. All Rights Reserved</div>
</div>
</div>
</body>
</html>