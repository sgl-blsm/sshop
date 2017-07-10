<?php
namespace app\admin\validate;
use think\Validate;

class Goods extends Validate
{
	protected $rule = [
		['goods_name', 'require|max:256','商品的名字必须存在|商品的名字不能超过256个字符'],
		['goods_price','number', '商品的价格必须存在|商品的价格需是数字'],
		['goods_shop_price', 'number','商品的出售价格必须存在|商品的出售价格需是数字'],
		['goods_number', 'number','商品的数量需是数字'],
		['goods_weight', 'number','商品的重量需是数字'],
		// ['is_sale', 'in:','值错误'],
	];

	protected $scene = [
		'add' => ['goods_name','goods_price','goods_shop_price','goods_number','goods_weight'],
	];

}