<!-- <?php
	include "config.php";
	$sql="DELETE FROM meds where med_id='$_GET[id]'";
	if ($conn->query($sql))
	header("location:inventory-view.php");
	else
	echo "error";
?> -->


<?php
include "config.php";

$med_id = $_GET['id'];

// Delete dependent rows from other tables first
$sql1 = "DELETE FROM orders WHERE med_id = '$med_id'";
$conn->query($sql1);

// Now delete from meds table
$sql2 = "DELETE FROM meds WHERE med_id = '$med_id'";
if ($conn->query($sql2)) {
    header("location:inventory-view.php");
} else {
    echo "Error: " . $conn->error;
}
?>
