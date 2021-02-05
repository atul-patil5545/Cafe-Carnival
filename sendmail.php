<?php
    //we need to get our variables first
    
    $email_to =   "contact@keshavrajcafecarnival.com"; //the address to which the email will be sent
    if(isset($_POST['user_message']))
    {
        $name     =   $_POST['user_name'];  
        $email    =   $_POST['user_email'];
        $subject  =   $_POST['user_subject'];
        $message1  =   $_POST['user_message'];
        $message="<html><body><b>Name :</b> ".$name."<br><b>Email : </b>".$email."<br><b>Subject : </b>".$subject."<br><b>message : </b>".$message1;
    }
    
    if(isset($_POST['star']))
    {
        $subject  =   "Customer Review Rating";
         $name =   $_POST['rvw_name']; 
         $comment =$_POST['rvw_comment'];
        $email    =   $_POST['rvw_email'];
        $desig  =   $_POST['rvw_desig'];
        $rating  =   $_POST['star'];
        $message="<html><body><b>Name :</b> ".$name."<br><b>Email : </b>".$email."<br><b>Designation : </b>".$desig."<br><b>comment : </b>".$comment."<br><b>Rating :<b> <p>";
        //echo $message;
        for($i=0;$i<$rating;$i++)
        {
            $message.="<img src='http://keshavrajcafecarnival.com/star1.png' width='40' height='40'/>";
        }
        $message.="</p></body></html>";
    }
    //echo $message;
    
    // echo "name : ".$name."email :".$email."subject".$subject."message".$message;exit();
    /*the $header variable is for the additional headers in the mail function,
     we are asigning 2 values, first one is FROM and the second one is REPLY-TO.
     That way when we want to reply the email gmail(or yahoo or hotmail...) will know 
     who are we replying to. */
     $headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers  .= "From: contact@keshavrajcafecarnival.com"."\r\n";
    $headers .= "Reply-To: contact@keshavrajcafecarnival.com"."\r\n";
    

    if(mail($email_to, $subject, $message, $headers)){
        
        echo 'sent'; // we are sending this text to the ajax request telling it that the mail is sent.. 
        header('location:contact.html');
        
    
    }else{
        
        header('location:contact.html');
        echo 'failed';// ... or this one to tell it that it wasn't sent
    }
?>