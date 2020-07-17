<style>
    .table{
        margin: auto;
    }
</style>

<div style="margin:auto ;width: 80%;">
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
            <td colspan="2" class="ct"><input type="button" value="確定"><input type="reset" value="重置"></td>
        </tr>
    </table>
</form>
</div>
<script>
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
    let date=$('#date').val();
    $.get('./api/get_getSession.php',{id,date},(e)=>{
        $('#session').html(e);
    })
}
</script>