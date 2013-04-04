<? @header("Content-Type: text/html; charset=UTF-8"); ?>
<!DOCTYPE html public "-//W3C//DTD html 4.0 //en">

<html dir="rtl" lang="ar">
    <head>
        
        <meta charset=utf-8" />
        <title>message</title>
    </head>
    <body>
        <form method="post" action="<?php echo base_url('users/send'); ?>">
            <label>سيتم ارسال هذه الرسالة الى:<?php echo $nEmail; ?></label></br>
            <textarea id="message" name="message" cols="50" rows="3">قام على بركوب تاكسى رقم س ف م 2 3 4 5 الآن ... يمكنك الاطلاع على تقييم الجمهور لهذا التاكسى عبر موقع تاكسى مصر</textarea><br>
                <input type="submit" id="send" value="Send"/>
        </form>
    </body>

</html>