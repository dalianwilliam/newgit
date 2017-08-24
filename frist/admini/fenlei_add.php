<?php
require("autoload.php");
$obj=new fenlei_add();
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
  <div class="bte pda">产品分类管理 </div>
    
    <fieldset><legend class="bte">添加分类</legend>
    <form action="fenlei_add.php" method="post">
    <div class='pda fl'>
    	中文名字
    	  <input name="id" type="hidden" id="id" value="<?php echo $obj->info["id"]?>" />
   	    <br />
    	<input name="flcn" type="text" class="bda" id="flcn"  value="<?php echo $obj->info["flcn"]?>"/>
   </div>
   <div class='pda fl'>
    	英文文名字<br />
    	<input name="flen" type="text" class="bda" id="flen" value="<?php echo $obj->info["flen"]?>" /> <input name="tijiao" type="submit" class="ana" id="tijiao" value="<?php echo $obj->text;?>" />
   </div>
  </form>
   <div class="ld"></div>
    </fieldset>
    
    
    <fieldset><legend class="bte">分类管理</legend>
    <div class="list">
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
  <tr>
    <th nowrap="nowrap">ID</th>
    <th nowrap="nowrap">中文名</th>
    <th nowrap="nowrap">英文名</th>
    <th nowrap="nowrap" width="1%">管理</th>
  </tr>
<?php $obj->mylist();?>
    </table>
</div>
    </fieldset>
</div>

</body>
</html>
