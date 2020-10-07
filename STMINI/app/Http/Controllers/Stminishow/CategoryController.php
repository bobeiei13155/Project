<?php

namespace App\Http\Controllers\Stminishow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= category::paginate(5);
        return view('Stminishow.CategoryForm',compact("categories"));
    }


    public function searchCRP(Request $request)
    {

        $searchCRP = $request->searchCRP;
        $categories = DB::table('categories')
            ->where('Id_Category', "LIKE", "%{$searchCRP}%")
            ->orwhere('Name_Category', "LIKE", "%{$searchCRP}%")->paginate(5);  
        return view("Stminishow.SearchCategoryForm")->with("categories", $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'Name_Category' => 'required|unique:categories|max:255'
        ]);

        
        $GenId = DB::table('categories')->max('Id_Category');

        if (is_null($GenId)) {
            $Id_Category = "CRP" . "-" . date('Y') . date('m') . "-" . "000";
        } else {

        $GenId_CRP = substr($GenId, 11, 14) + 1;

        if ($GenId_CRP < 10) {
            $Id_Category = "CRP" . "-" . date('Y') . date('m') . "-" . "00" . $GenId_CRP;
        } elseif ($GenId_CRP >= 10 && $GenId_CRP < 100) {
            $Id_Category = "CRP" . "-" . date('Y') . date('m') . "-" . "0" . $GenId_CRP;
        } elseif ($GenId_CRP >= 100) {
            $Id_Category = "CRP" . "-" . date('Y') . date('m') . "-" . $GenId_CRP;
        }
    }

        $category = new Category;
        $category->Id_Category = $Id_Category;
        $category->Name_Category = $request->Name_Category;
        #$category->save();
        return redirect('/Stminishow/createCategory');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Id_Category)
    {
         $categories=category::find($Id_Category);
       
          return view('Stminishow.EditCategoryForm',['category'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id_Category)
    {
        $request->validate([
            'Name_Category' => 'required|unique:categories|max:255'
        ]);

        $category=category::find($Id_Category);
        $category->Name_Category=$request->Name_Category;
        $category->save();
        return redirect('/Stminishow/createCategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($Id_Category)
    {
        category::destroy($Id_Category);
        return redirect('/Stminishow/createCategory');
    }
}
