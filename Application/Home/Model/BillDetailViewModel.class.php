<?php
namespace Home\Model;
use Think\Model\ViewModel;

// BillDetailViewModel is a ViewModel representing the relationship
//     between the 'cost_detail' and 'goods' tables.
class BillDetailViewModel extends ViewModel {

	// Define the view fields mapping for 'cost_detail' and 'goods' tables.
	// It specifies the fields to be selected from each table and the ON condition for the join.
	public $viewFields = [
		'cost_detail' => ['id', 'goods_id', 'price', 'total', 'attribute', 'count'],
		'goods' => ['title', '_on' => 'goods.id=cost_detail.goods_id'],
	];
}
?>
