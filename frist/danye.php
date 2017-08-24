<?php 
require("autoload.php");
$obj=new danye();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("title.php");?>
<link href="style/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="style/swiper.min.css">
<link href="style/font-awesome.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="js/mycode.js"></script>
<style>

</style>
</head>

<body>
<?php include("search.php");?>


<div class="wai">
<div class="mobdh"><i class=" icon-reorder icon-2x"></i></div>

<?php include("dh.php");?>



<div class="right_zw bga">
	<div class="bta tac biaozhi"><img src="images/logob.png" width="462" height="77" /></div>
    <div class="oaosbanner_b">
    <img src="images/banner_b.jpg" width="1190" height="210" /> </div>
    
    <div class="bta tac"> - <?php $obj->mydyflname($_GET["i"]);?> - </div>
    <div class="list_a pdb ysa dlb">
    	<?php echo $obj->mydanyeshow($_GET["i"]);?>
        
        <div class="ld"></div>
    </div>
    
    <div class="end">
    <?php include("end.php");?>
    </div>
    
</div>    
    
</div>    

</body>
</html>
