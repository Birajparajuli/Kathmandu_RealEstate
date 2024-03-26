<?php
include("config.php");
$pid = $_GET['id'];
$sql = "DELETE FROM inquiry WHERE id = {$pid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>inquiry Deleted</p>";
	header("Location:inquirylist.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>inquiry Not Deleted</p>";
	header("Location:inquirylist.php?msg=$msg");
}
mysqli_close($con);
?>