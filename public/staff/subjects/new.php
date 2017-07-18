<?php 

	require_once('../../../private/initialize.php');

	$menu_name = '';
	$position = '';
	$visible = '';

	if (is_post_request()) {
		$menu_name = $_POST['menu_name'] ?? '';
		$position = $_POST['position'] ?? '';
		$visible = $_POST['visible'] ?? '';

		echo "Form parameters<br/>";
		echo "Menu Name: " . $menu_name . "<br />";
		echo "Position: " . $position . "<br />";
		echo "Visible: " . $visible . "<br />";
	}

	$page_title = 'Create Subject'; 

	include(SHARED_PATH . '/staff_header.php');
?>

<div id="content">
	<a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

	<div class="subject new">
		<h1>Create Subject</h1>

		<form action="<?php echo url_for('/staff/subjects/create.php'); ?>" method="post">
			<dl>
				<dt>Menu Name</dt>
				<dd><input type="text" name="menu_name" value="<?php echo h($menu_name); ?>" /></dd>
			</dl>
			<dl>
				<dt>Position</dt>
				<dd>
					<select name="position">
						<option value="1" <?php if($position == "1") { echo " selected"; } ?> >1</option>
					</select>	
				</dd>
			</dl>
			<dl>
				<dt>Visible</dt>
				<dd>
					<input type="hidden" name="visible" value="0" />
					<input type="checkbox" name="visible" value="1" <?php if($visible == "1") { echo " checked"; } ?> />
				</dd>
			</dl>
			<div id="operations">
				<input type="submit" value="Create Subject">
			</div>
		</form>
	</div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>