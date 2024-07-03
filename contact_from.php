<?php
    $name = $_POST ['nam'];
    $visiter_email =$_POST['mai'];
    $subject =$_POST['sub'];
    $massage =$_POST['msg'];


    $email_from = 'nadeeshan.ranjana@gmail.com';
    $email_subject ="new from submition";

    $email_body ="user Name : $name.\n".
                    "user Email :$visiter_email.\n".
                    "mail subject :$subject.\n".
                    "user massage :$massage.\n";

                
$to ="naddeshan.ranjana@gmail.com";
$headers ="from: $email_from \r\n";
$headers = "reply-To: $visiter_email \r\n";
mail ($to,$email_subject,$email_body,$headers);
header("location:contactus.html");

?>