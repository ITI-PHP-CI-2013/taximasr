<?php foreach($user_profile as $row){ ?>
<body>
	<h2>مرحباً <?php $row['username'] ?></h2><br>
	<label>اسم المستخدم:</label><br><br>
	<label><?php $row['username'] ?></label><br><br>
	<label>البريد الإلكترونى للمستخدم:</label><br><br>
	<label><?php $row['email'] ?></label><br><br>
	<label>البريد الإلكترونى للمرسل إليه:</label><br><br>
	<label><?php $row['notify_email'] ?></label><br><br>
	<label>رقم الموبايل:</label><br><br>
	<label><?php $row['mobile'] ?></label><br><br>
	<br><br>
	<a href="<?php echo base_url('/users/go_edit'); ?>">لتعديل صفحة المستخدم اضغط هنا</a><br><br>
	<a href="<?php echo base_url('/users/change_password'); ?>">لتغيير كلمة المرور اضغط هنا</a>
</body>
<?php } ?>
