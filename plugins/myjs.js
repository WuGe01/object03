function del(table,id) {
    $.post("./api/del.php",{"table":table,id},()=>{
        location.reload();
    })
}
$(".movieUPdo").on("click",function(){
    let id=$(this).data("rank").split('-')
    let table="movie";
    $.post("./api/rank.php",{id,table},function(){
        location.reload();
    })
}) 
$(".popUPdo").on("click",function(){
    let id=$(this).data("rank").split('-')
    console.log('id');
    let table="pop";
    $.post("./api/rank.php",{id,table},function(){
        location.reload();
    })
})
function show(t,id) {
    $.post("./api/show.php",{"table":t,id},()=>{
        location.reload()
    })
}