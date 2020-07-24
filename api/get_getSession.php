<?php
include_once "../plugins/base.php";
$movie_id=$_GET['id'];
$movie_date=$_GET['date'];
// $db=new DB("movie");
// $movie=$db->find($movie_id);
// $ondate=strtotime($movie['ondate']);
$today=strtotime(date("Y-m-d"));
$se=[
    1=>'1400-1600',
    2=>'1600-1800',
    3=>'1800-2000',
    4=>'2000-2200',
    5=>'2200-2400'
];

if(strtotime($movie_date)==$today){
    $now=floor((date('G')-12)/2);
    if($now<0)$now=0;
    for($i=($now+1);$i<=5;$i++){
        echo "<option value='".$i."'>".$se[$i]."</option>";
    }
}else{
    for($i=1;$i<=5;$i++){
        echo "<option value='".$i."'>".$se[$i]."</option>";
    }
}

?>x