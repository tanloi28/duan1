<?php
 function loadall_loaiphim(){
     $sql = "select * from loaiphim where 1 order by id asc";
     $re = pdo_query($sql);
     return $re;
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

function load_ten_loai($id_loai){
    $sql="select * from loaiphim where id=".$id_loai;
    $loai = pdo_query_one($sql);
    extract($loai);
    return $name;
}