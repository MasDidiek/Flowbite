<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys = Category::all();
        return view("category.index", compact("categorys"));
    }
    public function create()
    {
        return view("barang.add_kategori");
    }

    public function store(Request $request)
    {
        //validate the data
        $request->validate([
            "name" => "required",
            "description" => "nullable",
        ]);

        //save to database
        $Category = new Category();
        $Category->name = $request->name;
        $Category->description = $request->description;

        $Category->save();

        return redirect()
            ->route("categories.index")
            ->with("success", "kategori created successfully.");
    }

    public function ajaxEdit(Request $request)
    {

        $category = Category::find($request->id);

           if (!$category) {
               return response()->json(['error' => 'Data tidak ditemukan'], 404);
           }
        return response()->json($category);
    }




    public function edit($id)
    {
        $Category = Category::find($id);
        return view("barang.edit_kategori", compact("kategori"));
    }

    public function update(Request $request, $id)
    {
        //validate the data
        $request->validate([
            "name" => "required",
        ]);

        $Category = Category::findOrFail($id);
        //update the Category
        $Category->name = $request->name;
        $Category->description = $request->description;


        $Category->save();

        return redirect()
            ->route("categories.index")
            ->with("success", "kategori updated successfully.");
    }

    public function destroy($id)
    {
        $Category = Category::findOrFail($id);
        $Category->delete();

        return redirect()
            ->route("categories.index")
            ->with("success", "kategori deleted successfully.");
    }
}
