<?php
require("conn_config.php"); // require_once只引用一次
class conn{
	
	function __construct(){ //构造函数 类实例化就被执行
	    //error_reporting(0); //不报错
	    //ini_set("display_errors", "on"); // 开启报错
		error_reporting(E_ALL | E_STRICT);
		date_default_timezone_set('Asia/Shanghai'); //设置时区
		$this->conn=mysql_connect(DB_LOCALHOST,DB_YONGHU,DB_MIMA) or die("数据库链接失败");  //链接数据库参数
		mysql_select_db(DB_SHUJUKU,$this->conn) or die("数据库选择错误");                //指定数据库的名字
		mysql_query("set names utf8");     //指定数据编码

		
	}
	
	//管理员权限判断
	function quanxian(){
		/*if(!isset($_SESSION["glname"]) and $_SESSION["glname"]==""){
			session_destroy();
			exit("<script>window.location.href='login.php'</script>");	
		}*/
	}
	//管理员退出
	function gltuichu(){
		unset($_SESSION["glname"]);
		session_destroy();
		header('Location:../index.php');
	}

	
	//判断会员权限
	function hyquanxian(){
		if(!isset($_SESSION["shyname"]) and $_SESSION["shyname"]==""){
			session_destroy();
			header('Location:'.WEB_HOME.'login/login.php');
		}
	}
	//会员退出
	function hytuichu(){
		unset($_SESSION["shyname"]);
		session_destroy();
		header('Location:'.WEB_HOME);
	}

	//标题检测中文
	function jctitle($id){
		$id=trim(strip_tags($id));
		//去除HTML PHP等标记 变成文本格式
		$id=addslashes($id);
		//在'前加“\” 防止英文 录入失败
		$id=trim(str_replace('<','&lt; ',$id));
		return $id;
	}

	//密码
	function jcmima($id){
		$id=htmlspecialchars($id);
		$id=addslashes($id);
		$id=trim(str_replace(' ','',$id));
		return $id;
	}
	//正文检测
	function jczhengwen($id){
	    $id=trim(strip_tags($id,"<pre> <br> <p> <b> <img> <div> <table><tr><td> <table><tbody><tr><td> <table><tr><td><th> <i>"));
	    //$id=htmlspecialchars($id); // 将一些预定义的符号转化成HTML 防止正文出现黑客代码 
	    $id=addslashes($id);
	     //在'前加“\” 防止英文 录入失败 //出现单引号无法加入的情况使用此函数
	    return $id;
	} 

	//数字类型检测
	function jcnumeric($id){
	   if($id!=''){
	   	   $this->id=trim($id);
		   if(!is_numeric($this->id)){
		     echo "<script>window.location.href='".LOCALHOST."404.html'</script>";
		   }else{
		     return $this->id;
		   }
	   }
	} 

	
	//分页函数2（数据库，每页显示数）
	function mylistb($sjk,$meiye){
		if(isset($_GET["page"]) and $_GET["page"]!=''){
			$this->page=$_GET["page"];
		}else{
			$this->page=1;
		}

		$info=mysql_fetch_array(mysql_query("select count(id) as shu from $sjk"));
		$zshu = $info["shu"]; //总条数
		$plshu=$meiye; //每页显示20条
		$this->zpages=ceil($zshu/$plshu); //一共可以分多少页

		if($this->page>$this->zpages){	$this->page=$this->zpages;	}
		if($this->page<1){	$this->page=1;	}

		$ks=($this->page-1)*$plshu; //开始位置 = （当前页-1）* 每页显示数
		$this->sql=mysql_query("select * from $sjk limit $ks,$plshu");
		return $this->sql;
	}
	
	//分页函数（数据库，每页显示数，排序字段）
	function mylist($sjk,$meiye,$paixu){
		if(isset($_GET["page"]) and $_GET["page"]!=''){
			$this->page=$_GET["page"];
		}else{
			$this->page=1;
		}

		$info=mysql_fetch_array(mysql_query("select count(id) as shu from $sjk"));
		$zshu = $info["shu"]; //总条数
		$plshu=$meiye; //每页显示20条
		$this->zpages=ceil($zshu/$plshu); //一共可以分多少页

		if($this->page>$this->zpages){	$this->page=$this->zpages;	}
		if($this->page<1){	$this->page=1;	}

		$ks=($this->page-1)*$plshu; //开始位置 = （当前页-1）* 每页显示数
		$this->sql=mysql_query("select * from $sjk order by $paixu desc limit $ks,$plshu");
		return $this->sql;
	}
	//通用翻页
	function myfanye(){
		echo "<a href='".$_SERVER['PHP_SELF']."?page=".($this->page-1)."'>上一页</a> ";
		echo "<a href='".$_SERVER['PHP_SELF']."?page=".($this->page+1)."'>下一页</a> ";
		echo "当前在第".$this->page."页 / 共有".$this->zpages."页";
	}
	//新闻分类翻页
	function myfanyeb($url){
		echo "<a href='".$_SERVER['PHP_SELF']."?page=".($this->page-1).$url."'>上一页</a> ";
		echo "<a href='".$_SERVER['PHP_SELF']."?page=".($this->page+1).$url."'>下一页</a> ";
		echo "当前在第".$this->page."页 / 共有".$this->zpages."页";
	}


	//新建文件夹函数
	function mymkdir($url){

		$this->wjj=date("Ym")."/";
		$purl=$url.$this->wjj;
		if(!is_file($purl)){
			mkdir($purl);
			return $this->wjj;
		}
	}




	function myips($pindao){
		$ips=$_SERVER['REMOTE_ADDR']; //当前用户的IP地址
		$zhuji=$_SERVER['REMOTE_HOST'];//浏览当前页面的用户的主机名
		$url=$_SERVER['HTTP_REFERER'];
		$peid=$_SESSION["peid"];
		$times=date("Y-m-d H:i:s");
		mysql_query("insert into sj_ips (ips,zhuji,pindao,url,peid,times) values ('$ips','$zhuji','$pindao','$url','$peid','$times')");
	}


}

?>
