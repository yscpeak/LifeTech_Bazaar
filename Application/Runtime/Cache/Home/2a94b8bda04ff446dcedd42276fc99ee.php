<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo C('SETTING.KEYWORDS');?>" />
<meta name="Description" content="<?php echo C('SETTING.DESCRIPTION');?>" />
<title><?php echo C('SETTING.TITLE');?>_<?php echo C('SETTING.KEYWORDS');?></title>
<link rel="shortcut icon" href="/LifeTech_Bazaar/Application/Home/View/Public/images/favicon.ico" />
<link rel="icon" href="/LifeTech_Bazaar/Application/Home/View/Public/images/animated_favicon.gif" type="image/gif" />
<link href="/LifeTech_Bazaar/Application/Home/View/Public/css/style.css"  rel="stylesheet" type="text/css" />
<link href="/LifeTech_Bazaar/Application/Home/View/Public/css/bootstrap.min.css"  rel="stylesheet" type="text/css" />
<script src="/LifeTech_Bazaar/Application/Home/View/Public/js/jquery-2.1.4.min.js"></script>
<script>
	$(function(){
		$("div[id^='itemCategory_'] h2").click(function(){
			value=$(this).attr("value");
			var content="#show_goods_"+value.substr(0,2);
			$(this).parent().find("h2").addClass("h2bg");
			$(this).removeClass();
			
			$.get("/LifeTech_Bazaar/index.php/Home/Index/getGoodsByCategory/code/"+$(this).attr("value"),function(data){		
				$(content).html(data);
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
<div class="block clearfix">
  <div class="box">
<div style="padding: 0;width:1140px;height:340px;" class="container">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>

				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="/LifeTech_Bazaar/Application/Home/View/Public/images/banner1.jpg">
					</div>
					<div class="item">
						<img src="/LifeTech_Bazaar/Application/Home/View/Public/images/banner2.jpg">
					</div>
					<div class="item">
						<img src="/LifeTech_Bazaar/Application/Home/View/Public/images/banner3.jpg">
					</div>
				</div>
			</div>
		</div>
 <script src="/LifeTech_Bazaar/Application/Home/View/Public/js/bootstrap.min.js" type="text/javascript"></script> 
</div><div class="blank5"></div>
  
  <div class="AreaL">
    <!--  -->
  
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
    
  </div>
  
  <div class="AreaR">
   
  
   
   

<div class="box">
<div class="box_2 centerPadd">
  <div class="itemTit" id="itemBest">Recommending Commodities</div>
  
  <div id="show_best_area" class="clearfix goodsBox">
     <?php if(is_array($list_goods_tuijian)): foreach($list_goods_tuijian as $key=>$row_tuijian): ?><div class="goodsItem">
         <span class="best"></span>
           <a href="/LifeTech_Bazaar/index.php/Home/Index/info/id/<?php echo ($row_tuijian["id"]); ?>" ><img src="/LifeTech_Bazaar/Uploads/<?php echo ($row_tuijian["picture"]); ?>"  class="goodsimg" /></a><br />
           <p><a href="goods_info.htm"  title="KD876"><?php echo ($row_tuijian["title"]); ?></a></p>
           <font class="f1"><?php echo ($row_tuijian["price"]); ?>$</font>
        </div><?php endforeach; endif; ?>
    <div class="more"><a href="/LifeTech_Bazaar/index.php/Home/Index/lists/recommend/1" >More</a></div>
    </div>
</div>
</div>
<div class="blank5"></div>
 <?php if(is_array($list_category_goods)): foreach($list_category_goods as $key=>$row_category): ?><div class="box">

        <div class="box_2 centerPadd">    
          <div class="itemTit  itemTit2" id="itemCategory_<?php echo ($row_category["id"]); ?>">
          <span class="myTitle"><a href="#"  class="f6"><?php echo ($row_category["name"]); ?></a></span>
            <h2  class="" value="<?php echo ($row_category["code"]); ?>"><a href="javascript:void(0)" >All Product</a></h2>
           
             <?php if(is_array($row_category["son"])): foreach($row_category["son"] as $key=>$son_category): ?><h2 class="h2bg" value="<?php echo ($son_category["code"]); ?>"><a href="javascript:void(0)" ><?php echo ($son_category["name"]); ?></a></h2><?php endforeach; endif; ?>
          </div>
          <!-- 商品显示区域 -->
          <div id="show_goods_<?php echo ($row_category["code"]); ?>" class="clearfix goodsBox">
          
             <?php if(is_array($row_category["goods"])): foreach($row_category["goods"] as $key=>$goods): ?><div class="goodsItem">
                	<?php if(($goods["recommend"]) > "0"): ?><span class="best"></span><?php endif; ?>
                   <a href="/LifeTech_Bazaar/index.php/Home/Index/info/id/<?php echo ($goods["id"]); ?>" ><img src="/LifeTech_Bazaar/Uploads/<?php echo ($goods["picture"]); ?>"  alt="" class="goodsimg" /></a><br /><p><a href="/LifeTech_Bazaar/index.php/Home/Index/info/id/<?php echo ($goods["id"]); ?>"  title="<?php echo ($goods["title"]); ?>"><?php echo ($goods["title"]); ?></a></p>
                   <font class="f1"><?php echo ($goods["price"]); ?>$</font>
                   
                </div><?php endforeach; endif; ?>
            <div class="more"><a href="/LifeTech_Bazaar/index.php/Home/Index/lists/category_code/<?php echo ($row_category["code"]); ?>" ><img src="/LifeTech_Bazaar/Application/Home/View/Public/images/more.gif"  /></a></div>
            </div>
        </div>
        

</div>
<div class="blank5"></div><?php endforeach; endif; ?>

  

  
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