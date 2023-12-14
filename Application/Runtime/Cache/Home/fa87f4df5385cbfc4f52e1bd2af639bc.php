<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo C('SETTING.KEYWORDS');?>" />
<meta name="Description" content="<?php echo C('SETTING.DESCRIPTION');?>" />
<link rel="shortcut icon" href="/LifeTech_Bazaar/Application/Home/View/Public/images/favicon.ico" />
<link rel="icon" href="/LifeTech_Bazaar/Application/Home/View/Public/images/animated_favicon.gif" type="image/gif" />

<link href="/LifeTech_Bazaar/Application/Home/View/Public/css/bootstrap.min.css"  rel="stylesheet" type="text/css" />

<title>Shopping Cart_<?php echo C('SETTING.TITLE');?></title>

<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="/LifeTech_Bazaar/Application/Home/View/Public/css/style.css"  rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/LifeTech_Bazaar/Application/Home/View/Public/js/jquery.min.js" ></script>
<script>
$(function(){
	//清空Shopping Cart
	$("#clearCartButton").click(function(){	
		$.get('/LifeTech_Bazaar/index.php/Home/BillOrder/cart_del_all','',function(data){
			if(data=="success"){
				alert('Shopping cart cleared successfully！');
				$("form table:eq(0) tr:gt(0)").remove();
			}
		});	
	});
	//商品number联动
	$("form table input").keyup(function(){
		var price=$(this).attr("price");
		var num=$(this).attr("value");
		var sum=price*num;
		$("#sum_"+$(this).attr("cart_id")).html(sum);
		var sum=0;
		$("span[id^='sum_']").each(function(){
			sum+=$(this).html()*1;
		});
		$("#total").html(sum);
	}).keyup();
  
  	//异步Delete功能！
	$("form table tr td a").click(function(){
		if (confirm("Are you sure you want to Delete it？"))  {  
			var a = $(this).attr("cart_id");
			$.get("/LifeTech_Bazaar/index.php/Home/BillOrder/cart_del",{id:a},function(data){
				if (data!="success"){	
					alert("Delete failed!");
				}
			});
			$(this).parent().parent().remove();
		} 
	});
});


</script>

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

<div class="block box">
 <div id="ur_here">
  current location: <a href="/LifeTech_Bazaar/index.php/Home/index/index">Home</a> <code>&gt;</code> User Center  </div>
</div>

<div class="blank"></div>

<div class="block">
    
  <div class="flowBox">
    <h6><span>Product list</span></h6>
        <form id="formCart" name="formCart" method="post" action="">
           <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
              <th width="24%" bgcolor="#ffffff">Product Name</th>
              <th width="9%" bgcolor="#ffffff">Attribute</th>
              <th width="13%" bgcolor="#ffffff">price</th>
              <th width="25%" bgcolor="#ffffff">Purchase quantity</th>
              <th width="19%" bgcolor="#ffffff">Subtotal</th>
              <th width="10%" bgcolor="#ffffff">Operate</th>
            </tr>
		<?php if(is_array($list)): foreach($list as $key=>$row): ?><tr>
              <td bgcolor="#ffffff"><?php echo ($row["title"]); ?></td>
              <td bgcolor="#ffffff"><?php echo ($row["attribute"]); ?></td>
              <td bgcolor="#ffffff"><?php echo ($row["price"]); ?></td>
              <td bgcolor="#ffffff">
 <input cart_id="<?php echo ($row["id"]); ?>" price="<?php echo ($row["price"]); ?>"  name="count" type="text" value="<?php echo ($row["count"]); ?>"/></td>
              <td bgcolor="#ffffff"><span id="sum_<?php echo ($row["id"]); ?>"><?php echo $row['count']*$row['price']; ?></span></td>
            <td bgcolor="#ffffff">  <a  cart_id="<?php echo ($row["id"]); ?>"  href="#">Delete</a></td>
            </tr><?php endforeach; endif; ?>
			
          </table>
          <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
              <td bgcolor="#ffffff">
                            Subtotal of Shopping Amount <span id="total">0.00</span>$</td>
              <td align="right" bgcolor="#ffffff">
                <input type="button" value="empty cart" class="bnt_blue_1" id="clearCartButton" />
                <input name="submit" type="submit" class="bnt_blue_1" value="Update Cart" />
              </td>
            </tr>
          </table>
          <input type="hidden" name="step" value="update_cart" />
        </form>
        <table width="99%" align="center" border="0" cellpadding="5" cellspacing="0" bgcolor="#dddddd">
          <tr>
            <td bgcolor="#ffffff"><a href="/LifeTech_Bazaar/index.php/Home/index.html" style=" text-decoration: none;background:red;color:#fff;display:inline;padding:5px 15px;cursor:pointer;border-radius:3px;">
			Continue</a></td>
            <td bgcolor="#ffffff" align="right"><a href="/LifeTech_Bazaar/index.php/Home/BillOrder/account2" style=" text-decoration: none;background:red;color:#fff;display:inline;padding:5px 15px;cursor:pointer;border-radius:3px;"> Checkout </a></td>
          </tr>
        </table>
    </div>
    <div class="blank5"></div>
    <div class="block"></div>
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
</body>
</html>