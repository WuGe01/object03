<style>
    .list{
        overflow: auto;
        width: 95%;
        background-color: #eee;
        margin: auto;
        height: 420px;    
    }
    .move_item{
        height: 130px;
    }
</style>
<div style="width: 80%;height: 480px;margin: auto;background-color: #CCC;padding: 20px;border-radius: 5px;">
    <input type="button" value="新增電影">
    <hr>
    <div class="list">
<?php
$db=new DB('movie');
$rows=$db->all([],' order by rank');
foreach($rows as $r){


?>

        <div class="move_item">
            <div style="display: inline-block;vertical-align: top;width: 15%;"><img style="height: 120px;" src="./img/<?=$r['intro'];?>" alt=""></div><div style="display: inline-block;vertical-align: top;width: 10%;">
                分類:<img  src="./img/03C0<?=$r['level'];?>.png" ></div><div style="display: inline-block;vertical-align: top;width: 75%;">
                <div>
                    <div style="display: inline-block;vertical-align: top;width: 32%;">片名：<?=$r['name'];?></div>
                    <div style="display: inline-block;vertical-align: top;width: 32%;">片長:<?=$r['lenght'];?></div>
                    <div style="display: inline-block;vertical-align: top;width: 32%;">上映時間:<?=$r['ondate'];?></div>
                </div>
                <div>功能按紐</div>
                <div>簡介:<?=$r['director'];?></div>
            </div>
        </div>
        <hr>
<?php
}
?>
    </div>
</div>