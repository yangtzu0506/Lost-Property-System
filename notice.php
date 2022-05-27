<?php
include "connect.php";
$account_id=$_GET["account_id"];
$item_name=$_GET["item_name"];

$sql="select * from account where account_id='$account_id'";
$rs=mysqli_query($link,$sql);

if ($record=mysqli_fetch_assoc($rs)){
    $name=$record["account_name"];
    $email=$record["account_email"];
    $subject="拾在安心校園遺失物管理系統通知信";
    $body=$name."您好:<br/>您於本系統刊登協尋之".$item_name."已找回，請至野聲樓生活輔導組領回，謝謝您的配合。";
    
    header("location:sendEmail.php?name=$name&email=$email&subject=$subject&body=$body");

}else{

    echo $sql;

}

?>
<body>

	
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

</body>
</html>
      