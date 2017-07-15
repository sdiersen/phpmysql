<?php
	 require_once('../../../private/initialize.php'); 
	$id = $_GET['id'] ?? '-1';

	echo h($id);
	
?>