<?php
include_once "../plugins/base.php";
$db=new DB('pop');
echo "<pre>";
print_r($_POST);
echo "</pre>";
foreach ($_POST['id'] as $k => $id) {
   if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
       $db->del($id);
   }else{
    $row=$db->find($id);
    $row['name']=$_POST['name'][$k];
    $row['sh']=(!empty($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
    $row['ani']=$_POST['ani'][$k];
    $db->save($row);
   }
}
to("../admin.php?do=poster");
?>