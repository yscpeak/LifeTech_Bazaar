<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/LifeTech_Bazaar/Public/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/LifeTech_Bazaar/Public/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/LifeTech_Bazaar/Public/Css/style.css" />
	<link rel="stylesheet" type="text/css" href="/LifeTech_Bazaar/Public/Css/css.css" />
    <script type="text/javascript" src="/LifeTech_Bazaar/Public/Js/jquery-1.8.1.min.js"></script>
    
    <script type="text/javascript" src="/LifeTech_Bazaar/Public/Js/bootstrap.js"></script>

	<link href="/LifeTech_Bazaar/Public/Css/css.css" rel="stylesheet" type="text/css">
	
</head>
<body >
<form class="form-inline definewidth " action="/LifeTech_Bazaar/admin.php/Member/index" method="post">  
    member name：
    <input type="text" name="name" id="name"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">search</button>&nbsp;&nbsp;
</form>
<table  class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th>number</th>
        <th>member name</th>
        <th>Email address</th>
        <th>Available Funds</th>
		<th>Register date</th>
		<th>operate</th>
    </tr>
    </thead>
	<?php if(is_array($list)): foreach($list as $key=>$row): ?><tr>
		 
            <td><?php echo ($row["id"]); ?></td>
           
            <td><?php echo ($row["name"]); ?></td>
            <td><?php echo ($row["email"]); ?></td>
			<td><?php echo ($row["money"]); ?></td>
            <td><?php echo ($row["reg_time"]); ?></td>
            <td>
				  <a href="/LifeTech_Bazaar/admin.php/Member/mem_bill/member_id/<?php echo ($row["id"]); ?>" title="View order">Detail</a>
            </td><?php endforeach; endif; ?>
        </tr></table>
			<div   class="yahoo2"><?php echo ($pageStr); ?></div>
		</body>
		</html>