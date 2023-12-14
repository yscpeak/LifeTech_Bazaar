<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="Generator" content="TPSHOP BETA v1.0.0">
<meta name="Keywords" content="<?php echo C('SETTING.KEYWORDS');?>" />
<meta name="Description" content="<?php echo C('SETTING.DESCRIPTION');?>" />
<link rel="shortcut icon" href="/LifeTech_Bazaar/Application/Home/View/Public/images/favicon.ico" />
<link rel="icon" href="/LifeTech_Bazaar/Application/Home/View/Public/images/animated_favicon.gif" type="image/gif" />
<link href="/LifeTech_Bazaar/Application/Home/View/Public/css/bootstrap.min.css"  rel="stylesheet" type="text/css" />

<title><?php echo ($category_name); ?>_Shopping Process_<?php echo C('SETTING.TITLE');?></title>


<link href="/LifeTech_Bazaar/Application/Home/View/Public/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/LifeTech_Bazaar/Application/Home/View/Public/js/jquery.min.js" ></script>
<script language="javascript">
$(function(){
		
	    <?php if(empty($list_address)): ?><!-- 显示添加框 -->
			$("#address_add").show();
			$("#address_list").hide();
        <?php else: ?>		<!-- 显示 list框 -->
			$("#address_add").hide();
			$("#address_list").show();<?php endif; ?>
	
	
        $("#add").click(function(){
		var a =$("form").serialize();
	    $.post("/LifeTech_Bazaar/index.php/Home/BillOrder/add_address",$('form').serialize(),function(data){
		if(data!=""){
			data = eval('('+data+')');
			var info="<tr><td bgcolor='#ffffff'> <input type='radio' name='address_id'  checked='checked' value='"+data.id+"'/></td><td bgcolor='#ffffff' >Consignee Name:</td> <td bgcolor='#ffffff' value='545' ><font size='-3'  ><span id='row1_name'>"+data.name+"</span></font> </td><td bgcolor='#ffffff'>mobile phone:</td><td bgcolor='#ffffff'><font size='-3'>"+data.phone+"</font> </td> <td bgcolor='#ffffff'>phone:</td><td bgcolor='#ffffff'><font size='-3'>"+data.tel+"</font> </td> <td bgcolor='#ffffff'>Postal Code:</td>	<td bgcolor='#ffffff'><font size='-3'>"+data.zipcode+"</font></td> <td bgcolor='#ffffff'>city:</td>	<td bgcolor='#ffffff'><font size='-3'>"+data.city+"</font> </td><td bgcolor='#ffffff'>address:</td>	<td bgcolor='#ffffff'><font size='-3'>"+data.address+"</font></td></tr>";
			$("#address_add").hide(400);
			$("#address_list").append($(info)).show();
			
		}else{
			alert("Add address failed！");
		} 
	  }); 
   });
 });
</script>
<!---->
</head>
<body>
<script type="text/javascript">
var process_request = "Processing your request...";
</script>
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
  current location: <a href="#">Home</a> <code>&gt;</code> Shopping Process </div>
</div>

<div class="blank"></div>
<div class="block">
 
       <form action="/LifeTech_Bazaar/index.php/Home/BillOrder/account3" method="post" name="theForm" id="theForm" >
        
			<input type="hidden"  name="money" id="money" value="<?php echo ($cart_sum); ?>" />
			<input type="hidden"  name="code" id="code" value="<?php echo ($_GET['code']); ?>" />
        <div class="flowBox">
        <h6><span>Product list</span></h6>
        <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tbody><tr>
              <th bgcolor="#ffffff">Product Name</th>
              <th bgcolor="#ffffff">Attribute</th>
              <th bgcolor="#ffffff">Price</th>
              <th bgcolor="#ffffff">Purchase quantity</th>
              <th bgcolor="#ffffff">Subtotal</th>
            </tr>
			<?php if(is_array($list_cart)): foreach($list_cart as $key=>$row_cart): ?><tr>
            <td bgcolor="#ffffff" id="title" name="title">
                      <?php echo ($row_cart["title"]); ?>  
                                                  </td>
            <td bgcolor="#ffffff"> <?php echo ($row_cart["attribute"]); ?>  
</td>
		
			<td bgcolor="#ffffff" align="right"><?php echo ($row_cart["price"]); ?> </td>
            <td  bgcolor="#ffffff" id="cart_id"  align="right">
			<?php echo ($row_cart["count"]); ?> </td>

			
            <td bgcolor="#ffffff" align="right"><?php echo $row_cart['count']*$row_cart['price']; ?></td>
            </tr><?php endforeach; endif; ?>
                                    <tr>
              <td bgcolor="#ffffff" colspan="7">
                            Shopping money subtotal <span id="total"><?php echo ($cart_sum); ?></span>$ </td>
            </tr>
                      </tbody></table>
      </div>
      <div class="blank"></div>	  
	
	 <div class="flowBox">

      <h6><span>consignee</span></h6>
	

    <div style="  width:960px;" id="yicang" >
	
        <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" id="address_add">
                <tr>
                  <td align="right" bgcolor="#ffffff">Consignee Name：</td>
                  <td align="left" bgcolor="#ffffff"><input name="name" type="text"  class="inputBg" id="mem_name" >
                  (REQUIRED) </td>
				  
         <td align="right" bgcolor="#ffffff">Address：</td>
                  <td align="left" bgcolor="#ffffff"><input name="address" type="text" class="inputBg" id="address" ></td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#ffffff">Mobile Phone：</td>
                  <td align="left" bgcolor="#ffffff"><input name="phone" type="text" class="inputBg" id="phone" >
                  (REQUIRED)</td>
                  <td align="right" bgcolor="#ffffff">Home Tel：</td>
                  <td align="left" bgcolor="#ffffff"><input name="tel" type="text" class="inputBg" id="tel" ></td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#ffffff">Postal Code：</td>
                  <td align="left" bgcolor="#ffffff"><input name="zipcode" type="text" class="inputBg" id="zipcode" >
                  (REQUIRED)</td>
                  <td align="right" bgcolor="#ffffff">City：</td>
                  <td align="left" bgcolor="#ffffff"><input name="city" type="text" class="inputBg" id="city" ></td>
                </tr>
        
                <tr>
                 
                  <td colspan="4" align="center" bgcolor="#ffffff">
                  	<input type="button" class="bnt_blue_1" id="add" value="Confirm"/>
                       
                  </td>
                </tr> 
		   </table>
		   
			

     <table width="99%" align="center" border="0" cellpadding="5"  id="address_list" cellspacing="1" bgcolor="#dddddd" >
 
		 		<?php if(is_array($list_address)): foreach($list_address as $key=>$row_address): ?><tr>
		   
		  <td bgcolor="#ffffff"> <input type="radio"  name="address_id"  checked="checked" value="<?php echo ($row_address["id"]); ?>"></td>
			   <td bgcolor="#ffffff" >Consignee Name:</td> <td bgcolor="#ffffff" value="545" ><?php echo ($row_address["name"]); ?> </td> 
			   <td bgcolor="#ffffff">Mobile Phone:</td><td bgcolor="#ffffff"><?php echo ($row_address["phone"]); ?></td>
			 <td bgcolor="#ffffff">Home Tel:</td><td bgcolor="#ffffff"><?php echo ($row_address["tel"]); ?> </td>
				<td bgcolor="#ffffff">Postal Code:</td>	<td bgcolor="#ffffff"><?php echo ($row_address["zipcode"]); ?></td> 
				<td bgcolor="#ffffff">City:</td>	<td bgcolor="#ffffff"><?php echo ($row_address["city"]); ?> </td>
				<td bgcolor="#ffffff">Delivery Address:</td>	<td bgcolor="#ffffff"><?php echo ($row_address["address"]); ?></td>
				</tr><?php endforeach; endif; ?>
	  </table>
	  </div>
    </div>
     <div class="blank"></div>
     <div class="blank"></div>
                <div class="flowBox">
    <h6><span>Payment Method</span></h6>
    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" id="paymentTable">
            <tbody><tr>
              <th width="5%" bgcolor="#ffffff">&nbsp;</th>
              <th width="20%" bgcolor="#ffffff">Name</th>
              <th bgcolor="#ffffff">Order Description</th>
              <th bgcolor="#ffffff" width="15%">Commission</th>
            </tr>
                        
             
            <tr>
              <td valign="top" bgcolor="#ffffff"><input type="radio" name="pay_way" value="1" checked=""iscod="0" onclick="selectPayment(this)"></td>
              <td valign="top" bgcolor="#ffffff"><strong>Bank Transfer</strong></td>
              <td valign="top" bgcolor="#ffffff">Bank Name
Payee Information: Full Name ××× ； Account or address ××× ； Opening bank ×××。
Attention: When processing wire transfers, please indicate your Order No. in the "remittance purpose" column of the wire transfer form.
</td>
              <td align="right" bgcolor="#ffffff" valign="top">0.00$</td>
            </tr>
                        
            <tr>
              <td valign="top" bgcolor="#ffffff"><input type="radio" name="pay_way" value="2" iscod="1" onclick="selectPayment(this)"></td>
              <td valign="top" bgcolor="#ffffff"><strong>cash on delivery</strong></td>
              <td valign="top" bgcolor="#ffffff">Activate city：×××
Cash on Delivery area：×××</td>
              <td align="right" bgcolor="#ffffff" valign="top"><span id="ECS_CODFEE">0.00$</span></td>
            </tr>
                      </tbody></table>
    </div>
        <div class="blank"></div>
        <div class="blank"></div>
        <div class="blank"></div>
        <div class="blank"></div>
    <div class="flowBox">
    <h6><span>Total expenses</span></h6>
          <div id="ECS_ORDERTOTAL">
<table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
    <tbody>
    <tr>
    <td align="right" bgcolor="#ffffff">
      Product price: <font class="f4_b"><span id="total"><?php echo ($cart_sum); ?></span>$</font>
                        + distribution costs: <font class="f5_b">0.00$</font>
                                  </td>
  </tr>
    <tr>
    <td align="right" bgcolor="#ffffff"> Accounts Payable Money: <font class="f4_b"><span id="total"><?php echo ($cart_sum); ?></span>$</font>
    	</td>
  </tr>
</tbody></table>
</div>           <div align="center" style="margin:8px auto;">
           
            <input type="submit" name="s" value="submit"  class="bnt_blue_1">
            <input type="hidden" name="step" value="done">
            </div>
    </div>
 </form>
        
                



</div>
<div class="blank5"></div>
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