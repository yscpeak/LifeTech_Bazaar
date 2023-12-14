<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="Generator" content="TPSHOP BETA v1.0.0">

<meta name="Keywords" content="<?php echo C('SETTING.KEYWORDS');?>" />
<meta name="Description" content="<?php echo C('SETTING.DESCRIPTION');?>" />
<link rel="shortcut icon" href="/LifeTech_Bazaar/Application/Home/View/Public/images/favicon.ico" />
<link rel="icon" href="/LifeTech_Bazaar/Application/Home/View/Public/images/animated_favicon.gif" type="image/gif" />
<link href="/LifeTech_Bazaar/Application/Home/View/Public/css/bootstrap.min.css"  rel="stylesheet" type="text/css" />

<title>Digital Currency E Payment_<?php echo C('SETTING.TITLE');?></title>

<script type="text/javascript" src="/LifeTech_Bazaar/Application/Home/View/Public/js/jquery.min.js" ></script>
<script>
$(function(){

	$("#J_authSubmit").click(function(){
		if($("#name").val()==""){
			alert("Bank card number cannot be empty！");
			return false;
		}	
		if($("#password").val()==""){
			alert("Bank card password cannot be empty！");
			return false;
			}
		});
	/**/
	});
</script>
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
<div class="blank"></div>


<div class="block box">
 <div id="ur_here">
  current locationcurrent location: <a href="/LifeTech_Bazaar/index.php/Home/index/index">Home</a> <code>&gt;</code> Payment Page
</div>

<div class="blank"></div>
<div class="usBox clearfix">
<div class="usBox_1 f_l">
   <h1 align="center">Digital Currency E Payment</h1>
   <form name="formLogin" action="/LifeTech_Bazaar/index.php/Home/BillOrder/account4_do" method="post" onSubmit="return userLogin()">
        <table width="110%" border="0" align="left" cellpadding="8" cellspacing="8">
           <td width="200%" align="left">Pay Money</td>
            <td width="120%"><input name="money" id="money" type="text" readonly size="25" class="inputBg" value="<?php echo ($money); ?>" /></td>
          <tr>
            <td width="200%" align="left">Bank Card Number</td>
            <td width="120%"><input  type="text" size="25" id="name"  value="bank0001" name="car_id" class="inputBg" /></td>
          </tr>
          <tr>
            <td width="200%" align="left">Bank Card Password</td>
            <td width="20%"><input  type="password" size="15" id="password" class="inputBg"/>
             <span style="font-size:14px; font-weight:bold"></span>Please Enter Your Password</td>
                     
          </tr> 
          <td>&nbsp;</td>
            <td align="left">
			<input type="hidden" name="code" value="<?php echo ($code); ?>"/>
            <input type="submit" class="ui-button ui-button-lblue" id="J_authSubmit" value="confirm the payment" data-reactid=".1.0">
            </td>
          
      </table>
    </form>
  </div>
  
    <div class="usTxt">
      <strong style="font-size:15px; font-weight:bold;color:red;">
      Your order number is：<?php echo ($code); ?></strong> <br />
    <br/>
   
    <strong class="f5"style="font-size:15px; font-weight:bold">tip：</strong><br />
    Please bind your card number for your convenience in consumption<br />
    <p style="font-size:12px; ">
          In your daily consumption, this website has no system upgrades, major machine maintenance, etc.

Reason: Please be cautious when using your card number and other personal information for safe online consumption.

Wishing you a happy and good mood!
          </p>
  </div>
  
<div class="blank"></div>



</body></html>