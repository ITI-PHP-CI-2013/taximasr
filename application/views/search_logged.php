<html dir="rtl" lang="ar">
	<head>
		<meta http-equiv="Content-type" content="text/html" charset="utf-8"></meta>
	</head>
	<body>
		<div>
			<table border="1">
				<tr>
					<td>رقم التاكسى</td><td><?php echo $taxiname;?></td>
				</tr>
				<tr>
					<td>التقييم الاجمالى</td><td><?php echo $taxiscore;?></td>
				</tr>
				<tr>
					<td>حالة العربية</td><td><?php echo $taxireview['physical_status'];?></td>
				</tr>
				<tr>
					<td>النظافة</td><td><?php echo $taxireview['cleanliness'];?></td>
				</tr>
				<tr>
					<td>سلوك السائق</td><td><?php echo $taxireview['driver_behavior'];?></td>
				</tr>
				<tr>
					<td>الاجرة</td><td><?php echo $taxireview['pricing'];?></td>
				</tr>
				<tr>
					<td>صوت الكاسيت</td><td><?php echo $taxireview['radio_volume'];?></td>
				</tr>
				<tr>
					<td>اسلوب القيادة</td><td><?php echo $taxireview['driving_style'];?></td>
				</tr>
				<tr>
					<td>عدد التقييمات الكلى</td><td><?php echo $count; ?></td>
				</tr>
			</table>
			<form method="post" action="review/rate/<?php echo $taxiID; ?>">
				<input type="submit" value="اضافة تقييم جديد">
			</form>
			<form method="post" action="users/notify">
				<input type="submit" value="ارسل ايميل">
			</form>
		</div>

	</body>
</html>