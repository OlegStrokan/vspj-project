<?php 
require("session.php");

$sql_delete = "DELETE FROM users WHERE userid = ".$_GET['id'];
$result_delete = mysqli_query($connection, $sql_delete);
header("Refresh:0; url=users.php");
?>