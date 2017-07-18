<?php
	
	function find_all_subjects() {
		global $db; //bring $db into scope using the global keyword

		$sql  = "SELECT * FROM subjects ";
		$sql .= "ORDER BY position ASC";
		$result = mysqli_query($db, $sql);

		confirm_result_set($result);

		return $result;
	}
	function find_all_pages() {
		global $db;

		$sql  = "SELECT * FROM pages ";
		$sql .= "ORDER BY subject_id ASC, position ASC";
		$result = mysqli_query($db, $sql);

		confirm_result_set($result);

		return $result;
	}
?>