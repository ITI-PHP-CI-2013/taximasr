<?php
var_dump($taxis);

?>
<html>
<head></head>
<body >
	<div style="width=100% height=100%">
	<h1><?php $taxis['taxi_number'] ?></h1>
	<br>
	<h2><?php $taxis['score']?></h2><h2>التقييم الكلي:</h2>
	<br>
	
	<?php foreach ($reviews as $key => $value){?>
	<?php }?>
	<?php echo $reviews['physical_status']; ?><h3>حالة السيارة</h3>
	<?php echo $reviews['cleanliness']; ?><h3>النظافة</h3>
	<?php echo $reviews['driver_behavior']; ?><h3>سلوك السائق</h3>
	<?php echo $reviews['pricing']; ?><h3>الاجرة</h3>
	<?php echo $reviews['radio_volume']; ?><h3>صوت الراديو</h3>
	<?php echo $reviews['driving_style']; ?><h3>سرعة القيادة</h3>
	</div>


</body>

</html>
