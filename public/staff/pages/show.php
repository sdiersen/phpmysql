<?php
	require_once('../../../private/initialize.php');

	$id = $_GET['id'] ?? '1';

	$page = find_page_by_id($id);

	$page_title = 'Show Page';

	include(SHARED_PATH . '/staff_header.php');
	
?>

<div id="content">
	<a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>
	<div class="page show">
		<h1>Page : <?php echo h($page['menu_name']); ?></h1>
		<div class="attributes">
			<dl>
				<dt>Page: </dt>
				<dd><?php echo h($page['menu_name']); ?></dd>
			</dl>
			<dl>
				<dt>Subject ID: </dt>
				<dd><?php echo get_subject_name_by_id(h($page['subject_id'])); ?></dd>
			</dl>
			<dl>
				<dt>Position: </dt>
				<dd><?php echo h($page['position']); ?></dd>
			</dl>
			<dl>
				<dt>Visible: </dt>
				<dd><?php echo h($page['visible']) == '1' ? 'true' : 'false'; ?></dd>
			</dl>
			<dl>
				<dt>Content: </dt>
				<dd><?php echo h($page['content']); ?></dd>
			</dl>
		</div>
	</div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>