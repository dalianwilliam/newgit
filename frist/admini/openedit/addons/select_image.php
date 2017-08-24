<?php 
include('autoload.php');
$duix=new conn();
$duix->quanxian(); //权限判断


$imagebaseurl="http://seajoin.com/pics/";
$wysiwyg = $_GET['wysiwyg']; 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>

<script type="text/javascript" src="../scripts/wysiwyg-popup.js"></script>

<script type="text/javascript">


/* ---------------------------------------------------------------------- *\
  Function    : insertImage()
  Description : Inserts image into the WYSIWYG.
\* ---------------------------------------------------------------------- */
function insertImage() {
	var n = WYSIWYG_Popup.getParam('wysiwyg');
	
	// get values from form fields
	var src = document.getElementById('src').value;
	
	var alt = document.getElementById('alt').value;
	var width = document.getElementById('width').value
	var height = document.getElementById('height').value
	var border = document.getElementById('border').value
	var align = document.getElementById('align').value
	var vspace = document.getElementById('vspace').value
	var hspace = document.getElementById('hspace').value
	
	// insert image
	WYSIWYG.insertImage(src, width, height, align, border, alt, hspace, vspace, n);
	alert("=>"+src);
  	window.close();
}


/* ---------------------------------------------------------------------- *\
  Function    : loadImage()
  Description : load the settings of a selected image into the form fields
\* ---------------------------------------------------------------------- */
function loadImage() {
	var n = WYSIWYG_Popup.getParam('wysiwyg');
	
	// get selection and range
	var sel = WYSIWYG.getSelection(n);
	var range = WYSIWYG.getRange(sel);
	
	// the current tag of range
	var img = WYSIWYG.findParent("img", range);
	
	// if no image is defined then return
	if(img == null) return;
		
	// assign the values to the form elements
	for(var i = 0;i < img.attributes.length;i++) {
		var attr = img.attributes[i].name.toLowerCase();
		var value = img.attributes[i].value;
		//alert(attr + " = " + value);
		if(attr && value && value != "null") {
			switch(attr) {
				case "src": 
					// strip off urls on IE
					if(WYSIWYG_Core.isMSIE) value = WYSIWYG.stripURLPath(n, value, false);
					document.getElementById('src').value = value;
				break;
				case "alt":
					document.getElementById('alt').value = value;
				break;
				case "align":
					selectItemByValue(document.getElementById('align'), value);
				break;
				case "border":
					document.getElementById('border').value = value;
				break;
				case "hspace":
					document.getElementById('hspace').value = value;
				break;
				case "vspace":
					document.getElementById('vspace').value = value;
				break;
				case "width":
					document.getElementById('width').value = value;
				break;
				case "height":
					document.getElementById('height').value = value;
				break;				
			}
		}
	}
	
	// get width and height from style attribute in none IE browsers
	if(!WYSIWYG_Core.isMSIE && document.getElementById('width').value == "" && document.getElementById('width').value == "") {
		document.getElementById('width').value = img.style.width.replace(/px/, "");
		document.getElementById('height').value = img.style.height.replace(/px/, "");
	}
}

/* ---------------------------------------------------------------------- *\
  Function    : selectItem()
  Description : Select an item of an select box element by value.
\* ---------------------------------------------------------------------- */
function selectItemByValue(element, value) {
	if(element.options.length) {
		for(var i=0;i<element.options.length;i++) {
			if(element.options[i].value == value) {
				element.options[i].selected = true;
			}
		}
	}
}




	function selectImage(url) {
		if(parent) {
			parent.document.getElementById("src").value = url;
		}
	}


</script>

<style>
.wai{ padding:10px;}
</style>
</head>

<body onLoad="loadImage();">
<div class="wai">
<div class="pdab bgpicb"><a href="insert_image.php?wysiwyg=<?php echo $wysiwyg;?>" class="dhb">上传</a> <a href="select_image.php?wysiwyg=<?php echo $wysiwyg;?>" class="dhb">查看</a></div>

<div class="pdab bgcolora">

<table width="900" border="0" cellpadding="0" cellspacing="0" style="font-size:11px;">
  <tr>
    <td width="212" style="vertical-align:top;"><table width="90%" border="0" cellpadding="4" cellspacing="0" style="background-color: #F7F7F7;">
        <tr>
          <td width="30%" align="right" >Width:</td>
          <td width="70%" ><input type="text" name="width" id="width" value=""  style="font-size: 10px;" /></td>
        </tr>
        <tr>
          <td align="right" >Height:</td>
          <td ><input type="text" name="height" id="height" value=""  style="font-size: 10px;" /></td>
        </tr>
        <tr>
          <td align="right" >Border:</td>
          <td ><input type="text" name="border" id="border" value="0"  style="font-size: 10px; " /></td>
        </tr>
      </table></td>
    <td width="199" style="vertical-align:top;"><table width="100%" border="0" cellpadding="4" cellspacing="0" style="background-color: #F7F7F7;">
      <tr>
        <td align="right">alt </td>
        <td width="80%"><input name="alt" type="text" id="alt"  style="font-size: 10px; " value="" /></td>
      </tr>
      <tr>
        <td  width="20%" align="right">Alignment:</td>
        <td><select name="align" id="align" style="font-family: arial, verdana, helvetica; font-size: 11px;">
          <option value="">Not Set</option>
          <option value="left">Left</option>
          <option value="right">Right</option>
          <option value="texttop">Texttop</option>
          <option value="absmiddle">Absmiddle</option>
          <option value="baseline">Baseline</option>
          <option value="absbottom">Absbottom</option>
          <option value="bottom">Bottom</option>
          <option value="middle">Middle</option>
          <option value="top">Top</option>
        </select></td>
      </tr>
    </table></td>
    <td width="489" style="vertical-align:top;"><table width="343" border="0" cellpadding="4" cellspacing="0" style="background-color: #F7F7F7;">
      <tr>
        <td width="116" align="right" >Horizontal Space:</td>
        <td width="223" ><input type="text" name="hspace" id="hspace" value=""  style="font-size: 10px;" /></td>
      </tr>
      <tr>
        <td align="right" >Vertical Space:</td>
        <td ><input type="text" name="vspace" id="vspace" value=""  style="font-size: 10px;" /></td>
      </tr>
    </table></td>
  </tr>
</table>
  <input name="src" type="text" id="src" size="50" />
  <input type="submit" style="font-size: 12px; color:#099" onClick="insertImage();return false;" value="确定" >
  <input type="button" style="font-size: 12px;" onClick="window.close();" value="关闭">
</div>
<div style="background-color: #963; width:920px; height:390px; overflow:scroll;">
<?php

$sql=mysql_query("select * from sj_config_pics order by times desc");
$info=mysql_fetch_array($sql);
if($info){
	do{

?>
<div style="width:100px; height:100px; float:left; margin:2px;">
<a href="javascript:void(0)" onClick="selectImage('<?php echo $imagebaseurl.$info["pics"]; ?>');">
<img src="../../../pics/<?php echo $info["pics"];?>" width="99" height="80" border="0" class="pdab"></a>
<div><a href="del_post.php?wysiwyg=<?php echo $wysiwyg;?>&id=<?php echo $info["id"];?>">删除</a></div>
</div>
<?php
		}while($info=mysql_fetch_array($sql));
	}
unset($duix);
?>
</div>

</div>
</body>
</html>
