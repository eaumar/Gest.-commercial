<?php

namespace App\Modules\Product\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Modules\Product\Repositories\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(ProductRepositoryInterface $productInterface)
    {
        $userId = Auth::id(); 
        $products = $productInterface->getProductsByUserId($userId); 
        return view('product::index', compact('products'));
    }
    
    public function create()
    {
        return view('product::create'); // return create product page
    }
    //function to create a product
    public function store(Request $request, ProductRepositoryInterface $productInterface)
    {
        // Valider data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0', 
        ]);
        
        $validatedData['supplier_ref'] = Auth::id();
    
        // create product
        $productInterface->createProduct($validatedData);
    
        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    public function edit(Product $product){
        return view('product::edit',compact('product'));
    }
    

    //fonction for update a product
    public function update(Request $request,Product $product,ProductRepositoryInterface $productInterface){
        $validator = Validator::make($request->all(),[
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0', 
            ]),
        ]);
        if($validator->fails()){
            return redirect()->back()->with('error',$validator->errors()->first())->withInput();
        }


            $data = $request->only(['name', 'price', 'stock']);         
            $productInterface->updateProduct($product->id,$data);
            return redirect()->route('products.index');
    }
            

    public function destroy($id, ProductRepositoryInterface $productInterface){
        $productInterface->deleteProduct($id, []);
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }


    
}
