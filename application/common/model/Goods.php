<?php
namespace app\common\model;

use think\Model;

class Goods extends Model
{
	protected $autoWriteTimestamp = true;

	function add($data){
		return $this->save($data);
	}
}