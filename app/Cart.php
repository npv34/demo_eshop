<?php


namespace App;


class Cart
{
    public $items = [];
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQuantity = $oldCart->totalQuantity;
        }
    }

    function add($product)
    {
        $storeItem = [
            'product' => $product,
            'quantity' => 0,
            'money' => 0
        ];

        // kiem tra san pham co trong gio hang chua
        if (array_key_exists($product->id, $this->items)) {
            $storeItem = $this->items[$product->id];
        }

        $storeItem['quantity']++;
        $storeItem['money'] += $product->price;


        $this->totalQuantity++;
        $this->totalPrice += $product->price;

        $this->items[$product->id] = $storeItem;

    }

    function delete($id)
    {
        $currentItem = $this->items;
        if (array_key_exists($id, $this->items)) {
            unset($currentItem[$id]);
        }

        $this->items = $currentItem;
    }
}
