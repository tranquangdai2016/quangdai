<?php 

switch($action){
    case 'lien-he' : 
        extract(lienhe());
        break;
    default: extract( trangchu() );
            break;


}
function trangchu(){
    $msg="trang chu ";
    return ['view_name'=>'index/trang-chu.php',
             'msg'=>$msg];
}
function lienhe(){

    $msg="trang lieen heej ";
    return ['view_name'=>'index/trang-chu.php',
             'msg'=>$msg];
}