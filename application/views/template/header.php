<!DOCTYPE html> 
<html dir="rtl" lang="ar"> 
    <head> 
        <meta name=viewport content="user-scalable=no,width=device-width" />
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-16">
        <title>تاكسى مصر</title>
        <link rel=stylesheet  href=<?php echo base_url('js/jquerymobile/jquerymobile.css'); ?> />
        <link rel=stylesheet  href=<?php echo base_url('js/taxi.css'); ?> />
     <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src=<?php echo base_url('js/jquery.js'); ?>></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>    
    <script src=<?php echo base_url('js/jquerymobile/jquerymobile.js'); ?>></script>
        <script src=<?php echo base_url('js/taxi.js'); ?>></script>
        
    </head> 
    <body style="background-color:black"> 
        <img id="background" src="<?php echo base_url('images/ts.png'); ?>"/>
        <div data-role="page">
            <div  data-role="header">

                <h1>  <a href=<?php echo base_url('home'); ?> >تاكسى مصر</a></h1>

                <?php if ($this->session->userdata('name')) { ?>
                    <h1 style="color:yellowgreen;">أهلا يا <?php echo $this->session->userdata('name'); ?></h1> 
                <?php }
                ?>

            </div>
            <div data-role="content" style="background-color:black;">
                <div id="fillme">
                    <center><img src="<?php echo base_url(); ?>images/ts.png" height="50%" width="75%"></center>


