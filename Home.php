<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" type="text/css" href="home.css"> <!--We had diffferent css-->
    <script type="text/javascript" src="jquery.js"></script>
  

    <title>Welcome to my chat</title>
    

    <script type="text/javascript">

    $(document).ready(function() {

        $("#ChatText").keyup(function(e) {
            //when we press enter
            if(e.keyCode == 13) {
                var ChatText = $("#ChatText").val();
                $.ajax({
                    type: 'POST',
                    url: 'InsertMessage.php',
                    data: {ChatText:ChatText},
                    success:function() {
                        $("#ChatMessages").load("DisplayMessage.php");
                        $("#ChatText").val("");
                    }
                    
                });
            }
        });

        setInterval(function()  {
            $("#ChatMessages").load("DiplayMessage.php");
        }, 1500);

        $("#ChatMessages").load("DisplayMessages.php");
    });


    </script>
</head>
<body>
    <h2>Welcome <span>
        
        
    </span></h2>

    <div id="ChatBig">
        <div id="ChatMessages" class="scrollbar">

        </div>
        <textarea name="ChatText" id="ChatText" cols="30" rows="10" placeholder="Type message...."></textarea>
    </div>
</body>
</html>