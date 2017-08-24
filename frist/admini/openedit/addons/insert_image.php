<?php
include('autoload.php');
$duix=new conn();
$duix->quanxian(); //权限判断


$wysiwyg = $_GET['wysiwyg']; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style>
.wai{ padding:10px;}
</style>
</head>

<body>
<div class="wai">
	<div>
		<a href="insert_image.php?wysiwyg=<?php echo $wysiwyg;?>" class="dhb">上传</a> 
		<a href="select_image.php?wysiwyg=<?php echo $wysiwyg;?>" class="dhb">查看</a>
	</div>
	<div>
		<form action="in_post.php?wysiwyg=<?php echo $wysiwyg;?>" method="post" enctype="multipart/form-data">
		  <input type="file" name="picurl" id="picurl" />
		  <input type="submit" name="button" id="button" value="提交" />
		</form>
	</div>
</div>

</body>
</html>
