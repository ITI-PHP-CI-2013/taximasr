<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<link rel="stylesheet" href="css/taxi-masr.css" type="text/css">
<title>تغير كلمة المرور</title>
</head>
<body>
<form method="POST" action="<?php echo base_url('users/reset_password')?>">
<span><b>ادخل كلمة المرور الجديد</b></span>
<br>
<input type="password" name="newPassword" />
<br>
<span><b>إعاد كلمة المرور الجديد</b></span>
<br>
<input type="password" name="confirmPassword" />
<br>
<input type="submit" name="save" value="حفظ" />
</form>
</body>
</html>