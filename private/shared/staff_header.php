<?php
	if(!isset($page_title)) { $page_title = 'Title not set'; }
?>

<!doctype html>

<html lang="en">
	<head>
		<title><?php echo h($page_title); ?></title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo url_for('stylesheets/staff.css'); ?>">
	</head>

	<body>
		<header>
			<h1>PHP and MySQL Staff Area</h1>
		</header>

		<navigation>
			<ul>
				<li><a href="<?php echo url_for('/staff/index.php'); ?>">Menu</a></li>
			</ul>
		</navigation>