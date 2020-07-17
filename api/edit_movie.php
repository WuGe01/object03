<?php
include_once "../plugins/base.php";
$db=new DB('movie');
$data=$db->find($_POST['id']);

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

$data['ondate']=$_POST['year']."-".$_POST['month']."-".$_POST['day'];

$db->save($data);
to("../admin.php?do=movie");
?>