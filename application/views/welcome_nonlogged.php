<script type="text/javascript">
    if(window.location.href !="<?php echo base_url('home'); ?>" ){
        window.location.href = "<?php echo base_url('home'); ?>";
    }
</script>

<?php     
if(isset($msg)){?>
 <span style="font-family:arial;color:red;font-size:20px;">
     لم يتم العثور على هذا التاكسي!
 </span>   
<?php }

?>
<form action="<?php echo base_url('search'); ?>" method="get">                      
    <input type="search" name="search" placeholder="دوّر" x-webkit-speech/>
    <input type="button" data-inline="true" name="signin" data-theme="e" value="زبون قديم">
    <input type="button" data-inline="true" name="signup" data-theme="e" value="زبون جديد">
</form>
