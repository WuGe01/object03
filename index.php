<?php
include "./plugins/base.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0055)?do=admin -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>影城</title>
<link rel="stylesheet" href="./plugins/css.css">
<script src="./plugins/jquery-1.9.1.min.js"></script>
<script src="./plugins/myjs.js"></script>
</head>
<body>
<div id="main">
  <div id="top" style=" background:#999 center; background-size:cover; " title="替代文字">
    <h1>ABC影城</h1>
  </div>
  <div id="top2"> 
    <a href="?do=main">首頁</a> 
    <a href="?do=order">線上訂票</a> 
    <a href="#">會員系統</a> 
    <a href="admin.php">管理系統</a> </div>
  <div id="text"> 
    <span class="ct">最新活動</span>
    <marquee direction="right">
    ABC影城票價全面八折優惠1個月
    </marquee>
  </div>
<div id="mm">
<?php
$do=(!empty($_GET['do']))?$_GET['do']:"main";
$file="./front/".$do.".php";
if(file_exists($file)){
  include $file;
}else{
  include "./front/main.php";
}

?>

  </div>
  <div id="bo"> ©Copyright 2010~2020 ABC影城 版權所有 </div>
</div>
</body>
</html>