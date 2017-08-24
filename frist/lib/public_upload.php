<?php
class public_upload{

	/*
	**上传图片函数********* 
	*大众类型图片上传。
	*不修改图片尺寸，限制图片不超过1M
	函数(文件类型，文件量，临时数据流文件)
	*/
	function ispicurl($picurl,$picurlsize,$picurltmp){
		if($picurl=="image/jpeg" or $picurl=="image/jpg" or $picurl == "image/pjpeg"){
			$this->picname=date("yzHis")."_".mt_rand(10,99).".jpg";
		}
		if($picurl=="image/gif"){
			$this->picname=date("yzHis")."_".mt_rand(10,99).".gif";
		}
		if($picurl=="image/png"){
			$this->picname=date("yzHis")."_".mt_rand(10,99).".png";
		}
		if($picurl=="application/pdf"){
			$this->picname=date("yzHis")."_".mt_rand(10,99).".pdf";
		}

		//判断图片文件量
		if($picurlsize){
			$psize=ceil($picurlsize/1024);
			if($psize>1500){
				exit("<script>alert('图片尺寸不要超过1M。');window.location.href='".WEB_HOME."'</script>");
			}
		}

		//创建文件夹
		$wjj=date("Ym")."/";
		$purl="../pics/".$wjj;
		if(!is_file($purl)){
			mkdir($purl);
		}

		$sql=move_uploaded_file($picurltmp,$purl.$this->picname);
		$this->picurl=$wjj.$this->picname;
		if($sql){
			return $this->picurl;
		}else{
			exit("<script>alert('图片上传失败，可能是文件夹没有权限');window.location.href='".WEB_HOME."'</script>");
		}
		
	}



	/*
	*带缩略图功能
	* 上传图片类型，图片文件量，图片缓存文件，要生成的宽度，要生成的高度
	*/
	function ispicurla($picurl,$picurlsize,$picurltmp,$wimg,$himg){

		//判断添加的图片格式是否正确
			if($picurl == "image/pjpeg" or $picurl == "image/jpg" or $picurl == "image/jpeg"){
				$picurl=imagecreatefromjpeg($picurltmp);
				$picurln=date("yzhis").".jpg";
			}elseif($picurl == "image/x-png" or $picurl == "image/png"){
				$picurl=imagecreatefrompng($picurltmp);
				$picurln=date("yzhis").".png";
			}elseif($picurl == "image/gif"){
				$picurl=imagecreatefromgif($picurltmp);
				$picurln=date("yzhis").".gif";
			}else{
				$picurln="无";
				exit("<script>alert('目前只能添加jpg,png,gif三种格式的图片');window.location.href='".WEB_HOME."sys/404.html'</script>"); //停止执行下面程序*/
			}

		//如果当月的文件夹不存在就新建一个
		$wjj=date("Ym");
		if(!file_exists("../pics/$wjj")){
			mkdir("../pics/$wjj");
		}
		
		//判断图片文件量
		if($picurlsize){
			$psize=ceil($picurlsize/1024);
			if($psize>4100){
				exit("<script>alert('图片尺寸不要超过4M。');window.location.href='".WEB_HOME."'</script>");
			}
		}

		//缩略图片开始
			$newim = imagecreatetruecolor($wimg, $himg);
			$bg = imagecolorallocate($newim, 255, 255, 255);
			imagefill($newim, 0, 0, $bg);
			
			$width = imagesx($picurl);
		    $height = imagesy($picurl);
			
			$zxiao=($width>$height) ? $height :$width;
			if($wimg > $himg){ 
				$bili=$wimg/$zxiao; 
			}else{
				$bili=$himg/$zxiao;
			}
			
			$widtha = $width  * $bili;
			$heighta = $height * $bili;
			
			imagecopyresampled($newim,$picurl, 0,0,0,0, $widtha,$heighta,$width,$height);
			$this->xname=$wjj."/x".$picurln;
			$xnamea="../pics/".$wjj."/x".$picurln;
			imagejpeg($newim,$xnamea,100); //上传小图片
			imagedestroy($newim);
			return $this->xname;
		//缩略图片结束
	}


}
?>