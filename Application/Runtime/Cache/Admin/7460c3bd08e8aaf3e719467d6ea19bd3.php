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
			$(".Delete").click(function(){
				var id=$(this).index();
				if(confirm("Are you sure you want to delete it？"))
				{		
					$.get("/LifeTech_Bazaar/admin.php/Goods/Delete",{id:$(this).attr("id")},function(data){
						if (data=="error") {
							alert("Community information is referenced and cannot be deleted!");
							return;
						}else{
							window.location.href="/LifeTech_Bazaar/admin.php/Goods/index";
						}
					});
					//$(this).parent().parent().empty();		
				}

			});
			$('#addnew').click(function(){
				window.location.href="/LifeTech_Bazaar/admin.php/Goods/add";
	 		});
			
		});
	</script>
</head>
<body >

<form class="form-inline definewidth " action="/LifeTech_Bazaar/admin.php/Goods/index" method="post">  
    Product Name：
    <input type="text" name="title"  class="abc input-default"  value="<?php echo ($_POST['title']); ?>">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">search</button>&nbsp;&nbsp; 
    <a  class="btn btn-success"  href="/LifeTech_Bazaar/admin.php/Goods/add">New products added</a>
</form>
<table id="table" class="table table-bordered table-hover definewidth m10" >
 
    <tr>
        <th>number</th>
        <th>picture</th>
        <th>Product Name</th>
        <th>Product number</th>
        <th>price</th>
        <th>special offer</th>
        <th>recommend</th>
        <th>state</th>
		<th>operate</th>
    </tr>

	<?php if(is_array($list)): foreach($list as $key=>$row): ?><tr>
            <td><?php echo ($row["id"]); ?></td>
            <td><img src='/LifeTech_Bazaar/Uploads/<?php echo ($row["picture"]); ?>' style="height:60px"/></td>
            <td><?php echo ($row["title"]); ?></td>
			<td><?php echo ($row["item_no"]); ?></td>
            <td><?php echo ($row["price"]); ?></td>
            <td><?php if(($row["special"]) == "0"): ?>ordinary<?php else: ?><span style="color: #093">special offer</span><?php endif; ?></td>
            <td><?php if(($row["recommend"]) == "0"): ?>Unrecommended<?php else: ?><span style="color: #093">recommend</span><?php endif; ?></td>
            <td><?php if(($row["status"]) == "0"): ?>ordinary<?php else: ?><span style="color: #ff0000">To be online</span><?php endif; ?></td>
            <td>
                <a  href="/LifeTech_Bazaar/admin.php/Goods/pinglun/id/<?php echo ($row["id"]); ?>">comment</a>
                <a  href="/LifeTech_Bazaar/admin.php/Goods/edit/id/<?php echo ($row["id"]); ?>">edit</a>
                <a  class="Delete" href="#" id="<?php echo ($row["id"]); ?>">Delete</a>
            </td>	
        </tr><?php endforeach; endif; ?>
		</table>
		<div   class="yahoo2"><?php echo ($pageStr); ?></div>
			<br>
		</body>
		</html>