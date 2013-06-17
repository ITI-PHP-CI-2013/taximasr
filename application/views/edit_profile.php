<!DOCTYPE html> 
<html dir="rtl" lang="ar"> 
    <head> 
        <meta name=viewport content="user-scalable=no,width=device-width" />
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-16">
        <title>تاكسى مصر</title>
        <link rel=stylesheet  href=<?php echo base_url('js/jquerymobile/jquerymobile.css'); ?> />
        <link rel=stylesheet  href=<?php echo base_url('js/taxi.css'); ?> />
        <script src=<?php echo base_url('js/jquery.js'); ?>></script>
        <script src=<?php echo base_url('js/jquerymobile/jquerymobile.js'); ?>></script>
        <script src=<?php echo base_url('js/taxi.js'); ?>></script>
    </head> 
    <body>

    <body> 
        <?php echo validation_errors(); ?>

        <?php
        $contrlr = base_url('index.php/users/edit_profile');
        echo form_open($contrlr);
        ?>
        <div data-role="page">
            <div data-role="header">
                <h1>  <a href=<?php echo base_url('home'); ?> >تاكسى مصر</a></h1>            </div>
            <div data-role="content" style="background-color:black;">
                <div id="fillme">
                    <center><img src="<?php echo base_url(); ?>images/ts.png" height="50%" width="75%"></center>


                    <div style="color:#FFD700;">
                        <form method="post" action="<?php echo base_url('users/edit_profile'); ?>">
                            <span style="top:45%;left:20%;color:#FFD700;">اسمك</span><input type="text" name="uname" >
                            <span style="top:45%;left:20%;color:#FFD700;">ايميلك</span><input type="text" name="e_mail" >
                            <span style="top:45%;left:20%;color:#FFD700;">الايميل اللي حتبعتله</span><input type="text" name="n_mail" >
                            <center><input type="submit" data-theme="e" data-inline="true" value="أكّد">
                                <input type="hidden" name="hideKey" value="12">
                                <input type="button" name="cancel" data-theme="e" data-inline="true" value="فوكّك">
                            </center>
                        </form>
                        <form method="post" action="<?php echo base_url('users/change_pass_form'); ?>">

                            <center><input type="submit" data-theme="e" data-inline="true" value="غيّر كلمة السر">

                            </center>
                        </form>
                    </div>
                </div>
            </div>
            <div data-role="footer">
            </div>
        </div>
    </body>
</html>
