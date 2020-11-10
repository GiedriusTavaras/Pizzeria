<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorie;
use App\Models\Size;
use App\Models\Variation;
use Illuminate\Http\Request;
use Response;
use View;

class ProductController extends Controller
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






        $variations = Variation::all();
        // return view('product.index', ['products' => $products]); 
        return view('product.index', compact('products', 'categories', 'variations', 'sort', 'order', 'categorie_id'));
 
    }


    public function create()
    {
        $categories = Categorie::where('title','<>','pizza')->get();
        return view('product.create', compact('categories'));
    }

    public function createPizza()
    {
        $categories = Categorie::where('title','pizza')->get();
        
        
        return view('product.create_pizza', compact('categories'));
    }


    public function createPizzaVariation()
    {
        $sizes = Size::all();

        $html = View::make('product.create_pizza_variation')->with(compact('sizes'))->render();
        return Response::json([
            'html' => $html,
            'status' => 'OK'  // cia yra bilekas
        ]);
    }










    public function store(Request $request)
    {
        $product = New Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->photo = '';
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = $request->file('photo')->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $product->photo = $name;
        }
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->categorie_id = $request->categorie_id;
        // $product->categorie_id = Categorie::where('title', 'pizza')->first()->id;

        $product->save();
        return redirect()->route('product.index');
    }


    public function storePizza(Request $request)
    {
        
        $product = New Product;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->photo = '';
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = $request->file('photo')->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $product->photo = $name;
        }
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        // $product->categorie_id = $request->categorie_id;
        $product->categorie_id = Categorie::where('title', 'pizza')->first()->id;

        $product->save();

        foreach ($request->v as $key => $_) {

            $product_v = New Variation;
            $product_v->photo = '';

            $product_v->description = $request->v_description[$key];
            
            if ($request->hasFile('v_photo.'.$key)) {
                $image = $request->file('v_photo.'.$key);
                $name = $request->file('v_photo.'.$key)->getClientOriginalName();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
                $product_v->photo = $name;
            }
            $product_v->price = $request->v_price[$key];
            $product_v->discount_price = $request->v_discount_price[$key];
            $product_v->size_id = $request->v_size_id[$key];
            $product_v->product_id = $product->id;

            $product_v->save();

        }
        return redirect()->route('product.index');




    }






    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        $categories = Categorie::all();
        return view('product.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function editPizza(Product $product)
    {
        $sizes = Size::all();
        $product->variations = $product->getVariations;
        $categories = Categorie::all();
        return view('product.edit_pizza', ['product' => $product, 'categories' => $categories, 'sizes' => $sizes]);
    }
    // public function editPizza(Product $product)
    // {
    //     return view('product.edit');
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->title = $request->title;
        $product->description = $request->description;
        $product->photo = '';
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = $request->file('photo')->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $product->photo = $name;
        }
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->categorie_id = $request->categorie_id;
        // $product->categorie_id = Categorie::where('title', 'pizza')->first()->id;

        $product->save();
        return redirect()->route('product.index');
    }

    public function updatePizza(Request $request, Product $product)
    {
        $product->title = $request->title;
        $product->description = $request->description;
        $product->photo = '';
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = $request->file('photo')->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $product->photo = $name;
        }
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        // $product->categorie_id = $request->categorie_id;
        $product->categorie_id = Categorie::where('title', 'pizza')->first()->id;

        $product->save();

        if(isset($request->v)){

            foreach ($request->v as $key => $_) {
    
    
                if (isset($request->v_remove[$key]) && $request->v_remove[$key] == 1) { //trinti
                    Variation::where('id', $request->v_id[$key])->first()->delete();
                }
                elseif (isset($request->v_id[$key]) && $request->v_id[$key]) { //editinam
                    $product_v = Variation::where('id', $request->v_id[$key])->first();
    
                    $product_v->description = $request->v_description[$key];
                    $product_v->photo = '';
                    if ($request->hasFile('photo.'.$key)) {
                        $image = $request->file('photo.'.$key);
                        $name = $request->file('photo.'.$key)->getClientOriginalName();
                        $destinationPath = public_path('/images');
                        $image->move($destinationPath, $name);
                        $product_v->photo = $name;
                    }
                    $product_v->price = $request->v_price[$key];
                    $product_v->discount_price = $request->v_discount_price[$key];
                    $product_v->size_id = $request->v_size_id[$key];
                    $product_v->product_id = $product->id;
        
                    $product_v->save();
                }
                else { //creatinam
                    $product_v = New Variation;
    
                    $product_v->description = $request->v_description[$key];
                    $product_v->photo = '';
                    if ($request->hasFile('photo.'.$key)) {
                        $image = $request->file('photo.'.$key);
                        $name = $request->file('photo.'.$key)->getClientOriginalName();
                        $destinationPath = public_path('/images');
                        $image->move($destinationPath, $name);
                        $product_v->photo = $name;
                    }
                    $product_v->price = $request->v_price[$key];
                    $product_v->discount_price = $request->v_discount_price[$key];
                    $product_v->size_id = $request->v_size_id[$key];
                    $product_v->product_id = $product->id;
        
                    $product_v->save();
                }
    
            }
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
