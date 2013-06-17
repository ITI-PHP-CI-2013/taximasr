 
window.onload=function() {
 $( "#progress1" ).progressbar({
value: parseInt( $("#progress1value").val())
});

$( "#progress2" ).progressbar({
value: parseInt( $("#progress2value").val())
});
$( "#progress3" ).progressbar({
value: parseInt( $("#progress3value").val())
});
$( "#progress4" ).progressbar({
value: parseInt( $("#progress4value").val())
});
$( "#progress5" ).progressbar({
value: parseInt( $("#progress5value").val())
});
$( "#progress6" ).progressbar({
value: parseInt( $("#progress6value").val())
});
   
    $("input[name='newCustomer']").on("click",function(){
        window.location.pathname='taximasr/users/signup';
    });
    $("input[name='signin']").on("click",function(){
        window.location.pathname='taximasr/users/signin';
    });
    $("input[name='signup']").on("click",function(){
        window.location.pathname='taximasr/users/signup';
    });
    $("input[name='signin1']").on("click",function(){
        window.location.pathname='taximasr/users/signin';
    });
    $("input[name='signup1']").on("click",function(){
        window.location.pathname='taximasr/users/signup';
    });
    $("input[name='view_profile']").on("click",function(){
        window.location.pathname='taximasr/users/view_profile';
    });
    $("input[name='add_friend']").on("click",function(){
        window.location.pathname='taximasr/users/addfriend_v';
    });

    $("input[name='sign_out']").on("click",function(){
        window.location.pathname='taximasr/users/sign_out';
    });
	
    $("input[name='cancel']").on("click",function(){
        window.location.pathname='taximasr/users/view_profile';
    });
        
    $("input[name='main']").on("click",function(){
        window.location.pathname='taximasr';
    });
    $("input[name='chat']").on("click",function(){
        window.location.pathname='taximasr/users/chat_v';
    });
	
    $(window).bind('resize',function(event){
        window.scrollTo(0,0);
        winhigh = $.mobile.getScreenHeight(); //Get available screen height, not including any browser chrome
        headhigh = $('[data-role="header"]').first().outerHeight(); //Get height of first page's header
        winhigh = winhigh - headhigh - 30; //Subtract 30 for the top and bottom 15-pixel margins around the content area
        winwide = $(document).width(); //Get width of document
        winwide = winwide - 30; //Subtract 30 for the right and left 15-pixel margins around the content area
        $('div#fillme').css('width',winwide + 'px').css('height',winhigh + 'px'); //Change div to maximum visible area
    });
    $(window).bind('orientationchange',function(event){
        //Eliminate white-space on orientationchange: http://stackoverflow.com/questions/6448465/jquery-mobile-device-scaling
        if (window.orientation == 90 || window.orientation == -90 || window.orientation == 270) {
            $('meta[name="viewport"]').attr('content', 'height=device-width,width=device-height,initial-scale=1.0,maximum-scale=1.0');
        } else {
            $('meta[name="viewport"]').attr('content', 'height=device-height,width=device-width,initial-scale=1.0,maximum-scale=1.0');
        };
        $(window).trigger('resize');
        window.scrollTo(0,0);
    }).trigger('orientationchange');
    
}