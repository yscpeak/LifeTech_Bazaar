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



</head>
<body>
<form action="/LifeTech_Bazaar/admin.php/Category/edit_do" method="post" class="definewidth ">
<input name="id" type="hidden" value="<?php echo ($category["id"]); ?>">
    <table class="table table-bordered table-hover definewidth m10">
 		 <tr>
            <td width="10%" class="tableleft">Category number</td>
            <!--<td><input type="text" id="gangwei" name="gangwei"/></td>-->
			<td><input type="text" id="code" name="code" value="<?php echo ($category["code"]); ?>" /></td>

        </tr>
		 <tr>
            <td width="10%" class="tableleft">Category Name</td>
            <!--<td><input type="text" id="gangwei" name="gangwei"/></td>-->
			<td><input type="text" id="name" name="name" value="<?php echo ($category["name"]); ?>" /></td>

        </tr>
       
        <tr>
            <td class="tableleft"></td>
            <td>
                <button type="submit" class="btn btn-primary" id="sub">save</button> &nbsp;&nbsp;                <a href="/LifeTech_Bazaar/admin.php/Category/index" class="btn btn-success">Return list</a><span id="jiancha" style="color:red;"></span>
            </td>
			
			
			
			
			
			
			
        </tr>
    </table>
</form>
</body>
</html>