<?php
    mysql_connect('localhost', 'root', '') or die(mysql_error());
    mysql_select_db('polling') or die(mysql_error());
    
    $name = $_GET["name"];
    $year = date("Y");
    
    
    $sql = mysql_query( "INSERT INTO tbpolling(poll_name,poll_year) VALUES ('$name', $year)" )
        or die("Could not insert position at the moment". mysql_error() );

    
?>
	
<script type="text/javascript" >
        window.alert("Data telah terisi");
        window.location="admin.php";
</script>
	