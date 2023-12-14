<?php
// This class is automatically generated by the system
// and is intended for testing purposes only.
namespace Admin\Controller;
use Think\Controller;

// IndexController class for managing the main index and user login/logout.
class IndexController extends Controller {

	// Display the main index page
	public function index(){
		if (empty($_SESSION["user"])) {
			header("Content-type:text/html;charset=utf-8");
			echo "<script>alert('Currently not logged in, please check');</script>";
			echo "<script>location.href='".__MODULE__."/Index/login'</script>";
			exit;
		}

		$menu = D("RoleModuleView")->where("length(code)=2")->select();
		foreach ($menu as &$tmp) {
			$list2 = D("RoleModuleView")->where("length(code)=4  and code like '".$tmp['code']."%'")->select();
			$tmp['son'] = $list2;
			$tmp['son'] = $list2;
		}

		$this->assign("arr", $menu);
		$url = __ROOT__.'/index.php';
		$this->assign("url", $url);
		$this->display();
	}

	// Display the login page.
	public function login(){
		$this->display();
	}

	// Log out the user.
	public function logOut(){
		$_SESSION['user'] = null;
		$this->success('Exit successful', __MODULE__.'/Index/login');
	}

	// User verification for login.
	public function verification(){
		$where["name"] = $_GET['name'];
		$where["password"] = $_GET['password'];
		$result = M("auth_user")->where($where)->find();
		//print_r($result);
		if ($result) {
			$_SESSION["user"] = $result;
			echo "success";
		}
	}

	// Display statistics page.
	public function tongji(){
		//活躍客户
		$Model = M();//或者 $Model = D(); 或者 $Model = M();
		$sql = "select count(`Bill`.member_id) as rank,`Bill`.member_id ,`cost_detail`.*
		FROM `Bill` 
		LEFT JOIN `cost_detail` 
		ON `Bill`.id = `cost_detail`.bill_id 
		group by member_id order by rank  DESC";

		$row_bill = $Model->query($sql);
		foreach ($row_bill as  $k => &$v) {
			$v['i'] = $k + 1;
			$v['member_name'] = $this->getUname($v['member_id']);
		}

		$this->assign("list", $row_bill);

		//活躍客户
		$Model = M();//或者 $Model = D(); 或者 $Model = M();
		$sql = "select count(`cost_detail`.goods_id) as rank,`goods`.title,`cost_detail`.attribute
		FROM `cost_detail` 
		LEFT JOIN `goods` 
		ON `cost_detail`.goods_id = `goods`.id 
		group by goods_id order by rank  DESC";

		$row_bill2 = $Model->query($sql);
		foreach ($row_bill2 as  $k => &$v2) {
			$v2['i'] = $k + 1;
		}

		$this->assign("list2", $row_bill2);
		$this->display();
	}

	// Get the username based on member ID.
	public function getUname($member_id){
		$member = M("member")->where("id=".$member_id)->find();
		return $member['name'];
	}

	// Get goods information based on goods ID.
	public function getGoods($goods_id){
		$goods = M("goods")->where("id=".$goods_id)->find();
		return $goods;
	}
}
?>