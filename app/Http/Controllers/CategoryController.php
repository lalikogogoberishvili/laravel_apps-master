<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $categories=Category::all();
        return view("category.index",[
            "categories"=>$categories,
        ]);
    }

    
    public function create()
    {
        $categories = Category::all();

        return view('category.edit', [
          'categories' => $categories
        ]);
    }

   
    public function store(Request $request)
    {  
        $request->validate([
            'name'       => ['required', 'min:3', 'max:100'],
          ]);
      
          Category::create([
            'name'       => $request->name,
            'slug'       => Str::slug($request->name),
          ]);
      
          return [
            'success' => true,
            'message' => 'Category Succesfully Created'
          ];
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {    $categories = Category::all();
        $category = Category::where('id', $id)->first();
    
        return view('category.edit', [
          'category' => $category,
          'categories' => $categories
        ]);
    }

  
    public function update(Request $request, $id)
    {   

        
        $request->validate([
            'name'       => ['required', 'min:3', 'max:100'],
          ]);
      
          $category = Category::where('id', $id)->first();
      
          $category->update([
            'name'       => $request->name,
            'slug'       => Str::slug($request->name),
          ]);
      
          return [
            'success' => true,
            'message' => 'Category Succesfully changed with: ' . $request->name
          ];
    }

   
    public function destroy($id)
    {
        Category::where('id', $id)->delete();

        return response()->json([
      'success' => true,
      'message' => 'Category Succesfully deleted'
    ]);
  }
    
}
