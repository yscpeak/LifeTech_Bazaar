<?php
namespace Admin\Model;
use Think\Model\ViewModel;

// BillDetailViewModel class for managing the BillDetailView model.
class BillDetailViewModel extends ViewModel {

	// The view fields for the BillDetailView model.
	// It defines the fields and their relationships between the 'cost_detail' and 'goods' tables.
	public $viewFields = [
		"cost_detail" => ["goods_id", "price", "attribute", "total", "count", "bill_id"],
		"goods" => ["_on" => "goods.id=cost_detail.goods_id", "title", "item_no"],
	];
}
?>
