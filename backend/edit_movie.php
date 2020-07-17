<style>
    .inBox{

        width: 19%;
        vertical-align: top;
    }
    .inBox2{

        width: 79%;
        vertical-align: top;
    }
    .aa{
        width: 95%;
        margin: auto;
        background-color: #ccc;
    }
    .a{
        display: flex;
}   
    .inBox2 > div{
        margin-bottom: 1px;
    }
<?php
$db=new DB('movie');
$row=$db->find($_GET['id']);

?>

</style>
<div class="aa" >

    <div class="aa" >
    <form action="./api/edit_movie.php" method="POST" enctype="multipart/form-data">
        <h1 class="ct">編輯院線片</h1>
        <div class="a">
        <div class="inBox">影片資料</div>
        <div class="inBox2">
            <div>片名:
                <input type="text" name="name" value="<?=$row['name'];?>">
                <input type="hidden" name="id" value="<?=$row['id'];?>">
            </div>
            <div>分級:
                <select name="level">
<?php
for ($i=1; $i < 5; $i++) { 
    $chk=($i==$row['level'])?'selected':'';
    echo "<option value='".$i."' ".$chk.">".$level[$i]."</option>";
}
?>
                </select>
            </div>
            <div>片長:
                <input type="text" name="lenght" value="<?=$row['lenght'];?>">
            </div>
            <div>上映日期:
                <select name="year" >
                    <?php
                    $is_Select=explode("-",$row['ondate']);
                    for($i=0;$i<3;$i++){
                        $chk=($i==$is_Select['0'])?'selected':'';
                        echo "<option ".$chk.">";
                        echo date("Y")+$i;
                        echo "</option>";
                    }
                    ?>
                </select>年
                <select name="month" >
                <?php
                    for($i=1;$i<=12;$i++){
                        $chk=($i==$is_Select['1'])?'selected':'';
                        echo "<option ".$chk.">";
                        echo $i;
                        echo "</option>";
                    }
                    ?>
                </select>月
                <select name="day" >
                <?php
                    for($i=1;$i<=31;$i++){
                        $chk=($i==$is_Select['2'])?'selected':'';
                        echo "<option ".$chk.">";
                        echo $i;
                        echo "</option>";
                    }
                    ?>
                </select>日
            </div>
            <div>發行商:<input type="text" name="publish" value="<?=$row['publish'];?>"></div>
            <div>導演:<input type="text" name="trailer" value="<?=$row['trailer'];?>"></div>
            <div>預告影片:<input type="file" name="poster" value="<?=$row['poster'];?>"></div>
            <div>電影海報:<input type="file" name="intro" value="<?=$row['intro'];?>"></div>
        </div>
        </div>
        <div class="a">
        <div class="inBox">劇情簡介</div>
        <div class="inBox2">
            <div><textarea style="width: 500px;" name="director"  cols="30" rows="3"><?=$row['director'];?></textarea></div>
        </div>
        </div>
        <hr>
        <div class="ct">
            <input type="submit" value="修改">
            <input type="reset" value="重製">
        </div>
    </form>
</div>
</div>