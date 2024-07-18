<?php
session_start();
if(isset($_SESSION['user1'])) {

    include "./model/pdo.php";
    include "./model/loai_phim.php";
    include "./model/phim.php";
    include "./model/taikhoan.php";
    include "./model/lichchieu.php";
    include "./model/phong.php";
    include "./model/thongke.php";
    include "./model/ve.php";
    include "./model/khunggio.php";
    include "./model/binhluan.php";
    $loadphim = loadall_phim();
    $loadloai = loadall_loaiphim();
    $loadtk = loadall_taikhoan();
    include "./view/home/header.php";

    if (isset($_GET['act']) && ($_GET['act'] != "")) {
        $act = $_GET['act'];
        switch ($act) {
            case "QLloaiphim":
                include "./view/loaiphim/QLloaiphim.php";
                break;
                case "themloai":
                    if (isset($_POST['gui'])) {
                        
                      if(!isset($_POST['name']) || empty($_POST['name'])) {
                        $error = "Tên thể loại không được để trống";

                      }
                        
                      if(!isset($error)){
                        $name = $_POST['name'];
                        them_loaiphim($name); 
                        $suatc = "THÊM THÀNH CÔNG";

                      }
                  
                    }

                    include "./view/loaiphim/them.php"; 
                    break;
            case "sualoai":
                if (isset($_GET['idsua'])) {
                    $loadone_loai = loadone_loaiphim($_GET['idsua']);
                }
                include "./view/loaiphim/sua.php";
                break;
            case "xoaloai":
                if (isset($_GET['idxoa'])) {
                    xoa_loaiphim($_GET['idxoa']);
                    $loadloai = loadall_loaiphim();
                    include "./view/loaiphim/QLloaiphim.php";
                } else {
                    include "./view/loaiphim/QLloaiphim.php";
                }
                break;
                case "updateloai":

                    if (isset($_POST['capnhat'])) {
                         $id = $_POST['id'];
                         $name = $_POST['name'];
                  if($name == ''){
                  $error ="vui lòng điền đầy đủ thông tin";
                  $loadone_loai = loadone_loaiphim($id);
                  include "./view/loaiphim/sua.php";
                  break;
                  }else{
                         update_loaiphim($id, $name);
                         $suatc = "SỬA THÀNH CÔNG";

                    }
                  }
                    $loadloai = loadall_loaiphim();
                    
                     include "./view/loaiphim/QLloaiphim.php";
                    break;
            case "QLphim":
                if(isset($_POST['tk1'])&&($_POST['tk1'])){
                    $searchName1 = $_POST['ten'];
                    $searchLoai = $_POST['loai'];
                }else{
                    $searchName1 ="";
                    $searchLoai="";
                }
                $loadphim = loadall_phim($searchName1,$searchLoai);
                include "./view/phim/QLphim.php";
                break;
              case "themphim":
                if (isset($_POST['gui'])) {
                    $tieu_de = $_POST['tieu_de'];
                    $daodien = $_POST['daodien'];
                    $dienvien = $_POST['dienvien'];
                    $quoc_gia = $_POST['quoc_gia'];
                    $gia_han_tuoi = $_POST['gia_han_tuoi'];
                    $thoiluong = $_POST['thoiluong'];
                    $date = $_POST['date'];
                    $link = $_POST['link'];
                    $id_loai = $_POST['id_loai'];
                    $mo_ta = $_POST['mo_ta'];
                    $img = $_FILES['anh']['name'];
                    $target_dir = "../Trang người dùng/imgavt/";
                    $target_file = $target_dir . basename($_FILES['anh']['name']);
                    if (move_uploaded_file($_FILES['anh']['tmp_name'], $target_file)) {
                        echo "Bạn đã upload ảnh thành công";
                    } else {
                        echo "Upload ảnh không thành công";
                    }
                    if( $tieu_de =='' || $daodien =='' || $dienvien==''|| $quoc_gia==''|| $gia_han_tuoi==''|| $img==''|| $mo_ta==''|| $thoiluong==''|| $date==''|| $id_loai==''){
                      $error =  "Vui  lòng không để chống";

                          include "./view/phim/them.php";
                        break;
                      }else{
                    them_phim($tieu_de, $daodien, $dienvien, $img, $mo_ta, $thoiluong, $quoc_gia, $gia_han_tuoi, $date, $id_loai,$link);
                     $suatc = "Thêm thành công";

                }

            }
                $loadphim = loadall_phim();
                include "./view/phim/them.php";
                break;
            case "sualichchieu":
                if (isset($_GET['idsua'])) {
                    $loadone_lc = loadone_lichchieu($_GET['idsua']);
                }
                include "./view/suatchieu/sua.php";
                break;

            case "updatephim":
                if (isset($_POST['capnhat'])) {
                    $id = $_POST['id'];
                    $tieu_de = $_POST['tieu_de'];
                    $daodien = $_POST['daodien'];
                    $dienvien = $_POST['dienvien'];
                    $quoc_gia = $_POST['quoc_gia'];
                    $gia_han_tuoi = $_POST['gia_han_tuoi'];
                    $thoi_luong = $_POST['thoiluong'];
                    $date = $_POST['date'];
                    $id_loai = $_POST['id_loai'];
                    $mo_ta = $_POST['mo_ta'];

                    // Xử lý ảnh
                    $img = $_FILES['anh']['name'];
                    $target_dir = "../Trang người dùng/imgavt/";
                    $target_file = $target_dir . basename($_FILES['anh']['name']);

                    if (move_uploaded_file($_FILES['anh']['tmp_name'], $target_file)) {
                        echo "Bạn đã upload ảnh thành công";
                    } else {
                        echo "Upload ảnh không thành công";
                    }

                    // Kiểm tra dữ liệu
                    if ($tieu_de == '' || $daodien == '' || $dienvien == '' || $quoc_gia == '' || $gia_han_tuoi == ''  || $mo_ta == '' || $thoi_luong == '' || $date == '' || $id_loai == '') {
                        $error = "Vui lòng không để trống";

                            $loadone_phim = loadone_phim($id);

                        include "./view/phim/sua.php";
                        break;
                    } else {
                        sua_phim($id, $tieu_de, $img, $mo_ta, $thoi_luong, $date, $id_loai);
                        $suatc = "Cập nhật thành công";
                    }
                }

                $loadphim = loadall_phim();
                include "./view/phim/QLphim.php";
               break;
            case "themlichchieu":
                $loadphim = loadall_phim();
                $loadphong = load_phong();
                if (isset($_POST['them'])) {
                    $id_phim = $_POST['id_phim'];
                    $ngay_chieu = $_POST['nc'];
                    if($id_phim ==''||$ngay_chieu =='') {
                     $error = "vui lòng không để trống";
                     $loadone_lc = loadone_lichchieu($id);
                     include "./view/suatchieu/them.php";
                     break;
                    }else{
                    them_lichchieu($id_phim,$ngay_chieu);
                     $suatc = "Thêm thành công";

                
             }
                       }
                $loadlich = loadall_lichchieu();
                include "./view/suatchieu/them.php";
                break;
                case "xoaphim":
                    if (isset($_GET['idxoa'])) {
                        xoa_phim($_GET['idxoa']);
                        $loadphim = loadall_phim();
                        include "./view/phim/QLphim.php";
                    }
                    break;
                    case "suaphim":
                        if (isset($_GET['idsua'])) {
                            $loadone_phim = loadone_phim($_GET['idsua']);
                        }
                        include "./view/phim/sua.php";
                        break;
            case "updatelichchieu":
                $loadphim = loadall_phim();
                $loadphong = load_phong();
                if(isset($_POST['capnhat'])) {              
         
                        $id = $_POST['id'];
                        $id_phim = $_POST['id_phim'];   
                        $ngay_chieu = $_POST['nc'];
                        if($id ==''||$id_phim ==''||$ngay_chieu =='') {
                          $error = "vui lòng không để trống";
                           $loadone_lc = loadone_lichchieu($id);
                          include "./view/suatchieu/sua.php";
                          break;
                         }else{
                        sua_lichchieu($id, $id_phim,  $ngay_chieu);
                        $suatc = "SỬA THÀNH CÔNG";

                    }
                  
                  }
                  $loadlich = loadall_lichchieu();
                  include "./view/suatchieu/QLsuatchieu.php";
                  break;
            case "QLcarou":
                include "./view/phim/sua.php";
                break;
          
            case "khachhang":

                include "./view/user/khachhang.php";
                break;
                case "DTdh":
                    $dt = load_thongke_doanhthu();

                    include "./view/danhthu/DTdh.php";
                    break;
                case "DTthang":
                    $dtt =  load_doanhthu_thang1();
                    $dtt1 =  load_doanhthu_thang();
                    include "./view/danhthu/DTthang.php";
                    break;
                case "DTtuan":
                    $dtt =  load_doanhthu_tuan1();
                    $dtt1 =  load_doanhthu_tuan();
                    include "./view/danhthu/DTtuan.php";
                    break;
                case "DTngay":
                    $dtt =  load_doanhthu_ngay1();
                    $dtt1 =  load_doanhthu_ngay();
                    include "./view/danhthu/DTngay.php";
                    break;
            case "DTphim":
                include "./view/danhthu/DTphim.php";
                break;
            case "timeline":
                include "./view/voucher/timeline.php";
                break;
            case "chitiethoadon":
                include "./view/vephim/chitiethoadon.php";
                break;

            case "QLfeed":
                    $listbl =  loadall_bl();
                    $tong = count($listbl);
                    $loadtk = loadall_taikhoan();
                    $loadloai = loadall_loaiphim();
                    include "./view/feedblack/QLfeed.php";
                         break;
            case "xoabl":
                         if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            delete_binhluan($id);
                        }
                         $listbl =  loadall_bl();
                         include "./view/feedblack/QLfeed.php";
                          break;
            case "thoigian":
                $loadkgc = loadall_khunggiochieu();
                include "./view/suatchieu/thoigian/thoigian.php";
                break;
            case "QLsuatchieu":
                $loadlich = loadall_lichchieu();
                include "./view/suatchieu/QLsuatchieu.php";
                break;
            case "ve":
                if(isset($_POST['tk'])&&($_POST['tk'])){
                    $searchName = $_POST['ten'];
                    $searchTieuDe = $_POST['tieude'];
                    $searchid = $_POST['id_ve'];
                }else{
                    $searchName ="";
                    $searchTieuDe="";
                    $searchid = "";
                }
                $loadvephim =loadall_vephim1($searchName, $searchTieuDe, $searchid);
                include "./view/vephim/ve.php";
                break;
            case "suavephim":
                if(isset($_GET['idsua'])){
                    $loadve=loadone_vephim($_GET['idsua']);
                }
                include "./view/vephim/sua.php";
                break;
            case "updatevephim":
                if(isset($_POST['capnhat'])){
                    $id =$_POST['id'];
                    $trang_thai =$_POST['trang_thai'];
                    update_vephim($id,$trang_thai);
                }    if(isset($_POST['tk'])&&($_POST['tk'])){
                $searchName = $_POST['ten'];
                $searchTieuDe = $_POST['tieude'];
                $searchid = $_POST['id_ve'];
            }else{
                $searchName ="";
                $searchTieuDe="";
                $searchid = "";
            }
                $loadvephim =loadall_vephim1($searchName, $searchTieuDe, $searchid);
                include "view/vephim/ve.php";
             break;
            case "phong":
                $loadphong = load_phong();
                include "./view/phong/phong.php";
                break;
            case "xoaphong":
                if (isset($_GET['idxoa'])) {
                    xoa_phong($_GET['idxoa']);
                    $loadphong = load_phong();
                    include "./view/phong/phong.php";
                }
                break;
            case "suaphong":
                if (isset($_GET['ids'])) {
                    $loadphong1 = loadone_phong($_GET['ids']);
                }
                include "./view/phong/sua.php";
                break;

                case "updatephong":

                    $loadphong = load_phong();
                    if (isset($_POST['capnhat'])) {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        if($id==''||$name =='') {
                          $error = "vui lòng không để trống";
                          $loadphong1 = load_phong($id);
                          include "./view/phong/sua.php";
                          break;
                         }else{
                        update_phong($id, $name);
                        $suatc = "sửa thành công";

                    }
                  }
                    $loadphong = load_phong();
                    include "./view/phong/phong.php";
                    break;
                case "themphong":
                    $loadphong = load_phong();
                   if (isset($_POST['len'])) {
                       //  $id = $_POST['id'];
                       $name = $_POST['name'];
                       if($name =='') {
                         $error = "vui lòng không để trống";
                         $loadphong1 = load_phong($id);
                         include "./view/phong/them.php";
                         break;
                        }else{
                       them_phong( $name);
                       $suatc = "Thêm thành công";

                   }
               }
                    $loadphong = load_phong();
                   include "./view/phong/them.php";
                   break;
            case "updatethoigian":
                $loadlc = loadall_lichchieu();
                $loadphong = load_phong();
                if (isset($_POST['capnhat'])) {
                    $id = $_POST['id'];
                    $id_lc = $_POST['id_lc'];
                    $id_phong = $_POST['id_phong'];
                    $thoi_gian_chieu = $_POST['tgc'];
                    sua_kgc($id, $id_lc, $id_phong, $thoi_gian_chieu);
                }
                $loadkgc = loadall_khunggiochieu();
                include "./view/suatchieu/thoigian/thoigian.php";
                break;
            case "themthoigian":
                $loadlc = loadall_lichchieu();
                $loadphong = load_phong();
                if (isset($_POST['them'])) {
                    $id_lc= $_POST['id_lc'];
                    $id_phong = $_POST['id_phong'];
                    $thoi_gian_chieu = $_POST['tgc'];
                    if($id_lc ==''|| $id_phong==''|| $thoi_gian_chieu=='') {
                      $error = "vui lòng không để trống";
                      $loadkgc = loadall_khunggiochieu();
                      include "./view/suatchieu/thoigian/them.php";
                      break;
                     }else{
                    them_kgc($id_lc, $id_phong, $thoi_gian_chieu);
                    $suatc = "Thêm thành công";

                }
            }
                $loadkgc = loadall_khunggiochieu();
                include "./view/suatchieu/thoigian/them.php";
                break;
            case "suathoigian":
                $loadlich = loadall_lichchieu();
                $loadphong = load_phong();
                if (isset($_GET['ids'])) {
                    $load1kgc = loadone_khung_gio_chieu($_GET['ids']);
                }
                include "./view/suatchieu/thoigian/sua.php";
                break;
            case "xoathoigian":
                if (isset($_GET['idxoa']) && ($_GET['idxoa'] > 0)){
                    xoa_kgc($_GET['idxoa']);
                }
                $loadkgc = loadall_khunggiochieu();
                include "./view/suatchieu/thoigian/thoigian.php";
                break;
            case "xoalichchieu":
                if (isset($_GET['idxoa']) && ($_GET['idxoa'] > 0)){
                    xoa_lc($_GET['idxoa']);
                }
                $loadlich = loadall_lichchieu();
                include "./view/suatchieu/QLsuatchieu.php";
                break;
            case "QTkh":
                $loadall_kh1 = loadall_taikhoan();
                include "./view/user/khachhang.php";
                break;
            case "QTvien":
                $loadall_kh = loadall_taikhoan_nv();
                include "./view/user/QTvien.php";
                break;
                case "suatk":
                    if (isset($_GET['idsua'])) {
                        $loadtk = loadone_taikhoan($_GET['idsua']);
                    }
                    include "./view/user/sua.php";
                    break;
                case "themuser":
                    if(isset($_POST['them'])){
                        if(empty($_POST['name'])) {
                            $error= " không được để trống";
                          }
                          if(empty($_POST['user'])) {
                            $error = " không được để trống";
                          }
                          if(empty($_POST['email'])) {
                            $error = " không được để trống";
                          }
                          else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                            $error = "Email không đúng định dạng"; 
                          }
                          if(empty($_POST['phone'])) {
                            $error = " không được để trống";
                          }
                          if(empty($_POST['dia_chi'])) {
                            $error= " không được để trống";
                          }
                          if(!isset($error)) {
                      $name =$_POST['name'];
                      $user =$_POST['user'];
                      $email =$_POST['email'];
                      $phone =$_POST['phone'];
                      $dia_chi =$_POST['dia_chi'];
                      insert_taikhoan($email,$user,$pass,$name,$phone,$dia_chi);
                      $suatc = "Thêm thành công";

                    }   
                }
                    $loadall_kh= loadall_taikhoan();
                    include "./view/user/them.php";
                    break;
                    
                      case "updateuser":
                        if(isset($_POST['capnhat'])){
                           $id =$_POST['id'];
                           $name =$_POST['name'];
                           $user =$_POST['user'];
                           $pass =$_POST['pass'];
                           $email =$_POST['email'];
                           $phone =$_POST['phone'];
                           $dia_chi =$_POST['dia_chi'];
                           if($id==''||$name ==''||$email==''|| $pass==''|| $user==''||$phone==''||$dia_chi=='') {
                             $error = "vui lòng không để trống";
                             $loadkgc = loadall_khunggiochieu();
                             include "./view/user/sua.php";
                             break;
                           }else {
                           sua_tk($id, $name, $user, $pass, $email, $phone, $dia_chi);  
                           $suatc = "Sửa thành công";
 
                        }
                       }
     
                        $loadalltk = loadall_taikhoan_nv();
                       include "./view/user/QTvien.php";
                       break;        
                           case "xoatk":
                    if(isset($_GET['idxoa'])){
                       $id = $_GET['idxoa'];
                       xoa_tk($id);
                   
                   $loadall_kh=loadall_taikhoan();
                   include "./view/user/QTvien.php";
                } else{include "./view/user/QTvien.php";}  
                break;
            case "dangxuat":
                unset($_SESSION['user1']);
                header('location: login.php');
                exit;
            case "home":
                $best_combo = best_combo();
                $tong_tuan = tong_week();
                $tong_thang = tong_thang();
                $tong_day = tong_day();
                $tpdc = tong_phimdc();
                $tpsc = tong_phimsc();
                $tong = tong();
                include "./view/home.php";
                break;
            case "ctve":
                if (isset($_GET['id']) && ($_GET['id'] > 0)){
                    $loadone_ve =  loadone_vephim($_GET['id']);
                }
                include "view/vephim/ct_ve.php";
                break;
            case "capnhat_tt_ve":
                if(isset($_POST['tk'])&&($_POST['tk'])){
                $searchName = $_POST['ten'];
                $searchTieuDe = $_POST['tieude'];
                  }else{
                        $searchName ="";
                          $searchTieuDe="";
                   }

                      include "./view/vephim/ve.php";
                if(isset($_POST['capnhat'])){
                    capnhat_tt_ve();
                }
                $loadvephim =loadall_vephim1($searchName, $searchTieuDe);
                include "./view/user/QTvien.php";
                break;
        }
    } else {
        $best_combo = best_combo();
        $tong_tuan = tong_week();
        $tong_thang = tong_thang();
        $tong_day = tong_day();
        $tpdc = tong_phimdc();
        $tpsc = tong_phimsc();
        $tong = tong();
        include "./view/home.php";
    }

    include "./view/home/footer.php";
}else{
    header('location: login.php');
}
