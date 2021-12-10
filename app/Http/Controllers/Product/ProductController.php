<?php

namespace App\Http\Controllers\Product;
use App\Http\Controllers\Controller;
use Exception;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        $products=Product::all();
        return view('admin.product.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'name'=>'required',
           'price'=>'required',
           'quantity'=>'required',
           'category_name'=>'required'
        ]);

        $imageName = time() . rand(1, 99999) . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images\products'), $imageName);

        $product = Product::create([
            'name' =>  $request->name,
            'price' => $request->price,
            'description' =>  $request->description,
            'quantity' => $request->quantity,
            'category_id' => $request->category_name,
            'image' => $imageName,

        ]);

        return back()->with('success', 'Data inserted successfully!');
    }


public function edit($id)
{
    $product=Product::find($id);
    $categories=Category::all();
    return view('admin.product.create', compact('product','categories'))->with('category');
}
public function update(Request $request, $id)
{
    $request->validate([
        'name'=>'required',
        'price'=>'required',
        'quantity'=>'required',
        'category_name'=>'required'
     ]);
try
{
     if ($request->has('image')) {
        $image = $request->image;
        $name = $image->getClientOriginalName();
        $fileName = time() . $name;
        $image->move(public_path('images\products'), $fileName);
        $image =   $fileName;
    
    }
    else
    {
        $image=Product::where('id',$id)->value('image');
    }
    Product::where('id', $id)->update([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'quantity' => $request->quantity,
        'category_id' => $request->category_name,
        'image'=>$image

    ]);
    return redirect()->route('products.index');
}
catch(Exception $e)
{
    return back()->with('fail','Something went wrong!');
}

}
public function destroy($id)
{
    $product=Product::find($id)->delete();
    return back()->with('success', 'Data deleted successfully!');
}
}