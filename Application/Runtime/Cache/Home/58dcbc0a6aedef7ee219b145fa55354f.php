<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo C('SETTING.KEYWORDS');?>" />
<meta name="Description" content="<?php echo C('SETTING.DESCRIPTION');?>" />
<title><?php echo ($row_goods["title"]); ?>_Detail Pages_<?php echo C('SETTING.TITLE');?></title>
<link rel="shortcut icon" href="/LifeTech_Bazaar/Application/Home/View/Public/images/favicon.ico" />
<link rel="icon" href="/LifeTech_Bazaar/Application/Home/View/Public/images/animated_favicon.gif" type="image/gif" />
<link href="/LifeTech_Bazaar/Application/Home/View/Public/css/style.css" tppabs="/LifeTech_Bazaar/Application/Home/View/Public/css/style.css" rel="stylesheet" type="text/css" />

<link href="/LifeTech_Bazaar/Application/Home/View/Public/css/bootstrap.min.css"  rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/LifeTech_Bazaar/Application/Home/View/Public/js/jquery.min.js" ></script>
<script>
$(function(){
	
	$("#number").keyup(function(){
		if(!isNaN($(this).val()))
		{
			var count=$(this).val()*$("#goods_price").html()*1;
			$("#GOODS_AMOUNT").html(count);
		}else{
			$(this).val(1);
		}
	});
	
	$("#goods_attr_group :radio").click(function(){
		$("#goods_attribute").val(this.value);
	
	});
	
	$("#addCartButton").click(function(){
		if ($("#goods_attribute").size()>0)		//商品attribute组不为空
		{
			if ($("#goods_attribute").val()=="")		//商品attribute组不为空
			{
				alert('Product attributes are mandatory');		
				return false;		
			}
		}
		var number=$("#number").attr("value");
		location.href='/LifeTech_Bazaar/index.php/Home/BillOrder/cart/id/<?php echo ($row_goods["id"]); ?>/count/'+number+"/attribute/"+$("#goods_attribute").val();
	
	});
	//添加收藏
	$("#addCollectButton").click(function(){
		$.get("/LifeTech_Bazaar/index.php/Home/Member/collect_add/goods_id/<?php echo ($row_goods["id"]); ?>",function(data){
			
			if (data=="success")
				alert('Product collection successful！');
			else{
				alert('Collection failed, please log in first');
			}
			
		});
	
	});
	$("#demo1 img").click(function(){
		//alert($(this).attr("src"));
		$("#goods_picture_big").attr("src",$(this).attr("src"));
		
		
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
<div class="block box">
  <div id="ur_here">
  current location: <a href="/LifeTech_Bazaar/index.php/Home">Home</a> >> <a href="/LifeTech_Bazaar/index.php/Home/Index/lists">Product list</a> >> Detail Pages  </div>
</div>
<div class="blank"></div>
<div class="block clearfix">
  
  <div class="AreaL">

<?php $list_category=M("category")->where("length(code)=2")->select(); foreach($list_category as &$tmp){ $list2=M("category")->where("length(code)=4 and code like '".$tmp['code']."%'")->select(); $tmp['son']=$list2; } ?>
<style>
<!--
	.cur{
		font-weight:bold;
		
		}

 -->
</style>

<div class="box">
 <div class="box_1">
  <div id="category_tree">
    <?php if(is_array($list_category)): foreach($list_category as $key=>$row_category): ?><dl>
        <dt><a href="/LifeTech_Bazaar/index.php/Home/Index/lists/category_code/<?php echo ($row_category["code"]); ?>" <?php if(($_GET['category_code']) == $row_category["code"]): ?>class="cur"<?php endif; ?>    ><?php echo ($row_category["name"]); ?></a></dt>
        <?php if(is_array($row_category["son"])): foreach($row_category["son"] as $key=>$row_category2): ?><dd><a href="/LifeTech_Bazaar/index.php/Home/Index/lists/category_code/<?php echo ($row_category2["code"]); ?>"<?php if(($_GET['category_code']) == $row_category2["code"]): ?>class="cur"<?php endif; ?> >&nbsp<?php echo ($row_category2["name"]); ?></a></dd><?php endforeach; endif; ?>
           
        </dl><?php endforeach; endif; ?>
     
  </div>
 </div>
</div>
<div class="blank5"></div>

   
    
    
<div class="blank5"></div> </div>
  
  
  <div class="AreaR">
   
   <div id="goodsInfo" class="clearfix">
      
     <div class="textInfo">
     <form action="javascript:addToCart(1)" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY" >
     <div class="clearfix">
      <p class="f_l" style=" font-size:20px"><?php echo ($row_goods["title"]); ?></p>

      </div>
      <ul>
             
      <li class="clearfix">
       <dd><strong>Product Code：</strong><?php echo ($row_goods["item_no"]); ?></dd>
       <dd class="ddR"><strong>Recommend：</strong><?php if(($row_goods["recommend"]) == "0"): ?>No<?php else: ?>Yes<?php endif; ?></dd>
      </li>
      <li class="clearfix">
      <dd><strong>Listing Time：</strong><?php echo ($row_goods["datetime"]); ?></dd>
      <dd class="ddR"><strong>Special Offer：</strong><?php if(($row_goods["special"]) == "0"): ?>No<?php else: ?>Special Offer<?php endif; ?></dd>
      </li>
      <li class="clearfix">
       <dd><strong>Product Price：</strong><a  href="#" style=" font-size:13px;text-decoration:none"id="goods_price"><?php echo ($row_goods["price"]); ?></a></dd>
       <dd class="ddR"><strong>Clicks：</strong><?php echo ($row_goods["clicks"]); ?></dd>
      </li>
      
      <li class="clearfix">
      <dd><strong>Total Price：</strong><font id="GOODS_AMOUNT" class="shop"><?php echo ($row_goods["price"]); ?></font></dd>
       <dd class="ddR"><strong>Purchase Quantity：</strong><input name="number" type="text" id="number" value="1" size="4" onblur="changePrice()" style="border:1px solid #ccc; "/></dd>
      </li>

     <li class="padd loop" id="goods_attr_group">
         <?php if(!empty($goodsAttr)): ?><input name="goods_attribute" id="goods_attribute" type="hidden" value="" />
      <strong><?php echo ($goodsAttr["name"]); ?>:</strong><br />
	   <?php if(is_array($goodsAttr["collect"])): foreach($goodsAttr["collect"] as $key=>$collect): ?><label for="spec_value_237">
		<input type="radio" name="attrGroup" value="<?php echo ($collect); ?>" id="attr_value_<?php echo ($key); ?>"  /><?php echo ($collect); ?> </label><?php endforeach; endif; endif; ?>
	   </li>   
            
      <li class="padd">
      <a href="#" id="addCartButton" style=" text-decoration: none;background:red;color:#fff;display:inline;padding:5px 15px;cursor:pointer;border-radius:3px;">
     Add to Shopping Cart</a>
      <a href="#" id="addCollectButton" style=" text-decoration: none;background:#FDDA02;color:#fff;display:inline;padding:5px 15px;cursor:pointer;border-radius:3px;">Collect</a></li>
      </ul>
      </form>
     </div>
     <div class="imgInfo">
          <a href="javascript:;" >
      <img  id="goods_picture_big" src="/LifeTech_Bazaar/Uploads/<?php echo ($row_goods["picture"]); ?>" height="250px" width="230px" alt=""/>
     </a>
              <div class="blank5"></div>
     
     
		       
         <div class="blank5"></div>
         
     </div>
    
   </div>
   <div class="blank"></div>
   
   
     <div class="box">
     <div class="box_1">
      <h3 style="padding:0 5px;">
        <div id="com_b" class="history clearfix">
        <h2>Product Description：</h2>
       
                </div>
      </h3>

      <div id="com_h" style=" padding:10px"><?php echo ($row_goods["content"]); ?></div>
     </div>
     <div class="box_1">
      <h3 style="padding:0 5px;">
        <div id="com_b" class="history clearfix">
        <h2>Reviews：</h2>
         </div>
      </h3>

      <div id="com_h" style=" padding:10px">
	       <table width="100%" style="border:none;text-align:left;">
          <tbody>
          <?php if(is_array($comments)): foreach($comments as $key=>$row): ?><tr>
            <td align="left" width="130" bgcolor="#ffffff"><?php echo ($row["p_time"]); ?></td>
            <td align="left" bgcolor="#ffffff">[<?php echo ($row["member_name"]); ?>]说：</td>
           

          </tr>
          <tr>
            <td colspan="2" align="left" bgcolor="#ffffff" style="border-bottom:1px solid #f1f1f1"><?php echo ($row["content"]); ?></td>
          </tr><?php endforeach; endif; ?> 

            </tbody></table>
	  </div>
     </div>
    </div>

  <div class="blank"></div>
  
  

     
    
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


</body>
</html>
 <script>
      function $gg(id){  
        return (document.getElementById) ? document.getElementById(id): document.all[id]
      }
      
      var boxwidth=53;//跟picture的实际尺寸相符
      
      var box=$gg("demo");
      var obox=$gg("demo1");
      var dulbox=$gg("demo2");
      obox.style.width=obox.getElementsByTagName("li").length*boxwidth+'px';
      dulbox.style.width=obox.getElementsByTagName("li").length*boxwidth+'px';
      box.style.width=obox.getElementsByTagName("li").length*boxwidth*3+'px';
      var canroll = false;
      if (obox.getElementsByTagName("li").length >= 4) {
        canroll = true;
        dulbox.innerHTML=obox.innerHTML;
      }
      var step=5;temp=1;speed=50;
      var awidth=obox.offsetWidth;
      var mData=0;
      var isStop = 1;
      var dir = 1;
      
      function s(){
        if (!canroll) return;
        if (dir) {
      if((awidth+mData)>=0)
      {
      mData=mData-step;
      }
      else
      {
      mData=-step;
      }
      } else {
        if(mData>=0)
        {
        mData=-awidth;
        }
        else
        {
        mData+=step;
        }
      }
      
      obox.style.marginLeft=mData+"px";
      
      if (isStop) return;
      
      setTimeout(s,speed)
      }
      
      
      function moveLeft() {
          var wasStop = isStop;
          dir = 1;
          speed = 50;
          isStop=0;
          if (wasStop) {
            setTimeout(s,speed);
          }
      }
      
      function moveRight() {
          var wasStop = isStop;
          dir = 0;
          speed = 50;
          isStop=0;
          if (wasStop) {
            setTimeout(s,speed);
          }
      }
      
      function scrollStop() {
        isStop=1;
      }
      
      function clickLeft() {
          var wasStop = isStop;
          dir = 1;
          speed = 25;
          isStop=0;
          if (wasStop) {
            setTimeout(s,speed);
          }
      }
      
      function clickRight() {
          var wasStop = isStop;
          dir = 0;
          speed = 25;
          isStop=0;
          if (wasStop) {
            setTimeout(s,speed);
          }
      }
      </script>