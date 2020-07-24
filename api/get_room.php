<?php
include_once '../plugins/base.php';
$file['movie']=$_GET['movie'];
$file['date']=$_GET['date'];
$file['session']=$se[$_GET['sessionval']];
$db_ord=new DB('ord');
$rows=$db_ord->all($file);
$seat=[];
foreach ($rows as $r) {
    $seat=array_merge($seat,json_decode($r['seat']));
}



for ($i=0; $i < 20; $i++) { 
    if(!in_array($i,$seat)){
        echo "<div class='null'>";
    }else{
        echo "<div class='booked'>";
    }
    echo floor($i/5)+1;
    echo "排";
    echo $i%5+1;
    if(!in_array($i,$seat)){
        echo "<input type='checkbox' value='".$i."' name='num'  class='checkbox' onchange='chkTicket(this)'>";
    }
    echo "號";
    echo "</div>";
}

?>
