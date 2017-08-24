<?php
//大连欧维科技有限公司 版权所有 oaos.cn
session_start();
function __autoload($classname){
	require_once("../../../lib/".$classname.".php");
}
?>