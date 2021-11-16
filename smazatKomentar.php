<?php 
require("session.php");

$sql_delete = "DELETE FROM komentar WHERE id_komentar = ".$_GET['id'];
mysqli_query($connection, $sql_delete);
//header("Refresh:0; url=helpdesk.php?id='$_GET['id_tema']'");
header('Location: http://logos-polytechnikos.great-site.net/tema.php?id='.$_GET['id_tema']);
?>