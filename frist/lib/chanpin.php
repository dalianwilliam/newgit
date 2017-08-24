<?php
require("conn.php"); 
class chanpin extends conn{

	function __construct(){
		parent::__construct();

	}

	function mycpname($id){
		$id=parent::jcnumeric($id);
		$sql=mysql_query("select * from shop_fl where id=$id");
		$info=mysql_fetch_array($sql);
		if($info){
			echo $info["flen"];
		}
		
	}
	function mycpshow($id){
		$id=parent::jcnumeric($id);

		$sjk="shop_cp where cpfl=$id";
		$meiye='20';
		$paixu='times';
		$sql=parent::mylist($sjk,$meiye,$paixu);
		
		$info=mysql_fetch_array($sql);
		if($info){
			do{
				echo "<a href='###'><li><div class='pica'><img src='pics/".$info["cptouxiang"]."' width='280' height='410' /></div>";
        		echo "<div class='cpbta'>".$info["cpen"]." No.".$info["id"];
        		echo "<div class='price'>￥".$info["jiage"]."</div> </div></li></a>";
			}while($info=mysql_fetch_array($sql));
		}
	}

}