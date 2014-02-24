<?php
// connection details
$link = mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('polling') or die(mysql_error());

session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
} 
//retrive candidates from the tbcandidates table
$result=mysql_query("SELECT * FROM tbCandidates,tbpositions WHERE tbcandidates.candidate_position = tbpositions.position_name AND tbpositions.f_polling_id = $_COOKIE[poll_id]")
or die("There are no records to display ... \n" . mysql_error()); 
if (mysql_num_rows($result)<1){
    $result = null;
}
?>
<?php
// retrieving positions sql query
$positions_retrieved=mysql_query("SELECT * FROM tbPositions WHERE f_polling_id = $_COOKIE[poll_id]")
or die("There are no records to display ... \n" . mysql_error()); 
/*
$row = mysql_fetch_array($positions_retrieved);
 if($row)
 {
 // get data from db
 $positions = $row['position_name'];
 }
 */
?>
<?php
// inserting sql query
if (isset($_POST['Submit']))
{

//This is the directory where images will be saved 
$target = "photos/"; 
$target = $target . basename( $_FILES['photo']['name']);
//Writes the photo to the server 
move_uploaded_file($_FILES['photo']['tmp_name'], $target);

$newCandidateName = addslashes( $_POST['name'] ); //prevents types of SQL injection
$newCandidatePosition = addslashes( $_POST['position'] ); //prevents types of SQL injection
$newCandidateDate = addslashes( $_POST['date'] );
$newCandidateGender = addslashes( $_POST['gender'] );
$newCandidateVision = addslashes( $_POST['vision'] );
$newCandidateMission = addslashes( $_POST['mission'] );
$newCandidateAchievements = addslashes( $_POST['achievements'] );
$newCandidatePhoto=($_FILES['photo']['name']);


$sql = mysql_query( "INSERT INTO tbCandidates(candidate_name,candidate_position,candidate_date_of_birth,candidate_gender,candidate_vision,candidate_mission,candidate_achievements,candidate_photo) VALUES ('$newCandidateName','$newCandidatePosition','$newCandidateDate','$newCandidateGender','$newCandidateVision','$newCandidateMission','$newCandidateAchievements','$newCandidatePhoto')" )
        or die("Could not insert candidate at the moment". mysql_error() );



// redirect back to candidates
header("Location: candidates.php");
}
?>
<?php
// deleting sql query
// check if the 'id' variable is set in URL
 if (isset($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
 $result = mysql_query("DELETE FROM tbCandidates WHERE candidate_id='$id'")
 or die("The candidate does not exist ... \n"); 
 
 // redirect back to candidates
 header("Location: candidates.php");
 }
 else
 // do nothing   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administration Control Panel:Candidates</title>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head>
<body bgcolor="tan">
<center><img src = "images/polling.png" alt="site logo" height="100" width="100">  <img src = "images/admin.png" alt="site logo" height="100" width="100"> </center><br>     
<center><b><p class="judul"> Simple PHP Polling System </p></b></center>
<div id="page">
<div id="header">
  <h1 class="textbiru">MANAGE CANDIDATES</h1>
  <a href="admin.php">Home</a> | <a href="manage-admins.php">Manage Administrators</a> | <a href="positions.php">Manage Positions</a> | <a href="candidates.php">Manage Candidates</a> | <a href="refresh.php">Poll Results</a> | <a href="logout.php">Logout</a>
</div>
<div id="container">
<table width="380" align="center">
<CAPTION><h3 class="texthijau">ADD NEW CANDIDATE</h3></CAPTION>
<form name="fmCandidates" id="fmCandidates" action="candidates.php" method="post" onsubmit="return candidateValidate(this)" enctype="multipart/form-data">
<tr>
    <td>Name</td>
    <td><input type="text" name="name" /></td>
</tr>
<tr>
    <td>Position</td>
    <!--<td><input type="combobox" name="position" value="<?php echo $positions; ?>"/></td>-->
    <td><SELECT NAME="position" id="position">select
    <OPTION VALUE="select">select
    <?php
    //loop through all table rows
    while ($row=mysql_fetch_array($positions_retrieved)){
    echo "<OPTION VALUE=$row[position_name]>$row[position_name]";
    //mysql_free_result($positions_retrieved);
    //mysql_close($link);
    }
    ?>
    </SELECT>
    </td>
</tr>
<tr>
    <td>Date of Birth</td>
    <td><input type="date" name="date" /></td>
</tr>
<tr>
    <td>Gender</td>
    <td><SELECT NAME="gender" id="gender">select
	<OPTION VALUE="Male">Male
	<OPTION VALUE="Female">Female
</tr>
<tr>
    <td>Vision</td>
    <td><textarea rows="3" cols="20" name="vision" form="fmCandidates"></textarea></td>
</tr>
<tr>
    <td>Mission</td>
    <td><textarea rows="3" cols="20" name="mission" form="fmCandidates"></textarea></td>
</tr>
<tr>
    <td>Achievements</td>
    <td><textarea rows="5" cols="35" name="achievements" form="fmCandidates"></textarea></td>
</tr>
<tr>
    <td>Photo</td>
    <td><input type="file" name="photo"></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Add" /></td>
</tr>
</table>
<hr>
<table border="0" width="620" align="center">
<CAPTION><h3 class="texthijau">AVAILABLE CANDIDATES</h3></CAPTION>
<tr>
<th>Candidate ID</th>
<th>Candidate Name</th>
<th>Candidate Position</th>
</tr>

<?php
//loop through all table rows
while ($row=mysql_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['candidate_id']."</td>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td>" . $row['candidate_position']."</td>";
echo '<td><a href="candidates.php?id=' . $row['candidate_id'] . '">Delete Candidate</a></td>';
echo "</tr>";
}
mysql_free_result($result);
mysql_close($link);
?>
</table>
<hr>
</div>
<div id="footer"> 
  <div class="bottom_addr">&copy; 2012 Simple PHP Polling System. All Rights Reserved</div>
</div>
</div>
</body>
</html>