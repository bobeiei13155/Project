<?php
namespace App\Http\Controllers;
namespace App\Http\Controllers\Stminishow;
use Illuminate\Database\Eloquent\Collection;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Position;
use App\Employee;
use App\Telemp;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function searchEmp(Request $request)
    {
        //dd($request->searchEmp);

        $searchEmp = $request->searchEmp;

        // if ($searchposition != Null){

        // };
        // $datasearch = json_decode(json_encode($searchposition), true);

        //  dd($searchposition);
        $employees = DB::table('employees')
            ->join('positions', 'employees.Position_Id', "LIKE", 'positions.Id_Position')
            ->where('Id_Emp', "LIKE", "%{$searchEmp}%")
            ->orwhere('FName_Emp', "LIKE", "%{$searchEmp}%")
            ->orwhere('Name_Position', "LIKE", "%{$searchEmp}%")->get();  
        return view("Stminishow.SearchEmployeeForm")->with("employees", $employees)->with('positions', Position::all());
    }


    public function index()
    {
        $list = DB::table('province')->orderBy('PROVINCE_NAME', 'asc')->get();
        $am = DB::table('amphur')->orderBy('AMPHUR_NAME', 'asc')->get();
        return view('Stminishow.EmployeeForm')->with('list', $list)->with('am', $am)->with('positions', Position::all());
    }

    public function f_amphures(Request $request)
    {
        $id = $request->get('select');
        $result = array();
        $query = DB::table('province')
            ->join('amphur', 'province.PROVINCE_ID', '=', 'amphur.PROVINCE_ID')
            ->select('amphur.AMPHUR_NAME', 'amphur.AMPHUR_ID')
            ->where('province.PROVINCE_ID', $id)
            ->groupBy('amphur.AMPHUR_NAME', 'amphur.AMPHUR_ID')
            ->get();
        $output = '<option value="">เลือกอำเภอของท่าน</option>';
        foreach ($query as $row) {
            $output .= '<option value="' . $row->AMPHUR_ID . '">' . $row->AMPHUR_NAME . '</option>';
        }
        echo $output;
    }

    public function f_districts(Request $request)
    {
        $id = $request->get('select');
        $result = array();
        $query = DB::table('amphur')
            ->join('district', 'amphur.AMPHUR_ID', '=', 'district.AMPHUR_ID')
            ->select('district.DISTRICT_NAME', 'district.DISTRICT_ID')
            ->where('amphur.AMPHUR_ID', $id)
            ->groupBy('district.DISTRICT_NAME', 'district.DISTRICT_ID')
            ->get();
        $output = '<option value="">เลือกตำบลของท่าน</option>';
        foreach ($query as $row) {
            $output .= '<option value="' . $row->DISTRICT_ID . '">' . $row->DISTRICT_NAME . '</option>';
        }
        echo $output;
    }

    public function f_postcode(Request $request)
    {
        $id = $request->get('select');
        $result = array();
        $query = DB::table('district')
            ->select('POSTCODE')
            ->where('district.DISTRICT_ID', $id)
            ->get();
        $output = '<option value="">เลือกรหัสไปรษณีย์ของท่าน</option>';
        foreach ($query as $row) {
            $output .= '<option value="' . $row->POSTCODE . '" selected>' . $row->POSTCODE . '</option>';
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
        $employees = employee::paginate(5); 
        return view('Stminishow.ShowEmployeeForm', compact("employees"))
            ->with('positions', Position::all());
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

            'FName_Emp' => 'required',
            // 'LName_Emp' => 'required',
            // 'Position_Id' => 'required',
            // 'Username_Emp' => 'required',
            // 'Password_Emp' => 'required',
            // 'Idcard_Emp' => 'required',
            // 'Email_Emp' => 'required|email',
            // 'Address_Emp' => 'required',
            // 'Bdate_Emp' => 'required',
            // 'Salary_Emp' => 'required',
            // 'Sex_Emp' => 'required',
            // 'Province_Id' => 'required',
            // 'District_Id' => 'required',
            // 'Postcode_Id' => 'required',
            // 'Subdistrict_Id' => 'required',
            'Tel_Emp.*' => 'required',

        ]);

        $GenId = DB::table('employees')->max('Id_Emp');
        $GenId_Emp = substr($GenId, 11, 14) + 1;
        if ($GenId_Emp < 10) {
            $Id_Emp = "EMP" . "-" . date('Y') . date('m') . "-" . "00" . $GenId_Emp;
        } elseif ($GenId_Emp >= 10 && $GenId_Emp < 100) {
            $Id_Emp = "EMP" . "-" . date('Y') . date('m') . "-" . "0" . $GenId_Emp;
        } elseif ($GenId_Emp >= 100) {
            $Id_Emp = "EMP" . "-" . date('Y') . date('m') . "-" . $GenId_Emp;
        }
        $employee = new Employee;
        $employee->FName_Emp = $request->FName_Emp;
        $employee->Id_Emp = $Id_Emp;
        // $employee->LName_Emp = $request->LName_Emp;
        // $employee->Position_Id = $request->Position_Id;
        // $employee->Username_Emp = $request->Username_Emp;
        // $employee->Password_Emp = $request->Password_Emp;
        // $employee->Idcard_Emp = $request->Idcard_Emp;
        // $employee->Email_Emp = $request->Email_Emp;
        // $employee->Address_Emp = $request->Address_Emp;
        // $employee->Bdate_Emp = $request->Bdate_Emp;
        // $employee->Salary_Emp = $request->Salary_Emp;
        // $employee->Sex_Emp = $request->Sex_Emp;
        // $employee->Province_Id = $request->Province_Id;
        // $employee->District_Id = $request->District_Id;
        // $employee->Postcode_Id = $request->Postcode_Id;
        // $employee->Subdistrict_Id = $request->Subdistrict_Id;
        $employee->save();

        foreach ($request['Tel_Emp'] as $item => $value) {
            $request2 = array(
                'Id_Emp' => $Id_Emp,
                'Tel_Emp' => $request['Tel_Emp'][$item]
            );
            Telemp::create($request2);
        };


        //  return redirect('/Stminishow/showEmployee');
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
        $employees = Employee::find($Id_Emp);
        $list = DB::table('province')->orderBy('PROVINCE_NAME', 'asc')->get();
        $amphur = DB::table('amphur')->orderBy('AMPHUR_NAME', 'asc')->get();
        $subdistrict = DB::table('district')->orderBy('DISTRICT_NAME', 'asc')->get();
        $telemps = DB::table('telemps')->where('Id_Emp', $Id_Emp)->get();
        // echo"<pre>";
        // print_r($telemps);
        // echo"</pre>";
        return view('Stminishow.EditEmployeeForm', ['employee' => $employees])->with('telemps', $telemps)->with('subdistrict', $subdistrict)->with('amphur', $amphur)->with('list', $list)->with('positions', Position::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id_Emp)
    {

        $request->validate([
            'Tel_Emp.*' => 'required'
        ]);

        $Tel_Emp = DB::table('telemps')
            ->select('telemps.Id_Emp')
            ->where('telemps.Id_Emp', '=', $Id_Emp)->get();


        $data = json_decode(json_encode($Tel_Emp), true);

        // Telemp::destroy([$data]);

        //   dd($data);


        //  dd($Tel_Emp);

        if ($data != []) {
            Telemp::destroy([$data]);
            foreach ($request['Tel_Emp'] as $item => $value) {
                $request2 = array(
                    'Id_Emp' => $Id_Emp,
                    'Tel_Emp' => $request['Tel_Emp'][$item]
                );
                Telemp::create($request2);
            }
        } else {
            foreach ($request['Tel_Emp'] as $item => $value) {
                $request2 = array(
                    'Id_Emp' => $Id_Emp,
                    'Tel_Emp' => $request['Tel_Emp'][$item]
                );  
                Telemp::create($request2);
            }
        }




        $employee = Employee::find($Id_Emp);
        // $employee->FName_Emp = $request->FName_Emp;
        // $employee->LName_Emp = $request->LName_Emp;
        // $employee->Position_Id = $request->Position_Id;
        // $employee->Username_Emp = $request->Username_Emp;
        // $employee->Password_Emp = $request->Password_Emp;
        // $employee->Idcard_Emp = $request->Idcard_Emp;
        // $employee->Email_Emp = $request->Email_Emp;
        // $employee->Address_Emp = $request->Address_Emp;
        // $employee->Bdate_Emp = $request->Bdate_Emp;
        // $employee->Salary_Emp = $request->Salary_Emp;
        // $employee->Sex_Emp = $request->Sex_Emp;
        // $employee->Province_Id = $request->Province_Id;
        // $employee->District_Id = $request->District_Id;
        // $employee->Postcode_Id = $request->Postcode_Id;
        // $employee->Subdistrict_Id = $request->Subdistrict_Id;

        $employee->save();
        return redirect('/Stminishow/showEmployee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($Id_Emp)
    {
        Employee::destroy($Id_Emp);
        return redirect('/Stminishow/showEmployee');
    }
}
