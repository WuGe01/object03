<?php
$po=new DB('pop');
$rows=$po->all(['sh'=>1]," order by `rank`");
?>
<style>
.btns{
  display:flex;
}
.icon>img{
  width:50px;
}
.icon{
  width:80px;
  flex-shrink:0;
  position: relative;
}
.control_btn{
  width:45px;
  font-size:45px;
  text-align: center;
  cursor: pointer;
}
.nav{
  overflow: hidden;
  width:320px;
  display:flex;
  text-align: center;
}
</style>
<!-- 預告區 -->
    <div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div class="pop"></div>
        <div class="btns">
          <div class="control_btn" onclick="shift(1)">&#9664;</div>
          <div class="nav">
          <?php
            foreach ($rows as $k => $r) {
             echo "<div class='icon'>";
             echo "<img src='./img/".$r['path']."'>";
             echo "</div>";
            }
          ?>
          </div>
          <div class="control_btn" onclick="shift(2)">&#9654;</div>
        </div>
      </div>
    </div>  
  <script>
    let move=0;
    let page=$('.icon').length;
    function shift(e) {
        switch (e) {
          case 1:
            if(move<((page-4))){
              move++
              $('.icon').animate({right:move*80})
            }
            break;
          case 2:
            if(move>0){
              move--
              $('.icon').animate({right:move*80})
            }
            break;
        }
    }
  </script>
    <!-- 院線片區 -->
    <div class="half">
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:95%;">
        <table>
          <tbody>
            <tr> </tr>
          </tbody>
        </table>
        <div class="ct"> </div>
      </div>
    </div>

