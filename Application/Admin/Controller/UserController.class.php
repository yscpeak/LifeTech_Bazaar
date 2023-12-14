<?php
namespace Admin\Controller;
use Think\Controller;

// UserController class for managing user information.
class UserController extends _AuthController {

	// Display the index page with a list of users.
	public function index(){

		$list = D("UserView")->select();
		$this->assign("list", $list);
		$this->display();
	}

	public function delete(){

		// Delete a user.
		$id = $_GET["id"];
		$list = M("auth_user")->where("id=" . $id)->delete();
		if ($list) {
			echo "success";
		}
	}

	// Display the add user page.
	public function add(){
		$this->display();
	}

	// Check if the user with a given name already exists.
	public function checkeduser(){
		$name = $_GET["name"];
		$list = M("auth_user")->where("name='" . $name . "'")->select();
		if ($list) {
			echo "success";
		}
	}

	// Add a new user.
	public function add_do(){
		$module = M("auth_user")->add($_POST);
		if ($module) {
			echo "<script>alert('Added successfully');</script>";
			echo "<script>location.href='" . __CONTROLLER__ . "/index'</script>";
		}
	}

	// Display the edit user page.
	public function edit($id){
		$list = M("auth_user")->where("id=" . $id)->find();

		$this->assign("list", $list);
		$this->display();
	}

	// Save the edited user information.
	public function edit_do(){
		$module = M("auth_user")->save($_POST);
		if ($module) {
			echo "<script>alert('Modified successfully');</script>";
			echo "<script>location.href='" . __CONTROLLER__ . "/index'</script>";
		}
	}
}
?>
