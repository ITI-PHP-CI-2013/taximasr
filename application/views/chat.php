


<!DOCTYPE html> 
<html> 
    <head> 
        <meta name=viewport content="user-scalable=no,width=device-width" />
        <link rel=stylesheet href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
        <script src=<?php echo base_url('js/jquery.js'); ?>></script>
        <script src=<?php echo base_url('js/jquerymobile/jquerymobile.js'); ?>></script>

        <meta http-equiv=content-type content=text/html;charset=utf-8>

        <meta name=viewport content=width=device-width>
        <meta name=viewport content=initial-scale=1.0>
        <meta name=viewport content=user-scalable=no>

        <meta name=apple-mobile-web-app-capable content=yes>  
        <meta name=apple-mobile-web-app-status-bar-style content=black>

        <link rel=apple-touch-icon href=icon.png>
        <link rel=apple-touch-startup-image href=startup.png>


        <style>
            .message {
                padding: 5px 5px 5px 5px;
            }
            .username {
                font-weight: strong;
                color: #0f0;
            }
            .msgContainerDiv {
                overflow-y: scroll;
                height: 250px;
            }
        </style>

    </head> 

    <body> 

        <div data-role=page id=home>
            <div data-role=header>
                <h1>الشات</h1>
            </div>

            <div data-role=content>
                <h4> الأصدقاء</h4>


                <ul data-role=listview id="selected">


               
                    <?php
                    foreach ($friends as $row) {
                        echo '<li><a href=#chatPage>' . $row->username . '</a></li>';
                    }
                    ?>


                </ul>
            </div>
        </div>
          <div data-role="page" id="chatPage" data-role="page" data-theme="a">

            <div data-role="header">
                <h1>الشات</h1>
            </div>

            <div data-role="content">
                <div id="incomingMessages" name="incomingMessages" class="msgContainerDiv" ></div>
                <label for="messageText"><strong>Message:</strong></label>
                <textarea id="messageText"  >

                </textarea>

                <fieldset class="ui-grid-a">
                    <div  class="ui-block-a"><a href="<?php echo base_url('home'); ?>" id="goBackButton"   data-theme="b" data-role="button"> ارجع</a></div>
                    <div  class="ui-block-b"><button   id="chatSendButton" name="chatSendButton" data-theme="e">ابعت</div>
                </fieldset>
            </div>


            <script>
                $('ul').children('li').on('click', function() {
                    $("div[data-role='footer']").text($("div[data-role='footer']").text() + $(this).text());
                                    
                });
            </script>
        </div>
        

            <div id=pubnub pub-key=demo sub-key=demo></div>
           
            <script src=http://cdn.pubnub.com/pubnub-3.1.min.js></script>
            <script>(function() {
                var pubnub = PUBNUB.init({
                    publish_key: 'pub-c-cb9f2284-5027-4659-9938-0933216b7f2e',
                    subscribe_key: 'sub-c-9aa2294c-d4f3-11e2-9159-02ee2ddab7fe'
                });
            })();</script>


           
<input type="hidden" value="<?php echo $this->session->userdata('name'); ?>" id="chat_name"/>
            <script>$(document).ready(function() {

            // dynamic ccording to the database
            var cn = document.getElementById('chat_name');
            var chatName = cn.value;
             channel = "hello_world";
            PUBNUB.subscribe({
                channel: channel,
                callback: function(message) {
                    $("#incomingMessages").append(
                    "<div class='message'><span class='username'>" +
                        (message.chatName || 'Anonymous') +
                        "</span> : " +
                        (message.text || ' ') +
                        "</div>"
                );
                    $("#incomingMessages").scrollTop(
                    $("#incomingMessages")[0].scrollHeight
                );
                }
            });
            $("#chatNameButton").click(function() {
                chatName = $("#chatNameText").val();
                if (chatName.length <= 0)
                    chatName = "unknown";
                $(location).attr('href', "#chatPage");
            });
            $("#messageText").bind('keydown', function(e) {
                if ((e.keyCode || e.charCode) !== 13)
                    return true;
                $("#chatSendButton").click();
                return false;
            });
            $("#chatSendButton").click(function() {
                PUBNUB.publish({
                    channel: channel,
                    message: {
                        chatName: chatName,
                        text: $("#messageText").val()
                    }
                });
                // ajax request .. insert in database

                $("#messageText").val("");
            });
        });</script>
    </body>
</html>
