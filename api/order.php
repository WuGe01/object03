<?php
include_once "../plugins/base.php";
$movie=$_POST['movie'];
$movieName=$_POST['movieName'];
$date=$_POST['date'];
$session=$_POST['session'];
$seat=$_POST['seat'];
sort($seat);

$db_moive=new DB('movie');
$data['movie']=$db_moive->find($movie)['name'];
$data['date']=$date;
$data['qt']=count($seat);
$data['session']=$se[$session];
$data['seat']=json_encode($seat);

$daNo=$db_moive->q("select max(`id`) from `ord`")[0][0]+1;
$dateNo=date("Ymd");
$data['no']=$dateNo.sprintf("%04d",$daNo);
echo $data['no'];
$db=new DB('ord');
$db->save($data);
?>