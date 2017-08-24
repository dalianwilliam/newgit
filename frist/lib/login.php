<?php
require("conn.php"); // require_once只引用一次
class login extends conn{

	function __construct(){
		parent::__construct();
		if(isset($_POST["tijiao"]) and $_POST["tijiao"]=='LOGIN'){
			$this->mylogin();
		}
	}

	function mylogin(){
		$uname = parent::jctitle($_POST["uname"]);
		$password= parent::jcmima($_POST["password"]);

		if($uname=='' or $password==''){
			echo "<script>alert('所有字段必须填写');window.location.href='login.php'</script>";
		}
		$sql=mysql_query("select id from shop_huiyuan where shop_hyname='$uname' and mima='$password'");
		$info=mysql_fetch_array($sql);
		if($info){
			$_SESSION["shyname"]=$uname;
			echo "<script>alert('登录成功');window.location.href='index.php'</script>";
		}
		
		
	}
}