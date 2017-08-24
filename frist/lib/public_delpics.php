<?php
class public_delpics{

	function mydelcppic($id){
		$sql=mysql_query("select cptouxiang from shop_cp where id=$id");
		$info=mysql_fetch_array($sql);
		if($info["cptouxiang"]){
			unlink("../pics/".$info["cptouxiang"]);
		}
	}
}
?>