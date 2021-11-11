<?php 
require("session.php");

$sql_delete = "DELETE FROM prispevky WHERE id = ".$_GET['id'];
$result_delete = mysqli_query($connection, $sql_delete);
header("Refresh:0; url=index.php");
?>