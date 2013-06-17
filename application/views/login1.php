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
        <?php echo validation_errors(); ?>

        <?php
        $contrlr = base_url('index.php/users/validate');
        echo form_open($contrlr);
        ?>
        <img id="background" src="<?php echo base_url('images/taxi.png'); ?>"/>
        <div data-role="page">
            <div data-role="header">
                <h1>  <a href=<?php echo base_url('home'); ?> >تاكسى مصر</a></h1>            </div>
            <div data-role="content" style="background-color:black;">
                <div id="fillme">
                    <center><img src="<?php echo base_url(); ?>images/ts.png" height="50%" width="75%"></center>


                    <form method="post" action="<?php echo base_url('index.php/users/validate'); ?>">
                    </form>
                    <form method="post" action="<?php echo base_url('index.php/users/validate'); ?>">
                        <span style="top:45%;left:20%;color:#FFD700;">اسمك</span><input type="text" name="username" value="<?php
        if (isset($name)) {
            echo $name;
        }
        ?>">
                        <span style="top:45%;left:20%;color:#FFD700;">كلمة السر</span><input type="password" name="password" value="<?php
                                                                                        if (isset($passwd)) {
                                                                                            echo $passwd;
                                                                                        }
        ?>">
                        <center><input type="submit" data-theme="e" data-inline="true" value="اتفضل">
                             </center>
                            </form>
                            <form method="post" action="<?php echo base_url('index.php/users/forgot_password'); ?>">
                              <center>  <input type="submit" name="forgot password" data-theme="e" data-inline="true" value="نسيت كلمة السر"></center>
                            </form>
                      

                </div>
            </div>
            <div data-role="footer">
            </div>
        </div>
    </body>
</html>
<?php exit; ?>