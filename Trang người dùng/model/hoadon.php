<?php
function them_hoa_don($ngay_tt, $gia_ghe)
{
    $sql = "INSERT INTO hoa_don (id,ngay_tt, thanh_tien) VALUES (NULL,'$ngay_tt', '$gia_ghe')";
    return pdo_execute_return_interlastid($sql);
}