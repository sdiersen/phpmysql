<?php require_once('../../../private/initialize.php'); ?>

<?php
	$pages = [
		['id' => '1', 'position' => '1', 'visible' => '1', 'page_name' => 'Hatha Yoga'],
		['id' => '2', 'position' => '2', 'visible' => '1', 'page_name' => 'Zumba'],
		['id' => '3', 'position' => '3', 'visible' => '1', 'page_name' => 'Body Pump'],
		['id' => '4', 'position' => '4', 'visible' => '1', 'page_name' => 'Cardio X 45'],
	];
?>
<?php $page_title = 'Pages'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

	<div id="content">
		<div class="pages listing">
			<h1>Pages</h1>
			<div class="actions">
				<a class="action" href="">Create New Page</a>
			</div>

			<table class="list">
				<tr>
					<th>ID</th>
					<th>Position</th>
					<th>Visible</th>
					<th>Name</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
				<?php foreach($pages as $page) { ?>
					<tr>
						<td><?php echo $page['id']; ?></td>
						<td><?php echo $page['position']; ?> </td>
						<td><?php echo $page['visible']; ?> </td>
						<td><?php echo $page['page_name']; ?> </td>
						<td><a class="action" href="<?php echo url_for('/staff/pages/show.php?id=' . $page['id']); ?>">View</a></td>
						<td><a class="action" href="">Edit</a></td>
						<td><a class="action" href="">Delete</a></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>