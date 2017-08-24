<?php
class public_huiyuan{

	function myhuiyuan(){
		if(isset($_SESSION["shyname"]) and $_SESSION["shyname"]!=""){
			echo "<div class='dh'>".$_SESSION["shyname"]." <a href='quit.php?aq=tc'>退出</a></div>"; 
		}else{
			echo "<div class='dh'><a href='login.php'>LOGIN</a>  <a href='reg.php'>REGISTER</a></div>";
		}
	}

	function mycpdh(){

		$sql=mysql_query("select * from shop_fl  order by times desc");
		$info=mysql_fetch_array($sql);
		if($info){
			do{
				echo "<div class='dh'><a href='chanpin.php?cp=".$info["id"]."'>".$info["flen"]."</a></div>";
			}while($info=mysql_fetch_array($sql));
		}
	}

	function mywebdh(){
		$sql=mysql_query("select * from shop_dyfl  order by times desc");
		$info=mysql_fetch_array($sql);
		if($info){
			do{
				echo "<div class='dh'><i class='".$info["flstyle"]."'></i><a href='danye.php?i=".$info["id"]."'>".$info["flen"]."</a></div>";
			}while($info=mysql_fetch_array($sql));
		}
	}
}
?>