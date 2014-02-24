<?php
mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('polling') or die(mysql_error());


session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
?>
<html><head>
        <script src="js/admin.js"></script>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head><body bgcolor="tan">
<center><img src = "images/polling.png" alt="site logo" height="100" width="100">  <img src = "images/admin.png" alt="site logo" height="100" width="100"> </center><br>     
<center><b><p class="judul"> Simple PHP Polling System </p></b></center>
<div id="page">
<div id="header">
<h1 class="textbiru">ADMINISTRATION CONTROL PANEL </h1>
<a href="admin.php">Home</a> | <a href="manage-admins.php">Manage Administrators</a> | <a href="positions.php">Manage Positions</a> | <a href="candidates.php">Manage Candidates</a> | <a href="refresh.php">Poll Results</a> | <a href="logout.php">Logout</a>
</div>
<p align="center">&nbsp;</p>
<div id="container">

<p><b>First, please pick a poll to be modified<b></p>
<SELECT NAME="poll" id="poll">
    <?php
        $pollings=mysql_query("SELECT * FROM tbpolling")
        or die("There are no records to display ... \n" . mysql_error());
        while ($row=mysql_fetch_array($pollings)){
            echo "<OPTION VALUE=$row[poll_name]>$row[poll_name].($row[poll_year])";
        }
    ?>
</SELECT>

<button type="button" onclick="createCookie()" >
    Choose Poll
</button>

<p>Add Poll</p>

<form id="form_add" action="proses_add_poll.php">
    Poll Name: <input type="text" name="name" required="true">
    <input type="submit" name="Submit" value="Add" />
</form>



<form>
    
</form>




</div>
<div id="footer">
<div class="bottom_addr">&copy; 2012 Simple PHP Polling System. All Rights Reserved</div>
</div>
</div>
</body></html>