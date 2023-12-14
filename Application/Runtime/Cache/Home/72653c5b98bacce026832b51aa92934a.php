<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo C('SETTING.KEYWORDS');?>" />
<meta name="Description" content="<?php echo C('SETTING.DESCRIPTION');?>" />
<link rel="shortcut icon" href="/LifeTech_Bazaar/Application/Home/View/Public/images/favicon.ico" />
<link rel="icon" href="/LifeTech_Bazaar/Application/Home/View/Public/images/animated_favicon.gif" type="image/gif" />
<title><?php echo ($category_name); ?>_Product List Page_<?php echo C('SETTING.TITLE');?></title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="/LifeTech_Bazaar/Application/Home/View/Public/css/style.css"  rel="stylesheet" type="text/css" />
<link href="/LifeTech_Bazaar/Application/Home/View/Public/css/page.css"  rel="stylesheet" type="text/css" />

<link href="/LifeTech_Bazaar/Application/Home/View/Public/css/bootstrap.min.css"  rel="stylesheet" type="text/css" />

<script src="/LifeTech_Bazaar/Application/Home/View/Public/js/jquery.min.js"></script>
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
  <div id="ur_here">current location: <a href="/LifeTech_Bazaar/index.php/Home">Home</a> <?php echo ($category_father_link); ?> >> <?php echo ($category_name); ?>  </div>
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
  </div>
  
  
  <div class="AreaR">
	 
	  	  <div class="box">
		 <div class="box_1">
			<h3><span>Product screening</span></h3>
			<div class="screeBox">
			<strong style="display:inline-block;width:110px;">Special offer：</strong>
            <a href="/LifeTech_Bazaar/index.php/Home/Index/lists<?php echo ($par_special); ?>" <?php if(($_GET['special']) == ""): ?>class="curr"<?php endif; ?>>All</a>&nbsp;
            <a href="/LifeTech_Bazaar/index.php/Home/Index/lists/special/1<?php echo ($par_special); ?>" <?php if(($_GET['special']) == "1"): ?>class="curr"<?php endif; ?>>special offer</a>&nbsp;
            <a href="/LifeTech_Bazaar/index.php/Home/Index/lists/special/0<?php echo ($par_special); ?>" <?php if(($_GET['special']) == "0"): ?>class="curr"<?php endif; ?> >Non special offer</a>&nbsp;
            </div>
            
            <div class="screeBox">
            <strong style="display:inline-block;width:110px;">Recommend :</strong>
             <a href="/LifeTech_Bazaar/index.php/Home/Index/lists<?php echo ($par_recommend); ?>" <?php if(($_GET['recommend']) == ""): ?>class="curr"<?php endif; ?>>All</a>&nbsp;
                <a href="/LifeTech_Bazaar/index.php/Home/Index/lists/recommend/1<?php echo ($par_recommend); ?>" <?php if(($_GET['recommend']) == "1"): ?>class="curr"<?php endif; ?>>recommend</a>&nbsp;
                <a href="/LifeTech_Bazaar/index.php/Home/Index/lists/recommend/0<?php echo ($par_recommend); ?>"<?php if(($_GET['recommend']) == "0"): ?>class="curr"<?php endif; ?> >Non recommend</a>&nbsp;

        	</div>
            
            <div class="screeBox">
                <strong style="display:inline-block;width:110px;">Price range：</strong>
            
                       <a href="/LifeTech_Bazaar/index.php/Home/Index/lists/<?php echo ($par_price); ?>"<?php if(($_GET['price']) == ""): ?>class="curr"<?php endif; ?> >All</a>&nbsp;
              
                    <a href="/LifeTech_Bazaar/index.php/Home/Index/lists/price/0,99<?php echo ($par_price); ?>"<?php if(($_GET['price']) == "0,99"): ?>class="curr"<?php endif; ?> >0-99</a>&nbsp;
                 
                 <a href="/LifeTech_Bazaar/index.php/Home/Index/lists/price/99,299<?php echo ($par_price); ?>"<?php if(($_GET['price']) == "99,299"): ?>class="curr"<?php endif; ?> >99-299</a>&nbsp;
                 
                 <a href="/LifeTech_Bazaar/index.php/Home/Index/lists/price/299,300<?php echo ($par_price); ?>"<?php if(($_GET['price']) == "299,300"): ?>class="curr"<?php endif; ?> >299-300</a>&nbsp;
                 
       
                </div>
			
        
      		 </div>
		</div>

	<div class="blank5"></div>
    <div class="box">
 <div class="box_1">
  <h3>
  <span>Product list</span><a name='goods_list'></a>
 
  </h3>
      <form name="compareForm" action=""  method="post" onSubmit="return compareGoods(this);">
            <div class="centerPadd">
    <div class="clearfix goodsBox" style="border:none;">
            <?php if(is_array($list_goods)): foreach($list_goods as $key=>$row): ?><div class="goodsItem">
           <a href="/LifeTech_Bazaar/index.php/Home/Index/info/id/<?php echo ($row["id"]); ?>" ><img src="/LifeTech_Bazaar/Uploads/<?php echo ($row["picture"]); ?>"  alt="<?php echo ($row["title"]); ?>" class="goodsimg"></a><br>
           <p><a href="/LifeTech_Bazaar/index.php/Home/Index/info/id/<?php echo ($row["id"]); ?>"  ><?php echo ($row["title"]); ?></a></p>
                       price<font class="shop_s"><?php echo ($row["price"]); ?>$</font><br>
                                   
                
        </div><?php endforeach; endif; ?>
            </div>
    </div>
        </form>
  
 </div>
</div>
<div class="blank5"></div>
 <div  class="yahoo2"><?php echo ($pageStr); ?>  </div> 

 
  
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
</body>
</html>