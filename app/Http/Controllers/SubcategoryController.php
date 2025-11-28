<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    function subcategoryById($id)
    {
        $categorys = Category::all();
        $detailCategory = Category::find($id);

        $Subcategory = Subcategory::where("id_category", $id)->get();
        //dd($Subcategory);

        return view("barang.index_subkategori", [
            "subCategorys" => $Subcategory,
            "categorys" => $categorys,
            "detailCategory" => $detailCategory,
            "category_id" => $id,
        ]);
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
        $request->validate([
            "name" => "required",
            "id_category" => "required",
        ]);

        $id_category = $request->id_category;
        //save to database
        $Subcategory = new Subcategory();
        $Subcategory->name = $request->name;
        $Subcategory->id_category = $id_category;
        $Subcategory->description = $request->description;

        $Subcategory->save();

        return redirect()
            ->route("subkategori_by_id", $id_category)
            ->with("success", "Subkategori created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
