<?php
namespace Admin\Model;
use Think\Model\ViewModel;

// BillViewModel class for managing the BillView model.
class BillViewModel extends ViewModel {

	// The view fields for the BillView model.
	// It defines the fields and their relationships between the 'bill', 'member', and 'mem_address' tables.
	public $viewFields = [
		/*'role_module'=>array('module_id'),
		'module'=>array('name','url','code', '_on'=>'module.id=role_module.module_id'),*/
		"bill" => ["id", "code", "member_id", "money", "datetime", "status", "money_reality", "pay_way"],
		"member" => ["_on" => "member.id=bill.member_id", "email", "name"=>"mem_name"]
		// "mem_address" => ["_on" => "mem_address.id=bill.address_id",
		//                   "phone", "tel", "city", "address", "name", "zipcode"]
	];
}
?>
