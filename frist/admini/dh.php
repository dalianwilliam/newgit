<?php
require("../lib/public_admini_dh.php");
?>
<div class="left_dh">
  	<div class="pda xiana">
    	<div class="pdb">会员：</div>
        <div class="pdb"><a href="index.php">后台首页</a> <a href="../index.php">前台首页</a></div>
    	<div class="pdb"><a href="#">修改密码</a> <a href="#">安全退出</a></div>
    </div>

    <div class="pda xiana">
    	<div class="bte">产品管理</div>
        <div class="pdb"><a href="fenlei_add.php">产品分类</a></div>
        <div class="pdb"><a href="chanpin_add.php">添加产品</a> <a href="chanpin_list.php">管理产品</a></div>
    </div>
    <div class="pda xiana">
    	<div class="bte">综合管理</div>
        
        <div class="pdb"><a href="#">工匠管理</a> <a href="#">俱乐部管理</a></div>
        <div class="pdb"><a href="#">浏览统计</a></div>
        <div class="pdb"><a href="#">会员管理</a> <a href="#">广告管理</a></div>
        
    </div>
     <div class="pda xiana">
     <div class="bte">单页信息</div>
     <?php public_admini_dh::mydydhcn();?>
     </div>
</div>