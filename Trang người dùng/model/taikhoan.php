<?php
function loadall_taikhoan(){
    $sql = "select * from taikhoan where 1 order by id asc";
    $re = pdo_query($sql);
    return $re;
}

function check_tk($user,$pass){
    $sql = "select * from taikhoan where user = '$user' and pass='$pass'";
    $result = pdo_query_one($sql);
    return $result;

}
function dang_xuat(){
    unset($_SESSION['user']);
}

function insert_taikhoan($email,$user,$pass,$name,$sdt,$dc){
    $sql="INSERT INTO `taikhoan` ( `email`, `user`, `pass`,`dia_chi`,`phone`,`name`) VALUES ( '$email', '$user','$pass','$dc','$sdt','$name'); ";
    pdo_execute($sql);
}

function sua_tk($id,$user,$email,$sdt,$dc){
    $sql = "update taikhoan set  user ='".$user."',email ='".$email."',phone ='".$sdt."',dia_chi ='".$dc."' where id=".$id;

    pdo_execute($sql);
}
function mkcu($id){
    $sql = "select pass from taikhoan where id = $id"; 
    $result = pdo_query_one($sql);
    return $result['pass']; 
}
function doi_tk($id,$passmoi){
    $sql = "UPDATE taikhoan SET pass ='".$passmoi."' WHERE id=".$id;

    pdo_execute($sql);
}
function loadone_taikhoan($id){
    $sql = "select * from taikhoan where id =".$id;
    $result = pdo_query_one($sql);
    return $result;
}

function sendMail($email) {
    // Truy vấn cơ sở dữ liệu để tìm kiếm tài khoản có địa chỉ email $email
    $sql="SELECT * FROM taikhoan WHERE email='$email'";
    $taikhoan = pdo_query_one($sql);

    // Nếu tài khoản được tìm thấy, gửi email cho người dùng
    if ($taikhoan != false) {
        sendMailPass($email, $taikhoan['name'], $taikhoan['pass']);

        return "Gửi email thành công";
    } else {
        // Nếu tài khoản không được tìm thấy, trả về thông báo lỗi
        return "Email bạn nhập không có trong hệ thống";
    }
}

function sendMailPass($email, $name, $pass) {
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'kienltph35295@fpt.edu.vn';                     //SMTP username
        $mail->Password   = 'ckdi xfyz kvkl xjtb';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('kienltph35295@fpt.edu.vn', 'CinePass');
        $mail->addAddress($email, $name);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'User forgot password';
        $mail->Body    = 'Mật khẩu của bạn là' .$pass;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
function check_email($email)
{
    $sql = "SELECT email FROM taikhoan WHERE email ='" . $email . "'";
    $user = pdo_query_one($sql);
    return $user;
}