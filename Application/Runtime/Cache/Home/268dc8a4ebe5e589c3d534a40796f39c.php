<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="Generator" content="TPSHOP BETA v1.0.0">

<meta name="Keywords" content="<?php echo C('SETTING.KEYWORDS');?>" />
<meta name="Description" content="<?php echo C('SETTING.DESCRIPTION');?>" />
<link rel="shortcut icon" href="/LifeTech_Bazaar/Application/Home/View/Public/images/favicon.ico" />
<link rel="icon" href="/LifeTech_Bazaar/Application/Home/View/Public/images/animated_favicon.gif" type="image/gif" />
<link href="/LifeTech_Bazaar/Application/Home/View/Public/css/bootstrap.min.css"  rel="stylesheet" type="text/css" />

<title>Confirm Payment_<?php echo C('SETTING.TITLE');?></title>


<link href="/LifeTech_Bazaar/Application/Home/View/Public/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/LifeTech_Bazaar/Application/Home/View/Public/js/jquery.min.js" ></script>
</head>
<body>
<div class="block clearfix">
 <div class="f_l"></div>
</div>
<div class="blank"></div>

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
<div class="block box">
 <div id="ur_here">
  Current Location: <a href="/LifeTech_Bazaar/index.php/Home/index/index">Home</a> <code>&gt;</code> Confirm Payment </div>
</div>

<div class="blank"></div>
<div class="block">
  
  
  

        
        
                
        <div class="flowBox" style="margin:30px auto 70px auto;">
         <h6 style="text-align:center; height:30px; line-height:30px;">Thank you for shopping in our store! Your order has been successfully submitted, please remember your Order No.: <font style="color:red; font-size:15px; font-weight:bold"><?php echo ($bill["code"]); ?></font></h6>
          <table width="99%" align="center" border="0" cellpadding="15" cellspacing="0" bgcolor="#fff" style="border:1px solid #ddd; margin:20px auto;">
            <tbody><tr>
              <td align="center" bgcolor="#FFFFFF">
              The payment method you have selected: <strong>
              <?php if($bill["pay_way"] == 0): ?>Balance payment
              <?php elseif($bill["pay_way"] == 1): ?>Digital Currency E Payment
              <?php else: ?>
              Cash on Delivery<?php endif; ?>
              </strong>。Your Payable Money: <strong><?php echo ($bill["money"]); ?>$</strong>
              </td>
            </tr>
            <tr>
              <td align="center" bgcolor="#FFFFFF">
              <div align="center" style="margin:8px auto;">
              <FORM METHOD=POST ACTION="/LifeTech_Bazaar/index.php/Home/BillOrder/account4" id="form1">
                <INPUT TYPE="hidden" NAME="code" value="<?php echo ($bill["code"]); ?>">
                <INPUT TYPE="hidden" NAME="money" value="<?php echo ($bill["money"]); ?>">
                <INPUT TYPE="hidden" NAME="pay_way" value="<?php echo ($bill["pay_way"]); ?>">

                <a href="#" id="payButton" style="text-decoration: none;background:red;color:#fff;display:inline;padding:5px 15px;cursor:pointer;border-radius:3px;" >
                <?php if(($bill["pay_way"]) == "1"): ?>Go Pay
                <?php else: ?>
                      Confirm Payment<?php endif; ?>
                </a>

              </FORM>      
			</div>
              </td>
            </tr>
                      </tbody></table>
                    <p style="text-align:center; margin-bottom:20px;">You Can <a href="/LifeTech_Bazaar/index.php/Home/index/index">Return Home</a> Go <a href="/LifeTech_Bazaar/index.php/Home/BillOrder/account2">Back</a></p>
        </div>
                



</div>
<div class="blank5"></div>
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

<div class="blank"></div>
<div class="blank"></div>
              <script>
              $(function(){
                $("#payButton").click(function(){
                    $("#form1").submit();
                });
              
              })
              </script>
</body></html>