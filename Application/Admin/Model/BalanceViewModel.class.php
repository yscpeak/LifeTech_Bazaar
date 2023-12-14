<?php
namespace Admin\Model;
use Think\Model\ViewModel;

// BalanceViewModel class for managing the BalanceView model.
class BalanceViewModel extends ViewModel {

	// The view fields for the BalanceView model.
	// It defines the fields and their relationships between the 'mem_balance' and 'member' tables.
	public $viewFields = [
		'mem_balance' => ['money', 'datetime', 'memo', 'type', 'member_id'],
		'member' => ['_on' => 'member.id=mem_balance.member_id', 'name'],
	];
}
?>
