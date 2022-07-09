<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Send Mail From Localhost | CodingNepal</title>
      <link rel="stylesheet" href="style.css">
      <!-- bootstrap cdn link -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <style>
    /* custom css styling */
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
html,body{
    background: #007bff;
}
::selection{
    color: #fff;
    background: #007bff;
}
.container{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-family: 'Poppins', sans-serif;
}
.container .mail-form{
    background: #fff;
    padding: 25px 35px;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 
                0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.container form .form-control{
    height: 43px;
    font-size: 15px;
}
.container .mail-form form .form-group .button{
    font-size: 17px!important;
}
.container form .textarea{
    height: 100px;
    resize: none;
}
.container .mail-form h2{
    font-size: 30px;
    font-weight: 600;
}
.container .mail-form p{
    font-size: 14px;
}
   </style>
   <body>
      <div class="container">
         <div class="row">
            <div class="col-md-4 offset-md-4 mail-form">
               <h2 class="text-center">
                  Send Message
               </h2>
               <p class="text-center">
                  Send mail to anyone from localhost.
               </p>
               <!-- starting php code -->
               <?php
                  //first we leave this input field blank
                  $recipient = "";
                  //if user click the send button
                  if(isset($_POST['send'])){
                      //access user entered data
                     $recipient = $_POST['email'];
                     $subject = $_POST['subject'];
                     $message = $_POST['message'];
                     $sender = "From: shahiprem7890@gmail.com";
                     //if user leave empty field among one of them
                     if(empty($recipient) || empty($subject) || empty($message)){
                         ?>
               <!-- display an alert message if one of them field is empty -->
               <div class="alert alert-danger text-center">
                  <?php echo "All inputs are required!" ?>
               </div>
               <?php
                  }else{
                      // PHP function to send mail
                     if(mail($recipient, $subject, $message, $sender)){
                      ?>
               <!-- display a success message if once mail sent sucessfully -->
               <div class="alert alert-success text-center">
                  <?php echo "Your mail successfully sent to $recipient"?>
               </div>
               <?php
                  $recipient = "";
                  }else{
                   ?>
               <!-- display an alert message if somehow mail can't be sent -->
               <div class="alert alert-danger text-center">
                  <?php echo "Failed while sending your mail!" ?>
               </div>
               <?php
                  }
                  }
                  }
                  ?> <!-- end of php code -->
               <form action="mail.php" method="POST">
                  <div class="form-group">
                     <input class="form-control" name="email" type="email" placeholder="Recipients" value="<?php echo $recipient ?>">
                  </div>
                  <div class="form-group">
                     <input class="form-control" name="subject" type="text" placeholder="Subject">
                  </div>
                  <div class="form-group">
                     <!-- change this tag name into textarea to show textarea field. Due to more textarea I got an error, so I change the name of this field -->
                     <!-- <changeit cols="30" rows="5" class="form-control textarea" name="message" placeholder="Compose your message.."></changeit> -->
                  </div>
                  <div class="form-group">
                     <input class="form-control button btn-primary" type="submit" name="send" value="Send" placeholder="Subject">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </body>
</html>