<?php

namespace App\Http\Controllers\Stminishow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Position;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list= DB::table('provinces')->get();
        return view('Stminishow.EmployeeForm')->with('list',$list)->with('positions',Position::all());
    }
    
    public function fetch(Request $request)
    {
       $id= $request->get('select');
       $result=array();
       $query=DB::table('provinces')
       ->join('amphures','provinces.id','=','amphures.province_id')
       ->select('amphures.name_th')
       ->where('provinces.id',$id)
       ->groupBy('amphures.name_th')
       ->get();
       $output='<option value="">เลือกอำเภอของท่าน</option>';
       foreach ($query as $row){
            $output.='<option value="'.$row->name_th.'">'.$row->name_th.'</option>';
       }
       echo $output;
       
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
