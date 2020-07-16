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
.pop{
  border: 1px solid;
  width: 200px;
  height: 250px;
  margin: 20px auto;
  position: relative;
}
.po{
  position: absolute;
  margin: 0;
  padding: 0;
  display: none;
}
.po img{
  width: 100%;

}
.po div{
  text-align: center;
  background-color: white;
  color: #000;
}
</style>
<!-- 預告區 -->
    <div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div class="pop">
          <?php
            foreach ($rows as $k => $r) {
             echo "<div class='po'>";
             echo "<img src='./img/".$r['path']."'>";
             echo "<div>".$r['name']."</div>";
             echo "<input type='hidden' name='ani' value='".$r['ani']."'>";
             echo "</div>";
            }
          ?>
        </div>
       
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
$(".po").eq(0).show()
let move=0;
let page=$('.icon').length;

let auto=setInterval(()=>{
  slider()
},3000)
$(".nav").hover(
  function () {
    clearInterval(auto)
  },
  function () {
    auto=setInterval(()=>{slider()},3000)
  }
)
$(".icon").on('click',function () {
  let num=$('.icon').index($(this))
  $(".po").hide()
  $(".po").eq(num).show() 
  // let ani=$(".po").eq(num).children('input').val();
  // switch (ani) {
  //   case "1":
  //     $(num).fadeIn(1000)
  //     break;
  //   case "2":
  //     $(num).show(1000)
  //     break;
  //   case "3":
  //     $(num).slideDown(1000)
  //     break;
  // }
})
function slider() {
  let dom=$(".po:visible");
  let ani=$(dom).children('input').val();
  let next=$(dom).next();
  if(next.length=="0")next=$(".po").eq(0);
  switch (ani) {
    case "1":
      $(dom).fadeOut(2000)
      $(next).fadeIn(2000)
      break;
    case "2":
      $(dom).hide(1000,()=>{
        $(next).show(1000)
      })
      break;
    case "3":
      $(dom).slideUp(1000,()=>{
        $(next).slideDown(1000)
      })
      break;
  }
}
function shift(e) {
    switch (e) {
      case 2:
        if(move<(page-4)){
          move++
          $('.icon').animate({right:move*80},500)
        }
        break;
      case 1:
        if(move>0){
          move--
          $('.icon').animate({right:move*80},500)
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

