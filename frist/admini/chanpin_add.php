<?php 
require("autoload.php");
$obj= new chanpin_add();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="openedit/scripts/wysiwyg.js"></script>		
<script type="text/javascript">
WYSIWYG.attach('textcn'); // default setup
WYSIWYG.attach('texten'); // default setup
</script>


</head>

<body>

<?php include("dh.php");?>

<div class="right_zw">
  <div class="bte pda">产品管理</div>
    
    <fieldset><legend class="bte">添加产品</legend>
   <form action="chanpin_add.php" method="post" enctype="multipart/form-data">
    <div class='pda fl'>
    	产品中文名字
    	  <input name="id" type="hidden" id="id" value="<?php echo $obj->info["id"]?>" />
   	    <br />
   	  <input name="cpcn" type="text" class="bda" id="cpcn" style="width:400px;" value="<?php echo $obj->info["cpcn"];?>" />
   </div>
   <div class='pda fl'>
    	产品英文文名字<br />
    	<input name="cpen" type="text" class="bda" id="cpen" style="width:400px;" value="<?php echo $obj->info["cpen"];?>"/>
   </div>
  
   <div class="ld"></div>
   <div class='pda fl'>
    	产品价格<br />
    	<input name="jiage" type="text" class="bda" id="jiage" style="width:400px;" value="<?php echo $obj->info["jiage"];?>" />
   </div>
   <div class='pda fl'>
    	产品分类<br />
    	<select name="cpfl" class="bda" id="cpfl">
    	  <?php $obj->mycpfl($obj->info["cpfl"]);?>
    	</select>
   </div>
   <div class="ld"></div>
   <div class='pda'>
    	产品标题图片<br />
    	<input name="picurl" type="file" class="bda" id="picurl" />
        <?php if($obj->info["cptouxiang"]!=''){ ?>
        <img src="../pics/<?php echo $obj->info["cptouxiang"];?>" width="auto" height="100"><div class="dla">添加新的图片后原来的图片将被替换掉，不操作将不被替换。</div>
        <?php } ?>
   </div>
   <div class='pda fl zw'>
    	产品中文正文<br />
    	<textarea name="textcn" rows="20" class="zhengwencn" id="textcn" ><?php echo $obj->info["textcn"];?></textarea>
   </div>
   <div class='pda fl zw'>
    	产品英文正文<br />
    	<textarea name="texten" rows="20" class="zhengwenen" id="texten" ><?php echo $obj->info["texten"];?></textarea>
   </div>
   <div class="ld"></div>
   <div class='pda'>
   <input name="tijiao" type="submit" class="ana" id="tijiao" value="<?php echo $obj->antext;?>" />
   </div>
   </form>
    </fieldset>


</div>

</body>
</html>
