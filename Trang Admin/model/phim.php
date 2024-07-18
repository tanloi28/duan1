<?php

function loadall_phim($searchName1 = "", $searchLoai = "")
{
    $sql = "SELECT p.id, p.tieu_de, p.daodien, p.dienvien, p.img, p.mo_ta, p.date_phat_hanh, p.thoi_luong_phim, loaiphim.name, p.quoc_gia, p.gia_han_tuoi
            FROM phim p
            INNER JOIN loaiphim ON loaiphim.id = p.id_loai
            WHERE 1 ";

    // Thêm điều kiện tìm kiếm theo tên phim
    if (!empty($searchName1)) {
        $sql .= " AND p.tieu_de LIKE '%" . $searchName1 . "%' ";
    }

    // Thêm điều kiện tìm kiếm theo loại phim
    if (!empty($searchLoai)) {
        $sql .= " AND loaiphim.name LIKE '%" . $searchLoai . "%' ";
    }

    $sql .= " ORDER BY p.id DESC";

    $re = pdo_query($sql);
    return $re;
}



function them_phim($tieu_de, $daodien, $dienvien, $img, $mo_ta, $thoiluong, $quoc_gia, $gia_han_tuoi, $date, $id_loai,$link)
{
    $sql = "insert into `phim` (`tieu_de`,`daodien`,`dienvien`,`img`,`mo_ta`,`thoi_luong_phim`,`quoc_gia`,`gia_han_tuoi`,`date_phat_hanh`,`id_loai`,`link_trailer`) values ('$tieu_de','$daodien','$dienvien','$img','$mo_ta','$thoiluong','$quoc_gia','$gia_han_tuoi','$date','$id_loai','$link')";
    pdo_execute($sql);
}

function loadone_phim($id)
{
    $sql = "select * from phim where id =" . $id;
    $re = pdo_query_one($sql);
    return $re;
}

function xoa_phim($id)
{
    $sql = "delete from phim where id=" . $id;
    pdo_execute($sql);
}
function sua_phim($id, $tieu_de, $img, $mo_ta, $thoiluong, $date, $id_loai)
{
    if ($img != "") {
        $sql = "update phim set `tieu_de`='{$tieu_de}',`img`='{$img}',`mo_ta`='{$mo_ta}',`thoi_luong_phim`='{$thoiluong}',`date_phat_hanh`='{$date}',`id_loai`='{$id_loai}'where id=" . $id;
    } else {
        $sql = "update phim set `tieu_de`='{$tieu_de}',`mo_ta`='{$mo_ta}',`thoi_luong_phim`='{$thoiluong}',`date_phat_hanh`='{$date}',`id_loai`='{$id_loai}'where id=" . $id;
    }
    pdo_execute($sql);
}


function tong_phimdc(){
    $sql = "SELECT COUNT(*) AS total_phim
FROM phim
WHERE date_phat_hanh < CURDATE();";
    $re=pdo_query($sql);
    return  $re;
}

function tong_phimsc(){
    $sql = "SELECT COUNT(*) AS total_phim
FROM phim
WHERE date_phat_hanh > CURDATE();";
    $re=pdo_query($sql);
    return  $re;
}