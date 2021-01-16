<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Str;
class ItemController extends Controller
{
    
    public function index()
    {
        $items=Item::all();
        return view("item.index",[
            "items"=>$itmes,
        ]);
    }

    public function create()
    {
        $categories=Category::all();
        return view("item.edit",[
            'categories'=>$categories
        ]);
    }

   
     
    public function store(Request $request)
    {
        $request->validate([
            "name"=>["required","min:3", "max:100"],
            "slug"=>["nullable","min:3", "max:100"],
            "category_id"=>["numeric"]     
        ]);
        Item::create([
            "name"=>$request->name,
            "slug"=>Str::slug($request->slug?$request->slug:$request->name),
            "category_id"=>$request->category_id?$request->category_id : "No Category"
        ]);

        return [
            'success' => true,
            'message' => 'Category Succesfully Created'
          ];
        // return redirect()->route('admin.item.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item=item::where("id",$id)->first();
        $categories=Category::all();
        return view("item",[
            'item'=>$item,
            'categories'=>$categories
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            "name"=>["required","min:3", "max:255"],
            "slug"=>["nullable","min:3", "max:255"],
            "category_id"=>["numeric"]
            
        ]);
        $item=item::where("id",$id)->first();
            $item->update([
                'name'=>$request->name,
                'slug'=>Str::slug($request->slug?$request->slug:$request->name),
                'category_id'=>$request->category_id?$request->category_id : "No Category"
            ]);

            // return redirect()->route('admin.item.index') ;
            return [
                'success' => true,
                'message' => 'Category Succesfully changed with: ' . $request->name
              ];
    }

    public function destroy($id)
    {
        item::where("id",$id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Category Succesfully deleted'
          ]);
        // return redirect()->route('admin.item.index');
    }
}
