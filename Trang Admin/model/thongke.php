<?php
function load_thongke_doanhthu1()
{   if(isset($_GET['trang'])){
    $trang= $_GET['trang'];
}else{
    $trang = 1 ;
}   
    $bghi=5;
    $vitri = ($trang - 1)* $bghi;
    $sql = "SELECT 
    phim.id as id, 
    phim.tieu_de as tieu_de, 
    loaiphim.name as ten_loaiphim, 
    COUNT(CASE WHEN ve.trang_thai IN (1, 2,4) THEN ve.id END) as so_luong_ve_dat, 
    SUM(CASE WHEN ve.trang_thai IN (1, 2,4) THEN hoa_don.thanh_tien ELSE 0 END) as sum_thanhtien
FROM 
    phim
LEFT JOIN 
    loaiphim ON loaiphim.id = phim.id_loai
LEFT JOIN 
    lichchieu ON phim.id = lichchieu.id_phim
LEFT JOIN 
    khung_gio_chieu ON lichchieu.id = khung_gio_chieu.id_lich_chieu
LEFT JOIN 
    ve ON ve.id_thoi_gian_chieu = khung_gio_chieu.id
LEFT JOIN 
    hoa_don ON hoa_don.id = ve.id_hd
GROUP BY 
    phim.id
ORDER BY 
    phim.id DESC LIMIT $vitri,$bghi;
";

    $listtk = pdo_query($sql);

    return $listtk;
}

function load_thongke_doanhthu(){

    $sql = "SELECT 
    phim.id as id, 
    phim.tieu_de as tieu_de, 
    loaiphim.name as ten_loaiphim, 
    COUNT(CASE WHEN ve.trang_thai IN (1, 2,4) THEN ve.id END) as so_luong_ve_dat, 
    SUM(CASE WHEN ve.trang_thai IN (1, 2,4) THEN hoa_don.thanh_tien ELSE 0 END) as sum_thanhtien
FROM 
    phim
LEFT JOIN 
    loaiphim ON loaiphim.id = phim.id_loai
LEFT JOIN 
    lichchieu ON phim.id = lichchieu.id_phim
LEFT JOIN 
    khung_gio_chieu ON lichchieu.id = khung_gio_chieu.id_lich_chieu
LEFT JOIN 
    ve ON ve.id_thoi_gian_chieu = khung_gio_chieu.id
LEFT JOIN 
    hoa_don ON hoa_don.id = ve.id_hd
GROUP BY 
    phim.id
ORDER BY 
    phim.id DESC ;
";

    $listtk = pdo_query($sql);

    return $listtk;
}

function tong(){
    $sql = "SELECT 
    SUM(so_luong_ve_dat) AS tong_so_luong_ve_dat,
    SUM(sum_thanhtien) AS tong_doanh_thu
FROM (
    SELECT 
        phim.id as id, 
        phim.tieu_de as tieu_de, 
        loaiphim.name as ten_loaiphim, 
        COUNT(CASE WHEN ve.trang_thai IN (1, 2,4) THEN ve.id END) as so_luong_ve_dat, 
        SUM(CASE WHEN ve.trang_thai IN (1, 2,4) THEN hoa_don.thanh_tien ELSE 0 END) as sum_thanhtien
    FROM 
        phim
    LEFT JOIN 
        loaiphim ON loaiphim.id = phim.id_loai
    LEFT JOIN 
        lichchieu ON phim.id = lichchieu.id_phim
    LEFT JOIN 
        khung_gio_chieu ON lichchieu.id = khung_gio_chieu.id_lich_chieu
    LEFT JOIN 
        ve ON ve.id_thoi_gian_chieu = khung_gio_chieu.id
    LEFT JOIN 
        hoa_don ON hoa_don.id = ve.id_hd
    GROUP BY 
        phim.id
) AS phim_stats";

    $all = pdo_query($sql);
    return $all;
}

function load_doanhthu_thang1(){
      if(isset($_GET['trang'])){
        $trang= $_GET['trang'];
    }else{
        $trang = 1 ;
    }   
        $bghi=5;
        $vitri = ($trang - 1)* $bghi;
    $sql = "SELECT 
    phim.id AS id, 
    phim.tieu_de AS tieu_de, 
    loaiphim.name AS ten_loaiphim, 
    MONTH(hoa_don.ngay_tt) AS thang,
    COUNT(ve.id) AS so_luong_ve_dat, 
    SUM(hoa_don.thanh_tien) AS sum_thanhtien
FROM 
    phim
LEFT JOIN 
    loaiphim ON loaiphim.id = phim.id_loai
LEFT JOIN 
    lichchieu ON phim.id = lichchieu.id_phim
LEFT JOIN 
    khung_gio_chieu ON lichchieu.id = khung_gio_chieu.id_lich_chieu
LEFT JOIN 
    ve ON ve.id_thoi_gian_chieu = khung_gio_chieu.id AND ve.trang_thai IN (1, 2,4)
LEFT JOIN 
    hoa_don ON hoa_don.id = ve.id_hd
GROUP BY 
    phim.id, thang
ORDER BY 
    phim.id DESC, thang DESC LIMIT $vitri,$bghi;

";
    $listtk = pdo_query($sql);

    return $listtk;
}
function load_doanhthu_thang(){
 
  $sql = "SELECT 
  phim.id AS id, 
  phim.tieu_de AS tieu_de, 
  loaiphim.name AS ten_loaiphim, 
  MONTH(hoa_don.ngay_tt) AS thang,
  COUNT(ve.id) AS so_luong_ve_dat, 
  SUM(hoa_don.thanh_tien) AS sum_thanhtien
FROM 
  phim
LEFT JOIN 
  loaiphim ON loaiphim.id = phim.id_loai
LEFT JOIN 
  lichchieu ON phim.id = lichchieu.id_phim
LEFT JOIN 
  khung_gio_chieu ON lichchieu.id = khung_gio_chieu.id_lich_chieu
LEFT JOIN 
  ve ON ve.id_thoi_gian_chieu = khung_gio_chieu.id AND ve.trang_thai IN (1, 2,4)
LEFT JOIN 
  hoa_don ON hoa_don.id = ve.id_hd
GROUP BY 
  phim.id, thang
ORDER BY 
  phim.id DESC, thang DESC;

";
  $listtk = pdo_query($sql);

  return $listtk;
}
function load_doanhthu_ngay1(){
       if(isset($_GET['trang'])){
        $trang= $_GET['trang'];
    }else{
        $trang = 1 ;
    }   
        $bghi=5;
        $vitri = ($trang - 1)* $bghi;
    $sql = "SELECT 
    phim.id AS id, 
    phim.tieu_de AS tieu_de, 
    loaiphim.name AS ten_loaiphim, 
    DATE(hoa_don.ngay_tt) AS ngay,
    COUNT(ve.id) AS so_luong_ve_dat,
    SUM(hoa_don.thanh_tien) AS sum_thanhtien
FROM 
    phim
INNER JOIN 
    loaiphim ON loaiphim.id = phim.id_loai
INNER JOIN 
    lichchieu ON phim.id = lichchieu.id_phim
INNER JOIN 
    khung_gio_chieu ON lichchieu.id = khung_gio_chieu.id_lich_chieu
INNER JOIN 
    ve ON ve.id_thoi_gian_chieu = khung_gio_chieu.id AND ve.trang_thai IN (1, 2,4)
INNER JOIN 
    hoa_don ON hoa_don.id = ve.id_hd
GROUP BY 
    phim.id, phim.tieu_de, loaiphim.name, DATE(hoa_don.ngay_tt)
ORDER BY 
    phim.id DESC, ngay DESC LIMIT $vitri,$bghi

;

";
    $listtk = pdo_query($sql);

    return $listtk;
}

function load_doanhthu_ngay(){
    $sql = "SELECT 
    phim.id AS id, 
    phim.tieu_de AS tieu_de, 
    loaiphim.name AS ten_loaiphim, 
    DATE(hoa_don.ngay_tt) AS ngay,
    COUNT(ve.id) AS so_luong_ve_dat,
    SUM(hoa_don.thanh_tien) AS sum_thanhtien
FROM 
    phim
INNER JOIN 
    loaiphim ON loaiphim.id = phim.id_loai
INNER JOIN 
    lichchieu ON phim.id = lichchieu.id_phim
INNER JOIN 
    khung_gio_chieu ON lichchieu.id = khung_gio_chieu.id_lich_chieu
INNER JOIN 
    ve ON ve.id_thoi_gian_chieu = khung_gio_chieu.id AND ve.trang_thai IN (1, 2,4)
INNER JOIN 
    hoa_don ON hoa_don.id = ve.id_hd
GROUP BY 
    phim.id, phim.tieu_de, loaiphim.name, DATE(hoa_don.ngay_tt)
ORDER BY 
    phim.id DESC, ngay DESC

;

";
    $listtk = pdo_query($sql);

    return $listtk;
}

function load_doanhthu_tuan1(){
      if(isset($_GET['trang'])){
        $trang= $_GET['trang'];
    }else{
        $trang = 1 ;
    }   
        $bghi=5;
        $vitri = ($trang - 1)* $bghi;
    $sql = "SELECT 
    phim.id AS id, 
    phim.tieu_de AS tieu_de, 
    loaiphim.name AS ten_loaiphim, 
    YEARWEEK(hoa_don.ngay_tt) AS tuan,
    COUNT(ve.id) AS so_luong_ve_dat, 
    SUM(hoa_don.thanh_tien) AS sum_thanhtien
FROM 
    phim
INNER JOIN 
    loaiphim ON loaiphim.id = phim.id_loai
INNER JOIN 
    lichchieu ON phim.id = lichchieu.id_phim
INNER JOIN 
    khung_gio_chieu ON lichchieu.id = khung_gio_chieu.id_lich_chieu
INNER JOIN 
    ve ON ve.id_thoi_gian_chieu = khung_gio_chieu.id AND ve.trang_thai IN (1, 2,4)
INNER JOIN 
    hoa_don ON hoa_don.id = ve.id_hd
GROUP BY 
    phim.id, phim.tieu_de, loaiphim.name, YEARWEEK(hoa_don.ngay_tt)
ORDER BY 
    phim.id DESC, tuan DESC LIMIT $vitri,$bghi;


";
    $listtk = pdo_query($sql);

    return $listtk;
}
function load_doanhthu_tuan(){

  $sql = "SELECT 
  phim.id AS id, 
  phim.tieu_de AS tieu_de, 
  loaiphim.name AS ten_loaiphim, 
  YEARWEEK(hoa_don.ngay_tt) AS tuan,
  COUNT(ve.id) AS so_luong_ve_dat, 
  SUM(hoa_don.thanh_tien) AS sum_thanhtien
FROM 
  phim
INNER JOIN 
  loaiphim ON loaiphim.id = phim.id_loai
INNER JOIN 
  lichchieu ON phim.id = lichchieu.id_phim
INNER JOIN 
  khung_gio_chieu ON lichchieu.id = khung_gio_chieu.id_lich_chieu
INNER JOIN 
  ve ON ve.id_thoi_gian_chieu = khung_gio_chieu.id AND ve.trang_thai IN (1, 2,4)
INNER JOIN 
  hoa_don ON hoa_don.id = ve.id_hd
GROUP BY 
  phim.id, phim.tieu_de, loaiphim.name, YEARWEEK(hoa_don.ngay_tt)
ORDER BY 
  phim.id DESC, tuan DESC ;


";
  $listtk = pdo_query($sql);

  return $listtk;
}

function tong_day(){
    $today = date('Y-m-d'); // Lấy ngày hôm nay

    $sql = "SELECT 
        SUM(so_luong_ve_dat) AS tong_so_luong_ve_dat,
        SUM(sum_thanhtien) AS tong_doanh_thu
    FROM (
        SELECT 
            phim.id as id, 
            phim.tieu_de as tieu_de, 
            loaiphim.name as ten_loaiphim, 
            COUNT(CASE WHEN ve.trang_thai IN (1, 2,4) AND DATE(hoa_don.ngay_tt) = '$today' THEN ve.id END) as so_luong_ve_dat, 
            SUM(CASE WHEN ve.trang_thai IN (1, 2,4) AND DATE(hoa_don.ngay_tt) = '$today' THEN hoa_don.thanh_tien ELSE 0 END) as sum_thanhtien
        FROM 
            phim
        LEFT JOIN 
            loaiphim ON loaiphim.id = phim.id_loai
        LEFT JOIN 
            lichchieu ON phim.id = lichchieu.id_phim
        LEFT JOIN 
            khung_gio_chieu ON lichchieu.id = khung_gio_chieu.id_lich_chieu
        LEFT JOIN 
            ve ON ve.id_thoi_gian_chieu = khung_gio_chieu.id
        LEFT JOIN 
            hoa_don ON hoa_don.id = ve.id_hd
        WHERE 
            DATE(hoa_don.ngay_tt) = '$today'
        GROUP BY 
            phim.id
    ) AS phim_stats";

    $result = pdo_query($sql);
    return $result;
}


function tong_week(){
    // Lấy ngày đầu tiên của tuần
    $firstDayOfWeek = date('Y-m-d', strtotime('monday this week'));

    $sql = "SELECT 
        SUM(so_luong_ve_dat) AS tong_so_luong_ve_dat,
        SUM(sum_thanhtien) AS tong_doanh_thu
    FROM (
        SELECT 
            phim.id as id, 
            phim.tieu_de as tieu_de, 
            loaiphim.name as ten_loaiphim, 
            COUNT(CASE WHEN ve.trang_thai IN (1, 2,4) AND DATE(hoa_don.ngay_tt) >= '$firstDayOfWeek' THEN ve.id END) as so_luong_ve_dat, 
            SUM(CASE WHEN ve.trang_thai IN (1, 2,4) AND DATE(hoa_don.ngay_tt) >= '$firstDayOfWeek' THEN hoa_don.thanh_tien ELSE 0 END) as sum_thanhtien
        FROM 
            phim
        LEFT JOIN 
            loaiphim ON loaiphim.id = phim.id_loai
        LEFT JOIN 
            lichchieu ON phim.id = lichchieu.id_phim
        LEFT JOIN 
            khung_gio_chieu ON lichchieu.id = khung_gio_chieu.id_lich_chieu
        LEFT JOIN 
            ve ON ve.id_thoi_gian_chieu = khung_gio_chieu.id
        LEFT JOIN 
            hoa_don ON hoa_don.id = ve.id_hd
        WHERE 
            DATE(hoa_don.ngay_tt) >= '$firstDayOfWeek'
        GROUP BY 
            phim.id
    ) AS phim_stats";

    $result = pdo_query($sql);
    return $result;
}


function tong_thang(){
    // Lấy ngày đầu tiên của tháng
    $firstDayOfMonth = date('Y-m-01');

    $sql = "SELECT 
        SUM(so_luong_ve_dat) AS tong_so_luong_ve_dat,
        SUM(sum_thanhtien) AS tong_doanh_thu
    FROM (
        SELECT 
            phim.id as id, 
            phim.tieu_de as tieu_de, 
            loaiphim.name as ten_loaiphim, 
            COUNT(CASE WHEN ve.trang_thai IN (1, 2) AND DATE(hoa_don.ngay_tt) >= '$firstDayOfMonth' THEN ve.id END) as so_luong_ve_dat, 
            SUM(CASE WHEN ve.trang_thai IN (1, 2) AND DATE(hoa_don.ngay_tt) >= '$firstDayOfMonth' THEN hoa_don.thanh_tien ELSE 0 END) as sum_thanhtien
        FROM 
            phim
        LEFT JOIN 
            loaiphim ON loaiphim.id = phim.id_loai
        LEFT JOIN 
            lichchieu ON phim.id = lichchieu.id_phim
        LEFT JOIN 
            khung_gio_chieu ON lichchieu.id = khung_gio_chieu.id_lich_chieu
        LEFT JOIN 
            ve ON ve.id_thoi_gian_chieu = khung_gio_chieu.id
        LEFT JOIN 
            hoa_don ON hoa_don.id = ve.id_hd
        WHERE 
            DATE(hoa_don.ngay_tt) >= '$firstDayOfMonth'
        GROUP BY 
            phim.id
    ) AS phim_stats";

    $result = pdo_query($sql);
    return $result;
}

function best_combo(){
    $sql = "SELECT 
    v.combo,
    COUNT(v.combo) AS so_luong_dat
FROM 
    ve v
LEFT JOIN 
    taikhoan ON taikhoan.id = v.id_tk
LEFT JOIN 
    khung_gio_chieu ON khung_gio_chieu.id = v.id_thoi_gian_chieu
LEFT JOIN 
    phim ON phim.id = v.id_phim
LEFT JOIN 
    lichchieu ON lichchieu.id = khung_gio_chieu.id_lich_chieu
WHERE 
    v.trang_thai IN (1, 2,4)
GROUP BY 
    v.combo
ORDER BY 
    so_luong_dat DESC
LIMIT 1;

";
    $result = pdo_query($sql);
    return $result;
}
