<?php
// This class is automatically generated by the system
// and is intended for testing purposes only.
namespace Admin\Controller;
use Think\Controller;

// GoodsController class for managing goods information.
class GoodsController extends _AuthController {

	// Display the index page with a list of goods.
	public function index(){
		if ($_POST['title']!="") $data['title']=array("like",'%'.$_POST['title'].'%');


		$count=M("goods")->where($data)->count();
		$page=new \Think\Page($count,"10");
		$pageStr=$page->show();
		$this->assign("pageStr",$pageStr);

		$list=M("goods")->where($data)->limit($page->firstRow . ',' . $page->listRows)->order("id desc")->select();
		$this->assign("list",$list);


		$this->display();
	}

	// Display the add page for a new goods.
	public function add(){
		// Display the belonging category and prepare to respond to the secondary category.
		$category=M("category")->where("length(code)=2")->select();
		$this->assign("category",$category);

		$goods_attr=M("goods_attr")->select();
		$this->assign("goods_attr",$goods_attr);


		$this->display();
	}

	// Delete a goods.
	public function delete($id){

		// Make sure the product has not been purchased and does not exist in the cost detail table.
		$count=M("cost_detail")->where("goods_id=$id")->count();
		if ($count==0){
			$list=M("goods")->where("id=".$id)->delete();
			echo "success";
		}else{
			echo "error";
		}

	}

	// Add a new goods.
	public function add_do(){
		$upload = new \Think\Upload(); // Instantiate the upload class
		$upload->maxSize = 3145728 ; // Set the attachment upload size
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // Set the attachment upload type
		$upload->rootPath = './Uploads/'; // Set the attachment upload root directory
		$upload->savePath = ''; // Set the attachment upload (sub) directory
		$info = $upload->upload(); // Upload file

		$_POST["picture"]=$info['picture']['savepath'] . $info['picture']['savename'];
		$_POST["datetime"]= date('Y-m-d H:i:s');
		$_POST["m_id"]= $_SESSION["user"]["id"];

		$list=M("goods")->add($_POST);

		header("Content-type:text/html;charset=utf-8");
		if($list){
			?>
			<script>alert('Product Added successfully');</script>
			<?php
		}else{
			?>
			<script>alert('Product addition failed');</script>
			<?php
		}
		?>
		<script>location.href='<?php echo __CONTROLLER__; ?>/index'</script>
		<?php
	}

	// Display the edit page for a specific goods.
	public function edit($id){
		// Get product information
		$row_goods=M("goods")->where("id=".$id)->find();
		$this->assign("row_goods",$row_goods);

		// Get the list of product specifications
		$list_attr=M("goods_attr")->select();
		foreach($list_attr  as &$tmp_attr){
			if ($tmp_attr['id']==$row_goods['attr_id'])
				$tmp_attr['selected']="selected";
		}
		$this->assign("list_attr",$list_attr);

		// Get the list of top-level categories
		$list_category_father=M("category")->where("length(code)=2")->select();
		foreach($list_category_father  as &$tmp_category_father){
			if ($tmp_category_father['code']==substr($row_goods['category_code'],0,2))
				$tmp_category_father['selected']="selected";
		}
		$this->assign("list_category_father",$list_category_father);

		// Get the list of second-level categories
		$list_category=M("category")->where("length(code)=4 and code like '".substr($row_goods['category_code'],0,2)."%'")->select();
		foreach($list_category  as &$tmp_category){
			if ($tmp_category['code']==$row_goods['category_code'])
				$tmp_category['selected']="selected";
		}
		$this->assign("list_category",$list_category);

		$this->display();
	}

	// Save the edited goods.
	public function edit_do(){
		$upload = new \Think\Upload();
		$upload->maxSize = 3145728 ; // 上傳文件的大小
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');
		$upload->rootPath = './Uploads/'; // 設置附件上傳根目錄
		$upload->savePath = ''; // 設置附件上傳子目錄
		$info = $upload->upload(); // upload

		if ($info['picture']){
			$_POST["picture"]=$info['picture']['savepath'] . $info['picture']['savename'];
		}else{
			unset($_POST["picture"]);
		}

		$_POST["datetime"]= date('Y-m-d H:i:s');

		//M("goods")->save($_POST);		echo M()->getlastsql();exit;
		header("Content-type:text/html;charset=utf-8");
		if(M("goods")->save($_POST)){
			?>
			<script>alert('Product Modified successfully');</script>
			<script>location.href='<?php echo __CONTROLLER__; ?>/index'</script>
			<?php
		}else{
			?>
			<script>alert('Product modification failed');</script>
			<script>history.back()</script>
			<?php
		}
		?>
		<?php
	}

	// Get the subcategory based on the parent category code.
	public function getCategory($code){
		$list_category=M("category")->where("length(code)=4 and code like '".$code."%'")->select();
		echo "<option value=''>subcategory</option>";
		foreach($list_category as $tmp){
			echo "<option value=".$tmp["code"].">".$tmp['name']."</option>";
		}
	}

	// Get the attribute value based on the attribute ID.
	public function getAttrValue($id){

		echo M("goods_attr")->where("id=$id")->getField("content");

	}

	// Delete a picture associated with a goods.
	public function picture_del($id,$goods_id){
		$list=M("goods_picture")->where("id=".$id)->delete();
		?>
		<script>location.href='<?php echo __CONTROLLER__; ?>/index'</script>
		<?php
	}

	// Display the page with pictures associated with a goods.
	public function picture($goods_id){

		$goods_title=M("goods")->where("id=$goods_id")->getField("title");
		$this->assign("goods_title",$goods_title);

		$list=M("goods_picture")->where("goods_id=$goods_id")->select();
		$this->assign("list",$list);
		$this->display();
	}

	public function picture_add_do(){
		$upload = new \Think\Upload();
		$upload->maxSize   =     3145728 ;
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');
		$upload->rootPath  =     './Uploads/';
		$upload->savePath  =     '';
		$info   =   $upload->upload();
		$_POST["name"]=$info['name']['savepath'] . $info['name']['savename'];
		$list=M("goods_picture")->add($_POST);
		$goods_id=$_POST['goods_id'];

		if($list){
			?>
			<script>alert('Added successfully');</script>
			<script>location.href='<?php echo __CONTROLLER__; ?>/picture/goods_id/<?php echo $goods_id; ?>'</script>
			<?php
		}else{
			?>
			<script>alert('Add failed');</script>
			<script>location.href='<?php echo __CONTROLLER__; ?>/picture/goods_id/<?php echo $goods_id; ?>'</script>
			<?php
		}
		?>
		<?php
	}

	public function pinglun($id){
		$data['goods_id']=$id;
		$count=M("comments")->where($data)->count();
		$page=new \Think\Page($count,"10");
		$pageStr=$page->show();
		$this->assign("pageStr",$pageStr);

		$list=M("comments")->where($data)->limit($page->firstRow . ',' . $page->listRows)->order("id desc")->select();
		$comments = array();
		foreach($list as $k=>$v){
			$comments[$k]=$v;
			$member = M("member")->where("id=".$v['member_id'])->find();
			$comments[$k]['member_name']=$member['name'];
		}

		$this->assign("list",$comments);

		$this->display();
	}
}
?>
