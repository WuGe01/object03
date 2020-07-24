<?php
include_once "../plugins/base.php";
$movie_id=$_GET['id'];
$movie_date=$_GET['date'];
$movieName=$_GET['movieName'];
$db_ord=new DB('ord');
$db_movie=new DB('movie');
// $db=new DB("movie");
// $movie=$db->find($movie_id);
// $ondate=strtotime($movie['ondate']);
$today=strtotime(date("Y-m-d"));
if(strtotime($movie_date)==$today){
    $now=floor((date('G')-12)/2);
    if($now<0)$now=0;
    for($i=($now+1);$i<=5;$i++){

        $qt=$db_ord->q("select SUM(qt) from `ord` where `movie` = '".$movieName."' && `date` = '".$movie_date."' && `session` = '".$se[$i]."'")[0][0];
        echo "<option value='".$i."'>".$se[$i]."剩餘座位:".(20-$qt)."</option>";

        
    }
}else{
    for($i=1;$i<=5;$i++){
        $qt=$db_ord->q("select SUM(qt) from `ord` where `movie` = '".$movieName."' && `date` = '".$movie_date."' && `session` = '".$se[$i]."'")[0][0];
        echo "<option value='".$i."'>".$se[$i]."剩餘座位:".(20-$qt)."</option>";


    }
}
?>