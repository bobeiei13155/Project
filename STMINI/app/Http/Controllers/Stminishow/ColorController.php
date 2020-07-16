<?php

namespace App\Http\Controllers\Stminishow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\color;
class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors= color::all();
        return view('Stminishow.ColorForm',compact("colors"));
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
            'Name_Color' => 'required|unique:colors|max:255'
        ]);
        $color = new color;
        $color->Name_Color = $request->Name_Color;
        $color->save();
        return redirect('/Stminishow/createColor');
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
    public function edit($Id_Color)
    {
        $colors=color::find($Id_Color);
       
        return view('Stminishow.EditColorForm',['color'=>$colors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id_Color)
    {
        $request->validate([
            'Name_Color' => 'required|unique:colors|max:255'
        ]);

        $color=color::find($Id_Color);
        $color->Name_Color=$request->Name_Color;
        $color->save();
        return redirect('/Stminishow/createColor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($Id_Color)
    {
        color::destroy($Id_Color);
        return redirect('/Stminishow/createColor');
    }
}
