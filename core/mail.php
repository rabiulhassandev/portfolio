<?php

    if(isset($_POST['name']) && isset($_POST['subject']) && isset($_POST['email']) && isset($_POST['message'])){
        $name = htmlentities(addslashes($_POST['name']));
        $email = htmlentities(addslashes($_POST['email']));
        $subject = htmlentities(addslashes($_POST['subject']));
        $message = htmlentities(addslashes($_POST['message']));
        $message = "Hello, I'm " . $name . ", <br><br>" . $message;

        if(!$name == '' && !$email == '' & !$message == ''){
            $to = "mdrabiullhassan@gmail.com";
            $subject = $subject;
            
            $message = $message;
            
            $header = "From:$email \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";
            
            $retval = mail($to,$subject,$message,$header);

            if($retval) {
                $msg = ["status"=>"SUCCESS", "msg" => ""];
            }else{
                $msg = ["status"=>"FAIL", "msg" => "Sorry, Mail can't send"];
            }

        }else{
            $msg = ["status"=>"FAIL", "msg" => "Attention, All field are required..!"];
        }
    }else{
        $msg = ["status"=>"FAIL", "msg" => "Oops, Sorry Something Wrong..!"];
    }

    echo $msg;

?>