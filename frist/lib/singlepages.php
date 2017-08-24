<?php
require("conn.php");
class singlepages extends conn{	

	function __construct(){
		parent::__construct();
		$this->antxt="提交";
		if(isset($_GET["single"]) and $_GET["single"]!=''){
			$this->mysingleid($_GET["single"]);
		}
		if(isset($_POST["tijiao"]) and $_POST["tijiao"]=='提交'){
			$this->myadd($_GET["single"]);
		}
		if(isset($_POST["tijiao"]) and $_POST["tijiao"]=='修改'){
			$this->mymod($_GET["single"]);
		}

	}
	function mymod(){
		$id=parent::jcnumeric($_POST["id"]);
		$danyezw=parent::jczhengwen($_POST["danyezw"]);
		$times=date("Y-m-d H:i:s");
		mysql_query("update shop_news set newstext='$danyezw',times='$times' where sinid=$id");
		echo "<script>alert('修改完成');window.location.href='singlepages.php?single=".$id."'</script>";
	}
	function myadd(){
		$id=parent::jcnumeric($_POST["id"]);
		$danyezw=parent::jczhengwen($_POST["danyezw"]);
		$times=date("Y-m-d H:i:s");
		mysql_query("insert into shop_news (sinid,newstext,times) values ($id,'$danyezw','$times')");
		echo "<script>alert('添加完成');window.location.href='singlepages.php?single=".$id."'</script>";
	}
	function mysingleid($id){
		$sql=mysql_query("select * from shop_dyfl where id=$id");
		$info=mysql_fetch_array($sql);
		$this->singletext=$info["flcn"]." ".$info["flen"];
		$this->sinid=$id;
		$this->mynews($id);
	}

	function mynews($id){
		$sql=mysql_query("select * from shop_news where sinid=$id");
		$info=mysql_fetch_array($sql);
		if($info){
			$this->antxt="修改";
			$this->newstext=$info["newstext"];
		}
	}

}
?>