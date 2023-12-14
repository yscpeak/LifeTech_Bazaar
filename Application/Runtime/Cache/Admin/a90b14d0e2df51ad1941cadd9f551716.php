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

	<script>
		$(function(){
			$("#view_way").change(function(){
				location.href='/LifeTech_Bazaar/admin.php/Member/'+$(this).val()+"/member_id/"+$("#member_id").val();
			});
		});
	</script>
</head>
<body style="width:95%">
<form class="form-inline definewidth " action="/LifeTech_Bazaar/admin.php/Member/index" method="post">
	<input type="hidden" name="member_id" id="member_id" value="<?php echo ($_GET['member_id']); ?>"/>
    The current member：<?php echo M("member")->where("id=".$_GET['member_id'])->getField("name"); ?>
   &nbsp;&nbsp;  
   <select name="view_way" id="view_way">
    <option value="mem_bill" selected>View order</option>
    <option value="mem_balance">View  details</option>
    <option value="mem_address">viewDelivery address</option>
    <option value="mem_refund">View order return</option>       
	</select>
            &nbsp;&nbsp; 
    <a  class="btn btn-success"  href="/LifeTech_Bazaar/admin.php/Member/index">Return list</a>
</form>
<table id="table" class="table table-bordered table-hover definewidth m10" >

    <tr>
        <th>Order No.</th>
   		<th>purchaser</th>
        <th>Delivery address</th>
	
        <th>Actually paid money</th>
		<th>Order time</th>
        <th>Status</th>
		<th>operate</th>
    </tr>
 
	<?php if(is_array($list)): foreach($list as $key=>$row): ?><tr>
	
    <td><?php echo ($row["code"]); ?></td>
    <td><?php echo ($row["mem_name"]); ?></td>
    <td><?php echo ($row["address"]); ?></td>

    <td><?php echo ($row["money_reality"]); ?>$</td>
        <td ><?php echo ($row["datetime"]); ?></td>
    <td>
      
		    
    <?php if(($row["status"] == 0) AND ($row["pay_way"] != 2)): ?>obligation
    <?php elseif(($row["status"] == 0) AND ($row["pay_way"] == 2)): ?>
    To be shipped[cash on delivery]
    <?php elseif($row["status"] == 1): ?>
    To be shipped[Paid]
    <?php elseif($row["status"] == 2): ?>
    Shipped
      <?php elseif($row["status"] == 3): ?>
    Order completed
      <?php elseif($row["status"] == 4): ?>
      Return request in progress...
      <?php elseif($row["status"] == 5): ?>
      Return successful！
      <?php elseif($row["status"] == 6): ?>
      Return failed<?php endif; ?>

	
	<!--已确认,Paid,未发货-->
	
	
	
	
	</td>
    <td align="center" valign="top" nowrap="nowrap" style="background-color: rgb(255, 255, 255);">
     <a href="info/id/<?php echo ($row["id"]); ?>">view</a>
     	<?php if((($row["status"] == 0) AND ($row["pay_way"] == 2)) or $row["status"] == 1): ?><a href="#" id="send_<?php echo ($key); ?>" value="<?php echo ($row["id"]); ?>" >Confirm shipment</a><?php endif; ?>
         </td>
  </tr><?php endforeach; endif; ?>
</table>
<div style="float:right;" id="page" class="yahoo2"><?php echo ($pagestr); ?></div>
<!-- 分页 -->
<table id="page-table" cellspacing="0">
  <tbody></tbody></table>

  </div>

</form>
 <div style="margin-left:400px; width:1200px;" class="digg"><?php echo ($page); ?></div>


<br/>
<br/><br/>

</body>
  
  </html>

<script>
    $(function () {
        



    });


</script>