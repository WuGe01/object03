<style>
.pop-preMovie{
    overflow:auto;
    height:300px;
    
}
.w-25{
    width:25%;
}
.wpre{
    background-color: #CCC;
    text-align: center;
    margin: 0 1px;
    margin-top: 1px;
}
.row{
    display:flex;
}
.row>div{
    margin: 0 1px;
    text-align: center;
}
</style>
<div style="height:350px;">
<div class='ct poptitle'>預告片清單</div>
<div class="pop-preMovie">
<div style="display:flex;">
<div class="w-25 wpre">預告片海報</div>
<div class="w-25 wpre">預告片片名</div>
<div class="w-25 wpre">預告片排序</div>
<div class="w-25 wpre">操作</div>
</div>
<form action="./api/edit_pop.php" method="post" >
<div class="pop-preMovie">
<?php
$db=new DB('pop');
$rows=$db->all([]," order by `rank` ");
foreach($rows as $k => $r){
    $ischk=($r['sh']==1)?"checked":"";
    $prev=($k!=0)?$rows[$k-1]['id']:$r['id'];
    $next=($k!=(count($rows)-1))?$rows[$k+1]['id']:$r['id'];
?>
<div class="row">
<input type="hidden" name="id[]" value="<?=$r['id'];?>">
<div class="w-25"><img src="./img/<?=$r['path'];?>" style="width: 90px;"></div>
<div class="w-25"><input type="text" name="name[]" value="<?=$r['name'];?>"></div>
<div class="w-25">
    <input type="button" class="popUPdo" value="往上" data-rank="<?=$r['id']."-".$prev;?>">
    <input type="button" class="popUPdo" value="往下" data-rank="<?=$r['id']."-".$next;?>">
</div>
<div class="w-25">
    <input type="checkbox" name="sh[]"  value="<?=$r['id'];?>" <?=$ischk;?>>顯示
    <input type="checkbox" name="del[]"  value="<?=$r['id'];?>">刪除
    <select name="ani[]">
        <option value="1" <?=($r['ani']==1)?"selected":"";?>>淡入淡出</option>
        <option value="2" <?=($r['ani']==2)?"selected":"";?>>放大縮小</option>
        <option value="3" <?=($r['ani']==3)?"selected":"";?>>滑入滑出</option>
        <option value="4" <?=($r['ani']==4)?"selected":"";?>>縮放</option>
    </select>
</div>
</div>
<?php
}
?>
</div>
</div>
<div class="ct"><input type="submit" value="確認修改"> <input type="reset" value="重置"></div>
</div>
</form>

<hr>
<div style="height:150px;">
<div class='ct poptitle'>新增預報片海報</div>
<form action="./api/addpop.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td style="width:50%;"><input type="file" name="popfile"></td>
            <td style="width:50%;"><input type="text" name="popname"></td>
        </tr>
    </table>
<div class="ct"><input type="submit" value="送出"> <input type="reset" value="重置"></div>
</form>

</div>