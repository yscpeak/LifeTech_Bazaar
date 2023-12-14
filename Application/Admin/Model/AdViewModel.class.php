<?php
namespace Admin\Model;
use Think\Model\ViewModel;

// AdViewModel class for managing the AdView model.
class AdViewModel extends ViewModel {

	// The view fields for the AdView model.
	// It defines the fields and their relationships between the 'ad' and 'position' tables.
	public $viewFields = [
		'ad' => ['id', 'title', 'position_code', 'picture', 'url'],
		'position' => ['name', '_on' => 'ad.position_code=position.code'],
	];
}
?>
