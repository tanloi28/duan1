<?php
function binh_luan_insert($noidung, $id_user, $id_phim, $timebl)
{
    $sql = "INSERT INTO `binhluan` (`id`, `noidung`, `id_user`, `id_phim`, `ngaybinhluan`) VALUES (NULL, '$noidung', '$id_user', '$id_phim', '$timebl')";
    pdo_execute($sql);
}


function binh_luan_select_all($id_phim)
{
    $sql = "SELECT binhluan.id,
       binhluan.noidung,
       binhluan.ngaybinhluan,
       phim.id AS film_id,
       taikhoan.name
FROM binhluan
INNER JOIN phim ON phim.id = binhluan.id_phim
INNER JOIN taikhoan ON taikhoan.id = binhluan.id_user
WHERE binhluan.id_phim = '$id_phim'
ORDER BY binhluan.id DESC";
    return pdo_query($sql);
}

function dem_bl($id_phim)
{
    $sql = "SELECT COUNT(binhluan.id) AS so_binh_luan, 
               binhluan.noidung, 
               binhluan.ngaybinhluan, 
               phim.id AS film_id, 
               taikhoan.name 
        FROM binhluan 
        INNER JOIN phim ON phim.id = binhluan.id_phim 
        INNER JOIN taikhoan ON taikhoan.id = binhluan.id_user 
        WHERE binhluan.id_phim = '$id_phim'";
    return pdo_query($sql);
}