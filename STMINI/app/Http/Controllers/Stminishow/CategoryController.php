<?php

namespace App\Http\Controllers\Stminishow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= category::all();
        return view('Stminishow.CategoryForm',compact("categories"));
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
        $category = new Category;
        $category->Name_Category = $request->Name_Category;
        $category->save();
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
