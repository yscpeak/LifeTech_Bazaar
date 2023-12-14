<?php
namespace Admin\Model;
use Think\Model\ViewModel;

// UserViewModel class for managing the UserView model.
class UserViewModel extends ViewModel {
	// The view fields for the UserView model.
	// It defines the fields and their relationships between the 'auth_user' table.
	public $viewFields = [
		'auth_user' => ['id', 'name'=>'username'],
	];
}
?>
