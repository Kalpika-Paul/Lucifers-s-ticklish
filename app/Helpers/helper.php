<?php


use Darryldecode\Cart\Facades\CartFacade as Cart;

{
    function cardArray() {
        $cartCollection = Cart::getContent();
        return $cartCollection->toArray();
    }
}