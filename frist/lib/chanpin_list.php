<?php
require("conn.php");
require("public_delpics.php");

class chanpin_list extends conn{
	
	function __construct(){
		parent::__construct();
		if(isset($_GET["del"]) and $_GET["del"]!=''){
			$this->mydel($_GET["del"]);
		}
	}
	function mydel($id){
		public_delpics::mydelcppic($id);
		mysql_query("delete from shop_cp where id=$id");
		echo "<script>alert('删除成功');window.location.href='chanpin_list.php'</script>";
	}
	function mylist(){
		$sjk="shop_cp";
		$meiye="20";
		$paixu="times";
		$sql=parent::mylist($sjk,$meiye,$paixu);
		$info=mysql_fetch_array($sql);
		if($info){
			do{
			echo "<tr><td>".$info["id"]."</td>";
            echo "<td>".$info["cpcn"]."<br/>".$info["cpen"]."</td>";
            echo "<td>".$info["jiage"]."</td><td>";
       
            $this->myflname($info["cpfl"]);
           
            echo "</td><td><img src='../pics/".$info["cptouxiang"]."' width='auto' height='100'></td>";
            echo "<td nowrap='nowrap'><a href='chanpin_add.php?mod=".$info["id"]."'>修改</a> <a href='chanpin_list.php?del=".$info["id"]."'>删除</a></td> </tr>";
			}while($info=mysql_fetch_array($sql));
		}
	}

	function myflname($id){
		$sql=mysql_query("select * from shop_fl where id=$id");
		$info=mysql_fetch_array($sql);
		if($info){
			echo $info["flcn"]."<br/>".$info["flen"];
		}
	}
}
?>