<?php


function them_ve($gia_ghe, $ngay_tt, $ghe, $id_user, $id_kgc, $id_hd, $id_lc, $id_phim, $combo) {
    $sql = 'INSERT INTO `ve` (`price`, `ngay_dat`, `ghe`, `id_tk`, `id_thoi_gian_chieu`, `id_hd`, `id_ngay_chieu`, `id_phim`, `combo`) VALUES (?,?,?,?,?,?,?,?,?)';

    // Kiểm tra xem combo có tồn tại không
    $comboValue = ($combo !== null) ? $combo : '';  // Nếu không có combo, gán giá trị mặc định

    return pdo_execute_return_interlastid($sql, $gia_ghe, $ngay_tt, $ghe, $id_user, $id_kgc, $id_hd, $id_lc, $id_phim, $comboValue);
}


function  dich_vu_insert($id_ve,$combo){
    $sql = 'INSERT INTO `dich_vu` (`id`, `combo`, `id_ve`) VALUES (NULL,?,?)';
    pdo_execute($sql,$combo,$id_ve);
}


function load_ve($id){
    $sql = "SELECT v.id, phim.tieu_de, lichchieu.ngay_chieu, khung_gio_chieu.thoi_gian_chieu, taikhoan.name, v.ghe, v.price, v.ngay_dat, v.combo, v.trang_thai, phongchieu.name as tenphong
FROM ve v
LEFT JOIN khung_gio_chieu ON khung_gio_chieu.id = v.id_thoi_gian_chieu
LEFT JOIN taikhoan ON taikhoan.id = v.id_tk
LEFT JOIN phim ON phim.id = v.id_phim
LEFT JOIN lichchieu ON lichchieu.id = v.id_ngay_chieu
LEFT JOIN phongchieu ON phongchieu.id = khung_gio_chieu.id_phong
WHERE v.trang_thai IN (1, 2, 3,4)  -- Lấy cả trạng thái 1, 2, và 3
AND id_tk = ".$id."
ORDER BY v.id DESC;";
    $re = pdo_query($sql);
    return $re;
}


function capnhat_tt(){
    $sql = "UPDATE ve SET trang_thai = '1' WHERE id_ve = ?";
    pdo_execute($sql);
}

function trangthai_ve($id)
{
    $sql = 'UPDATE ve SET trang_thai = 1 WHERE id_hd = ?';
    pdo_execute($sql, $id);
}
function trangthai_hd($id)
{
    $sql = 'UPDATE hoa_don SET trang_thai = 1 WHERE id = ?';
    pdo_execute($sql, $id);
}

function load_ve_tt($id)
{
    $sql = "SELECT h.thanh_tien, ve.id,h.ngay_tt, taikhoan.name, khung_gio_chieu.thoi_gian_chieu, lichchieu.ngay_chieu, phim.tieu_de, ve.ghe, ve.combo, phongchieu.name as tenphong
FROM hoa_don h
JOIN ve ON ve.id_hd = h.id 
JOIN taikhoan ON ve.id_tk = taikhoan.id 
JOIN khung_gio_chieu ON khung_gio_chieu.id = ve.id_thoi_gian_chieu
JOIN lichchieu ON lichchieu.id = khung_gio_chieu.id_lich_chieu 
JOIN phongchieu ON phongchieu.id = khung_gio_chieu.id_phong
JOIN phim ON phim.id = lichchieu.id_phim
WHERE h.id = ".$id;


    return pdo_query_one($sql);
}

function khoa_ghe($id_kgc, $id_lc, $id_phim)
{
    $sql = "SELECT ve.ghe FROM ve 
    JOIN khung_gio_chieu ON ve.id_thoi_gian_chieu = khung_gio_chieu.id 
    JOIN lichchieu ON lichchieu.id = khung_gio_chieu.id_lich_chieu  
    WHERE trang_thai = 1  AND id_thoi_gian_chieu = '$id_kgc' AND lichchieu.id = '$id_lc' AND lichchieu.id_phim = '$id_phim' ";
    return pdo_query($sql);
}


function loadone_vephim($id){
    $sql="SELECT v.id, phim.tieu_de,lichchieu.ngay_chieu, v.price, v.ngay_dat, v.ghe, v.combo, taikhoan.name, khung_gio_chieu.thoi_gian_chieu, v.id_hd, v.trang_thai, phongchieu.name as tenphong
FROM ve v
LEFT JOIN taikhoan ON taikhoan.id = v.id_tk
LEFT JOIN khung_gio_chieu ON khung_gio_chieu.id = v.id_thoi_gian_chieu
LEFT JOIN phim ON phim.id = v.id_phim
LEFT JOIN lichchieu ON lichchieu.id = khung_gio_chieu.id_lich_chieu
LEFT JOIN phongchieu ON phongchieu.id = khung_gio_chieu.id_phong
WHERE v.id = ".$id;

    $re =pdo_query_one($sql);
    return $re ;

}
function huy_vephim($id){
    $sql = "update ve set trang_thai = 3 where ve.id=" . $id;
    pdo_execute($sql);
}

function gui_mail_ve($load_ve_tt) {
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'kienltph35295@fpt.edu.vn';
        $mail->Password   = 'ckdi xfyz kvkl xjtb';
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Email người gửi
        $mail->setFrom('kienltph35295@fpt.edu.vn', 'CinePass');
        $mail->addAddress($_SESSION['user']['email']);

        // Nội dung
        $mail->isHTML(true);
        $mail->Subject = 'Thank you for booking movie tickets';
        $mail->Body    = 'Xác nhận Đặt Vé Xem Phim Thành Công <br><hr>

                               Chào '.$_SESSION['user']['name'].',

                            Chúng tôi xin chân thành cảm ơn bạn đã chọn CinePass để trải nghiệm bộ phim tuyệt vời. Chúc mừng! Đơn đặt vé của bạn đã được xác nhận thành công. 
                             Dưới đây là thông tin chi tiết về đơn đặt vé của bạn:<br>
                             - Mã đặt vé: ' . $load_ve_tt['id'] . ' <br>
                             - Tên phim: ' . $load_ve_tt['tieu_de'] . '<br>
                             - Rạp : CinePass Hà Đông <br>
                             - Phòng: ' . $load_ve_tt['tenphong'] . '<br>
                             - Xuất chiếu: ' . $load_ve_tt['thoi_gian_chieu'] . ' --- ' . $load_ve_tt['ngay_chieu'] . '<br>
                             - Ghế ngồi: ' . $load_ve_tt['ghe'] . '<br>
                             - Combo: ' . $load_ve_tt['combo'] . '<br>
                             - Ngày thanh toán: ' . $load_ve_tt['ngay_tt'] . '<br>
                             - Thành tiền: ' . number_format($load_ve_tt['thanh_tien']) . ' VND<br>
                             <hr>
                              Lưu ý quan trọng:<br>

                               Hãy đảm bảo bạn đến sớm trước thời gian chiếu để có đủ thời gian kiểm tra vé và chọn ghế.<br>
                                 Mã đặt vé trên có thể được sử dụng để kiểm tra thông tin đặt vé tại quầy vé hoặc máy tự động tại rạp.<br>
                                 Nếu bạn có bất kỳ câu hỏi hoặc cần hỗ trợ gì thêm, vui lòng liên hệ với chúng tôi qua số điện thoại 0366508004 hoặc email kienltph35295@gmail.com.<br>
                                  Chúng tôi rất mong đợi sự xuất hiện của bạn và hy vọng bạn sẽ có một trải nghiệm thú vị tại rạp phim của chúng tôi.<br>

                                   Trân trọng,<br>
                                    CinePass<br>
        ';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

