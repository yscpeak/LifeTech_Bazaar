<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/LifeTech_Bazaar/Public/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/LifeTech_Bazaar/Public/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/LifeTech_Bazaar/Public/Css/style.css" />
    <script type="text/javascript" src="/LifeTech_Bazaar/Public/Js/jquery-1.8.2.min.js"></script>
    
    <script type="text/javascript" src="/LifeTech_Bazaar/Public/Js/bootstrap.js"></script>

	<script>
		$(function(){
			$("#sub").click(function(){
				var name=$("#name").val();
				if(name==""){
					$("#jiancha").html("Position cannot be empty");
					return false;
				}
			});
			$("#name").keyup(function(){
				var name=$("#name").val();
				$.get("/LifeTech_Bazaar/admin.php/Category/checkeduser",{name:name},function(data){
					if(data=="success"){
						$("#checked").html("The position has a duplicate name");
						$("#sub").attr("disabled",true);
					}else{
						$("#checked").html("");
						$("#sub").attr("disabled",false);
					}
				});

			});
		

		});
	</script>
    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
    <script>
		$(function(){

			$("#name").keyup(function(){
				var name=$("#name").val();
				$.get("/LifeTech_Bazaar/admin.php/Category/checkedName",{name:name},function(data){
					if(data=="success"){
						$("#checked").html("Category already exists");
						$("#sub").attr("disabled",true);
					}else if(data=="error"){
						$("#checked").html("");
						$("#sub").attr("disabled",false);
					}
				});

			});
			

		});
	</script>
</head>
<body>
<form action="/LifeTech_Bazaar/admin.php/Category/addChild_do" method="post" class="definewidth ">
<input name="father_code" type="hidden" value="<?php echo ($_GET['code']); ?>">
    <table class="table table-bordered table-hover definewidth m10">
		<tr>
		     <td width="10%" class="tableleft">Parent category</td>
			 <td><?php echo ($category_name); ?>&nbsp[<?php echo ($_GET['code']); ?>]
          </td>
			
			
        </tr>
		<tr>
		
			<td width="10%" class="tableleft">subcategory number</td>
            <td><input type="text" id="code" name="code" maxlength="2"/><span id="checked" style="color:red;">Enter a 2-digit number</span></td>
           
			
        </tr>
        		<tr>
		
            <td width="10%" class="tableleft">subcategory Name</td>
            <td><input type="text" id="name" name="name"/><span id="checked" style="color:red;"></span></td>
			
        </tr>
        <tr>
            <td class="tableleft"></td>
            <td>
                <button type="submit" class="btn btn-primary" id="sub">save</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">Return list</button><span id="jiancha" style="color:red;"></span>
            </td>	
        </tr>
    </table>
</body>
</html>
<script>
    $(function () {


		$('#backid').click(function(){
				window.location.href="index.html";
		 });
    });
</script>