<?php
use PHPMailer\PHPMailer\PHPMailer;

$method=$_GET["method"];

if(isset($_GET['name']) && isset($_GET['email'])){
    echo "123";
    $name = $_GET['name'];
    $email = $_GET['email'];
    $subject = $_GET['subject'];
    $body = $_GET['body'];
    echo $email;
    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";
    
    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "409402049@gapp.fju.edu.tw";
    $mail->Password = 'brian001002003';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //email settings
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->Body = $body;
   
    if($mail->send()){
        
        if($method=="validate"){
        echo "<script>location.href='login/emailcheck.php'</script>";
        }
        else if($method=="notice"){
        echo "<script>alert('通知成功!');location.href='end_case.php'</script>";
        }
        else if($method=="forget"){
        echo "<script>alert('已發送郵件，請至您的信箱查看密碼');location.href='login/addpassword.php'</script>";    
        }
    }
    else
    {
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
    }
    header("end_case.php");
    exit(json_encode(array("status" => $status, "response" => $response)));
}

?>