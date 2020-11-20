<?php

 switch($action){

    case 'edit':  extract( EditProduct() ) ; break;
    case 'delete': (   DeleteProduct()) ; break;
    case 'add':  AddProduct(); break;
    default:  ListProduct(); break;
 }
 function EditProduct(){   
      $idsp= $_GET['id'];
      $msg="san pham muon sua la" .$idsp;
      return [
            "view_name"=>"product/edit.php",
            "msg"=>$msg,
            'idsp'=>$idsp,
      ];
 }
 function DeleteProduct(){
     
}
function AddProduct(){
     
}
function ListProduct(){
    
}