<?php

namespace App\Models;

class Item
{
    public $cart_id;
    public $item_id;
    public $name;
    public $type;
    public $quantity;
    public $price;
    public $imagePath;
    public $promos; 

    public function __construct(array $attributes)
    {
        $this->cart_id = $attributes['cart_id'];
        $this->item_id = $attributes['item_id'];
        $this->name = $attributes['name'];
        $this->type = $attributes['type'];
        $this->quantity = $attributes['quantity'];
        $this->price = $attributes['price'];
        $this->imagePath = $attributes['imagePath'];
        $this->promos = $attributes['promos'] ?? [];
    }
}
