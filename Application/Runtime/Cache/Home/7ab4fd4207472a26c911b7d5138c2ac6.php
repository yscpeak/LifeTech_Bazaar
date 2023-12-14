<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


<meta name="Keywords" content="<?php echo C('SETTING.KEYWORDS');?>" />
<meta name="Description" content="<?php echo C('SETTING.DESCRIPTION');?>" />
<title>Order Personal Center_<?php echo C('SETTING.TITLE');?></title>
<link rel="shortcut icon" href="/LifeTech_Bazaar/Application/Home/View/Public/images/favicon.ico" />
<link rel="icon" href="/LifeTech_Bazaar/Application/Home/View/Public/images/animated_favicon.gif" type="image/gif" />
<link href="/LifeTech_Bazaar/Application/Home/View/Public/css/style.css" rel="stylesheet" type="text/css">
<link href="/LifeTech_Bazaar/Application/Home/View/Public/css/page.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/LifeTech_Bazaar/Application/Home/View/Public/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/LifeTech_Bazaar/Application/Home/View/Public/themes/icon.css">

<!-- <link href="/LifeTech_Bazaar/Application/Home/View/Public/css/bootstrap.min.css"  rel="stylesheet" type="text/css" /> -->

<script type="text/javascript" src="/LifeTech_Bazaar/Application/Home/View/Public/js/jquery.min.js" ></script>

</head>
<body>
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
<div class="block clearfix">
<div class="blank"></div>
<div id="mainNav" class="clearfix"></div>

<div class="block box">
  <div id="ur_here">
  Current Location: <a href="/LifeTech_Bazaar/index.php/Home">Home</a> >> <a href="/LifeTech_Bazaar/index.php/Home/Member/userinfo">Personal Center</a> >> List  </div>
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
         
              
        
      
              <h5><span>My Order</span></h5>
       <div class="blank"></div>
       <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
          <tbody><tr align="center">
            <td bgcolor="#f1f1f1">Order No.</td>
            <td bgcolor="#f1f1f1">Order time</td>
            <td bgcolor="#f1f1f1">Total Amount</td>
            <td bgcolor="#f1f1f1">Status</td>
            <td bgcolor="#f1f1f1">Operate</td>
			<td bgcolor="#f1f1f1">More Info</td>
          </tr>
           <?php if(is_array($list_bill)): foreach($list_bill as $key=>$row): ?><tr>
            <td align="center" bgcolor="#ffffff"><?php echo ($row["code"]); ?></td>
            <td align="center" bgcolor="#ffffff"><?php echo ($row["datetime"]); ?></td>
            <td align="right" bgcolor="#ffffff"><?php echo ($row["money"]); ?>$</td>
            <td align="center" bgcolor="#ffffff">
            <?php if(($row["status"] == 0) AND ($row["pay_way"] != 2)): ?>Obligation
            
            <?php elseif(($row["status"] == 0) AND ($row["pay_way"] == 2)): ?>To be shipped[cash on delivery]
            
            <?php elseif($row["status"] == 1): ?>To be shipped[Paid]
            
            <?php elseif($row["status"] == 2): ?>Shipped
            
            <?php elseif($row["status"] == 3): ?>Received
            
            <?php elseif($row["status"] == 4): ?>Returning
            
            <?php elseif($row["status"] == 5): ?>Return Successful

             <?php elseif($row["status"] == 6): ?>Return Failed<?php endif; ?>
           
            </td>
            <td align="center" bgcolor="#ffffff">
			 <?php if(($row["status"] == 0) AND ($row["pay_way"] != 2) ): ?><!-- Unpaid -->
    <a href="/LifeTech_Bazaar/index.php/Home/BillOrder/account3/code/<?php echo ($row["code"]); ?>">Checkout</a>
<?php elseif(($row["status"] == 0) AND ($row["pay_way"] == 2) OR ($row["status"] == 1)): ?><!-- To be shipped -->
  
<?php elseif($row["status"] == 2): ?>  <!-- Shipped -->
    <a href="/LifeTech_Bazaar/index.php/Home/Member/bill_receive/code/<?php echo ($row["code"]); ?>">Complete</a>|
    <a href="/LifeTech_Bazaar/index.php/Home/Member/bill_refund/code/<?php echo ($row["code"]); ?>">Apply for Return</a>
<?php else: ?><!-- Return successful，Return failed，确认收货，均不再有operate -->
--<?php endif; ?>
            </td>
			
			<td bgcolor="#ffffff" ><a href="/LifeTech_Bazaar/index.php/Home/Member/bill_info/id/<?php echo ($row["id"]); ?>">Detail</a></td>
			
          </tr><?php endforeach; endif; ?>
                    </tbody></table>
 <div  class="yahoo2"><?php echo ($pageStr); ?></div>
        <div class="blank5"></div>
      </div>
	
	 
     </div>
    </div>
  </div>
  
</div>

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