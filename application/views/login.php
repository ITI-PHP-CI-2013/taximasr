

<div id="fillme">

<?php echo validation_errors(); ?>

        <?php
        $contrlr = base_url('index.php/users/validate');
        echo form_open($contrlr);
        ?>

    <form method="post" action="<?php echo base_url('index.php/users/validate'); ?>">
        <span style="top:45%;left:20%;color:#FFD700;">اسمك</span><input type="text" name="username">
        <span style="top:45%;left:20%;color:#FFD700;">كلمة السر</span><input type="password" name="password">
        <center><input type="submit" data-theme="e" data-inline="true" value="اتفضل">
            <input type="button" name="newCustomer" data-theme="e" data-inline="true" value="زبون جديد">
            <input type="button" name="forgot password" data-theme="e" data-inline="true" value="نسيت كلمة السر">
            <center>
                </form>
                </div>
