<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css"> <!--We had diffferent css-->

    <title>Welcome to my chat</title>
    <script src="jquery.js"></script>

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
                        $("$ChatMessages").load("DisplayMessage.php");
                        $("#zChatText").val("");
                    }
                    
                });
            }
        });

        setInterval(() => {
            $("#ChatMessages").load("DiplayMessage.php");
        }, 1500);

        $("#ChatMessages").load("DisplayMessages.php");
    });


    </script>
</head>
<body>
    <h2>Welcome <span>
        <?php 
        echo $_SESSION['UserName'];
        ?>
        
    </span></h2>

    <div id="ChatBig">
        <div id="ChatMessages" class="scrollbar">

        </div>
        <textarea name="ChatText" id="ChatText" cols="30" rows="10" placeholder="Type message...."></textarea>
    </div>
</body>
</html>