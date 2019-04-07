<?php
include('../class/crud.php');
$crud=new crud();
$cons['user_name']=$_POST['user_name'];
$datas=$crud->common_select('tbl_auth','user_name','id','ASC',$cons);
//echo gettype($datas);
echo count($datas);
?>