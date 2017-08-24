<?php
session_start();
function __autoload($name){
	if(is_file("lib/".$name.".php")){
		require_once("lib/".$name.".php");
	}
}
?>