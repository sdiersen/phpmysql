<?php
	require_once('../../../private/initialize.php');


	if (is_post_request()) {
		$page = [];

		$page['subject_id'] = $_POST['subject_id'] ?? '';
		$page['menu_name'] = $_POST['menu_name'] ?? '';
		$page['position'] = get_num_rows_by_subject($page['subject_id']) + 1;
		$page['visible'] = $_POST['visible'] ?? '';
		$page['content'] = $_POST['content'] ?? '';

		$result = insert_page($page);
		redirct_to(url_for('/staff/pages/index.php'));

		
	} else {

		$subject_set = find_all_subjects();

	}

	$page_title = "New Page";

	include(SHARED_PATH . '/staff_header.php');

	
?>

	<div id=content>
		<a class="back-link" href="<?php echo url_for('/staff/pages/index.php');?>">Back to List</a>

		<div class="page new">
			<h1>Create Page</h1>
			<form action="<?php echo url_for('/staff/pages/new.php'); ?>" method="post">
			<dl>
				<dt>Page Name</dt>
				<dd><input type="text" name="menu_name" value="" /></dd>
			</dl>
			<dl>
				<dt>Subject ID</dt>
				<dd>
					<select name="subject_id">
					<?php while ($subject = mysqli_fetch_assoc($subject_set)) { ?>
						<option value="<?php echo h($subject['id']) ?>"><?php echo h($subject['menu_name']); ?></option>
					}
					</select>	
				</dd>
			</dl>
			<dl>
				<dt>Visible</dt>
				<dd>
					<input type="hidden" name="visible" value="0" />
					<input type="checkbox" name="visible" value="1" />
				</dd>
			</dl>
			<div id="operations">
				<input type="submit" value="Create Page">
			</div>
		</form>
	</div>
	</div>

<?php include(SHARED_PATH . '/staff_footer.php');