<?php
include('autoload.php');
$duix=new conn();
$duix->quanxian(); //权限判断
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$wysiwyg = $_GET['wysiwyg'];
$id=$_GET["id"];
$sql=mysql_query("select * from sj_config_pics where id=$id");
$info=mysql_fetch_array($sql);
if($info){
	$pic=$info["pics"];
	unlink('../../../pics/'.$pic);
	}else{
	exit("<script>alert('删除失败');window.location.href='select_image.php?=wysiwyg=$wysiwyg'</script>");
	}
$sql=mysql_query("delete from sj_config_pics where id=$id");
if($sql){
		echo "<script>window.location.href='select_image.php?wysiwyg=$wysiwyg'</script>";
		}else{
		echo "<script>alert('删除失败');window.location.href='select_image.php?=wysiwyg=$wysiwyg'</script>";
		}
	
	unset($duix);
?>