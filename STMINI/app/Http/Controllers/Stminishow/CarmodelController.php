<?php

namespace App\Http\Controllers\Stminishow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Carmodel;
class CarmodelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carmodels= Carmodel::paginate(3);

        return view('Stminishow.CarmodelForm',compact("carmodels"));
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
            'Name_Carmodel' => 'required|unique:Carmodels|max:255'
        ]);
        $Carmodel = new Carmodel;
        $Carmodel->Name_Carmodel = $request->Name_Carmodel;
        $Carmodel->save();
        return redirect('/Stminishow/createCarmodel');
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
    public function edit($Id_Carmodel)
    {
        $carmodels=carmodel::find($Id_Carmodel);
       
          return view('Stminishow.EditCarmodelForm',['carmodel'=>$carmodels]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id_Carmodel)
    {
        $request->validate([
            'Name_Carmodel' => 'required|unique:Carmodels|max:255'
        ]);
        $carmodels=carmodel::find($Id_Carmodel);
        $carmodels->Name_Carmodel = $request->Name_Carmodel;
        $carmodels->save();
        return redirect('/Stminishow/createCarmodel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($Id_Category)
    {
        carmodel::destroy($Id_Category);
        return redirect('/Stminishow/createCarmodel');
    }
}
