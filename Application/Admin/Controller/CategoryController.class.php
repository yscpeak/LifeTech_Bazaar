<?php
namespace Admin\Controller;
use Think\Controller;

// CategoryController class for managing product categories.
class CategoryController extends _AuthController {

	// Display the index page with a list of product categories.
	public function index() {
		if ($_POST['name'] != "") :
			$data['name'] = array("like", '%' . $_POST['name'] . '%');
		endif;

		$list = M("category")->where($data)->order("code ")->select();
		$this->assign("list", $list);
		$this->display();
	}

	// Display the add page for a new category.
	public function add() {
		$this->display();
	}

	// Add a new product category.
	public function add_do() {
		$result = M("category")->add($_POST);
		header("Content-type:text/html;charset=utf-8");
		if ($result) :
			?>
			<script>alert('Added successfully');</script>
			<script>location.href='index'</script>
		<?php else : ?>
			<script>alert('Add failed');</script>
			<script>history.back()</script>
		<?php endif;
	}

	// Validate if the specified category name already exists.
	public function checkedName() {
		$name = $_GET["name"];
		$result = M("category")->where("name='$name'")->find();
		if ($result) {
			echo "success";
		} else {
			echo "error";
		}
	}

	// Validate if the specified category code already exists.
	public function checkedCode() {
		$code = $_GET["code"];
		$result = M("category")->where("code='$code'")->find();
		if ($result) {
			echo "success";
		} else {
			echo "error";
		}
	}

	// Display the page to add a child category to the specified parent category.
	public function addChild($code) {
		$category_name = M("category")->where("code='$code'")->getField("name");
		$this->assign("category_name", $category_name);

		$this->display();
	}

	// Add a new subcategory to the specified parent category.
	public function addChild_do() {
		$_POST['code'] = $_POST['father_code'] . $_POST['code'];
		$result = M("category")->add($_POST);
		//echo M("category")->getlastsql();exit;
		header("Content-type:text/html;charset=utf-8");
		if ($result) :
			?>
			<script>alert('Added successfully');</script>
			<script>location.href='index'</script>
		<?php else : ?>
			<script>alert('Add failed');</script>
			<script>history.back()</script>
		<?php endif;
	}

	// Delete a product category.
	public function delete() {
		$id = $_GET["id"];
		$result = M("category")->where("id=$id")->delete();
		if ($result) {
			echo "success";
		} else {
			echo "error";
		}
	}

	// Display the edit page for a specific product category.
	public function edit($id) {
		$category = M("category")->where("id=$id")->find();
		$this->assign("category", $category);
		$this->display();
	}

	// Save the edited product category.
	public function edit_do() {
		$category = M("category")->save($_POST);
		header("Content-type:text/html;charset=utf-8");
		?>
		<script>alert('Modified successfully');</script>
		<script>location.href='<?= __CONTROLLER__ ?>/index'</script>
		<?php
	}
}
?>
