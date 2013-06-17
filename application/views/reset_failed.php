<script type="text/javascript">
    if(window.location.href !="<?php echo base_url('users/failed'); ?>" ){
        window.location.href = "<?php echo base_url('users/failed'); ?>";
    }
</script>
<h1> <center> البريد الالكتروني الذي ادخلته خطأ </center></h1>
<form method="post" action="<?php echo base_url(); ?>users/signin">

    <input type="submit" data-theme="e" value="ارجع" data-inline="true" >
</form>