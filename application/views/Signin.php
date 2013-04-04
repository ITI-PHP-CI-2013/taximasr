<?php
header("Content-Type: text/html; charset=utf-8");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($errormsg)){
    echo $errormsg;
}
?>
<html >
    <head>
        <title>
            Sign In
        </title>
        <!-- load js libs -->
		<script src="<?php echo base_url('js/jquery-min.js'); ?>"></script>
		
		<!-- load css -->
		<link href="<?php echo base_url('css/taxi-masr.css'); ?>" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <form method="post" action="<?php echo base_url('users/chklogin') ?>">
            <table>
               <tr> <td><label>اسم المستخدم</label></td></tr>
                    <tr><td><input type="text" name="username"></td></tr>
                    <tr><td>               
                       <label>كلمة السر</label></td></tr>                    
                       <tr><td>
                        <input type="password" name="password"> </td></tr>                       
                       <tr><td><input type="submit" value="sign in"> </td></tr>
            </table>
                    
            </form>        
          <a href=" <?php echo base_url('/users/change_password')?>">نسيت كلمة السر</a>                    
        
    </body>
</html>
