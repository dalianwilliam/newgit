<?php
require("conn.php"); // require_once只引用一次
class reg extends conn{

	function __construct(){
		parent::__construct();
		if(isset($_POST["tijiao"]) and $_POST["tijiao"]=='REGISTER'){
			$this->myreg();
		}
	}

	function myreg(){
		$uname = parent::jctitle($_POST["uname"]);
		$password= parent::jcmima($_POST["password"]);
		$passwords= parent::jcmima($_POST["passwords"]);
		if($uname=='' or $password=='' or $passwords!=$password){
			echo "<script>window.location.href='reg.php'</script>";
		}
		$sql=mysql_query("select id from shop_huiyuan where shop_hyname='$uname'");
		$info=mysql_fetch_array($sql);
		if($info){
			echo "<script>alert('用户已经存在，请更换一个吧。');window.location.href='reg.php'</script>";
			exit();
		}
		$times=date("Y-m-d H:i:s");
		mysql_query("insert into shop_huiyuan (shop_hyname,mima,times) values ('$uname','$password','$times')");
		$_SESSION["shyname"]=$uname;
		echo "<script>alert('注册成功');window.location.href='index.php'</script>";
	}
}