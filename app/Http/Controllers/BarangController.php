<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Barang;
use App\Models\Satuan;
use App\Models\BarangDatang;

class BarangController extends Controller
{
    public function index()
    {
        $categorys = Category::all();
        $subcategorys = Subcategory::all();
        $barang = Barang::all();

        return view("barang.index_barang", [
            "barang" => $barang,
            "Category" => $categorys,
            "SubCategory" => $subcategorys,
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $barangs = \App\Models\Barang::where(
            "name",
            "LIKE",
            "%" . $keyword . "%"
        )
            ->limit(5)
            ->get(["name", "sumber_dana", "satuan", "merk", "penyedia"]); // ambil kolom yang diperlukan saja

        return response()->json($barangs);
    }

    public function barangById($categoryId, $subCategoryId)
    {
        $barang = Barang::where("id_subcategory", $subCategoryId)->get();
        // return view('barang.listbarang_by_idsubkategori', compact('barang'));
        //

        $detailCategory = Category::find($categoryId);
        $detailSubCategory = Subcategory::find($subCategoryId);
        return view("barang.listbarang_by_idsubkategori", [
            "barang" => $barang,
            "detailCategory" => $detailCategory,
            "detailSubCategory" => $detailSubCategory,
        ]);
    }

    public function create()
    {
        $categorys = Category::all();
        $subcategorys = Subcategory::all();
        $satuan = Satuan::all();
        return view("barang.add_barang", [
            "Category" => $categorys,
            "SubCategory" => $subcategorys,
            "satuan" => $satuan,
        ]);
    }

    public function add_barang_from_subcategory($subCategoryId)
    {
        $detailSubCategory = SubCategory::find($subCategoryId);
        $id_category = $detailSubCategory->id_category;
        $detailCategory = Category::find($id_category);
        $satuan = Satuan::all();
        // dd($detailCategory);

        return view("barang.add_barang_from_subcategory", [
            "detailCategory" => $detailCategory,
            "detailSubCategory" => $detailSubCategory,
            "satuan" => $satuan,
        ]);
    }

    public function ajaxGetSubcategories($id)
    {
        $subcategories = Subcategory::where("id_category", $id)->get();
        return response()->json($subcategories);
    }

    public function store(Request $request)
    {
        $request->validate([
            "category" => "required",
            "sub_category" => "required",
            "name" => "required",
            "penyedia" => "required",
            "upload_image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        $id_category = $request->category;
        $id_subcategory = $request->sub_category;

        $imageName = "no_image.png";
        if ($request->hasFile("upload_image")) {
            $image = $request->file("upload_image");
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("upload_image"), $imageName);
        }

        $Barang = new Barang();

        $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $numbers = "0123456789";
        $code = $characters[rand(0, strlen($characters) - 1)];

        for ($i = 1; $i < 6; $i++) {
            $code .= $numbers[rand(0, strlen($numbers) - 1)];
        }
        $Barang->kode_barang = $code;

        $Barang->name = $request->name;
        $Barang->description = $request->deskripsi;
        $Barang->id_category = $request->category;
        $Barang->id_subcategory = $request->sub_category;
        $Barang->satuan = $request->satuan;
        $Barang->stock = 0;
        $Barang->sumber_dana = $request->sumber_dana;
        $Barang->merk = $request->merk;
        $Barang->penyedia = $request->penyedia;
        $Barang->image = $imageName;

        $Barang->save();

        return redirect()
            ->route("barang")
            ->with("success", "Data barang berhasil dibuat.");
    }

    public function insertBarangBySubcategory(Request $request)
    {
        $request->validate([
            "name" => "required",
            "harga" => "required|numeric",
            "batch_no" => "required",
            "penyedia" => "required",
            "expired_date" => "required",
            "upload_image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        $id_category = $request->category;
        $id_subcategory = $request->sub_category;
        $expired_date = $request->expired_date;
        //dd($expired_date);
        $expired_date = date("Y-m-d", strtotime($expired_date));
        $imageName = "no_image.png";
        if ($request->hasFile("upload_image")) {
            $image = $request->file("upload_image");
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("upload_image"), $imageName);
        }

        $Barang = new Barang();
        $Barang->name = $request->name;
        $Barang->description = $request->deskripsi;
        $Barang->id_category = $request->category;
        $Barang->id_subcategory = $request->sub_category;
        $Barang->satuan = $request->satuan;
        $Barang->stock = 0;
        $Barang->sumber_dana = $request->sumber_dana;
        $Barang->price = $request->harga;
        $Barang->batch_no = $request->batch_no;
        $Barang->expired_date = $expired_date;
        $Barang->merk = $request->merk;
        $Barang->penyedia = $request->penyedia;
        $Barang->image = $imageName;

        $Barang->save();

        return redirect()
            ->route("barang_by_id", [$id_category, $id_subcategory])
            ->with("success", "kategori created successfully.");
    }

    public function detailBarang($id)
    {
        $detailbarang = Barang::find($id);

        return view("barang.detail_barang", [
            "barang" => $detailbarang,
        ]);
    }

    public function edit($id)
    {
        $satuan = Satuan::all();
        $categorys = Category::all();
        $subcategorys = Subcategory::all();
        $detailbarang = Barang::find($id);

        return view("barang.edit_barang", [
            "barang" => $detailbarang,
            "Category" => $categorys,
            "satuan" => $satuan,
            "SubCategory" => $subcategorys,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "penyedia" => "required",
            "upload_image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        $id_category = $request->category;
        $id_subcategory = $request->sub_category;
        // $expired_date = $request->expired_date;
        // //dd($expired_date);
        // $expired_date = date("Y-m-d", strtotime($expired_date));

        $detailbarang = Barang::find($id);
        $imageName = $detailbarang->image;

        if ($request->hasFile("upload_image")) {
            // Hapus gambar lama jika ada
            if ($imageName != "no_image.png") {
                //klo gambarnya no image, jangan dihapus, karna itu gambar dummy
                if (
                    $detailbarang->image &&
                    file_exists(
                        public_path("upload_image/" . $detailbarang->image)
                    )
                ) {
                    unlink(public_path("upload_image/" . $detailbarang->image));
                }
            }

            // Upload gambar baru
            $image = $request->file("upload_image");
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("upload_image"), $imageName);
        }

        $Barang = Barang::findOrFail($id);

        $Barang->name = $request->name;
        $Barang->description = $request->deskripsi;
        $Barang->id_category = $request->category;
        $Barang->id_subcategory = $request->sub_category;
        $Barang->satuan = $request->satuan;
        $Barang->stock = 0;
        $Barang->merk = $request->merk;
        $Barang->sumber_dana = $request->sumber_dana;
        $Barang->penyedia = $request->penyedia;
        $Barang->image = $imageName;

        $Barang->save();

        return redirect()
            ->route("barang")
            ->with("success", "Data barang berhasil diupdate");
    }

    public function delete($id)
    {
        $Category = Barang::findOrFail($id);
        $Category->delete();

        return redirect()
            ->route("barang")
            ->with("success", "Data Barang berhasil dihapus");
    }

    function barangDatang()
    {
        $barang_datang = BarangDatang::all();
        return view("barang.barang_datang", [
            "barang_datang" => $barang_datang,
        ]);
    }
}
