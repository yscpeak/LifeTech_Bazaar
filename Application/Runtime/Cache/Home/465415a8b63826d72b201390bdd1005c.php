<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="Generator" content="TPSHOP BETA v1.0.0">

<meta name="Keywords" content="<?php echo C('SETTING.KEYWORDS');?>" />
<meta name="Description" content="<?php echo C('SETTING.DESCRIPTION');?>" />

<title>Delivery Address Management_Personal Center_<?php echo C('SETTING.TITLE');?></title>

<link rel="shortcut icon" href="/LifeTech_Bazaar/Application/Home/View/Public/images/favicon.ico" />
<link rel="icon" href="/LifeTech_Bazaar/Application/Home/View/Public/images/animated_favicon.gif" type="image/gif" />
<link href="/LifeTech_Bazaar/Application/Home/View/Public/css/style.css" rel="stylesheet" type="text/css">

<!-- <link href="/LifeTech_Bazaar/Application/Home/View/Public/css/bootstrap.min.css"  rel="stylesheet" type="text/css" /> -->

<script type="text/javascript" src="/LifeTech_Bazaar/Application/Home/View/Public/js/jquery.min.js" ></script>
<script>
$(function(){
	$("table tr td a").click(function(){
		var id=$(this).attr("edit");
		$.get("/LifeTech_Bazaar/index.php/Home/Member/consignee_edit",{id:id},function(data){
			if(data!="error"){
				data=eval('('+data+')');
				var controle=" <form action='/LifeTech_Bazaar/index.php/Home/Member/save' method='post' name='theForm' onsubmit='return checkConsignee(this)'><table width='100%' border='0' cellpadding='5' cellspacing='1' id='table' bgcolor='#dddddd'><tr><td align='right' bgcolor='#ffffff'>Consignee Name：</td><input type='hidden' name='id' value="+data.id+" /> <td align='left' bgcolor='#ffffff'><input name='mem_name' type='text'  class='inputBg' id='consignee_0' value="+data.mem_name+" >() </td> <td align='right' bgcolor='#ffffff'>Member ID：</td> <td align='left' bgcolor='#ffffff'><input name='Member_id' readonly type='text' value="+data.Member_id+" class='inputBg' id='email_0' >()</td> </tr><tr> <td align='right' bgcolor='#ffffff'>phone：</td><td align='left' bgcolor='#ffffff'><input name='phone' type='text' class='inputBg' id='address_0' value="+data.phone+" >()</td> <td align='right' bgcolor='#ffffff'>mobile phone号码：</td> <td align='left' bgcolor='#ffffff'><input name='Tel' type='text' class='inputBg' id='zipcode_0' value="+data.Tel+" ></td></tr><tr> <td align='right' bgcolor='#ffffff'>zip code：</td><td align='left' bgcolor='#ffffff'><input name='Zipcode' type='text' class='inputBg'  value="+data.Zipcode+" id='tel_0'> ()</td> <td align='right' bgcolor='#ffffff'>city：</td> <td align='left' bgcolor='#ffffff'><input name='city' value="+data.city+" type='text' class='inputBg' id='mobile_0'></td> </tr><tr> <td align='right' bgcolor='#ffffff'>address：</td> <td align='left'bgcolor='#ffffff'><input name='address' type='text' class='inputBg' value="+data.address+" id='sign_building_0'></td><td align='right' bgcolor='#ffffff'>最佳送货time：</td> <td align='left' bgcolor='#ffffff'><input name='best_time' value='明天' type='text' class='inputBg' id='best_time_0' value=''></td> </tr><tr><td align='right' bgcolor='#ffffff'>&nbsp;</td><td colspan='3' align='center' bgcolor='#ffffff'> <input type='submit' name='submit' class='bnt_blue_2' value='确认modify'><input type='hidden' name='act' value='act_edit_address'> <input name='address_id' type='hidden' value=''></td></tr></table></form>";
				$("#thisdiv form").remove();
				$("#thisdiv").append($(controle)).show();
			}
		});
	});
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
  Current Location: <a href="/LifeTech_Bazaar/index.php/Home">Home</a> >> <a href="/LifeTech_Bazaar/index.php/Home/Member/address">Delivery Address management</a> >> Address list  </div>
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

              <h5><span>consignee</span></h5>
        <div class="blank"></div>

        <table width="100%" align="center" border="0" cellpadding="5"  id="select_1" cellspacing="1" bgcolor="#dddddd"   >
		<tr align="center">
         <td bgcolor="#f1f1f1">Name</td>
         <td bgcolor="#f1f1f1">Mobile Phone</td>
          <td bgcolor="#f1f1f1">Phone</td>
          <td bgcolor="#f1f1f1">Postal Code</td>
          <td bgcolor="#f1f1f1">City</td>
          <td bgcolor="#f1f1f1">Address</td>
          <td bgcolor="#f1f1f1">Operate</td>
          </tr>
		   <?php if(is_array($list_address)): foreach($list_address as $key=>$row): ?><tr align="center">
		   
		
  
    <td bgcolor="#ffffff"><font size="-3"><?php echo ($row["name"]); ?></font> </td> 
    <td bgcolor="#ffffff"><font size="-3"><?php echo ($row["phone"]); ?></font> </td> 
    <td bgcolor="#ffffff"><font size="-3"><?php echo ($row["tel"]); ?></font> </td> 
    <td bgcolor="#ffffff"><font size="-3"><?php echo ($row["zipcode"]); ?></font> </td> 
    <td bgcolor="#ffffff"><font size="-3"><?php echo ($row["city"]); ?></font> </td>
    <td bgcolor="#ffffff"><font size="-3"><?php echo ($row["address"]); ?></font> </td> 
    <td bgcolor="#ffffff"><font size="-3"><a  href="/LifeTech_Bazaar/index.php/Home/Member/address/id/<?php echo ($row["id"]); ?>">Modify</a> | <a  href="/LifeTech_Bazaar/index.php/Home/Member/address_del/id/<?php echo ($row["id"]); ?>">Delete</a></font></td>
        </tr><?php endforeach; endif; ?>

	  </table>
    </div>

			<div id="thisdiv" style="padding:12px">

            <form action="/LifeTech_Bazaar/index.php/Home/Member/address_save" method="post" >

              <table width="100%" border="0" cellpadding="5" cellspacing="1" id="table" bgcolor="#dddddd" >
                 <tr>
                   <td align="right" bgcolor="#f1f1f1">Name：</td>
                   <td align="left" bgcolor="#ffffff"><input name="name" type="text"  class="inputBg" id="name" value="<?php echo ($row_address["name"]); ?>" />
                     </td>
                   <td align="right" bgcolor="#f1f1f1">Address：</td>
                   <td align="left" bgcolor="#ffffff"><input name="address" type="text" class="inputBg" id="address" value="<?php echo ($row_address["address"]); ?>" /> </td>
                 </tr>
                 <tr>
                   <td align="right" bgcolor="#f1f1f1">Mobile Phone：</td>
                   <td align="left" bgcolor="#ffffff"><input name="phone" type="text" class="inputBg" id="phone" value="<?php echo ($row_address["phone"]); ?>"  /></td>
                  
                   <td align="right" bgcolor="#f1f1f1">Landline：</td>
                   <td align="left" bgcolor="#ffffff"><input name="tel" type="text" class="inputBg" id="tel" value="<?php echo ($row_address["tel"]); ?>"  /> </td>
                 </tr>
                 <tr>
                   <td align="right" bgcolor="#f1f1f1">Zip Code：</td>
                   <td align="left" bgcolor="#ffffff"><input name="zipcode" type="text" class="inputBg" id="zipcode"  value="<?php echo ($row_address["zipcode"]); ?>" />
                    </td>
                   <td align="right" bgcolor="#f1f1f1">City：</td>
                   <td align="left" bgcolor="#ffffff"><input name="city" type="text" class="inputBg" id="city" value="<?php echo ($row_address["city"]); ?>"  /> </td>
                 </tr>
                <tr>
             
                  <td colspan="4" align="center" bgcolor="#ffffff">
                   <input type="submit" name="submit" class="bnt_blue_2" value="Save receiving information">
                    <input name="id" type="hidden" value="<?php echo ($row_address["id"]); ?>">
                  </td>
                </tr>
			  </table>
            </form>
               
</div>

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