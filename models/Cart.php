<?php

namespace app\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord {
    public function addToCart($product, $qty = 1) {
        if (isset ($_SESSION['cart'][$product->id])) {
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        }else {
            $_SESSION['cart'][$product->id] = [
                'qty' => $qty,
                'title' => $product->title,
                'price' => $product->price,
                'img' => $product->img
            ];
        }

        $_SESSION['cart.qty'] = isset ($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset ($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $product->price*$qty : $product->price*$qty;

    }

    public function delItem ($id) {
        $_SESSION['cart.qty'] -= $_SESSION['cart'][$id]['qty'];
        $_SESSION['cart.sum'] -= $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['qty'];

        unset($_SESSION['cart'][$id]);

    }

    public function updQty ($id, $qty) {
        $_SESSION['cart.qty'] -= $_SESSION['cart'][$id]['qty'];
        $_SESSION['cart.sum'] -= $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['qty'];

        $_SESSION['cart'][$id]['qty'] = $qty;
        $_SESSION['cart.qty'] += $qty;
        $_SESSION['cart.sum'] += $qty * $_SESSION['cart'][$id]['price'];

    }

}