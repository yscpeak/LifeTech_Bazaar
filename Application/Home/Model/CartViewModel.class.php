<?php
namespace Home\Model;
use Think\Model\ViewModel;

// CartViewModel is a ViewModel representing the relationship between the 'mem_cart' and 'goods' tables.
// It combines fields from both tables to provide a comprehensive view for the shopping cart.
class CartViewModel extends ViewModel {
	public $viewFields = [
		'mem_cart' => ['id', 'count', 'attribute'],
		'goods' => ['id' => 'goods_id', 'title', 'price', '_on' => 'mem_cart.goods_id=goods.id'],
	];
}
?>
