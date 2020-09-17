<?php

namespace App\Http\Controllers\Stminishow;
use App\Telmem;
use App\Member;
use App\Categorymember;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = DB::table('province')->orderBy('PROVINCE_NAME', 'asc')->get();
        $am = DB::table('amphur')->orderBy('AMPHUR_NAME', 'asc')->get();
        return view('Stminishow.MemberForm')->with('list', $list)->with('am', $am)->with('categorymembers', categorymember::all());
    }
    public function ShowMem()
    {
        $members = member::paginate(5);
        $telmems = Telmem::all();
        return view('Stminishow.ShowMemberForm', compact("members"))->with('telmems', $telmems)->with('categorymembers', categorymember::all());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

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

            'FName_Member' => 'required',
            'LName_Member' => 'required',
            'Cmember_Id' => 'required',
            'Email_Member' => 'required|email',
            'Address_Member' => 'required',
            'Sex_Member' => 'required',
            'Bdate_Member' => 'required',
            'Province_Id' => 'required',
            'District_Id' => 'required',
            'Postcode_Id' => 'required',
            'Subdistrict_Id' => 'required',
            'Tel_Mem.*' => 'required',

        ]);

        $GenId = DB::table('members')->max('Id_Member');
        $GenId_Mem = substr($GenId, 11, 14) + 1;
        if ($GenId_Mem < 10) {
            $Id_Member = "MEM" . "-" . date('Y') . date('m') . "-" . "00" . $GenId_Mem;
        } elseif ($GenId_Mem >= 10 && $GenId_Mem < 100) {
            $Id_Member = "MEM" . "-" . date('Y') . date('m') . "-" . "0" . $GenId_Mem;
        } elseif ($GenId_Mem >= 100) {
            $Id_Member = "MEM" . "-" . date('Y') . date('m') . "-" . $GenId_Mem;
        }
        $member = new member;
        $member->FName_Member = $request->FName_Member;
        $member->LName_Member = $request->LName_Member;
        $member->Id_Member = $Id_Member;
        $member->Cmember_Id = $request->Cmember_Id;
        $member->Email_Member = $request->Email_Member;
        $member->Address_Member = $request->Address_Member;
        $member->Bdate_Member = $request->Bdate_Member;
        $member->Sex_Member = $request->Sex_Member;
        $member->Province_Id = $request->Province_Id;
        $member->District_Id = $request->District_Id;
        $member->Postcode_Id = $request->Postcode_Id;
        $member->Subdistrict_Id = $request->Subdistrict_Id;
        $member->save();

        foreach ($request['Tel_MEM'] as $item => $value) {
            $request2 = array(
                'Id_Member' => $Id_Member,
                'Tel_MEM' => $request['Tel_MEM'][$item]
            );
            Telmem::create($request2);
        };


          return redirect('/Stminishow/showMember');
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
