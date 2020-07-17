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

    </div>
</div>
<script>
    reloadlist()
</script>
