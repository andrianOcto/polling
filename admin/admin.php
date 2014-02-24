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
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
</head><body bgcolor="tan">
<center><a href ="https://sourceforge.net/projects/pollingsystem/"><img src = "images/logo" alt="site logo"></a></center><br>     
<center><b><font color = "brown" size="6">Simple PHP Polling System</font></b></center><br><br>
<div id="page">
<div id="header">
<h1>ADMINISTRATION CONTROL PANEL </h1>
<a href="admin.php">Home</a> | <a href="manage-admins.php">Manage Administrators</a> | <a href="positions.php">Manage Positions</a> | <a href="candidates.php">Manage Candidates</a> | <a href="refresh.php">Poll Results</a> | <a href="logout.php">Logout</a>
</div>
<p align="center">&nbsp;</p>
<div id="container">

<<<<<<< HEAD
<p>Pick a poll to be modified</p>
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

<form id="form_add"" action="proses_add_poll.php">
    Poll Name: <input type="text" name="name" required="true">
    <input type="submit" name="Submit" value="Add" />
</form>



<form>
    
</form>


=======
<p>Click a link above to perform an administrative operation.</p>
>>>>>>> 6d71df42e4ace3a8d6f19373c66d1e918da9b8b2


</div>
<div id="footer">
<div class="bottom_addr">&copy; 2012 Simple PHP Polling System. All Rights Reserved</div>
</div>
</div>
</body></html>