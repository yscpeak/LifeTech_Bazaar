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
				if(confirm("Are you sure you want to delete it？"))
				{		
					$.get("/LifeTech_Bazaar/admin.php/GoodsAttr/Delete",{id:$(this).attr("id")});
					$(this).parent().parent().empty();		
				}
			});
			


		});
	</script>

</head>
<body >
<form class="form-inline definewidth " action="/LifeTech_Bazaar/admin.php/GoodsAttr/index" method="post">  
    Specifications Name:
    <input type="text" name="norms" id="norms"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">search</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">Add specifications</button>&nbsp;&nbsp; 
</form>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th>specificationsID</th>
        <th>specifications name</th>
		<th>specifications content</th>
        <th>operate</th>
    </tr>
    </thead>
	<?php if(is_array($list)): foreach($list as $key=>$row): ?><tr>
		 
            <td><?php echo ($row["id"]); ?></td>
            <td><?php echo ($row["norms"]); ?></td>
			<td><?php echo ($row["content"]); ?></td>
            <td>
                  <a  href="/LifeTech_Bazaar/admin.php/GoodsAttr/edit/id/<?php echo ($row["id"]); ?>">edit</a>
                  <a  class="Delete" href="#" id="<?php echo ($row["id"]); ?>">Delete</a>
            </td>
			
        </tr><?php endforeach; endif; ?>
</table>
<div style="float:right;" id="page" class="yahoo2"><?php echo ($show); ?></div>

		</body>
		</html>

<script>
    $(function () {
        
		$('#addnew').click(function(){

				window.location.href="/LifeTech_Bazaar/admin.php/GoodsAttr/add";
		 });


    });

	function del(id)
	{
		
		
		if(confirm("Are you sure you want to delete it？"))
		{
		
			var url = "index.html";
			
			window.location.href=url;		
		
		}
	
	
	
	
	}
</script>