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
					$.get("/LifeTech_Bazaar/admin.php/Category/Delete",{id:$(this).attr("id")});
					$(this).parent().parent().empty();		
				}
			});
			
			$("#rolename").keyup(function(){
			   var roleName=$(this).val();
			   $.getJSON("/LifeTech_Bazaar/admin.php/Category/find",{name:roleName},function(data){
			        $("table tr:gt(0)").remove();
			        $.each(data,function(index,info){
				     var test="<tr><td>"+info['id']+"</td><td>"+info['code']+"</td><td>"+info['name']+"</td><td><a href='/LifeTech_Bazaar/admin.php/Category/edit/id/"+info['id']+"'>edit</a>  <a class='Delete' href='#'adminuserid='"+info['id']+"' >Delete</a></td></tr>";
					  $("table").append(test);
				   });
				  
			   });
			});

		});
	</script>
    
</head>
<body style="">
<form class="form-inline definewidth " action="/LifeTech_Bazaar/admin.php/Category/index" method="post">  
    Category Name：
    <input type="text" name="name" id="name"class="abc input-default"  value="<?php echo ($_POST['name']); ?>">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">search</button>&nbsp
    <a href="/LifeTech_Bazaar/admin.php/Category/add" class="btn btn-success">Add major categories</a>
</form>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th>category id</th>
        <th>Category Name</th>
        <th>operate</th>
    </tr>
    </thead>
	<?php if(is_array($list)): foreach($list as $key=>$row): ?><tr>
		 
            <td><?php echo ($row["id"]); ?></td>

            <td><?php if((strlen($row["code"])) == "4"): ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo ($row["name"]); ?>&nbsp[<?php echo ($row["code"]); ?>]<?php else: ?><span style="font-weight:bold"><?php echo ($row["name"]); ?>&nbsp[<?php echo ($row["code"]); ?>]</span><?php endif; ?></td>
            <td>
              <a  href="/LifeTech_Bazaar/admin.php/Category/edit/id/<?php echo ($row["id"]); ?>">edit</a>
              <a  class="Delete" href="#" id="<?php echo ($row["id"]); ?>">Delete</a>
              <?php if((strlen($row["code"])) == "2"): ?><a  href="/LifeTech_Bazaar/admin.php/Category/addChild/code/<?php echo ($row["code"]); ?>">Add subcategories</a><?php endif; ?>
            </td>
			
        </tr><?php endforeach; endif; ?>
</table>
<div style="float:right;" id="page" class="yahoo2"><?php echo ($page); ?></div>

		</body>
		</html>