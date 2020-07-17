<?php
include_once "../plugins/base.php";
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
 
                    <input onclick="show1('movie',<?=$r['id'];?>)" type="button" value="<?=$KK;?>">
                    <input class="movieUPdo1" data-rank="<?=$r['id']."-".$prev;?>" type="button" value="往上">
                    <input class="movieUPdo1" data-rank="<?=$r['id']."-".$next;?>" type="button" value="往下">
                    <input onclick="location.href='?do=edit_movie&id=<?=$r['id'];?>'" type="button" value="編輯電影">
                    <input onclick="del1('movie',<?=$r['id'];?>)" type="button" value="刪除電影">
                </div>
                <div>簡介:<?=$r['director'];?></div>
            </div>
        </div>
        <hr>
<?php
}
?>
<script>
function del1(table,id) {
    $.post("./api/del.php",{"table":table,id},()=>{
        reloadlist()
    })
}
$(".movieUPdo1").on("click",function(){
    let id=$(this).data("rank").split('-')
    let table="movie";
    $.post("./api/rank.php",{id,table},function(){
        reloadlist()
    })
}) 
function show1(t,id) {
    $.post("./api/show.php",{"table":t,id},()=>{
        reloadlist()
    })
}
</script>