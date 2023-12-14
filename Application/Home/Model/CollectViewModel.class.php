<?php
namespace Home\Model;
use Think\Model\ViewModel;

// CollectViewModel is a ViewModel representing the relationship
//     between the 'mem_collect' and 'goods' tables.
// It combines fields from both tables to provide a comprehensive view for the user's collection.
class CollectViewModel extends ViewModel {
   public $viewFields = array(
     'mem_collect'=>array('id','goods_id','member_id'),
     'goods'=>array('title','price','_on'=>'mem_collect.goods_id=goods.id'),
    );
 }
?>