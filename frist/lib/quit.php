<?php
require("conn.php"); 
class quit extends conn{

	function __construct(){
		parent::__construct();
		if(isset($_GET["aq"]) and $_GET["aq"]=='tc'){
			parent::hytuichu();
		}
	}
}
?>