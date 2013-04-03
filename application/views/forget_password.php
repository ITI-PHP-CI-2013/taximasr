	<div style="padding:10px">
		<h1>صفحه استرجاع المعلومات</h1>
		<form action='<?php echo base_url("users/forget_password");?>' method='post'>
		ادخل اسم المستخدم
		<br/>
		<input type="text" name="username" style="width:90%"/>
		<br/>
		او ادخل البريد الالكترونى
		<br/>
		<input type="text" name="email" style="width:90%"/>
		<br/>
		<div style="width:90%">
		<input type="submit" value="ارسال" style="width:42%"/> 
		<input type="button" value="رجوع" style="width:42%" onclick="window.location.replace('login');"/> 
		</form>
	<div>