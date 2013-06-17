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
        $contrlr = base_url('index.php/users/adduser');
        echo form_open($contrlr);
        ?>
        <div data-role="page">
            <div data-role="header">
                <h1>  <a href=<?php echo base_url('home'); ?> >تاكسى مصر</a></h1>            </div>
            <div data-role="content" style="background-color:black;">
                <div id="fillme">
                    <center><img src="<?php echo base_url(); ?>images/ts.png" height="50%" width="75%"></center>


                    <div style="color:#FFD700;">
                        <form method="post" action="<?php echo base_url(); ?>users/adduser">
                            <table>
                                <tr>
                                    <td>اسمك</td>
                                    <td><input type="text" name="Name"></td>
                                </tr>
                                <tr>
                                    <td>كلمة السر</td>
                                    <td><input type="password" name="passwd"></td>
                                </tr>
                                <tr>
                                    <td>اكد كلمة السر</td>
                                    <td><input type="password" name="confpasswd"></td>
                                </tr>
                                <tr>
                                    <td> الايميل اللي انت هتبعتله</td>
                                    <td><input type="email" name="email" placeholder="اميل اللى انت حتبعتله"></td>
                                </tr>
                                <tr>
                                    <td>اميلك</td>
                                    <td>
                                        <!--<select name="city">
                                            <option value="Alexandria">اسكندرية</option>
                                            <option value="Cairo">القاهرة</option>
                                            <option value="Aswan">اسوان</option>
                                            <option value="Fayoum">الفيوم</option>
                                            <option value="PorSaid">بورسعيد</option>
                                        </select>!-->
                                        <input type="email" name="email_u" placeholder="اميلك">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td align="center"><input type="submit" value="سجل" data-theme="e" data-inline="true"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div data-role="footer">
            </div>
        </div>
    </body>
</html>