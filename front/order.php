<style>
    .table{
        margin: auto;
    }
</style>

<div class="order-form" style="margin:auto ;width: 80%;">
<form>
    <h3 class="ct" style="margin-top: 5px;">線上訂票</h3>
    <table class="table" border="1">

        <tr>
            <td width="10%">電影:</td>
            <td><select name="movie" id="movie">
            <?php
$db=new DB('movie');
$today=date("Y-m-d");
$ondate=date("Y-m-d",strtotime("-2 days"));
$rows=$db->all(['sh'=>1]," && `ondate` >= '$ondate' && `ondate` <= '$today' order by rank");
foreach($rows as $r){
    if(!empty($_GET['id'])){
        $isSelect=($_GET['id']==$r['id'])?'selected':'';
         echo "<option value='".$r['id']."' ".$isSelect.">".$r['name']."</option>";
     }else{
         echo "<option value='".$r['id']."'>".$r['name']."</option>";
     }
}
?>
            </select></td>
        </tr>
        <tr>
            <td>日期:</td>
            <td><select name="date" id="date">

            </select></td>
        </tr>
        <tr>
            <td>日期:</td>
            <td><select name="session" id="session">

            </select></td>
        </tr>

        <tr>
            <td colspan="2" class="ct"><input type="button" onclick="booking()" value="確定"><input type="reset" value="重置"></td>
        </tr>
    </table>
</form>
</div>
<style>
.room{
    width:320px;
    height:320px;
    display:flex;
    margin: auto;
    flex-wrap:wrap;
    background: url("./img/XX1-01.jpg") no-repeat center;  
}
.room>div{
    width:64px;
    height:80px;
    position:relative;
    /* background:green; */
}
.null{
   background: url("./img/03D02.png") no-repeat center;  
}
.booked{
   background: url("./img/03D03.png") no-repeat center;  
}
.checkbox{
    position: absolute;
    right: 0px;
    bottom: 5px;
}
</style>

<div class="booking-form ct" style="display:none;margin:auto ;width: 80%;">

<div class="room">

</div>
<div class="info-block"></div>
<div class="info" style="margin:auto;">
    <p>您選擇的電影是:<span id="movieinfo"></span></p>
    <p>您選擇的時刻是:<span id="dateinfo"></span></p>
    <p>您以勾選<span id="ticket"></span>張票，最多可以購買四張票</p>
</div>
<input type="button" onclick="booking()" value="上一步">
<input type="button" id="send" value="訂購">
</div>


<script>
let ticket=0;
$("#send").on("click",()=>{
    let movie=$('#movie').find("option:selected").val();
    let movieName=$('#movie').find("option:selected").html();
    let date=$('#date').val();
    let session=$('#session').find("option:selected").val();
    $.post("./api/order.php",{seat,movie,session,date,movieName},function (e) {
        location.replace(`index.php?do=resulit&&no=${e}`)
    })
})
function booking() {
    let movie=$('#movie').find("option:selected").html();
    let date=$('#date').val();
    let session=$('#session').find("option:selected").html();
    $('#movieinfo').html(`${movie}`);
    $('#dateinfo').html(`${date}  ${session}`);
    $.get("./api/get_room.php",(e)=>{
        $('.room').html(e);
    })
    $(".order-form").toggle(1000);
    $(".booking-form").toggle(1000);
    ticket=0;
}
let seat=new Array();
function chkTicket(e) {
    
    if(e.checked==true){
        ticket++;
        seat.push(e.value);
    }else{
        ticket--;
        seat.splice(seat.indexOf(e.value),1);
    } 
    if(ticket>4){
        e.checked = false;
        ticket=4;
        seat.splice(seat.indexOf(e.value),1);
        alert("一次最多只能訂四張票");
    }
    console.log(seat)
    $("#ticket").html(ticket);
}

getDuration()
$("#movie").on("change",function(){
    getDuration()
})
$("#date").on("change",function(){
    getSession()
})
function getDuration() {
    let id=$('#movie').val();
    $.get('./api/get_getDuration.php',{id},(e)=>{
        $('#date').html(e);
        getSession()
    })
}
function getSession() {
    let id=$('#movie').val();
    let movieName=$('#movie').html();
    let date=$('#date').val();

    $.get('./api/get_getSession.php',{id,date,movieName},(e)=>{
        $('#session').html(e);
    })
}
</script>