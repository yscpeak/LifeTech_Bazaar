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
		$("#checkbox").toggle(function(){
			$("input:checkbox").attr("checked",true);
			$("#quanxuan").html("deselect all");
		},function(){
			$("input:checkbox").attr("checked",false);
			$("#quanxuan").html("Select All");
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
</head>
<body>
<form action="/LifeTech_Bazaar/admin.php/User/edit_do" method="post" class="definewidth ">
    <table class="table table-bordered table-hover definewidth m10">
 
		 <tr>
            <td width="10%" class="tableleft">user name</td>
            <!--<td><input type="text" id="gangwei" name="gangwei"/></td>-->
			<td><input type="text" id="name" name="name" value="<?php echo ($list["name"]); ?>" /></td>
			<input type="hidden" value="<?php echo ($list["id"]); ?>"  name="id"/>
        </tr>
		<tr>
            <td width="10%" class="tableleft">password</td>

			<td><input type="text" id="password" name="password" value="<?php echo ($list["password"]); ?>" /></td>

        </tr>
            <td class="tableleft"></td>
            <td>
                <button type="submit" class="btn btn-primary" id="sub">save</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">Return list</button><span id="jiancha" style="color:red;"></span>
            </td>
			
			
			
			
			
			
			
        </tr>
    </table>
</form>
</body>
</html>
<script>
    $(function () {


		$('#backid').click(function(){
				window.history.back();
		 });
    });
</script>