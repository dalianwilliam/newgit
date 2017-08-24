<?php 
include('autoload.php');
$duix=new conn();
$duix->quanxian(); //权限判断
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$wysiwyg = $_GET['wysiwyg']; 
$pic=$_FILES["picurl"]["type"];
$times=date("Y-m-d H:i:s");
echo $pic;
if($pic == "image/pjpeg" or $pic == "image/jpg" or $pic == "image/jpeg"){
	$picurln=date("yzhis").".jpg";

	}elseif($pic == "image/x-png" or $pic == "image/png"){
	$picurln=date("yzhis").".png";

	}elseif($pic == "image/gif"){
	$picurln=date("yzhis").".gif";

	}else{
	$picurln="";	
	exit("<script>alert('文件格式错误');window.location.href='insert_image.php'</script>"); //停止执行下面程序
	}
	
	
	$wjj=date("Ym");
		if(!file_exists("../../../pics/$wjj")){
			mkdir("../../../pics/$wjj");
		}
	
	$dnamea=$wjj."/".$picurln; //文件名字
	move_uploaded_file($_FILES["picurl"]["tmp_name"],"../../../pics/".$dnamea); //上传大图片
	
	$times=date("Y-m-d H:i:s");
	$sql=mysql_query("insert into sj_config_pics (pics,times) values ('$dnamea','$times')");
	if($sql){
		echo "<script>alert('添加成功');window.location.href='insert_image.php?wysiwyg=$wysiwyg'</script>";
		}else{
		echo "<script>alert('添加失败');window.location.href='insert_image.php?=wysiwyg=$wysiwyg'</script>";
		}
unset($duix);
?>