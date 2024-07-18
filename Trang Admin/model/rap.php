<?php
function loadall_rap(){
    $sql = "select * from rapchieu order by id asc";
    $re = pdo_query($sql);
    return $re;
}