<? @header("Content-Type: text/html; charset=UTF-8"); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>تاكسى مصر -- اللى ركبوا التاكسى دة قبلك رأيهم فيه ايه؟</title>

		<!-- load js libs -->
		<script src="<?php echo base_url('js/jquery-min.js'); ?>"></script>
		<script src="<?php echo base_url('js/javascript.js'); ?>"></script>
		<!-- load css -->
		<link href="<?php echo base_url('css/taxi-masr.css'); ?>" rel="stylesheet" type="text/css" />

		<!-- some page-specific js -->
		<script>
		</script>

		<!-- some page-specific styling -->
		<style>
		</style>
	</head>
	<body dir="rtl">
	<h1>تاكسى مصر!</h1>
	<?php if(isset($username) && $username != ''){ ?>
		<p>مرحباً بك يا <?php echo $username; ?>!</p>
		<a href="<?php echo base_url('users/view_profile'); ?>">صفحتى الشخصية</a>
	<?php }else{ ?>
		<p>لم تقم بتسجيل الدخول بعد!</p>
		<a href="<?php echo base_url('users/login'); ?>">تسجيل الدخول</a>
		<a href="<?php echo base_url('users/signup'); ?>">اشترك الآن!</a>
	<?php } ?>
