<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Fron extends Model
{
    use HasFactory;

    public static function getCartAmount()
    {
        $cart = Session::get('cart', collect());
        $amount = 0;
        foreach($cart as $product) {
            $amount += $product->price * $product->count;
        }
        return $amount;
    }

    public static function getCartCount()
    {
        $cart = Session::get('cart', collect());
        $count = 0;
        foreach($cart as $product) {
            $count +=  $product->count;
        }
        return $count;
    }

    public static function getCartList()
    {
        return Session::get('cart', collect());
    }
 }
