<?php
require("autoload.php");
$obj= new reg();
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
</head>

<body>
<?php include("search.php");?>
<div class="wai">
<div class="mobdh"><i class=" icon-reorder icon-2x"></i></div>

<?php include("dh.php");?>



<div class="right_zw">
	<div class="bta tac biaozhi"><img src="images/logob.png" width="462" height="77" /></div>

    
    <div class="login bga pda ysa">
    <div class="pda btb">Create Account</div>
    <DIV class="dla pda">Registration is quick and easy. It allows you to be able to order from our shop. To start shopping click register.</DIV>
   <form action="reg.php" method="post">
    <div class="pda">
    	Username
        <div><input type="text" class="bda" name="uname"></div>
    </div>
    <div class="pda">
    	Password
        <div><input type="password" class="bda" name="password"></div>
    </div>
    <div class="pda">
    	Confirm password
    	<div><input name="passwords" type="password" class="bda" id="passwords"></div>
    </div>
    <div class="pda">
    	<input name="tijiao" type="submit" class="ana" id="tijiao" value="REGISTER" />
    </div>
    </form>
    
    </div>
    <div class="end">
    <?php include("end.php");?>
    </div>
    
</div>    
    
</div>    

</body>
</html>
