<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="Generator" content="TPSHOP BETA v1.0.0">

<meta name="Keywords" content="<?php echo C('SETTING.KEYWORDS');?>" />
<meta name="Description" content="<?php echo C('SETTING.DESCRIPTION');?>" />

<title>My Collection_Personal Center_<?php echo C('SETTING.TITLE');?></title>
<link rel="shortcut icon" href="/LifeTech_Bazaar/Application/Home/View/Public/images/favicon.ico" />
<link rel="icon" href="/LifeTech_Bazaar/Application/Home/View/Public/images/animated_favicon.gif" type="image/gif" />
<link href="/LifeTech_Bazaar/Application/Home/View/Public/css/style.css" rel="stylesheet" type="text/css">

<!-- <link href="/LifeTech_Bazaar/Application/Home/View/Public/css/bootstrap.min.css"  rel="stylesheet" type="text/css" /> -->

<script src="/LifeTech_Bazaar/Application/Home/View/Public/js/jquery.min.js"></script>

</head>
<body>
<div class="block clearfix">
<?php $list_menu=M("category")->where("length(code)=2")->select(); ?>

<script>

$(function(){
	$.get("/LifeTech_Bazaar/index.php/Home/Index/checkIsLogin",function(data){
		if (data){
			$("#login").show();
			$("#topNav").show();	
			$("#no_login").hide();
			$("#login .f4_b").html(data);
		}else{
			$("#no_login").show();
			$("#login").hide();
		}		
	});	
});
</script>
<div class="block clearfix">
<div class="logotxt">LifeTech Bazaar</div>
 <div class="f_r log">
   <ul>
   


        <li class="userInfo" id="no_login"  style="display:none">
  <font id="ECS_MEMBERZONE"><div id="append_parent"></div>
      <a href="/LifeTech_Bazaar/index.php/Home/Index/login" >Login</a>
 <a href="/LifeTech_Bazaar/index.php/Home/Index/register" >Register</a>  |
 <a href="http://localhost:8080/LifeTech_Bazaar/admin.php/Index/login" >Seller Centre</a>
    </li>
  
   

        <li class="userInfo" id="login" style="display:none">
  <font id="ECS_MEMBERZONE"><div id="append_parent"></div>
     <font style="position:relative; top:10px;">
Hello，【<font class="f4_b"></font>】, Welcome Back!</font>
 </font>
</li>


   


 <li id="topNav" class="clearfix" style="display:none">
    <a href="/LifeTech_Bazaar/index.php/Home/BillOrder/cart"  >Shopping Cart</a>
    | <a href="/LifeTech_Bazaar/index.php/Home/Member/userinfo"  >Personal Center</a>
    | <a href="/LifeTech_Bazaar/index.php/Home/Index/logOut"  >Log Out</a>
    | <a href="http://localhost:8080/LifeTech_Bazaar/admin.php/Index/login" >Seller Centre</a>
  </li>

  
  
  
      </ul>
 </div>
</div>
<div  class="topbox"></div>
<div id="mainNav" class="clearfix">
  <a href="/LifeTech_Bazaar/index.php/Home/Index/index" <?php if((ACTION_NAME) == "index"): ?>class="cur"<?php endif; ?>  >Home</a>
  
  <?php if(is_array($list_menu)): foreach($list_menu as $key=>$row_menu): ?><a href="/LifeTech_Bazaar/index.php/Home/Index/lists/category_code/<?php echo ($row_menu["code"]); ?>" <?php if((substr($_GET['category_code'],0,2)) == $row_menu["code"]): ?>class="cur"<?php endif; ?>   ><?php echo ($row_menu["name"]); ?></a><?php endforeach; endif; ?>
   
 </div>
<div class="blank"></div>
<div class="block box">
  <div id="ur_here">
  Current Location: <a href="/LifeTech_Bazaar/index.php/Home">Home</a> >> <a href="/LifeTech_Bazaar/index.php/Home/Member/userinfo">Personal Center</a> >> My Collection  </div>
</div>

<div class="blank"></div>
<div class="block clearfix">
  
  <div class="AreaL">
    <div class="box">
     <script type="text/javascript" src="/LifeTech_Bazaar/Public/Js/jquery-1.8.1.min.js"></script>
<script>
$(function(){
    $(".userMenu a").one("click",function(){
	   $(this).addClass("curs");
	   
	});
});
</script>


<div class="box_1">
      <div class="userCenterBox">
        <div class="userMenu">

<a href="/LifeTech_Bazaar/index.php/Home/Member/userinfo"
<?php if((ACTION_NAME) == "userinfo"): ?>class="curs"<?php endif; ?>
 > <img src="/LifeTech_Bazaar/Application/Home/View/Public/images/u2.gif"/> User Info</a>
<a href="/LifeTech_Bazaar/index.php/Home/Member/bill" 
<?php if((ACTION_NAME) == "bill"): ?>class="curs"<?php endif; ?>
 ><img src="/LifeTech_Bazaar/Application/Home/View/Public/images/u3.gif"> My Order</a>
<a href="/LifeTech_Bazaar/index.php/Home/Member/address" 
<?php if((ACTION_NAME) == "address"): ?>class="curs"<?php endif; ?>
 ><img src="/LifeTech_Bazaar/Application/Home/View/Public/images/u4.gif"> Address</a>
<a href="/LifeTech_Bazaar/index.php/Home/Member/collect"
<?php if((ACTION_NAME) == "collect"): ?>class="curs"<?php endif; ?>
 ><img src="/LifeTech_Bazaar/Application/Home/View/Public/images/u5.gif"> My Collection</a>


</div>    
  </div>
     </div>
    </div>
  </div>
  
  
  <div class="AreaR">
    <div class="box">
     <div class="box_1">
      <div class="userCenterBox boxCenterList clearfix" style="_height:1%;">
         
 
          <h5><span>My Collection</span></h5>
    <div class="blank"></div>
     <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
      <tbody><tr align="center">
        <th width="35%" bgcolor="#ffffff">Product Name</th>
        <th width="30%" bgcolor="#ffffff">Price</th>
        <th width="35%" bgcolor="#ffffff">Operate</th>
      </tr>
      <?php if(is_array($list_collect)): foreach($list_collect as $key=>$row): ?><tr>
        <td bgcolor="#ffffff"><?php echo ($row["title"]); ?></td>
        <td bgcolor="#ffffff">Price：<span class="goods-price"><?php echo ($row["price"]); ?>$</span>
                  </td>
        <td align="center" bgcolor="#ffffff">
       <a href="/LifeTech_Bazaar/index.php/Home/Index/info/id/<?php echo ($row["goods_id"]); ?>" class="f6">Detail</a> | 
       <a href="/LifeTech_Bazaar/index.php/Home/Member/collect_del/id/<?php echo ($row["id"]); ?>" class="f6">Delete</a>
        </td>
      </tr><?php endforeach; endif; ?>
          </tbody></table>
    


     <div class="blank5"></div>

    
      
    

   
      
         
    
  
      </div>
     </div>
    </div>
  </div>
  
</div>
<div class="blank"></div>

<div class="blank"></div>
<div id="bottomNav" class="box">
 <div class="box_1">
  <div class="bNavList clearfix">
   <div class="f_l">
              <a href="#"  >Disclaimer</a>
                   |
                      <a href="#"  >Payment</a>
                   |
                      <a href="#"  >Contact</a>
                   |
                      <a href="#"  >Company</a>
                   |
                      <a href="#"  >Delivery</a>
                   </div>
   <div class="f_r">
   <a href="#top"><img src="/LifeTech_Bazaar/Application/Home/View/Public/images/bnt_top.gif"  /></a> <a href="/LifeTech_Bazaar/index.php/Home" ><img src="/LifeTech_Bazaar/Application/Home/View/Public/images/bnt_home.gif"  /></a>
   </div>
  </div>
 </div>
</div>
<div class="blank"></div>
<div id="footer">

 <div class="text">COPYRIGHT© LifeTech Bazaar</div>
 <div style=" clear:both"></div>
</div>
</body></html>