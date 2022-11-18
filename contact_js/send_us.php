

<?php


require_once ("../functions/func.php");



$name = $_POST['name'];
$email = $_POST['email'];
$phone_no = $_POST['phone'];
$url = $_POST['url'];
$message = $_POST['message'];
$filename = $_FILES['file']['name'];
$serverurl = $_POST['deployurl'];
// $data = date("Y/m/d");
// $time = date("h:i:sa");
// function send_mail_to_client(){
// $sub = "Thanku for giveing your valuable time";
// $msg = "<h1>Kad-Gp solutions</h>
//         Thank you to reach us our developer will contact you soon";
//     send_mail($email, $sub, $msg);
// }


        $tmp = $_FILES['file']['tmp_name'];
        $file = $_FILES['file']['name'];
        $subject = "$name-Project";
        $Body = "
<table style ='width:100%'>
<tr>
  <th>Name:</th>
  <td>$name</td>
</tr>
<tr>
  <th>Phone Number:</th>
  <td>$phone_no</td>
</tr>
<tr>
  <th>Email id:</th>
  <td>$email</td>
</tr>
<tr>
  <th>Message:</th>
  <td>$message</td>
</tr>
<tr>
  <th>URL:</th>
  <td>$url</td>
</tr>
<tr>
  <th>Download link:</th>
  <td>$serverurl</td>
</tr>
</table>
        ";
        // $message = "hii";
        if(send_mail_to_me($tmp, $file, $subject, $Body)){
            // send_mail_to_client();
            echo json_encode("mail sent");
        }
// echo json_encode($serverurl);

