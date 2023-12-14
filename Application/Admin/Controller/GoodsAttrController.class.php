<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;

// GoodsAttrController class for managing goods attributes.
class GoodsAttrController extends Controller{
	public function index(){

		if ($_POST['norms']!="") :
			$data['norms']=array("like",'%'.$_POST['norms'].'%');
		endif;

		$count = M("goods_attr")->where($data)->count();
		$Page = new\Think\Page($count,10);
		$show = $Page->show();
		$list = M("goods_attr")->where($data)->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign("list",$list);

		$this->display();
	}

	// Delete a goods attribute.
	public function delete(){
		$id=$_GET["id"];
		$list=M("goods_attr")->where("id=".$id)->delete();
		if($list){
			echo "success";
		}
	}

	// Display the add page with a list of goods attribute values.
	public function add(){
		$list=M("goods_attr_value")->select();
		$this->assign("list",$list);
		$this->display();
	}

	// Add product specifications. (Add a new goods attribute and its value.)
	public function add_do(){
		$result=M("goods_attr")->add($_POST);
		$_POST["attr_id"]=$result;
		$result=M("goods_attr_value")->add($_POST);
		header("Content-type:text/html;charset=utf-8");
		if($result) :
			?>
			<script>alert('Added successfully');</script>
			<script>location.href='index'</script>
		<?php else : ?>
			<script>alert('Add failed');</script>
			<script>history.back()</script>
		<?php endif;
	}

	// Check if the specified goods attribute already exists.
	public function checkedNorms(){
		$name=$_GET["norms"];
		$result=M("goods_attr")->where("norms='$name'")->find();
		if($result){
			echo "success";
		}else{
			echo "error";
		}
	}

	// Display the edit page for a specific goods attribute.
	public function edit($id){
		$type=M("goods_attr")->where("id=$id")->find();
		$this->assign("type",$type);
		$this->display();
	}

	// Save the edited goods attribute.
	public function edit_do(){
		$result=M("goods_attr")->save($_POST);
		header("Content-type:text/html;charset=utf-8");
		if($result) :
			?>
			<script>alert('Modified successfully');</script>
			<script>location.href='index'</script>
		<?php else : ?>
			<script>alert('Modification failed');</script>
			<script>history.back()</script>
		<?php endif;
	}
}
?>
