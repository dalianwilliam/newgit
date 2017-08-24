<?php
require_once("conn.php");
class fenlei_add extends conn{

	function __construct(){
		parent::__construct();
		parent::quanxian();
		$this->text='添加';
		if(isset($_POST["tijiao"]) and $_POST["tijiao"]=='添加'){
			$this->myadd();
		}
		if(isset($_POST["tijiao"]) and $_POST["tijiao"]=='修改'){
			$this->mymod();
		}
		if(isset($_GET["del"]) and $_GET["del"]!=''){
			$this->mydel($_GET["del"]);
		}
		if(isset($_GET["mod"]) and  $_GET["mod"]!=''){
			$this->text='修改';
			$this->myshow($_GET["mod"]);
		}
	}
	function mymod(){
		$id=parent::jcnumeric($_POST["id"]);
		$flcn=parent::jccode($_POST["flcn"]);
		$flen=parent::jccode($_POST["flen"]);
		if($flcn=='' or $flen==''){
			echo "<script>alert('所有字段都必须填写');window.location.href='fenlei_add.php'</script>";
			exit();
		}
		mysql_query("update shop_fl set flcn='$flcn',flen='$flen' where id=$id");
		echo "<script>alert('修改完成');window.location.href='fenlei_add.php'</script>";
	}
	function myshow($id){
		$id=parent::jcnumeric($id);
		$sql=mysql_query("select * from shop_fl where id=$id");
		$this->info=mysql_fetch_array($sql);

	}
	function mydel($del){
		$id=parent::jcnumeric($del);
		mysql_query("delete from shop_fl where id=$id");
		echo "<script>window.location.href='fenlei_add.php'</script>";
	}
	function myadd(){
		$flcn=parent::jccode($_POST["flcn"]);
		$flen=parent::jccode($_POST["flen"]);
		if($flcn=='' or $flen==''){
			echo "<script>alert('所有字段都必须填写');window.location.href='fenlei_add.php'</script>";
			exit();
		}
		$sql=mysql_query("select * from shop_fl where flcn='$flcn' or flen='$flen'");
		$info=mysql_fetch_array($sql);
		if(!$info){
			mysql_query("insert into shop_fl (flcn,flen) values ('$flcn','$flen')");
			echo "<script>window.location.href='fenlei_add.php'</script>";
		}else{
			echo "<script>alert('中文分类或英文分类有重复的');window.location.href='fenlei_add.php'</script>";
		}
	}

	function mylist(){
		$sql=mysql_query("select * from shop_fl");
		$info=mysql_fetch_array($sql);
		if($info){
			do{
				echo "<tr><td>".$info["id"]."</td>";
			    echo "<td>".$info["flcn"]."</td>";
			    echo "<td>".$info["flen"]."</td>";
			    echo "<td nowrap='nowrap'><a href='fenlei_add.php?mod=".$info["id"]."'>修改</a> <a href='fenlei_add.php?del=".$info["id"]."'>删除</a></td></tr>";
			    
			}while($info=mysql_fetch_array($sql));
		}
	}

}
?>