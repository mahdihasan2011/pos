<?php

namespace App\Model;

class Cart
{
    public $products    = null;
    public $tQty        = 0;
    public $tPrice      = 0;

    public function __construct($oldCart)
    {
        if ($oldCart){
            $this->products = $oldCart->products;
            $this->tQty     = $oldCart->tQty;
            $this->tPrice   = $oldCart->tPrice;
        }
    }

    public function add($product, $id)
    {
        $storedProduct = [  'quantity'  => 0, 
                            'name'      => $product->name, 
                            'code'      => $product->code, 
                            'price'     => $product->price, 
                            'total'     => $product->price, 
                            'product'   => $product   ];
        if ($this->products) {
            if (array_key_exists($id, $this->products)) {
                $storedProduct = $this->products[$id];
            }
        }
        $storedProduct['quantity']++;
        $storedProduct['name']  = $product->name;
        $storedProduct['code']  = $product->code;
        $storedProduct['price'] = $product->price;
        $storedProduct['total'] = $product->price * $storedProduct['quantity'];
        $this->products[$id]    = $storedProduct;
        $this->tQty++;
        $this->tPrice += $product->price;
    }

    public function removeItem($id){
        $this->tQty     -= $this->products[$id]['quantity'];
        $this->tPrice   -= $this->products[$id]['total'];
        unset($this->products[$id]);
    }

    public function updatecart($id, $qty){
        $this->tQty     == $this->products[$id]['quantity'];
        $this->tPrice   == $this->products[$id]['total'];
        // $this->$storedProduct['quantity' == $this->products[$qty]];
    }

}
