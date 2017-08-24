<?php
class public_admini_dh{

	function mydydhcn(){
		$sql=mysql_query("select id,flcn from shop_dyfl order by times desc");
		$info=mysql_fetch_array($sql);
		if($info){
			do{
				echo "<div class='pdb'><a href='singlepages.php?single=".$info["id"]."'>".$info["flcn"]."</a></div>";
			}while($info=mysql_fetch_array($sql));
		}
	}
}
?>