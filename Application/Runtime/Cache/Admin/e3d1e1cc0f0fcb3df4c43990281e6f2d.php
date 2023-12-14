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
	<script>
	$(function(){
		$("#view_way").change(function(){
			location.href='/LifeTech_Bazaar/admin.php/Member/'+$(this).val()+"/member_id/"+$("#member_id").val();
		});
	});
	</script>
</head>
<body >
<form class="form-inline definewidth " action="/LifeTech_Bazaar/admin.php/Member/index" method="post">
	<input type="hidden" name="member_id" id="member_id" value="<?php echo ($_GET['member_id']); ?>"/>
    The current member：<?php echo M("member")->where("id=".$_GET['member_id'])->getField("name"); ?>
   &nbsp;&nbsp;  
   <select name="view_way" id="view_way">
    <option value="mem_bill">View order</option>
    <option value="mem_balance" selected>View  details</option>
    <option value="mem_address">viewDelivery address</option>
    <option value="mem_refund">View order return</option>       
	</select>
            &nbsp;&nbsp; 
    <a  class="btn btn-success"  href="/LifeTech_Bazaar/admin.php/Member/index">Return list</a>
</form>
<table  class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>

        <th>Operate date</th>
        <th>types</th>
        <th>notes</th>
		<th>money</th>
		
		
    </tr>
    </thead>
	<?php if(is_array($list)): foreach($list as $key=>$row): ?><tr>		 
            <td><?php echo ($row["datetime"]); ?></td>
			<td>
            <?php if($row["type"] == 1): ?>Withdrawal
			<?php else: ?>Recharge<?php endif; ?></td>
            <td><?php echo ($row["memo"]); ?></td>
			<td><?php echo ($row["money"]); ?></td>
		 </tr><?php endforeach; endif; ?>
			
       </table>		<div   class="yahoo2"><?php echo ($pageStr); ?></div>
		</body>
		</html>