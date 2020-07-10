<?php
include_once "../plugins/base.php";
$db=new DB('pop');
$data=[];
print_r($_FILES);
echo "<br>";
print_r($_POST);
if(!empty($_FILES['popfile']['tmp_name'])){
    $data['path']=$_FILES['popfile']['name'];
    echo "<br>".$data['path'];
    move_uploaded_file($_FILES['popfile']['tmp_name'],"../img/".$data['path']);

}
$data['name']=$_POST['popname'];
$data['sh']=1;
$data['ani']=1;
$data['rank']=($db->q("select max(`id`) from `pop`")[0][0]+1);
$db->save($data);
print_r($data);
to("../admin.php?do=poster");
?>