<?php 
require("autoload.php");
$obj= new chanpin_list();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include("dh.php");?>

<div class="right_zw">
   <div class="bte pda">产品管理 </div>
  <fieldset><legend class="bte">管理产品</legend>
  	<div class="pda list">
    	<table width="100%" border="0" cellspacing="1" cellpadding="0">
          <tr>
            <th width="5%" nowrap="nowrap">ID</th>
            <th width="41%" nowrap="nowrap">产品名字</th>
            <th width="12%" nowrap="nowrap">产品价格</th>
            <th width="18%" nowrap="nowrap">产品分类</th>
            <th width="15%" nowrap="nowrap">标题图片</th>
            <th width="9%" nowrap="nowrap">管理</th>
          </tr>
          <?php
          $obj->mylist();
		  ?>
        </table>
		<div class="pda"><?php $obj->myfanye();?></div>
    </div>
  </fieldset>
</div>
</body>
</html>
