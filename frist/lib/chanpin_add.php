<?php
require("conn.php");
require("public_delpics.php");
require("public_upload.php");
class chanpin_add extends conn{
	
	function __construct(){
		parent::__construct();
		$this->antext='提交';
		if(isset($_POST["tijiao"]) and $_POST["tijiao"]=='提交'){
			$this->myadd();
		}
		if(isset($_POST["tijiao"]) and $_POST["tijiao"]=='修改'){
			$this->mymod();
		}
		if(isset($_GET["mod"]) and $_GET["mod"]!=''){
			$this->antext='修改';
			$this->myshow($_GET["mod"]);
		}

	}
	
	function myshow($id){
		$sql=mysql_query("select * from shop_cp where id=$id");
		$this->info=mysql_fetch_array($sql);
	}

	function mycpfl($cpfl){
		$sql=mysql_query("select * from shop_fl");
		$info=mysql_fetch_array($sql);
		if($info){
			do{
				$ys=($info["id"]==$cpfl)?"selected='selected'":"";
				echo "<option value='".$info["id"]."' $ys>".$info["flcn"].$info["flen"]."</option>";
				}while($info=mysql_fetch_array($sql));
		}
	}
	function mymod(){
		$id=$_POST["id"];
		$cpcn=parent::jctitle($_POST["cpcn"]);
		$cpen=parent::jctitle($_POST["cpen"]);
		$jiage=parent::jctitle($_POST["jiage"]);
		$cpfl=parent::jctitle($_POST["cpfl"]);
		$textcn=parent::jczhengwen($_POST["textcn"]);
		$texten=parent::jczhengwen($_POST["texten"]);
		if($cpcn=='' or $cpen=='' or $jiage=='' or $textcn=='' or $texten==''){
			echo "<script>alert('所有字段必须填写');window.location.href='chanpin_add.php?mod=$id'</script>";
			exit();
		}
		$picurl=$_FILES["picurl"]["type"];
		if($picurl!=''){
			$picurlsize=$_FILES["picurl"]["size"];
			$picurltmp=$_FILES["picurl"]["tmp_name"];
			$wimg='280';
			$himg='410';
			define("LOCALHOST","http://localhost/");
			public_delpics::mydelcppic($id);
			$picname=public_upload::ispicurla($picurl,$picurlsize,$picurltmp,$wimg,$himg);
			mysql_query("update shop_cp set cpcn='$cpcn',cpen='$cpen',jiage='$jiage',cpfl='$cpfl',cptouxiang='$picname',textcn='$textcn',texten='$texten' where id=$id");
		}else{
			mysql_query("update shop_cp set cpcn='$cpcn',cpen='$cpen',jiage='$jiage',cpfl='$cpfl',textcn='$textcn',texten='$texten' where id=$id");
		}
		echo "<script>alert('修改成功');window.location.href='chanpin_list.php'</script>";
	
	}
	function myadd(){
		$cpcn=parent::jctitle($_POST["cpcn"]);
		$cpen=parent::jctitle($_POST["cpen"]);
		$jiage=parent::jctitle($_POST["jiage"]);
		$cpfl=parent::jctitle($_POST["cpfl"]);
		$textcn=parent::jczhengwen($_POST["textcn"]);
		$texten=parent::jczhengwen($_POST["texten"]);
		if($cpcn=='' or $cpen=='' or $jiage=='' or $textcn=='' or $texten=='' or $_FILES["picurl"]["type"]==''){
			echo "<script>alert('所有字段必须填写');window.location.href='chanpin_add.php'</script>";
			exit();
		}
		//上传图片名字，图片文件量，图片缓存文件，要生成的宽度，要生成的高度
		$picurl=$_FILES["picurl"]["type"];
		$picurlsize=$_FILES["picurl"]["size"];
		$picurltmp=$_FILES["picurl"]["tmp_name"];
		$wimg='280';
		$himg='410';
		
		$picname=public_upload::ispicurla($picurl,$picurlsize,$picurltmp,$wimg,$himg);
		$times=date("Y-m-d H:i:s");
		mysql_query("insert into shop_cp (cpcn,cpen,jiage,cpfl,cptouxiang,textcn,texten,times) values ('$cpcn','$cpen','$jiage',$cpfl,'$picname','$textcn','$texten','$times')");
		echo "<script>alert('发布成功');window.location.href='chanpin_add.php'</script>";
	}
}
?>