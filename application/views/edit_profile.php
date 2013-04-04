
       
        <center>
            <form method="post" action=<?php echo base_url("/users/edit_profile") ;?> >
                
                <lable> <b> البريد الالكترونى </b> </lable>
                <br>
                <br>
                <input type="text" id="email" name="email">
                <br>
                 <br>
                <lable> <b> اشعار بريد الكترونى اخر </b></lable>
                <br>
                 <br>
                <input type="text" id="notify" name="notify">
                <br>
                 <br>
                <lable> <b> تاريخ الميلاد </b></lable>
                <br>
                 <br>
                <input type="text" id="date" name="birth">
                <br>
                 <br>
                <lable><b> التليفون المحمول </b></lable>
                <br>
                <br>
                <input type="text" id="mobile" name="mobile">
                <br>
                <br>

                <lable><b> النوع </b> </lable>
                <br>
                <br>
                <input type="radio" value="m" name="gender" > ذكر  
                <input type="radio" value="f" name="gender" > انثى
                <br>
                <br>
                <iput type="submit" name="save" value="حفظ">
                <br>
                <br>
                <iput type="submit" name="cancel" value="رجوع">
                <br>    
                <a href="#"> تغير كلمه المرور  </a>    
                    
            </form>
         </center>   
        


