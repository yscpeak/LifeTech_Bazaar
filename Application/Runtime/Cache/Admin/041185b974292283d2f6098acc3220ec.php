<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><HTML 
xmlns="http://www.w3.org/1999/xhtml"><HEAD><META content="IE=11.0000" 
http-equiv="X-UA-Compatible">
 
<META http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<TITLE>login</TITLE> 
<SCRIPT src="/LifeTech_Bazaar/Public/js/jquery-1.9.1.min.js" type="text/javascript"></SCRIPT>
 
<STYLE>
body{
	
	font-family: "Helvetica Neue","Hiragino Sans GB","Microsoft YaHei","\9ED1\4F53",Arial,sans-serif;
	color: #222;
	font-size: 12px;
	background:#004A96;
}
*{padding: 0px;margin: 0px;}
.top_div{
	
	width: 100%;
	height: 400px;
}
.ipt{
	border: 1px solid #d3d3d3;
	padding: 10px 10px;
	width: 290px;
	border-radius: 4px;
	padding-left: 35px;
	-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
	-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s
}
.ipt:focus{
	border-color: #66afe9;
	outline: 0;
	-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
	box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)
}
.u_logo{
	
	padding: 10px 10px;
	position: absolute;
	top: 63px;
	left: 40px;

}
.p_logo{

	padding: 10px 10px;
	position: absolute;
	top: 12px;
	left: 40px;
}
a{
	text-decoration: none;
}

.initial_left_hand{
	background: url("/LifeTech_Bazaar/Public/images/hand.png") no-repeat;
	width: 30px;
	height: 20px;
	position: absolute;
	top: -12px;
	left: 100px;
}
.initial_right_hand{
	background: url("/LifeTech_Bazaar/Public/images/hand.png") no-repeat;
	width: 30px;
	height: 20px;
	position: absolute;
	top: -12px;
	right: -112px;
}
.left_handing{
	background: url("/LifeTech_Bazaar/Public/images/left-handing.png") no-repeat;
	width: 30px;
	height: 20px;
	position: absolute;
	top: -24px;
	left: 139px;
}
.right_handinging{
	background: url("/LifeTech_Bazaar/Public/images/right_handing.png") no-repeat;
	width: 30px;
	height: 20px;
	position: absolute;
	top: -21px;
	left: 210px;
}
</STYLE>
     
<SCRIPT type="text/javascript">
$(function(){
	//得到焦点
	$("#password").focus(function(){
		$("#left_hand").animate({
			left: "150",
			top: " -38"
		},{step: function(){
			if(parseInt($("#left_hand").css("left"))>140){
				$("#left_hand").attr("class","left_hand");
			}
		}}, 2000);
		$("#right_hand").animate({
			right: "-64",
			top: "-38px"
		},{step: function(){
			if(parseInt($("#right_hand").css("right"))> -70){
				$("#right_hand").attr("class","right_hand");
			}
		}}, 2000);
	});
	//失去焦点
	$("#password").blur(function(){
		$("#left_hand").attr("class","initial_left_hand");
		$("#left_hand").attr("style","left:100px;top:-12px;");
		$("#right_hand").attr("class","initial_right_hand");
		$("#right_hand").attr("style","right:-112px;top:-12px");
	});
	
	$("#btlogin").click(function(){
	
		var name=$("#name").val();
		var password=$("#password").val();
		$.get("/LifeTech_Bazaar/admin.php/Index/verification",{name:name,password:password},function(data){

		      if(data=="success"){
			    location.href="/LifeTech_Bazaar/admin.php/Index/index";
			  }else{
				$("#span").text("User name or password error");
				$("#password").val("");
			  }
		});
	});
	$("body").keydown(function(){
	if(event.keyCode=="13"){
		$("#btlogin").click();
	}
	});
});
</SCRIPT>
 
<META name="GENERATOR" content="MSHTML 11.00.9600.17496"></HEAD> 
<BODY>


<DIV style="background: rgb(255, 255, 255); margin: 100px auto; border: 2px solid #004A96; border-radius:15px; width: 550px; height: 200px; text-align: center;">
<DIV style="width: 550px; height: 46px; position: absolute;">
<DIV class="tou" style="color:#004A96;font-size:18px">Welcome to loginSeller Central</DIV>

</DIV>
<P style="padding: 50px 0px 10px; position: relative;"><SPAN 
class="u_logo"></SPAN>         <INPUT class="ipt" type="text" name="name" id="name" placeholder="

Please enter the user name or email address" value=""> 
    </P>
<P style="position: relative;"><SPAN class="p_logo"></SPAN>         
<INPUT class="ipt" id="password" type="password" name="password" placeholder="Please enter password" value="">  
  </P>
  <span id="span"  style="margin-left:-240px;margin-top:10px; color:red;"></span>
<DIV style="height: 50px; line-height: 50px; margin-top: 5px; border-top-color: rgb(231, 231, 231); border-top-width: 1px; border-top-style: solid;">
<!--<P style="margin: 0px 35px 20px 45px;"><SPAN style="float: left;"><A style="color: rgb(204, 204, 204);" 
href="#">忘记password?</A></SPAN> 
           <SPAN style="float: right;"><A style="color: rgb(204, 204, 204); margin-right: 10px;" 
href="#">register</A> --> 
              <A style="background: #004A96; padding: 7px 58px; margin: 0px 35px 20px 45px; border-radius: 4px;  border-image: none; color: rgb(255, 255, 255); font-weight: bold;" 
href="#" id="btlogin">login</A> 
           </SPAN></P></DIV></DIV>
		   </BODY></HTML>