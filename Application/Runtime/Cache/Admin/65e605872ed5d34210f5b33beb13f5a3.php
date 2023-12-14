<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/LifeTech_Bazaar/Public/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/LifeTech_Bazaar/Public/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/LifeTech_Bazaar/Public/Css/style.css" />
    <script type="text/javascript" src="/LifeTech_Bazaar/Public/Js/jquery-1.8.1.min.js"></script>
    
    <script type="text/javascript" src="/LifeTech_Bazaar/Public/Js/bootstrap.js"></script>

	<script>
		$(function(){
			$(".Delete").click(function(){
				var a=$(this).attr("adminuserid");
				$.get("/LifeTech_Bazaar/admin.php/User/Delete",{id:a},function(data){
					if(data=="success"){				
					}
				});
				$(this).parent().parent().empty();
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
<body > 
<form class="form-inline definewidth " action="index.html" method="get">  
    user name：
    <input type="text" name="username" id="username"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">search</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">add user</button>
</form>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th>userid</th>
        <th>user name</th>
        <th>operate</th>
    </tr>
    </thead>
	<?php if(is_array($list)): foreach($list as $key=>$row): ?><tr>
		 
            <td><?php echo ($row["id"]); ?></td>
            <td><?php echo ($row["username"]); ?></td>
           
            <td>
				   <a  href="/LifeTech_Bazaar/admin.php/User/edit/id/<?php echo ($row["id"]); ?>">edit</a>
                  <a  class="Delete" href="#" adminuserid="<?php echo ($row["id"]); ?>">Delete</a>
            </td><?php endforeach; endif; ?>
        </tr></table>
		</body>
		</html>

<script>
    $(function () {
        
		$('#addnew').click(function(){

				window.location.href="add.html";
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