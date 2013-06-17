
<div>
    <div>
        <table border="0" style="color:#FFD700;">
            <tr>
                <td>رقم التاكسى</td><td><?php echo $taxiname; ?></td>
            </tr>
            <tr>
                <td></td><td><?php
$taxiscore = (($taxireview['physical_status'] / $count) + ($taxireview['cleanliness'] / $count) +
        ($taxireview['driver_behavior'] / $count) + ($taxireview['pricing'] / $count) + ($taxireview['radio_volume'] / $count) +
        ($taxireview['driving_style'] / $count)) / 6;
round($taxiscore)
?></td>
            </tr>

            <style type='text/css'>
                .ui-widget-header {
                    background-image: url('<?php echo base_url('images/health.jpg'); ?>') !important;
                }
            </style>
            <tr>
                <td>حالة العربية</td><td width="300"><div id="progress1" ></div><input type="hidden" id="progress1value" value="<?php echo round(($taxireview['physical_status'] / $count)); ?>"></td>
            </tr>
            <tr>
                <td>النظافة</td><td width="300"><div id="progress2" ></div><input type="hidden" id="progress2value" value="<?php echo round(($taxireview['cleanliness'] / $count)); ?>"></td>
            </tr>
            <tr>
                <td>سلوك السوّاق</td><td width="300"><div id="progress3" ></div><input type="hidden" id="progress3value" value="<?php echo round(($taxireview['driver_behavior'] / $count)); ?>"></td>
            </tr>
            <tr>
                <td>الاجرة</td><td width="300"><div id="progress4" ></div><input type="hidden" id="progress4value" value="<?php echo round(($taxireview['pricing'] / $count)); ?>"></td>
            </tr>
            <tr>
                <td>صوت الكاسيت</td><td width="300"><div id="progress5" ></div><input type="hidden" id="progress5value" value="<?php echo round(($taxireview['radio_volume'] / $count)); ?>"></td>
            </tr>
            <tr>
                <td>أسلوب السواقة</td><td width="300"><div id="progress6" ></div><input type="hidden" id="progress6value" value="<?php echo round(($taxireview['driving_style'] / $count)); ?>"></td>
            </tr>
            <tr>
                <td>عدد التقييمات الكلى</td><td><?php echo $count; ?></td>
            </tr>
        </table>
    </div>
    <div <?php if ($taxiscore <= 20) { ?>
        style="color:red;"
        <?php } elseif (($taxiscore >= 21) && ($taxiscore <= 45)) { ?>
            style="color:orange;"
        <?php } elseif (($taxiscore >= 46) && ($taxiscore <= 75)) { ?>
            style="color:yellow;"
        <?php } else { ?>
            style="color:green;"
        <?php } ?>
        ><h1>التقييم الاجمالي <?php
        $taxiscore = (($taxireview['physical_status'] / $count) + ($taxireview['cleanliness'] / $count) +
                ($taxireview['driver_behavior'] / $count) + ($taxireview['pricing'] / $count) + ($taxireview['radio_volume'] / $count) +
                ($taxireview['driving_style'] / $count)) / 6;
        echo round($taxiscore)
        ?>%</h1></div>
    <!-- <img src="<?php base_url(); ?>images/traffic.jpg"> -->

    <form method="post" action="review/rate/<?php echo $taxiID; ?>">
        <input type="hidden" name='taxi_num' value="<?php echo $taxiname; ?>">
        <input type="submit" data-theme ="e" value="اضافة تقييم جديد">
    </form>
    <form method="post" action="users/email_page">
        <input type="submit" data-theme ="e" value="انا ركبت التاكسي">
    </form>
</div>

