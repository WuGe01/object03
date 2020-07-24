<?php
$no=['no'=>$_GET['no']];
$db=new DB('ord');
$row=$db->find($no);
$seat=json_decode($row['seat']);
?>
<div>
<table>
<tr></tr>
    <td colspan="2">歡迎您的訂購，您的訂單編號是:<?=$row['no'];?></td>
    
</tr>
<tr>
    <td>電影名稱:</td>
    <td><?=$row['movie'];?></td>
</tr>
<tr>
    <td>日期:</td>
    <td><?=$row['date'];?></td>
</tr>
<tr>
    <td>場次時間:</td>
    <td><?=$row['session'];?></td>
</tr>
<tr>
    <td colspan="2">
        座位：<br>
<?php
foreach ($seat as $s) {
    echo floor($s/5)+1;
    echo "排";
    echo $s%5+1;
    echo "號<br>";
}


?>
    </td>
    
</tr>
<tr>
    <td colspan="2"><input type="button" value="確認" onclick="location.replace(`index.php`)"></td>
    
</tr>



</table>

</div>