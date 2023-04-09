<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class productController extends Controller
{
    //status Change
    public function statusChange($id)
    {
        $product=Product::find($id);

        if($product->status==0)$product->status=1;
        else $product->status=0;

        $product->save();

        return back()->with('success','Product updated successfully.');

    }

    //Dashboard
    public function addProduct(Request $data ){
        $product = new Product();

        //validation
        $data->validate([
            'name' => 'bail|required|max:255',
            'category' => 'required',
            'brand' => 'required',
            'description' => 'required',
            'image'=>'required| mimes:jpg,png,jpeg,WebP,gif',
            'status' => 'required',
            // 'publish_at' => 'nullable|unique:products|date',
        ]);
        
        $product->name=$data->name;
        $product->categoryName=$data->category ;
        $product->brandName=$data->brand ;
        $product->description=$data->description ;
        if($image=$data->file('image'))
        {
            $imageName= time()."_".$image->getClientOriginalName().".".$image->getClientOriginalExtension();
            $image->move('images/products/',$imageName);
        }

        $product->image=$imageName ;
        
        $product->status=$data->status ;
        
        // dd($product);

        $product->save();

        return redirect()->route('manageProduct')->with('success', 'Product added successfully.');
    }

    //Manage product show
    public function manageProduct(){
        $products=Product::all();
        return view('backend.productManage',compact('products'));
    }
   

    /**
    * add product page show
    */
    public function index()
    {
        return view('backend.productAdd');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.productEdit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        // Retrieve the product by ID
        $product = Product::find($id);
    
        // Validate the request data
        $request->validate([
            'name' => 'bail|required|max:255',
            'category' => 'required',
            'brand' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,WebP,gif',
            'status' => 'required',
        ]);
    
        // Update the product properties
        $product->name = $request->name;
        $product->categoryName = $request->category;
        $product->brandName = $request->brand;
        $product->description = $request->description;
    
        if ($request->hasFile('image')) {
            // Delete the old image file
            Storage::delete('images/products/'.$product->image);
    
            // Upload the new image file
            $image = $request->file('image');
            $imageName = time()."_".$image->getClientOriginalName();
            $image->storeAs('public/images/products', $imageName);
            $product->image = $imageName;
        }
    
        $product->status = $request->status;
        $product->save();
    
        // Redirect to the product listing page
        return redirect()->route('manageProduct')->with('success', 'Product updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        //first Find
        $product=Product::find($id);

        //delete
        $product->delete();

        // Redirect to the manageproducts page with a success message
        return back()->with('success', 'Product deleted successfully.');
        
    }
}
