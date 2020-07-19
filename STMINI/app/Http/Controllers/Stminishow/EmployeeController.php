<?php

namespace App\Http\Controllers\Stminishow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Position;
use App\Employee;
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
        $list= DB::table('province')
        ->orderBy('PROVINCE_NAME','asc')->get();
        return view('Stminishow.EmployeeForm')->with('list',$list)->with('positions',Position::all());
    }
    
    public function f_amphures(Request $request)
    {
       $id= $request->get('select');
       $result=array();
       $query=DB::table('province')
       ->join('amphur','province.PROVINCE_ID','=','amphur.PROVINCE_ID')
       ->select('amphur.AMPHUR_NAME','amphur.AMPHUR_ID')
       ->where('province.PROVINCE_ID',$id)
       ->groupBy('amphur.AMPHUR_NAME','amphur.AMPHUR_ID')
       ->get();
       $output='<option value="">เลือกอำเภอของท่าน</option>';
       foreach ($query as $row){
            $output.='<option value="'.$row->AMPHUR_ID.'">'.$row->AMPHUR_NAME.'</option>';
       }
       echo $output;
       
    }
    
    public function f_districts(Request $request)
    {
       $id= $request->get('select');
       $result=array();
       $query=DB::table('amphur')
       ->join('district','amphur.AMPHUR_ID','=','district.AMPHUR_ID')
       ->select('district.DISTRICT_NAME','district.DISTRICT_ID')
       ->where('amphur.AMPHUR_ID',$id)
       ->groupBy('district.DISTRICT_NAME','district.DISTRICT_ID')
       ->get();
       $output='<option value="">เลือกตำบลของท่าน</option>';
       foreach ($query as $row){
            $output.='<option value="'.$row->DISTRICT_ID.'">'.$row->DISTRICT_NAME.'</option>';
       }
       echo $output;
       
    }
    
    public function f_postcode(Request $request)
    {
       $id= $request->get('select');
       $result=array();
       $query=DB::table('district')
       ->select('POSTCODE')
       ->where('district.DISTRICT_ID',$id)
       ->get();
       $output='<option value="">เลือกรหัสไปรษณีย์ของท่าน</option>';
       foreach ($query as $row){
            $output.='<option value="'.$row->POSTCODE.'" selected>'.$row->POSTCODE.'</option>';
       }
       echo $output;
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ShowEmp()
    {
        $employees= employee::all();
        return view('Stminishow.ShowEmployeeForm',compact("employees"));
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
            'Title_Emp' => 'required',
            'FName_Emp' => 'required|unique:employees',
            'LName_Emp' => 'required|unique:employees',
            'Position_Id'=> 'required',
            'Username_Emp' => 'required|unique:employees',
            'Password_Emp' => 'required|unique:employees',
            'Idcard_Emp' => 'required|unique:employees',
            'Email_Emp' => 'required|email|unique:employees',
            'Address_Emp' => 'required',
            'Bdate_Emp' => 'required',
            'Salary_Emp'=> 'required',
            'Sex_Emp'=> 'required',
            'Tel_Emp' => 'required|unique:employees',
            'Subdistrict_Id'=> 'required'

        ]);
        $employee = new Employee;
        $employee->Title_Emp = $request->Title_Emp;
        $employee->FName_Emp = $request->FName_Emp;
        $employee->LName_Emp = $request->LName_Emp;
        $employee->Position_Id = $request->Position_Id;
        $employee->Username_Emp = $request->Username_Emp;
        $employee->Password_Emp = $request->Password_Emp;
        $employee->Idcard_Emp = $request->Idcard_Emp;
        $employee->Email_Emp = $request->Email_Emp;
        $employee->Address_Emp = $request->Address_Emp;
        $employee->Bdate_Emp = $request->Bdate_Emp;
        $employee->Tel_Emp = $request->Tel_Emp;
        $employee->Salary_Emp = $request->Salary_Emp;
        $employee->Sex_Emp =$request->Sex_Emp;
        $employee->Subdistrict_Id = $request->Subdistrict_Id;
        $employee->save();
        return redirect('/Stminishow/showEmployee');
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
    public function edit($Id_Emp)
    {
        $employees=Employee::find($Id_Emp);
        $list= DB::table('province')
        ->orderBy('PROVINCE_NAME','asc')->get();
        return view('Stminishow.EditEmployeeForm',['employee'=>$employees])->with('list',$list)->with('positions',Position::all());
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
