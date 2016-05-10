<?php
include('db.php');

if (!isset($_SESSION)) session_start();

if (empty($_SESSION['user'])) {
	header('Location: index.php');
	exit;
} else {
	$id = $_SESSION['user'];
	$query = mysqli_query($connection,
		"select * from  t135190_klusers1 where id=$id");

	$user_from_db = mysqli_fetch_assoc($query);

}
?>