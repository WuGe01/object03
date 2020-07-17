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
        margin-bottom: 3px;
    }
</style>
<div class="aa" >
    <div class="aa" >
    <h1 class="ct">新增院線片</h1>
    <div class="a">
    <div class="inBox">影片資料</div>
    <div class="inBox2">
        <div>片名:
            <input type="text" name="name">
        </div>
        <div>分級:
            <select name="level">
                <option value="1">普遍級</option>
                <option value="2">輔導級</option>
                <option value="3">保護級</option>
                <option value="4">限制級</option>
            </select>
        </div>
        <div>片長:
            <input type="text" name="lenght">
        </div>
        <div>上映日期:
            <select name="year" >
                <?php
                for($i=0;$i<3;$i++){
                    echo "<option>";
                    echo date("Y")+$i;
                    echo "</option>";
                }
                ?>
            
            </select>年
            <select name="month" >
            <?php
                for($i=1;$i<=12;$i++){
                    echo "<option>";
                    echo $i;
                    echo "</option>";
                }
                ?>
            </select>月
            <select name="day" >
            <?php
                for($i=1;$i<=31;$i++){
                    echo "<option>";
                    echo $i;
                    echo "</option>";
                }
                ?>
            </select>日
        </div>
        <div>發行商:<input type="text" name="publish"></div>
        <div>導演:<input type="text" name="trailer"></div>
        <div>預告影片:<input type="file" name="poster"></div>
        <div>電影海報:<input type="file" name="intro"></div>
    </div>
    </div>
    <div class="a">
    <div class="inBox">劇情簡介</div>
    <div class="inBox2">
        <div>大空格</div>
    </div>
    </div>
    <hr>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重製">
    </div>
</div>
</div>