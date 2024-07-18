<?php
function loadall_vephim(){
    $sql="SELECT v.id,phim.tieu_de,v.price, v.ngay_dat,v.ghe,v.combo, taikhoan.name, khung_gio_chieu.thoi_gian_chieu ,v.id_hd,v.trang_thai FROM ve v 
    LEFT JOIN taikhoan ON taikhoan.id = v.id_tk 
    LEFT JOIN khung_gio_chieu ON khung_gio_chieu.id = v.id_thoi_gian_chieu 
     LEFT JOIN phim ON phim.id = v.id_phim       
    LEFT JOIN lichchieu ON lichchieu.id = khung_gio_chieu.id_lich_chieu
    WHERE 1 ORDER BY id DESC;";
    $re=pdo_query($sql);
    return $re;
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
function update_vephim($id,$trang_thai){
    $sql = "update ve set `trang_thai`='{$trang_thai}' where `ve`.`id`=" . $id;
    pdo_execute($sql);
}

function loadall_vephim1($searchName, $searchTieuDe,$searchid){
    $sql = "SELECT v.id, phim.tieu_de,lichchieu.ngay_chieu , v.price, v.ngay_dat, v.ghe, v.combo, taikhoan.name, khung_gio_chieu.thoi_gian_chieu, v.id_hd, v.trang_thai ,phongchieu.name as tenphong
            FROM ve v 
            LEFT JOIN taikhoan ON taikhoan.id = v.id_tk 
            LEFT JOIN khung_gio_chieu ON khung_gio_chieu.id = v.id_thoi_gian_chieu 
            LEFT JOIN phim ON phim.id = v.id_phim
            LEFT JOIN lichchieu ON lichchieu.id = khung_gio_chieu.id_lich_chieu
            LEFT JOIN phongchieu ON phongchieu.id = khung_gio_chieu.id_phong
            WHERE taikhoan.name LIKE '%" . $searchName . "%' AND phim.tieu_de LIKE '%" . $searchTieuDe . "%' and v.id like '%" . $searchid . "%'
            ORDER BY v.id DESC";

    $re = pdo_query($sql);
    return $re;
}


function capnhat_tt_ve(){
    $sql = "UPDATE `ve`
INNER JOIN `lichchieu` ON `ve`.`id_ngay_chieu` = `lichchieu`.`id`
SET `ve`.`trang_thai` = 4
WHERE `lichchieu`.`ngay_chieu` < NOW() AND `ve`.`trang_thai` = 1;
";
    pdo_execute($sql);
}