<?php
$conn = mysqli_connect("localhost","root","1234","admissionsmanagement");
if(!$conn)
{
	echo "Loi connection";
	exit();
}
mysqli_query($conn,"set names utf8");
?>