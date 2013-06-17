<div >
<table border="0" style="color:#FFD700;">
		
		<tr>
			
			<td>رقم التاكسى: </td>
			<td><?php echo $taxi;?></td>
		</tr>
                <style type='text/css'>
                .ui-widget-header {
                    background-image: url('<?php echo base_url('images/health.jpg'); ?>') !important;
                }
            </style>
		
                <tr>
                <td>حالة العربية</td><td width="300"><div id="progress1" ></div><input type="hidden" id="progress1value" value="<?php echo round(($results['physical_status'])); ?>"></td>
            </tr>
		
                <tr>
                <td>النظافة</td><td width="300"><div id="progress2" ></div><input type="hidden" id="progress2value" value="<?php echo round(($results['cleanliness'])); ?>"></td>
            </tr>
		<tr>
                <td>سلوك السوّاق</td><td width="300"><div id="progress3" ></div><input type="hidden" id="progress3value" value="<?php echo round(($results['driver_behavior'])); ?>"></td>
            </tr>
		<tr>
                <td>الاجرة</td><td width="300"><div id="progress4" ></div><input type="hidden" id="progress4value" value="<?php echo round(($results['pricing'])); ?>"></td>
            </tr>
		 <tr>
                <td>صوت الكاسيت</td><td width="300"><div id="progress5" ></div><input type="hidden" id="progress5value" value="<?php echo round(($results['radio_volume'])); ?>"></td>
            </tr>
		<tr>
                <td>أسلوب السواقة</td><td width="300"><div id="progress6" ></div><input type="hidden" id="progress6value" value="<?php echo round(($results['driving_style'])); ?>"></td>
            </tr>
	</table>
</div>
<div style="float:right;">
<form method="post" action="<?php echo base_url();?>users/signin">
		<input type="submit" name="signin1" data-inline="true" data-theme="e" value="زبون قديم">
</form>
</div>
<div>
<form method="post" action="<?php echo base_url();?>users/signup">
	<input type="submit" name="signup1" data-inline="true" data-theme="e" value="زبون جديد">
</form>
</div>
