<?php 


include('connection.php');



$p_id= $_POST['p_id'];

$query = "UPDATE player SET sold=1 WHERE p_id='$p_id'";

$sql = mysqli_query($link,$query);
//$sql2 = mysqli_query($link,"UPDATE team SET balance='$bal' WHERE t_id='$t_id'");

//echo "Current Bid : ".$bid;

?>