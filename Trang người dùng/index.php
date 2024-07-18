<?php
session_start();
include "model/pdo.php";
include "model/loai_phim.php";
include "model/phim.php";
include "model/taikhoan.php";
include "model/lichchieu.php";
include "model/ve.php";
include "model/hoadon.php";
date_default_timezone_set("Asia/Ho_Chi_Minh");
$loadloai = loadall_loaiphim();
$loadphim = loadall_phim();
$loadphimhot = loadall_phim_hot();
$loadphimhome = loadall_phim_home();
include "view/header.php";
if(isset($_GET['act']) && $_GET['act']!=""){
    $act = $_GET['act'];
    switch ($act) {
        case "ctphim":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $phim = loadone_phim($_GET['id']);
            }
            unset($_SESSION['mv']);
            include "view/ctphim.php";
            break;
            case "dsphim1":
                $dsp = loadall_phim();
                // $dsp=loadall_phim();
                include "view/dsphim1.php";
                break;
        case "dsphim":
            if (isset($_POST['kys']) && $_POST['kys'] != "") {

                $kys = $_POST['kys'];
            } else {
                $kys = "";
            }
            if (isset($_GET['id_loai']) && $_GET['id_loai'] > 0) {
                $id_loai = $_GET['id_loai'];
                $tenloai = load_ten_loai($id_loai);
            } else {
                $id_loai = 0;
            }
            $dsp = loadall_phim1($kys, $id_loai);

            $nameth = phim_select_all();
            // $dsp=loadall_phim();
            include "view/dsphim.php";
            break;
        case "phimsapchieu":
            $psc = load_phimsc();
            include "view/phimsc.php";
            break;
        case "phimdangchieu":
            $pdc = load_phimdc();
            include "view/phimdc.php";
            break;
        case "lienhe":
            include "view/lienhe.php";
            break;
        case "tintuc":
            include "view/tintuc-big.php";
            break;
        case "rapchieu":
            include "view/rapchieu.php";
            break;
            case "dangnhap":
                if (isset($_POST['login'])) {
                    $user = htmlspecialchars($_POST['user'], ENT_QUOTES, 'UTF-8');
                    $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8');
                    $check_tk = check_tk($user, $pass);
                
                    if ($user == '' || $pass == '') {
                        $error = "Vui lòng không để trống";
                        include "view/login/dangnhap.php";
                        break;
                    } else {
                        if (is_array($check_tk) && $check_tk['vai_tro'] == 0) {
                            $_SESSION['user'] = $check_tk;
                        } else {
                            $thongbao = "Đăng nhập không thành công. Vui lòng kiểm tra tài khoản của bạn.";
                        }
                    }
                }
                
        include "view/login/dangnhap.php";
                break;
  
            case "dangky":
                $min_password_length = 6;

                if (isset($_POST['dangky']) && $_POST['dangky'] != "") {
                    $name = $_POST['name'];
                    $sdt = $_POST['phone'];
                    $dc = $_POST['dia_chi'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $email = $_POST['email'];

                    if (
                        !empty($name) && !empty($sdt) &&
                        !empty($dc) && !empty($user) &&
                        !empty($pass) && !empty($email)
                    ) {
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $thongbao = "Vui lòng nhập một địa chỉ email hợp lệ.";
                        } else if (strlen($pass) < $min_password_length) {
                            $thongbao = "Mật khẩu phải chứa ít nhất $min_password_length ký tự.";
                        } else if (!preg_match('/^[a-zA-Z0-9_]+$/', $user)) {
                            $thongbao = "Tên người dùng không hợp lệ. Tên người dùng không được chứa khoảng trắng và dấu.";
                        } else {
                            // Kiểm tra email đã tồn tại
                            $email_check = check_email($email);
                            if ($email_check && $email_check['email'] == $email) {
                                $thongbao = "Email đã tồn tại!";
                            } else {
                                // Thêm tài khoản mới
                                insert_taikhoan($email, $user, $pass, $name, $sdt, $dc);
                                $thongbao = "Đăng ký thành công xin mời đăng nhập!";
                            }
                        }
                    } else {
                        $thongbao = "Vui lòng điền đầy đủ thông tin.";
                    }
                }

                include "view/login/dangky.php";
                break;

                case "quenmk":
                    if (isset($_POST['guiemail'])) {
                        $email = $_POST['email'];
                        if($email =='') {
                            $error = "vui lòng không để trống";
                            include "view/login/quenmk.php";
                            break;
                           }else{
                        $sendMailMess = sendMail($email);
                        // $error ="gửi thành công";
                    }}
                    include "view/login/quenmk.php";
                    break;
                    
                    case "suatk":
                        if (isset($_GET['idsua'])) {
                            $loadtk = loadone_taikhoan($_GET['idsua']);
                        }
                        include "view/login/sua.php";
                        break;
                        case "updatetk":
                            if (isset($_GET['idsua'])) {
                                $loadtk = loadone_taikhoan($_GET['idsua']);
                            }
                        if (isset($_POST['capnhat']) && $_POST['capnhat'] != "") {
                            if (
                                 !empty($_POST['phone']) &&
                                !empty($_POST['dia_chi']) && !empty($_POST['user']) && !empty($_POST['email'])
                            ) {
                                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                                    
                                        if (preg_match('/^[a-zA-Z0-9_]+$/', $_POST['user'])) {
                            $id = $_POST['id'];
                            $user = $_POST['user'];
                            $email = $_POST['email'];
                            $sdt = $_POST['phone'];
                            $dc = $_POST['dia_chi'];
                            sua_tk($id, $user, $email, $sdt, $dc);
                            $thongbao= "Sửa thành công ";
                        } else {
                            $thongbao= "Tên người dùng không hợp lệ. Tên người dùng không được chứa khoảng trắng và dấu.";
                        }
                    
                    }
                 
            } else {
                $thongbao= "Vui lòng điền đầy đủ thông tin.";
            }
            }
            $loadtk = loadone_taikhoan($id);
                            include "view/login/sua.php";
                        // } else {
                        //     include "view/login/sua.php";
                        // }
                        break;
                        case "datve":
                            $khunggio = array();
                            $realtime = date('Y-m-d H:i:s');
                            if (isset($_GET['id']) && $_GET['id'] > 0) {
                                $id_phim = $_GET['id'];
                                $phim = loadone_phim($id_phim);
                            } else {
                                $id_phim = 0;
                            }
                            if ((isset($_GET['id_lc'])) && ($_GET['id_lc'])) {
                                $id_lc = $_GET['id_lc'];
                                $khunggio = khunggiochieu_select_by_idxc($id_lc);
                            }
                            $lc = lichchieu_select_by_id_phim($id_phim);
                            unset($_SESSION['mv']);
                            include "view/dv.php";
                
                            break;

        case "datve2":

            if (!isset($_SESSION['mv'])) {
                $id_phim = $_GET['id'];
                $id_lichchieu = $_GET['id_lc'];
                $id_gio = $_GET['id_g'];
                $_SESSION['mv'] = [$id_phim, $id_lichchieu, $id_gio];
                $list_lc = load_lc_p($id_phim, $id_lichchieu, $id_gio);
            } else {
                $list_lc = load_lc_p($_SESSION['mv'][0], $_SESSION['mv'][1], $_SESSION['mv'][2]);
            }
            $_SESSION['tong'] = $list_lc;

            if (isset($_SESSION['user']) && ($_SESSION['user'])) {

                include "view/dv2.php";
            } else {
                $error = "";
                $thongbao1= "";
                $thongbao['dangnhap'] = 'đăng nhập đi để đặt vé!';
                include 'view/login/dangnhap.php';
            }

            break;
            case "dangxuat":
                dang_xuat();
                include "view/login/dangnhap.php";
                break;
            case "doimk":
                if (isset($_POST['capnhat']) && $_POST['capnhat'] != "") {
                    $id = $_POST['id'];
                    $pass = $_POST['pass'];
                    $passmoi = $_POST['passmoi'];
                    $passmoi1 = $_POST['passmoi1'];
                    $old_pass = mkcu($id);
                    if($pass==''||$passmoi==''||$passmoi1==''){
                        $error = "vui lòng không để trống";
                    }
                    if($pass != $old_pass){
                        $error = "Mật khẩu cũ không đúng";
                    }
                    
                    // Kiểm tra mật khẩu mới có trùng mật khẩu cũ không
                    if($passmoi != $passmoi1){
                       $error = "Mật khẩu mới không trùng nhau"; 
                    }
            
                    if(!isset($error)){
                        doi_tk($id,$passmoi); 
                        $error = "đổi mật khẩu thành công";
                        // $_SESSION['user'] = check_tk($user, $pass);
                        include "view/login/doimk.php";  
                    }
                    else{
                        // Hiển thị lỗi ra view
                        include "view/login/doimk.php"; 
                    }
                } else {
                    include "view/login/doimk.php";
                }
    
                break;
        case "dv3":
            if (isset($_POST['tiep_tuc']) && ($_POST['tiep_tuc'])) {
                $ten_ghe = array();
                foreach ($_POST as $key => $value) {
                    if ($key == "ten_ghe") {
                        $ten_ghe['ghe'] = $value;
                    }
                }

                $gia_ghe = $_POST['giaghe'];
                array_push($_SESSION['tong'], $gia_ghe, $ten_ghe);
                if (isset($ten_ghe['ghe']) && ($ten_ghe['ghe'])) {
                    $thongbaoghe = "";
                }else{
                    $thongbaoghe = "Phải chọn ghế";
                    include "view/dv2.php";
                    break;
                }
            }
            include 'view/doan.php';
            break;
        case "dv4":
            if (isset($_POST['tiep_tuc']) && ($_POST['tiep_tuc'])) {
                $ten_ghe = array();
                foreach ($_POST as $key => $value) {
                    if ($key == "ten_ghe") {
                        $ten_ghe['ghe'] = $value;
                    }
                }

                $ten_doan = array();
                foreach ($_POST as $key => $value) {
                    if ($key == "ten_do_an") {
                        $ten_doan['doan'] = $value;
                    }
                }

                $gia_ghe = $_POST['giaghe'];
                array_push($_SESSION['tong'], $gia_ghe, $ten_ghe, $ten_doan);
                $ghe = implode(',', $ten_ghe['ghe']);
                $ngay_tt = date('Y-m-d H:i:s');
                $id_user = $_SESSION['user']['id'];
                $id_kgc = $_SESSION['tong']['id_gio'];
                $combo = (isset($ten_doan['doan']) && !empty($ten_doan['doan'])) ? implode(', ', $ten_doan['doan']) : null;
                $id_lc = $_SESSION['tong']['id_lichchieu'];
                $id_phim = $_SESSION['tong']['id_phim'];
                $id_hd = them_hoa_don($ngay_tt, $gia_ghe);
                if ($id_hd) {
                    $_SESSION['id_hd'] = $id_hd;
                    $id_ve = them_ve($gia_ghe, $ngay_tt, $ghe, $id_user, $id_kgc, $id_hd, $id_lc, $id_phim, $combo);

                    if ($id_ve) {
                        $_SESSION['id_ve'] = $id_ve;
                    } else {
                        echo "Đã xảy ra lỗi khi đặt vé. Vui lòng thử lại.";
                    }
                } else {
                    echo " xảy ra lỗi khi tạo hóa đơn. Vui lòng thử lại.";
                }

            }
            include 'view/thanhtoan.php';
            break;
        case  "thanhtoan" :
            include "view/thanhtoan.php";
            break;
        case "theloai":
            if (isset($_POST['kys']) && $_POST['kys'] != "") {

                $kys = $_POST['kys'];
            } else {
                $kys = "";
            }
            if (isset($_GET['id_loai']) && $_GET['id_loai'] > 0) {
                $id_loai = $_GET['id_loai'];
                $ten_loai = load_ten_loai($id_loai);
            } else {
                $id_loai = 0;
            }
            $dsp = loadall_phim1($kys, $id_loai);


            include "view/theloaiphim.php";
            break;
        case "ve" :
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $load_ve = load_ve($_GET['id']);
            }
            include "view/ve.php";
            break;
        case 'xacnhan':
            if (isset($_GET['message']) && ($_GET['message'] == 'Successful.')) {
                trangthai_hd($_SESSION['id_hd']);
                trangthai_ve($_SESSION['id_hd']);
                $load_ve_tt =  load_ve_tt($_SESSION['id_hd']);
                gui_mail_ve($load_ve_tt);
                require_once "view/ve_tt.php";
                break;
            }
        case "ctve":
            if (isset($_GET['id']) && ($_GET['id'] > 0)){
                $loadone_ve =  loadone_vephim($_GET['id']);
            }
            include "view/chitiet_ve.php";
            break;

        case "huy_ve":
            if(isset($_POST['capnhat'])){
                $id = $_POST['id'];
                huy_vephim($id);
            }
            // Sử dụng $_POST['id'] thay vì $_GET['id']
            $loadone_ve =  loadone_vephim($_POST['id']);
            include "view/chitiet_ve.php";
            break;

    }
}else{
    unset($_SESSION['id_hd']);
    unset($_SESSION['id_ve']);
    unset($_SESSION['mv']);
    unset($_SESSION['tong']);
    include "view/home.php";
}
include "view/footer.php";



?>

