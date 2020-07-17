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
    <input type="button" onclick="location.href='?do=add_movice'" value="新增電影">
    <hr>
    <div class="list">
<?php
$db=new DB('movie');
$rows=$db->all([],' order by rank');
foreach($rows as $k => $r){
    $prev=($k!=0)?$rows[$k-1]['id']:$r['id'];
    $next=($k!=(count($rows)-1))?$rows[$k+1]['id']:$r['id'];
    $KK=($r['sh']==1)?'顯示':'隱藏';
?>

        <div class="move_item">
            <div style="display: inline-block;vertical-align: top;width: 15%;"><img style="height: 120px;" src="./img/<?=$r['intro'];?>" alt=""></div><div style="display: inline-block;vertical-align: bottom;width: 10%;">
                分類:<img  src="./img/03C0<?=$r['level'];?>.png" ></div><div style="display: inline-block;vertical-align: top;width: 75%;">
                <div>
                    <div style="display: inline-block;vertical-align: top;width: 32%;">片名：<?=$r['name'];?></div>
                    <div style="display: inline-block;vertical-align: top;width: 32%;">片長:<?=$r['lenght'];?></div>
                    <div style="display: inline-block;vertical-align: top;width: 32%;">上映時間:<?=$r['ondate'];?></div>
                </div>
                <div>
 
                    <input onclick="show('movie',<?=$r['id'];?>)" type="button" value="<?=$KK;?>">
                    <input class="movieUPdo" data-rank="<?=$r['id']."-".$prev;?>" type="button" value="往上">
                    <input class="movieUPdo" data-rank="<?=$r['id']."-".$next;?>" type="button" value="往下">
                    <input onclick="location.href='?do=edit_movie&id=<?=$r['id'];?>'" type="button" value="編輯電影">
                    <input onclick="del('movie',<?=$r['id'];?>)" type="button" value="刪除電影">
                </div>
                <div>簡介:<?=$r['director'];?></div>
            </div>
        </div>
        <hr>
<?php
}
?>
    </div>
</div>
