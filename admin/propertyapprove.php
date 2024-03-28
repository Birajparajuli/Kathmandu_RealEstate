<?php
include("config.php");
$pid = $_GET['id'];
$sql = "UPDATE property_list SET approved=true WHERE id = {$pid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Property Approved</p>";
	header("Location:propertyview.php?msg=$msg");
}
else{
	// echo mysqli_error($con);
	$msg="<p class='alert alert-warning'>Property Not Approved</p>";
	header("Location:propertyview.php?msg=$msg");
}
mysqli_close($con);
?>