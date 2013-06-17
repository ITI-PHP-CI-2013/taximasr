<script type="text/javascript">
    if(window.location.href !="<?php echo base_url('home'); ?>" ){
        window.location.href = "<?php echo base_url('home'); ?>";
    }
</script>
<form action="<?php echo base_url('search'); ?>" method="get">                      
    <input type="text" name="taxinum" x-webkit-speech><br><br>
    <input type="button" name="view_profile" data-theme="e" data-inline="true" value="شوف بروفايلك">
    <input type="button" name="add_friend" data-theme="e" data-inline="true" value="أضف صديق">
    <input type="button" name="chat" data-theme="e" data-inline="true" value="شات">
    <input type="button" name="sign_out" data-theme="e" data-inline="true" value="سلام">

</form>
<form action="<?php echo base_url('users/start_track'); ?>" method="post"> 
<input type="submit" name="start_track" data-theme="e" data-inline="true" value="ابدأ التعقب">
</form>






