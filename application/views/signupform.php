<div>

                <script  src="<?php echo base_url('js/jquery-min.js'); ?>"></script>
        <script>
           
           $(function() 
		{
                    var x = 0 ;
                    $('#name').focusout(function()
                    {	
                       $.ajax({
                        url: "<?php echo base_url('index.php/users/check_user'); ?>",
                        type: "GET",
                        data: 
                        {
                                username: $('#name').val() 	
                        },
                        success: function(resp){
                                            x=0;
                                          $("#error").css("display","inline");
                                        $('#error').html(resp);	
                                        alert(resp.length);
                                        if(resp.length!=0)
                                            
                                               x=1
                           
                    }
                       });

                });  
			
			$('#submit').click(function()
			{
			
				var ck_name = /^([A-Za-z] ?){4,50}$/;
				
                                
				var ck_email=/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\ ".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				var ck_password =  /^[A-Za-z0-9!@#$_]{6,20}$/;
				$("#error").css("display","inline");
                                
                                if(x==1)
                                {
                                    $("#error").html("**هذا الأسم مستخدم سابقا**");
                                    return false;
                                }
				else if(!ck_name.test($("#name").val()))
				{

	
					$("#error").html("**ادخل الاسم الصحيح**");
					return false;
				}
				
				
				
				else if (!ck_password.test($("#password").val()))
				{
				
				
					
					$("#error").html("**كلمة السر تتكون من 6 ل 20 حرف, وتحتوى على ارقام, حروف, @,#,$,_ فقط**");
                                        return false;
				}
                                
                               else if ($("#password").val()!=$("#confirm").val())
				{
				
				
	
					$("#error").html("**كلمة السر لا تتطابق**");
                                        return false;
				}
				else if(!ck_email.test($("#email").val()))
				{

	
					$("#error").html("**ادخل البريد الصحبح**");
                              
					return false;
				}			

				
				
			});
		});
			  
	
    
        </script>
   
        <form method="post" action="<?php echo base_url('index.php/users/insert_user'); ?>">
             
            <div style="color:red" id="error" class="error"></div><br><br>
            <br>
            <br><label>اسم المستخدم: </label><br>
             
             <input type="text" id="name" name="name"><br>
             
            <label>كلمة السر: </label><br>
             
             <input type="password" id="password" name="password"><br>
             
            <label>تأكيد كلمة السر: </label><br>
             
             <input type="password" id="confirm" name="confirm"><br>
             
            <label>البريد الألكترونى: </label><br>
             
             <input type="text" id="email" name="email"><br>
             
             <input type="submit" value="تسجيل" id="submit" name="submit"><br>
       
             
        </form>
</div>
