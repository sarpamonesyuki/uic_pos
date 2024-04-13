<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all products from the database
        $allProducts = Product::all();

        // To the view
        return view('user.display',['allProducts' => $allProducts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          // Validation
          $inputData = $request->validate([
            'product_name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category' => 'required|string',
        ]);

        // Save product to database
        Product::create([
            'name' => $inputData['product_name'],
            'price' => $inputData['price'],
            'quantity' => $inputData['quantity'],
            'category' => $inputData['category'],
        ]);

        // End
        return redirect('/add')->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function goToProducts()
    {
        return view('user.display');
    }

    public function addItemToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart',[]);

        if(isset($cart[$id]))
        {
            $cart[$id]['quantity']++;
        } else
        {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => 0,
            ];
            session()->put('cart', $cart);
            return redirect('/display')->with('success', 'Item added to cart');
        }
    }
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Item added to cart.');
        }
    }

    public function deleteProduct(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Item successfully deleted.');
        }
    }
}