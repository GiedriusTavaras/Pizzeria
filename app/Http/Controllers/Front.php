<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Fron;
use App\Models\Product;
use Session;
use Response;
use View;

class Front extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Categorie::orderBy('title')->get();
        
        $order = $sort = $categorie_id ='';

        $cartAmount = Fron::getCartAmount();
        $cartCount = Fron::getCartCount();
        $cartList = Fron::getCartList();
        

        
        if ($request->categorie_id) {
            $categorie_id = (int) $request->categorie_id;
        }

        if ($request->sort) {

            $order = $request->dir ? $request->dir : 'asc';
            if (!in_array($order, ['asc', 'desc'], 1)) {
                $order = 'asc';
            }
            $sort = $request->sort;
            if (!in_array($sort, ['title', 'price'], 1)) {
                $sort = 'none';
            }

            if ('title' == $sort) {
                $products = $categorie_id ? 
                Product::where('categorie_id', $categorie_id)->orderBy('title', $order)->get():
                Product::orderBy('title', $order)->get();
                // $pets = pet::orderBy('title', $order)->get();
            }
            elseif ('price' == $sort) {
                $products = $categorie_id ? 
                Product::where('categorie_id', $categorie_id)->orderBy('price', $order)->get():
                Product::orderBy('price', $order)->get();
            } else {
                $products = $categorie_id ? 
                Product::where('categorie_id', $categorie_id)->orderBy('price')->get():
                Product::orderBy('price')->get();
            }
            
        }
        else {
            $products = $categorie_id ? 
            Product::where('categorie_id', $categorie_id)->orderBy('price')->get():
            Product::orderBy('price')->get();
        }

        // $products = Product::all();
        // return view('product.index', ['products' => $products]); 
        return view('front.index', compact('products', 'categories', 'sort', 'order', 'categorie_id', 'cartAmount', 'cartCount', 'cartList'));
 
    }

    public function addToCartApi(Request $request) 
    {
        $cart = Session::get('cart', collect());
        $product = Product::where('id', $request->id)->first();
        $count = $request->count ?? 1;
        $count = $count < 0 ? 1 : $count;

        $product->count = $count;
        $cart->add($product);
        Session::put('cart', $cart);
        $cartAmount = Fron::getCartAmount();
        $cartCount = Fron::getCartCount();
        $cartList = Fron::getCartList();

        $cartHtml = View::make('layouts.cart')->with(compact('cartAmount', 'cartCount', 'cartList'))->render();

        return Response::json([
            'status' => 'OK',  // cia yra bilekas
            'html' => $cartHtml
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Product $product)
    {
    
            // $author->booksCount = $author->authorBooks->count();
            // $author->booksList = $author->authorBooks;
        
        return view('front.show', ['product' => $product]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
