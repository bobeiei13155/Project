<?php

namespace App\Http\Controllers\Stminishow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categorymember;
use Illuminate\Support\Facades\DB;
class CategorymemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  $categorymembers= categorymember::paginate(5);
        return view('Stminishow.CategorymemberForm',compact("categorymembers"));
      
    }


    public function searchCMB(Request $request)
    {

        $searchCMB = $request->SearchCMB;
        $categorymembers = DB::table('categorymembers')
            ->where('Name_Cmember', "LIKE", "%{$searchCMB}%")
            ->orwhere('Discount_Cmember', "LIKE", "%{$searchCMB}%")->paginate(5);  
        return view("Stminishow.SearchCategorymemberForm")->with("categorymembers", $categorymembers);
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
        $GenId = DB::table('categorymembers')->max('Id_Cmember');

        if (is_null($GenId)) {
            $Id_Cmember = "CMB" . "-" . date('Y') . date('m') . "-" . "000";
        } else {
            $GenId_CMB = substr($GenId, 11, 14) + 1;

            if ($GenId_CMB < 10) {
                $Id_Cmember = "CMB" . "-" . date('Y') . date('m') . "-" . "00" . $GenId_CMB;
            } elseif ($GenId_CMB >= 10 && $GenId_CMB < 100) {
                $Id_Cmember = "CMB" . "-" . date('Y') . date('m') . "-" . "0" . $GenId_CMB;
            } elseif ($GenId_CMB >= 100) {
                $Id_Cmember = "CMB" . "-" . date('Y') . date('m') . "-" . $GenId_CMB;
            }
        }
        // dd($Id_Color);
        $request->validate([
            'Name_Cmember' => 'required|unique:categorymembers',
            'Discount_Cmember' => 'required|unique:categorymembers'
            
        ]);
        $categorymember = new categorymember;
        $categorymember->Id_Cmember = $Id_Cmember;
        $categorymember->Name_Cmember = $request->Name_Cmember;
        $categorymember->Discount_Cmember = $request->Discount_Cmember;
        $categorymember->save();
        return redirect('/Stminishow/createCategorymember');
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
    public function edit($Id_Cmember)
    {
        $categorymembers=categorymember::find($Id_Cmember);
       
        return view('Stminishow.EditCategorymemberForm',['categorymembers'=>$categorymembers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id_Cmember)
    {
        $request->validate([
            'Name_Cmember' => 'required',
            'Discount_Cmember' => 'required'
        ]);
        // dd($request->Gen_Id);
        $categorymembers = categorymember::find($Id_Cmember);
        $categorymembers->Name_Cmember = $request->Name_Cmember;
        $categorymembers->Discount_Cmember = $request->Discount_Cmember;
        $categorymembers->save();

        return redirect('/Stminishow/createCategorymember');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($Id_Cmember)
    {
        categorymember::destroy($Id_Cmember);
        return redirect('/Stminishow/createCategorymember');
    }
}
