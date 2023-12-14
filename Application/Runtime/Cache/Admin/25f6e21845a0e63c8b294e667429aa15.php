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

</head>
<body >

<table id="table" class="table table-bordered table-hover definewidth m10" >
 
    <tr>
        <th>number</th>
        <th>time</th>
        <th>buyer</th>
        <th>comment</th>
    </tr>

	<?php if(is_array($list)): foreach($list as $key=>$row): ?><tr>
            <td width="30"><?php echo ($row["id"]); ?></td>           
            <td width="220"><?php echo ($row["p_time"]); ?></td>
			<td width="220"><?php echo ($row["member_name"]); ?></td>
            <td><?php echo ($row["content"]); ?></td>
        </tr><?php endforeach; endif; ?>
		</table>
		<div   class="yahoo2"><?php echo ($pageStr); ?></div>
			<br>
		</body>
		</html>