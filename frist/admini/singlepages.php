<?php 
require("autoload.php");
$obj= new singlepages();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="openedit/scripts/wysiwyg.js"></script>		
<script type="text/javascript">
WYSIWYG.attach('danyezw'); // default setup
</script>
</head>

<body>
<?php include("dh.php");?>
<div class="right_zw">
   <div class="bte pda">单页管理 </div>
   <fieldset><legend class="bte"><?php echo $obj->singletext;?></legend>
   	<form action="singlepages.php" method="post">
    <div class="pda">
    <textarea name="danyezw" rows="20" class="zhengwencn" id="danyezw" ><?php echo $obj->newstext;?></textarea>
    <input name="id" type="hidden" id="id" value="<?php echo $obj->sinid;?>" />
   	</div>
    <div class="pda">
    <input name="tijiao" type="submit" class="ana" id="tijiao" value="<?php echo $obj->antxt;?>" />
    </div>
    </form>
   </fieldset>
</div>
</body>
</html>
