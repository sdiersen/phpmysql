<?php
	require_once('../../../private/initialize.php');

	if(!isset($_GET['id'])) {
		redirect_to(url_for('/staff/pages/index.php'));
	}

	$id = $_GET['id'];

	if (is_post_request()) {
		// Handle form values sent by new.php
		$page = [];
		$page['id'] = $id;
		$page['subject_id'] = h($_POST['subject_id'] ?? '');
		$page['menu_name'] = h($_POST['menu_name'] ?? '');
		$page['position'] = h($_POST['position'] ?? '');
		$page['visible'] = h($_POST['visible'] ?? '');
		$page['content'] = h($_POST['content'] ?? '');

		update_page($page);

		redirect_to(url_for('/staff/pages/show.php?id=' . $id));
	} else {
		$page = find_page_by_id($id);

		$page_set = find_all_pages();
		$page_count = mysqli_num_rows($page_set);
		mysqli_free_result($page_set);
		$subject_set = find_all_subjects();
		$subject_count = mysqli_num_rows($subject_set);
		mysqli_free_result($subject_set);
		
	}

	// Need to change so that position only shows available positions for the specific subject


	$page_title = "Edit Page";

	include(SHARED_PATH . '/staff_header.php');

	
?>

	<div id=content>
		<a class="back-link" href="<?php echo url_for('/staff/pages/index.php');?>">&laquo; Back to List</a>

		<div class="page edit">
			<h1>Edit Page</h1>
			<form name="pageForm" action="<?php echo url_for('/staff/pages/edit.php?id=' .  h(u($id)));?>" method="post">
			<dl>
				<dt>Page Name</dt>
				<dd><input type="text" name="menu_name" value="<?php echo h($page['menu_name']); ?>" /></dd>
			</dl>
			<dl>
				<dt>Subject ID</dt>
				<dd>
					<select name="subject_id">
					<?php
						for($s=1; $s<=$subject_count; $s++) {
							echo "<option value=\"{$s}\"";
							if($page['subject_id'] == $s) {
								echo " selected";
							}
							echo ">" . get_subject_name_by_id($s) . "</option>";
						}
					?>
					</select>
			</dl>
			<dl>
				<dt>Position</dt>
				<dd>
					<select name="position">
					<?php
						for($p=1; $p<=$page_count; $p++) {
							echo "<option value=\"{$p}\"";
							if($page['position'] == $p) {
								echo " selected";
							}
							echo ">{$p}</option>";
						}
					?>
					</select>	
				</dd>
			</dl>
			<dl>
				<dt>Visible</dt>
				<dd>
					<input type="hidden" name="visible" value="0" />
					<input type="checkbox" name="visible" value="1" <?php if($page['visible'] == "1") { echo " checked"; } ?>/>
				</dd>
			</dl>
			<dl>
				<dt>Content</dt>
				<dd>
					<textarea style="width:50em;height:20em;" name="content"><?php echo $page['content']; ?></textarea>
				</dd>
			</dl>
			<div id="operations">
				<input type="submit" value="Edit Page">
			</div>
		</form>
	</div>
	</div>

<?php include(SHARED_PATH . '/staff_footer.php');