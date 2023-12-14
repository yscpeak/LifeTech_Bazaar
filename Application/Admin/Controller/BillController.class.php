<?php
namespace Admin\Controller;

use Think\Controller;

class BillController extends _AuthController
{
	public function index()
	{
		// All order tables and their corresponding personal information. /*有吻茶(台語)*/

		if ($_POST['code'] != "") $data['code'] = array("like", '%' . $_POST['code'] . '%');
		$count = D("BillView")->where($data)->count();
		$page = new \Think\Page($count, 10);
		$pagestr = $page->show();
		$limit = $page->firstRow . ',' . $page->listRows;
		$list = array();
		$bb = D("BillView")->where($data)->order("bill.datetime desc")->limit($limit)->select();
		foreach ($bb as $k => $v) {
			$b_id = $v['id'];
			$w = array();
			$list[$k] = $v;
		}
		$this->assign("pagestr", $pagestr);
		$this->assign("list", $list);
		$this->display();
	}

	public function info($id)
	{
		// View information details page
		$row_bill = D("BillView")->where("bill.id=$id")->find();
		$this->assign("row_bill", $row_bill);

		// Order details for items
		$list_cost_detail = D("BillDetailView")->where("cost_detail.bill_id=$id")->select();
		$this->assign("list_cost_detail", $list_cost_detail);

		$this->display();
	}

	public function send($id)
	{
		$result = M("bill")->where("id=$id")->setField("status", 2);
		//echo M("bill")->getlastsql();
		if ($result) {
			echo "success";
		}
	}
}
?>
