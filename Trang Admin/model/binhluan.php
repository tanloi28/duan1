<?php
 function loadall_binhluan($id){
    $sql = "
        SELECT binhluan.id, binhluan.noidung, taikhoan.name, phim.tieu_de,  binhluan.ngaybinhluan FROM `binhluan` 
        LEFT JOIN taikhoan ON binhluan.id_user = taikhoan.id
        LEFT JOIN phim ON binhluan.id_phim = phim.id
        WHERE phim.id =$id ;
    ";
    $result =  pdo_query($sql);
    return $result;
 }
 function loadall_bl(){
    if(isset($_GET['sotrang'])){
        $sotrang =$_GET['sotrang'];
    }else{
        $sotrang= 1;
    }
    $bghi = 5;
    $vitri = ($sotrang-1 )*$bghi ;
    $sql = "
        SELECT binhluan.id, binhluan.noidung, taikhoan.name, phim.tieu_de,  binhluan.ngaybinhluan FROM `binhluan` 
        LEFT JOIN taikhoan ON  taikhoan.id=binhluan.id_user
        LEFT JOIN phim ON  phim.id=binhluan.id_phim 
        WHERE phim.id limit $vitri,$bghi;
    ";
    $result =  pdo_query($sql);
    return $result;
 }
function load_binhluan($id_phim = 0){
    $sql = "select * from binhluan where 1";

     if($id_phim > 0){
        $sql .= " and id_phim = $id_phim";
     }

     $sql .= " order by id_phim desc";
    $result = pdo_query($sql);
    return $result;
}
function delete_binhluan($id){
    $sql = "delete from binhluan where id = '$id'";
    pdo_execute($sql);
}


?>