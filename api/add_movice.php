<?php
include_once "../plugins/base.php";
$data['name']=$_POST['name'];
$data['level']=$_POST['level'];
$data['publish']=$_POST['publish'];
$data['lenght']=$_POST['lenght'];
$data['trailer']=$_POST['trailer'];
$data['director']=$_POST['director'];

if(!empty($_FILES['poster']['tmp_name'])){
    $data['poster']=$_FILES['poster']['name'];
    move_uploaded_file($_FILES['poster']['tmp_name'],"../img/". $data['poster']);
}
if(!empty($_FILES['intro']['tmp_name'])){
    $data['intro']=$_FILES['intro']['name'];
    move_uploaded_file($_FILES['intro']['tmp_name'],"../img/". $data['intro']);
}
$db=new DB('movie');
$data['ondate']=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
$data['sh']=1;
$data['rank']=($db->q("select max(`id`) from `movie`")[0][0]+1);
print_r($data);
$db->save($data);
to("../admin.php?do=movie");
?>