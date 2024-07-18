<?php
 function loadall_loaiphim(){
     $sql = "select * from loaiphim where 1 order by id asc";
     $re = pdo_query($sql);
     return $re;
 }
 function loadall_loaip(){
    $sql="select * from loaiphim order by id desc";
    $re =pdo_query($sql);
    return  $re;
}
function load_ten_loai($id){
    if($id>0){
        $sql="select * from loaiphim where id=".$id;
        $loai=pdo_query_one($sql);
        extract($loai);
        return $name;
    }else{
        return "";
    }
}   
   
function them_loaiphim($name){
    $sql = "insert into `loaiphim`(`name`) values ('$name')";
    pdo_execute($sql);
}

function loadone_loaiphim($id){
    $sql = "select * from loaiphim where id =".$id;
    $re = pdo_query_one($sql);
    return $re;
}

function xoa_loaiphim($id){
    $sql = "delete from loaiphim where id=".$id;
    pdo_execute($sql);
}

function update_loaiphim($id,$name){
    $sql = "update loaiphim set `name`='{$name}' where `loaiphim`.`id`=". $id;
    pdo_execute($sql);
}
function phim_select_all()
{
    $sql = "SELECT phim.id, phim.tieu_de, phim.img, phim.mo_ta, phim.thoi_luong_phim, phim.date_phat_hanh, phim.id_loai, loaiphim.name FROM phim JOIN loaiphim ON phim.id_loai = loaiphim.id";
    return pdo_query($sql);
}