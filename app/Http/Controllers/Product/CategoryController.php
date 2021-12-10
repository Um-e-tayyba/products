<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);

        $imageName = time() . rand(1, 99999) . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images\categories'), $imageName);
        try {
            Category::create([
                'name' =>  $request->name,
                'description' => $request->description,
                'image' => $imageName,
            ]);
            return back()->with('success', 'Data inserted successfully!');
        } catch (\Exception $e) {
            return back()->with('fail', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
public function edit($id)
{
    $category=Category::find($id);
    return view('admin.category.create', compact('category'));
}
public function update(Request $request, $id)
{
    
    $request->validate([
        'name'=>'required',
     ]);
   try{
     if ($request->has('image')) {
      
        $image = $request->image;
        $name = $image->getClientOriginalName();
        $fileName = time() . $name;
        $image->move(public_path('images\categories'), $fileName);
        $image =   $fileName;
    }
    else
    {
        $image=Category::where('id',$id)->value('image');
    }
   
    Category::where('id', $id)->update([
        'name' => $request->name,
        'description' => $request->description,
        'image'=>$image
    ]);
    return redirect()->route('categories.index');
}
catch(Exception $e)
{
    return back()->with('fail','Something went wrong!');
}

}
public function destroy($id)
{
    $product=Category::find($id)->delete();
    return back()->with('success', 'Data deleted successfully!');
}
}