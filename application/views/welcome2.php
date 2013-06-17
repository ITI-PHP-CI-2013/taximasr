<!DOCTYPE html> 
<html> 
    <head> 
        <meta name=viewport content="user-scalable=no,width=device-width" />
        <link rel=stylesheet  href=<?php echo base_url('js/jquerymobile/jquerymobile.css'); ?> />
        <script src=<?php echo base_url('js/jquery.js'); ?>></script>
        <script src=<?php echo base_url('js/jquerymobile/jquerymobile.js'); ?>></script>
        <style type="text/css">
            #background {
                background-position:center; 
                background-repeat: no-repeat;
                width: 100%; 
                height: 100%; 
                position: fixed; 
                z-index: 0; 
            }
        </style>
    </head> 

    <body> 
        <img id="background" src="<?php echo base_url('images/t.png'); ?>"/>
        <div style="height:100% ;" >

            <div style="height:100% ;position:relative;">

                <div style="width:60%; position: relative ;left: 20%; top: 40%;">
                    <!-- <label for="search-2"></label>
                   <form  action="<?php echo base_url('search'); ?>" method="post">     
                        <input type="search" name="taxinum" id="search-2" value="" />
                    </form> -->
                    <form action="<?php echo base_url('search'); ?>" method="get">                      
                        <input type="text" name="taxinum"><br><br>
                        <input type="submit" value="search"><br><br>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>