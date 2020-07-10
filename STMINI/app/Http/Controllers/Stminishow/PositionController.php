<?php

namespace App\Http\Controllers\Stminishow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\position;
class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions= position::all();

        return view('Stminishow.PositionForm',compact("positions"));
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
            'Name_Position' => 'required|unique:positions|max:255'
        ]);
        $position = new position;
        $position->Name_Position = $request->Name_Position;
        $position->save();
        return redirect('/Stminishow/createPosition');
        
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
    public function edit($Id_Position)
    {
         $position=position::find($Id_Position);
       
         return view('Stminishow.EditPositionForm',['position'=>$position]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$Id_Position)
    {
        $request->validate([
            'Name_Position' => 'required|unique:positions|max:255'
        ]);

        $position=position::find($Id_Position);
        $position->Name_Position=$request->Name_Position;
        $position->save();
        return redirect('/Stminishow/createPosition');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($Id_Position)
    {
        position::destroy($Id_Position);
        return redirect('/Stminishow/createPosition');
    }
}
