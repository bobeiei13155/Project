<?php

namespace App\Http\Controllers\Stminishow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\brand;
use App\Gen;
use App\Pattern;
use App\Color;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::paginate(3);

        return view('Stminishow.ProductForm', compact("products"))
            ->with('gens', gen::all())
            ->with('brands', brand::all())
            ->with('patterns', pattern::all())
            ->with('colors', color::all())
            ->with('categories', category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchPRO(Request $request)
    {
        $searchPRO = $request->searchPRO;
        $products = DB::table('products')
            ->join('categories', 'products.Category_Id', "LIKE", 'categories.Id_Category')
            ->join('brands', 'products.Brand_Id', "LIKE", 'brands.Id_Brand')
            ->join('gens', 'products.Gen_Id', "LIKE", 'gens.Id_Gen')

            ->where('Id_Product', "LIKE", "%{$searchPRO}%")
            ->orwhere('Name_Product', "LIKE", "%{$searchPRO}%")
            ->orwhere('Name_Category', "LIKE", "%{$searchPRO}%")
            ->orwhere('Name_Brand', "LIKE", "%{$searchPRO}%")
            ->orwhere('Name_Gen', "LIKE", "%{$searchPRO}%")->paginate(5);
        return view("Stminishow.SearchProductForm")->with("products", $products)
            ->with('gens', gen::all())
            ->with('brands', brand::all())
            ->with('categories', Category::all());
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

            'Name_Product' => 'required',
            'Category_Id' => 'required',
            'Brand_Id' => 'required',
            'Gen_Id' => 'required',
            'Color_Id' => 'required',
            'Pattern_Id' => 'required',
            'Insurance' => 'required',
            'Purchase' => 'required',
            'Price' => 'required',
            'Detail' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:5000 '
            //
        ]);

        $stringImageReFormat = base64_encode('_' . time());
        $ext = $request->file('image')->getClientOriginalExtension();
        $imageName = $stringImageReFormat . "." . $ext;
        $imageEncoded = File::get($request->image);

        Storage::disk('local')->put('public/Products_image/' . $imageName, $imageEncoded);



        $GenId = DB::table('products')->max('Id_Product');

        if (is_null($GenId)) {
            $Id_Product = "PRO" . "-" . date('Y') . date('m') . "-" . "000";
        } else {

            $GenId_PRO = substr($GenId, 11, 14) + 1;

            if ($GenId_PRO < 10) {
                $Id_Product = "PRO" . "-" . date('Y') . date('m') . "-" . "00" . $GenId_PRO;
            } elseif ($GenId_PRO >= 10 && $GenId_PRO < 100) {
                $Id_Product = "PRO" . "-" . date('Y') . date('m') . "-" . "0" . $GenId_PRO;
            } elseif ($GenId_PRO >= 100) {
                $Id_Product = "PRO" . "-" . date('Y') . date('m') . "-" . $GenId_PRO;
            }
        }
        $products = new product;
        $products->Id_Product = $Id_Product;
        $products->Name_Product = $request->Name_Product;
        $products->Category_Id = $request->Category_Id;
        $products->Brand_Id = $request->Brand_Id;
        $products->Gen_Id = $request->Gen_Id;
        $products->Color_Id = $request->Color_Id;
        $products->Pattern_Id = $request->Pattern_Id;
        $products->Insurance = $request->Insurance;
        $products->Purchase = $request->Purchase;
        $products->Price = $request->Price;
        $products->Detail = $request->Detail;
        $products->Img_Product = $imageName;

        $products->save();

        return redirect('/Stminishow/ShowProduct');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProduct()
    {
        $products = product::paginate(3);

        return view('Stminishow.ShowProductForm', compact("products"))
            ->with('gens', gen::all())
            ->with('brands', brand::all())
            ->with('patterns', pattern::all())
            ->with('colors', color::all())
            ->with('categories', category::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Id_Product)
    {
        $products = Product::find($Id_Product);
        return view('Stminishow.EditProductForm', ['products' => $products])->with('gens', gen::all())
            ->with('brands', brand::all())
            ->with('patterns', pattern::all())
            ->with('colors', color::all())
            ->with('categories', category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id_Product)
    {

        $request->validate([
            'Name_Product' => 'required',
            'Category_Id' => 'required',
            'Brand_Id' => 'required',
            'Gen_Id' => 'required',
            'Color_Id' => 'required',
            'Pattern_Id' => 'required',
            'Insurance' => 'required',
            'Purchase' => 'required',
            'Price' => 'required',
            'Detail' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:5000 '

        ]);

        if ($request->hasFile("image")) {
            $products = Product::find($Id_Product);
            $exists = Storage::disk('local')->exists("public/Products_image/" . $products->Img_Product); //เจอไฟล์ภาพชื่อตรงกัน
            if ($exists) {
                Storage::delete("public/Products_image/" . $products->Img_Product);
            }
            $request->image->storeAs("public/Products_image/", $products->Img_Product);
        }

        $products->Name_Product = $request->Name_Product;
        $products->Category_Id = $request->Category_Id;
        $products->Brand_Id = $request->Brand_Id;
        $products->Gen_Id = $request->Gen_Id;
        $products->Color_Id = $request->Color_Id;
        $products->Pattern_Id = $request->Pattern_Id;
        $products->Insurance = $request->Insurance;
        $products->Purchase = $request->Purchase;
        $products->Price = $request->Price;
        $products->Detail = $request->Detail;

        $products->save();

        return redirect('/Stminishow/ShowProduct');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($Id_Product)
    {
        $products = Product::find($Id_Product);
        $exists = Storage::disk('local')->exists("public/Products_image/" . $products->Img_Product); //เจอไฟล์ภาพชื่อตรงกัน
        if ($exists) {
            Storage::delete("public/Products_image/" . $products->Img_Product);
        }
        Product::destroy($Id_Product);
        return redirect('/Stminishow/ShowProduct');
    }
}
