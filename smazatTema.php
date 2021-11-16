<?php 
require("session.php");

$sql_delete = "DELETE FROM helpdesk WHERE id_zpravy = ".$_GET['id'];
$sql_delete2 = "DELETE FROM komentar WHERE id_zpravy = ".$_GET['id'];
mysqli_query($connection, $sql_delete);
mysqli_query($connection, $sql_delete2);
header("Refresh:0; url=helpdesk.php");
?>