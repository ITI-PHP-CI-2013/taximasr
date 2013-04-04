
<!DOCTYPE html>
<html dir="rtl" lang="ar">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>تغيير كلمه المرور</title>
    </head>

    <body>

                        <center>
                        <table>
                            <div id="change">
							<form action ="<?php echo base_url("/users/change_password");?>" method ="post">
                                <tr>
                                <td> كلمه المرور القديمه   </td>
                               <td><input type="password" id="oldpass" name="oldpass"/></td>
                                </tr>
                                <tr>
                                <td>كلمه المرور الجديده </td>
                                <td><input type="password" id="newpass" name="newpass"/></td>
                                </tr>
                                <td> اعد كلمه المرور الجديده </td>
                                <td><input type="password" id="connewpass" name="connewpass" /></td>
                                </tr>
                                <tr>
                               <td> <input type="submit" value=" حفظ التغيير" id="save" ></td>
                                <td>  <input type="button" value="الغاء" id="cancel"> </td> 
                                </tr>
                               
								</form>
                            </div> 
							 </table>
							</center>

    </body>

</html>