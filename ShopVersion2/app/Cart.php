<?php

namespace App;

class Cart 	//Tạo một đối tượng từ class này thì đối tượng đó có các thuộc tính items, totalQty, totalPrice
{
	public $items = null;	//Mảng các đối tượng sản phẩm với key là chỉ số id của các sản phẩm trong database
	public $totalQty = 0;	//Số sản phẩm có trong giỏ hàng
	public $totalPrice = 0;	//Tổng tiền để mua các sản phẩm trong giỏ hàng

	public function __construct($oldCart){	//$oldCart là đối tượng sản phẩm cũ khi mà ta thực hiện thêm đối tượng sản phẩm mới
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}
//thêm sp
	public function add($item, $id){
		$giohang = ['qty'=>0, 'price' => $item->unit_price, 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		$giohang['qty']++;	
		$giohang['price'] = $item->unit_price * $giohang['qty']; 
		$this->items[$id] = $giohang;	
		$this->totalQty++;				
		if($item->promotion_price==0)
		{
		$this->totalPrice += $item->unit_price;		
		}else{
			$this->totalPrice += $item->promotion_price;	
		}
	}
	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		if ($this->items[$id]['item']->promotion_price==0) {
			$this->items[$id]['price'] -= $this->items[$id]['item']->unit_price;
		}else{
			$this->items[$id]['price'] -= $this->items[$id]['item']->promotion_price;
		}
		$this->totalQty--;
		if ($this->items[$id]['item']->promotion_price==0) {
			$this->totalPrice -= $this->items[$id]['item']->unit_price;;
		}else{
			$this->totalPrice -= $this->items[$id]['item']->promotion_price;
		}
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
		if ($this->totalQty<=0) {
			$this->items = null;
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}

/*sau 1 lần thêm
	$this->items[$id] = ['qty' => 1, 'price' => 'giá tiền sp đã thêm', 'item' => 'đối tượng sp vừa thêm'];	= $giohang
	$this->totalQty = 1;
	$this->totalPrice = Giá tiền sp vừa được thêm
sau lần 2 thêm sp cùng loại
	$this->items[$id] = ['qty' => 2, 'price' => 'giá tiền 2 sp', 'item' => 'đối tượng sp vừa thêm'];
	$this->totalQty = 2;
	$this->totalPrice = Tổng tiền 2 sp trong giỏ hàng
sau lần 2 thêm sp khác loại
	$this->items[$id1] = ['qty' => 1, 'price' => 'giá tiền sp1', 'item' => 'đối tượng sp1'];
	$this->items[$id2] = ['qty' => 1, 'price' => 'giá tiền sp2', 'item' => 'đối tượng sp2'];
	$this->totalQty = 2;
	$this->totalPrice = Tổng tiền 2 sp trong giỏ hàng
	