<? @header("Content-Type: text/html; charset=UTF-8"); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>تاكسى مصر -- اللى ركبوا التاكسى دة قبلك رأيهم فيه ايه؟</title>

		<!-- load js libs -->
		<script src="<?php echo base_url('js/jquery-min.js'); ?>"></script>
		
		<!-- load css -->
		<link href="<?php echo base_url('css/taxi-masr.css'); ?>" rel="stylesheet" type="text/css" />

		<!-- some page-specific js -->
		<script>
		</script>

		<!-- some page-specific styling -->
		<style>
		</style>
	</head>
	<body>
	<?php if(isset($username)){ ?>
		<p>مرحباً بك يا <?php echo $username; ?>!</p>
		<a href="<?php echo base_url('users/view_profile'); ?>">صفحتى الشخصية</a>
	<?php } ?>