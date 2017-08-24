<?php
require("conn.php"); 
class danye extends conn{

	function __construct(){
		parent::__construct();
	}

	function mydyflname($id){
		$id=parent::jcnumeric($id);
		$sql=mysql_query("select * from shop_dyfl where id=$id");
		$info=mysql_fetch_array($sql);
		if($info){
			echo $info["flen"];
		}
		
	}

	function mydanyeshow($id){
		$id=parent::jcnumeric($id);
		$sql=mysql_query("select * from shop_news where sinid=$id");
		$info=mysql_fetch_array($sql);
		if($info){
			echo $info["newstext"];
		}
	}
}
?>