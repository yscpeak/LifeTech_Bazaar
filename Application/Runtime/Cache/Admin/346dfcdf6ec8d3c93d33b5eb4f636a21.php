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
    <script type="text/javascript" charset="utf-8" src="/LifeTech_Bazaar/Public/kindEdtior/kindeditor.js"></script>
    <script type="text/javascript">
    KE.show({
        id : 'content' 
   });

</script>
	<script>
		$(function(){
			$("#sub").click(function(){
				if($("#title").val()==""){
					alert("Product Name cannot be empty");
					$("#title").focus();
					return false;
				}else if($("#category_code").val()==""){
					alert("Product Category Required");
					$("#category_code_father").focus();
					return false;
				}else if($("#price").val()==""){
					alert("Price cannot be empty");
					$("#price").focus();
					return false;
				}else if($("#item_no").val()==""){
					alert("Product number cannot be empty");
					$("#item_no").focus();
					return false;
				}
			});

			$("#category_code_father").change(function(){	
				var value = $(this).val();
				$.get("/LifeTech_Bazaar/admin.php/Goods/getCategory",{code:value},function(data){
			
					$("#category_code").html(data);
				});
			});
			
			$("#attr_id").change(function(){	
				var value= $(this).val();
				$.get("/LifeTech_Bazaar/admin.php/Goods/getAttrValue",{id:value},function(data){
					$("#attr_value").html(data);
				});
			});
		});
	</script>
</head>
<body>
<form action="/LifeTech_Bazaar/admin.php/Goods/add_do" method="post" class="definewidth " enctype="multipart/form-data">
    <table width="1024" class="table table-bordered table-hover definewidth m10">
		<tr>
            <td width="16%" class="tableleft">Product Name</td>
            <td width="84%"> <input id="title" type="text"  name="title"/> 
              <span id="checked" style="color:red;">*</span></td>
			
        </tr>

		<tr>
            <td width="16%" class="tableleft">Category</td>
            <td>
			<select name="category_code_father" id="category_code_father">
            	<option>Please select</option>
                <?php if(is_array($category)): foreach($category as $key=>$row): ?><option value="<?php echo ($row["code"]); ?>"> <?php echo ($row["name"]); ?></option><?php endforeach; endif; ?>
			</select>
            
			<select id="category_code" name="category_code">
				<option value="">Please select the product category you belong to first</option>
			</select>
			<span id="checked" style="color:red;">*</span>
			</td>
			
        </tr>
		<tr>
		  <td class="tableleft">Product number</td>
		  <td><input id="item_no" type="text"  name="item_no"/>
		    <span id="checked" style="color:red;">*</span></td>
	  </tr>
		<tr>
            <td width="10%" class="tableleft">specifications</td>
            <td>
			<select name="attr_id" id="attr_id" >
            <option value="">Please select product specifications</option>
			<?php if(is_array($goods_attr)): foreach($goods_attr as $key=>$row): ?><option value="<?php echo ($row["id"]); ?>"> <?php echo ($row["norms"]); ?></option><?php endforeach; endif; ?>
            </select>  <span id="attr_value" style="font-size:14px;margin-left:20px"></span>
			</td>
			
        </tr>
		<tr>
            <td width="10%" class="tableleft">Upload photos</td>
            <td><input type="file" id="picture" name="picture"/></td>
			
        </tr>
		<tr>
            <td width="10%" class="tableleft">Product price</td>
            <td><input type="text" id="price" name="price"/>
              <span id="checked" style="color:red;">*</span></td>
			
        </tr>
        <tr>
          <td class="tableleft">Hit</td>
          <td><input type="text" id="clicks" name="clicks"  value="0"/></td>
        </tr>
        <tr>
          <td class="tableleft">recommend</td>
          <td><label><input name="recommend" type="radio" value="1"> Yes</label>
          &nbsp&nbsp&nbsp<label><input name="recommend" type="radio" value="0" checked> No</label></td>
        </tr>
        <tr>
          <td class="tableleft">special offer</td>
          <td><label><input name="special" type="radio" value="1"> Yes</label>
          &nbsp&nbsp&nbsp<label><input name="special" type="radio" value="0"  checked> No</label></td>
        </tr>
        <tr>
          <td class="tableleft">online</td>
          <td><label><input name="status" type="radio" value="0" checked> Yes</label>
          &nbsp&nbsp&nbsp<label><input name="status" type="radio" value="-1" > No</label></td>
        </tr>
        <tr>
            <td width="16%" class="tableleft">Product Details</td>
            <td> <textarea name="content" style=" width:800px;height:300px" rows="10" id="content"></textarea></td>
			
        </tr>
        <tr>
            <td class="tableleft"></td>
            <td>
                <button type="submit" class="btn btn-primary" id="sub">save</button> &nbsp;&nbsp;    <a  class="btn btn-success"  href="/LifeTech_Bazaar/admin.php/Goods/index">Return list</a><span id="jiancha" style="color:red;"></span>
            </td>
			
			
			
			
			
			
			
        </tr>
    </table>
    <p>&nbsp;</p>
</form>
</body>
</html>