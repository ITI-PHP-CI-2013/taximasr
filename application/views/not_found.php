
<html>
    <head>
        <script src='../js/jquery.js' type='text/javascript'></script>

        <script>
            $(document).on("ready", function() {
                $("#signin").on("click", function() {
                    window.location.assign("<?php base_url("users/login"); ?>");
                });

                $("#signup").on("click", function() {
                    window.location.assign("<?php base_url("users/signup"); ?>");

                });
            })
        </script>
    </head>
    <body>
        <p style='color: red ; font-weight: bold'>عفوا هذا التاكسى غير مسجل لدينا</p>
        <p style='color: red ; font-weight: bold'>لكى يمكنك أضافة تقييم لا بد أن تكون مقيدا لدينا</p>

        <span >للدخول </span> <input type='button' value='الدخول' id='signin'/>
        <br><br>
        <span> للتسجيل كمستخدم جديد</span> <input type='button' value='التسجيل' id='signup'/>

    </body>
</html>
