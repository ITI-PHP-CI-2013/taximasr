
<form style="color:#FFD700;" class="rangeslider" method="post" action="<?php echo base_url(); ?>review/sb">

حالة التاكسي!    

    <input type="range" name="sb1" min="0" max="100" step="1" value="0">
    <h4>
    مستوى النظافة
    </h4>
    <input type="range" name="sb2" min="0" max="100" step="1" value="0">
    <h4>
    سلوكيات السوّاق
     </h4>
    <input type="range" name="sb3" min="0" max="100" step="1" value="0">
    <h4>
    الأجرة
     </h4>
    <input type="range" name="sb4" min="0" max="100" step="1" value="0">
    <h4>
    صوت الكاسيت
     </h4>
    <input type="range" name="sb5" min="0" max="100" step="1" value="0">
    <h4>
    اسلوب السواقة
     </h4>
    <input type="range" name="sb6" min="0" max="100" step="1" value="0">
    <input type="hidden" name="hideKey" value="<?php echo $taxinum; ?>">

    <input type="submit" data-theme="e" value="سجل" data-inline="true">


</form>





