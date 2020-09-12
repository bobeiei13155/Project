<?php

namespace App\Http\Controllers\Stminishow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gen;
use Illuminate\Support\Facades\DB;
class GenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gens= Gen::paginate(3);
        return view('Stminishow.GenForm',compact("gens"));
    }

    public function searchGEN(Request $request)
    {

        $searchGEN = $request->searchGEN;
        $gens = DB::table('gens')
            ->where('Id_Gen', "LIKE", "%{$searchGEN}%")
            ->orwhere('Name_Gen', "LIKE", "%{$searchGEN}%")->paginate(3);  
        return view("Stminishow.SearchGenForm")->with("gens", $gens);
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
        $GenId = DB::table('gens')->max('Id_Gen');

        if (is_null($GenId)) {
            $Id_Gen = "GEN" . "-" . date('Y') . date('m') . "-" . "000";
        } else {
            $GenId_GEN = substr($GenId, 11, 14) + 1;

            if ($GenId_GEN < 10) {
                $Id_Gen = "GEN" . "-" . date('Y') . date('m') . "-" . "00" . $GenId_GEN;
            } elseif ($GenId_GEN >= 10 && $GenId_GEN < 100) {
                $Id_Gen = "GEN" . "-" . date('Y') . date('m') . "-" . "0" . $GenId_GEN;
            } elseif ($GenId_GEN >= 100) {
                $Id_Gen = "GEN" . "-" . date('Y') . date('m') . "-" . $GenId_GEN;
            }
        }
        // dd($Id_Color);
        $request->validate([
            'Name_Gen' => 'required|unique:gens'
        ]);
        $gen = new gen;
        $gen->Id_Gen = $Id_Gen;
        $gen->Name_Gen = $request->Name_Gen;
        $gen->save();
        return redirect('/Stminishow/createGen');
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
    public function edit($Id_Gen)
    {
        $gen=gen::find($Id_Gen);
       
        return view('Stminishow.EditGenForm',['gens'=>$gen]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id_Gen)
    {
        $request->validate([
            'Name_Gen' => 'required|unique:gens'
        ]);

        $gen=gen::find($Id_Gen);
        $gen->Name_Gen=$request->Name_Gen;
        $gen->save();
        return redirect('/Stminishow/createGen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($Id_Gen)
    {
        gen::destroy($Id_Gen);
        return redirect('/Stminishow/createGen');
    }
}
