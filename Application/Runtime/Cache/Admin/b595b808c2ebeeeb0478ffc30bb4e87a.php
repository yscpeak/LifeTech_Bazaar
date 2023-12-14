<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online store management backend</title>

<link rel="stylesheet" href="/LifeTech_Bazaar/Public/css/index.css" type="text/css" media="screen" />

<script type="text/javascript" src="/LifeTech_Bazaar/Public/Js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="/LifeTech_Bazaar/Public/js/tendina.min.js"></script>
<script type="text/javascript" src="/LifeTech_Bazaar/Public/js/common.js"></script>
<script>
$(function(){
	$(".one").click(function(){
	var fi=$(this).attr("one");
	$("#a").empty();
	$("#a").html(fi);
	$("#b").empty();
	//alert(fi);
	});
	$(".two").click(function(){
	var to=$(this).attr("two");
	//alert(to);
	$("#b").empty();
	$("#b").html(to);
	});

});

</script>
</head>
<body>
    <!--顶部-->
    <div class="layout_top_header">
	
            <div style="float: left"><span style="font-size: 16px;line-height: 45px;padding-left: 20px;color:#fff">Welcome<font style="color:red">&nbsp;&nbsp;<?php echo ($_SESSION['user']['name']); ?>,&nbsp;</font>login&nbsp;&nbsp;&nbsp;Online store backend management system</h1></span></div>
            <div id="ad_setting" class="ad_setting">
                <a class="ad_setting_a" href="javascript:; ">
					
                    <span><?php echo ($_SESSION['user']['role_name']); ?></span>
                    <i class="icon-chevron-down glyph-icon"></i>
                </a>
                <ul class="dropdown-menu-uu" style="display: none" id="ad_setting_ul">
                    <li class="ad_setting_ul_li"> <a href="javascript:;"><i class="icon-signout glyph-icon"></i> <a href="/LifeTech_Bazaar/admin.php/Index/logOut"><span class="font-bold">log out</span> </a> </li>
                </ul>
            </div>
    </div>
    <!--顶部结束-->
    <!--菜单-->
	    <div class="layout_left_menu">
        <ul id="menu">
			<li class="childUlLi" id="first">
                <a href=""  target="menuFrame" class="one" id="first" one="Commodity management"><span style='display:inline;padding:3px;'>   ≡  </span>  Product</a>
                <ul>
					
					<li><a href="/LifeTech_Bazaar/admin.php/Goods/index" target="menuFrame" class="two" id="sencond" two="Product list"><span style='display:inline;padding:3px;'> ➤ </span>  Product List</a></li>
					
					
					<li><a href="/LifeTech_Bazaar/admin.php/Category/index" target="menuFrame" class="two" id="sencond" two="Product category"><span style='display:inline;padding:3px;'> ➤ </span>  Product Category</a></li>
					
					
					<li><a href="/LifeTech_Bazaar/admin.php/GoodsAttr/index" target="menuFrame" class="two" id="sencond" two="Product attribute"><span style='display:inline;padding:3px;'> ➤ </span>  Attributes</a></li>
					
                </ul>
            </li>
            <li class="childUlLi" id="first">
                <a href=""  target="menuFrame" class="one" id="first" one="Member Management"><span style='display:inline;padding:3px;'>   ≡  </span>  Member </a>
                <ul>
					
					<li><a href="/LifeTech_Bazaar/admin.php/Member/index" target="menuFrame" class="two" id="sencond" two="Member list"><span style='display:inline;padding:3px;'> ➤ </span>  Member List</a></li>
					
                </ul>
            </li>
            <li class="childUlLi" id="first">
                <a href=""  target="menuFrame" class="one" id="first" one="Administrator Management"><span style='display:inline;padding:3px;'>   ≡  </span>  Administrator </a>
                <ul>
					
					<li><a href="/LifeTech_Bazaar/admin.php/User/index" target="menuFrame" class="two" id="sencond" two="Administrator list"><span style='display:inline;padding:3px;'> ➤ </span>  Administrator List</a></li>
					
                </ul>
            </li>
            <li class="childUlLi" id="first">
                <a href=""  target="menuFrame" class="one" id="first" one="order management"><span style='display:inline;padding:3px;'>   ≡  </span>  Order Management</a>
                <ul>
					
					<li><a href="/LifeTech_Bazaar/admin.php/Bill/index" target="menuFrame" class="two" id="sencond" two="order management"><span style='display:inline;padding:3px;'> ➤ </span>  Order Management</a></li>
					
                </ul>
            </li>
        </ul>
    </div>
    <!--菜单-->
    <div id="layout_right_content" class="layout_right_content">

        <div class="route_bg">
            <a href="#">HOME</a> > 
            <a href="#" id="a">Menu</a> >
            <a href="#" id="b">Menu</a>
        </div>
        <div class="mian_content">
            <div id="page_content">
                <iframe id="menuFrame" name="menuFrame" src="/LifeTech_Bazaar/admin.php/Goods/index" style="overflow:visible;"
                        scrolling="yes" frameborder="no" width="100%" height="100%"></iframe>
            </div>
        </div>
    </div>
    <div class="layout_footer">
        <p>Copyright © network platform</p>
    </div>
</body>
</html>