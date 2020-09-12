<?php

namespace App\Http\Controllers\Stminishow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\color;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = color::paginate(5);
        return view('Stminishow.ColorForm', compact("colors"));
    }


    public function searchCLR(Request $request)
    {

        $searchCLR = $request->searchCLR;
        $colors = DB::table('colors')
            ->where('Id_Color', "LIKE", "%{$searchCLR}%")
            ->orwhere('Name_Color', "LIKE", "%{$searchCLR}%")->paginate(5);  
        return view("Stminishow.SearchColorForm")->with("colors", $colors);
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

        $GenId = DB::table('colors')->max('Id_Color');

        if (is_null($GenId)) {
            $Id_Color = "CLR" . "-" . date('Y') . date('m') . "-" . "000";
        } else {
            $GenId_CLR = substr($GenId, 11, 14) + 1;

            if ($GenId_CLR < 10) {
                $Id_Color = "CLR" . "-" . date('Y') . date('m') . "-" . "00" . $GenId_CLR;
            } elseif ($GenId_CLR >= 10 && $GenId_CLR < 100) {
                $Id_Color = "CLR" . "-" . date('Y') . date('m') . "-" . "0" . $GenId_CLR;
            } elseif ($GenId_CLR >= 100) {
                $Id_Color = "CLR" . "-" . date('Y') . date('m') . "-" . $GenId_CLR;
            }
        }
        // dd($Id_Color);
        $request->validate([
            'Name_Color' => 'required|unique:colors'
        ]);
        $color = new color;
        $color->Id_Color = $Id_Color;
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
        $colors = color::find($Id_Color);

        return view('Stminishow.EditColorForm', ['color' => $colors]);
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

        $color = color::find($Id_Color);
        $color->Name_Color = $request->Name_Color;
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
