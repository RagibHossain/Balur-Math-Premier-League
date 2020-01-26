<?php 
include('connection.php');


$bid = $_POST['bid'];
$p_id= $_POST['p_id'];
$t_id=$_POST['t_id'];
$bal = $_POST['bal'];
$query = "UPDATE player SET t_id='$t_id',current_bid='$bid' WHERE p_id='$p_id'";

$sql = mysqli_query($link,$query);
$sql2 = mysqli_query($link,"UPDATE team SET balance='$bal' WHERE t_id='$t_id'");

echo "Current Bid : ".$bid;
?>