<?php
session_start();
$vote = $_REQUEST['vote'];
$member = $_SESSION['member_id'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("polling", $con);

mysql_query("UPDATE tbCandidates SET candidate_cvotes=candidate_cvotes+1 WHERE candidate_name='$vote'");
mysql_query("UPDATE tbMembers SET voting = 1 WHERE member_id = $member");

mysql_close($con);
?> 