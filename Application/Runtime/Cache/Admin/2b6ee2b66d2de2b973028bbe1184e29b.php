<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0096)http://localhost:8080/ECShop_V2.7.3_UTF8_release1105/upload/admin/order.php?act=info&order_id=26 -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Order Management Center - Ordering User Ordering Information </title>
<meta name="robots" content="noindex, nofollow">

    <link rel="stylesheet" type="text/css" href="/LifeTech_Bazaar/Public/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/LifeTech_Bazaar/Public/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/LifeTech_Bazaar/Public/Css/style.css" />
    <link rel="stylesheet" type="text/css" href="/LifeTech_Bazaar/Public/Css/css.css" />
    <script type="text/javascript" src="/LifeTech_Bazaar/Public/Js/jquery-1.8.1.min.js"></script>
    
    <script type="text/javascript" src="/LifeTech_Bazaar/Public/Js/bootstrap.js"></script>

</head>
<body>
<form action="/LifeTech_Bazaar/admin.php/Bill/create_order" method="POST" name="theForm">
  <table width="1024" class="table table-bordered table-hover definewidth m10">
    <tbody>
  <tr>
    <td colspan="4">
      <div align="center">
       <strong><font size="3px;">User Ordering Information</font> </strong>
    </div></td>
  </tr>
  <tr>
    <td width="18%" class="tableleft"><div align="right"><strong>Order No.：</strong></div></td>
    <td width="34%"><?php echo ($row_bill["code"]); ?><input type="hidden" name="code" value="<?php echo ($row_bill["code"]); ?>" /></td>
	
    <td width="15%" class="tableleft"><div align="right"><strong>Status：</strong></div></td>
    <td>
			<?php if(($row_bill["status"] == 0) AND ($row_bill["pay_way"] != 2)): ?>obligation
			<?php elseif(($row_bill["status"] == 0) AND ($row_bill["pay_way"] == 2)): ?>
			To be shipped[cash on delivery]
            <?php elseif($row_bill["status"] == 1): ?>
            To be shipped[Paid]
			<?php elseif($row_bill["status"] == 2): ?>
		    Shipped
			  <?php elseif($row_bill["status"] == 3): ?>
            Order completed
			  <?php elseif($row_bill["status"] == 4): ?>
			  Refund application in progress...
			  <?php elseif($row_bill["status"] == 5): ?>
			  Successfully received refund！
			  <?php elseif($row_bill["status"] == 6): ?>
			  Refund failed<?php endif; ?>
	
	</td>
  </tr>
  <tr>
    <td class="tableleft"><div align="right"><strong>Buyer：</strong></div></td>
    <td><?php echo ($row_bill["mem_name"]); ?> </td>
    <td class="tableleft"><div align="right"><strong>Order time：</strong></div></td>
    <td><?php echo ($row_bill["datetime"]); ?></td>
  </tr>
  <tr>
    <td class="tableleft"><div align="right"><strong>Payment method：</strong></div></td>
    <td>
	<?php if(($row_bill["pay_way"] == 0)): ?>Balance payment
	<?php elseif(($row_bill["pay_way"] == 1)): ?>Bank remittance/transfer
	<?php else: ?>
	cash on delivery<?php endif; ?>
	</td>
    <td class="tableleft"><div align="right"><strong>Payment time：</strong></div></td>
    <td><?php echo ($list["datetime"]); ?></td>
  </tr>

  <tr>
   <td colspan="4">
      <div align="center">
       <strong><font size="3px;">consignee</font> </strong>
    </div></td>
    </tr>
  <tr>
    <td class="tableleft"><div align="right"><strong>consignee：</strong></div></td>
    <td><?php echo ($row_bill["mem_name"]); ?></td>
    <td class="tableleft"><div align="right"><strong>zip code：</strong></div></td>
    <td><?php echo ($row_bill["zipcode"]); ?></td>
  </tr>
  <tr>
  <td class="tableleft"><div align="right"><strong>city</strong></div></td>
    <td><?php echo ($row_bill["city"]); ?></td>
    <td class="tableleft"><div align="right"><strong>address：</strong></div></td>
    <td><?php echo ($row_bill["address"]); ?></td>
    
  </tr>
  <tr>
    <td class="tableleft"><div align="right"><strong>phone：</strong></div></td>
    <td><?php echo ($row_bill["tel"]); ?></td>
    <td class="tableleft"><div align="right"><strong>mobile phone：</strong></div></td>
    <td><?php echo ($row_bill["phone"]); ?></td>
  </tr>

</tbody></table>


<div class="list-div" style="margin-bottom: 5px">
    <table width="1024" class="table table-bordered table-hover definewidth m10">
  <tbody><tr>
    <td colspan="8">
      <div align="center">
       <strong><font size="3px;">commodity information</font> </strong>
    </div>
	</td>
    </tr>
  <tr>
    <th scope="col"><div align="center"><strong>Product Name [ brand ]</strong></div></th>
    <th scope="col"><div align="center"><strong>Product number</strong></div></th>
    <th scope="col"><div align="center"><strong>price</strong></div></th>
    <th scope="col"><div align="center"><strong>number</strong></div></th>
    <th scope="col"><div align="center"><strong>attribute</strong></div></th>
    <th scope="col"><div align="center"><strong>subtotal</strong></div></th>
  </tr>
  
  <?php if(is_array($list_cost_detail)): foreach($list_cost_detail as $key=>$rows): ?><tr>
    <td ><a href="/LifeTech_Bazaar/index.php/Home/Index/info/id/<?php echo ($rows["goods_id"]); ?>" target="_blank"><?php echo ($rows["title"]); ?></a></td>
    <td><?php echo ($rows["item_no"]); ?></td>
    <td><div align="right"><?php echo ($rows["price"]); ?> $</div></td>
    <td><div align="right"><?php echo ($rows["count"]); ?>    </div></td>
    <td><div align="right"><?php echo ($rows["attribute"]); ?>    </div></td>
    <td><div align="right"><?php echo ($rows["total"]); ?> $</div></td>
  </tr><?php endforeach; endif; ?>
  

</tbody></table>
</div>

<div class="list-div" style="margin-bottom: 5px">
<table width="100%" cellpadding="3" cellspacing="1">
  <tbody><tr>
   
  </tr>

 <tr>
    <td><div align="right"> = Accounts payable money：<strong><?php echo ($row_bill["money_reality"]); ?>$</strong>
      </div></td>
  </tr>
</tbody></table>
</div>
<div style="text-align:right"><a  class="btn btn-success"  href="/LifeTech_Bazaar/admin.php/Bill/index">Return list</a></div>

</form>


</body></html>