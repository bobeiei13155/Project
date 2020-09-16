<?php

namespace App\Http\Controllers\Stminishow;

use App\Telptn;
use App\Partner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function searchPTN(Request $request)
    {


        $searchPTN = $request->searchPTN;

        
        // if ($searchposition != Null){

        // };
        // $datasearch = json_decode(json_encode($searchposition), true);

        //  dd($searchposition);
        $partners = DB::table('partners')
            ->join('telptns', 'partners.Id_Partner', '=', 'telptns.Id_Partner')
            ->where('partners.Id_Partner', "LIKE", "%{$searchPTN}%")
            ->orwhere('Name_Partner', "LIKE", "%{$searchPTN}%")
            ->orwhere('Tel_PTN', "LIKE", "%{$searchPTN}%")
            ->paginate(3);


        // dd($partners);
        return view("Stminishow.SearchPartnerForm")->with("partners", $partners)->with('telptns', Telptn::all());
    }



    public function ShowPTN()
    {
        $partners = Partner::paginate(3);
        // $telptns = Telptn::where($partners)->first();
        $telptns = Telptn::all();
        //  $telptns = DB::table('telptns'); 
        //   $splitName = explode(' ',$telptns);
        // dd($telptns);
        //  $first_name = $splitName[0];

        //  $telptns = DB::table('partner')
        //  ->join('telptns', 'partner.Id_Partner', '=', 'telptns.Id_Partner')
        //  ->where('Id_Partner')->groupBy('Id_Partner');
        // $telptns = Telptn::first();
        return view('Stminishow.ShowPartnerForm')->with('partners', $partners)->with('telptns', $telptns);
    }
    public function index()
    {
        $list = DB::table('province')->orderBy('PROVINCE_NAME', 'asc')->get();
        $am = DB::table('amphur')->orderBy('AMPHUR_NAME', 'asc')->get();
        return view('Stminishow.PartnerForm')->with('list', $list)->with('am', $am);
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

            'Name_Partner' => 'required',
            'Province_Id' => 'required',
            'District_Id' => 'required',
            'Postcode_Id' => 'required',
            'Subdistrict_Id' => 'required',
            'Tel_PTN.*' => 'required',

        ]);

        $GenId = DB::table('partners')->max('Id_Partner');
        $GenId_PTN = substr($GenId, 11, 14) + 1;
        if ($GenId_PTN < 10) {
            $Id_Partner = "PTN" . "-" . date('Y') . date('m') . "-" . "00" . $GenId_PTN;
        } elseif ($GenId_PTN >= 10 && $GenId_PTN < 100) {
            $Id_Partner = "PTN" . "-" . date('Y') . date('m') . "-" . "0" . $GenId_PTN;
        } elseif ($GenId_PTN >= 100) {
            $Id_Partner = "PTN" . "-" . date('Y') . date('m') . "-" . $GenId_PTN;
        }
        $partner = new Partner;
        $partner->Name_Partner = $request->Name_Partner;
        $partner->Id_Partner = $Id_Partner;
        $partner->Address_Partner = $request->Address_Partner;
        $partner->Province_Id = $request->Province_Id;
        $partner->District_Id = $request->District_Id;
        $partner->Postcode_Id = $request->Postcode_Id;
        $partner->Subdistrict_Id = $request->Subdistrict_Id;
        $partner->save();

        foreach ($request['Tel_PTN'] as $item => $value) {
            $request2 = array(
                'Id_Partner' => $Id_Partner,
                'Tel_PTN' => $request['Tel_PTN'][$item]
            );
            Telptn::create($request2);
        };

        return view('Stminishow.ShowPartnerForm');
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
    public function edit($Id_Partner)
    {
        $partner = Partner::find($Id_Partner);
        $list = DB::table('province')->orderBy('PROVINCE_NAME', 'asc')->get();
        $amphur = DB::table('amphur')->orderBy('AMPHUR_NAME', 'asc')->get();
        $subdistrict = DB::table('district')->orderBy('DISTRICT_NAME', 'asc')->get();
        $telptns = DB::table('telptns')->where('Id_Partner', $Id_Partner)->get();
        // echo"<pre>";
        // print_r($telemps);
        // echo"</pre>";
        return view('Stminishow.EditPartnerForm', ['partners' => $partner])->with('telptns', $telptns)->with('subdistrict', $subdistrict)->with('amphur', $amphur)->with('list', $list);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id_Partner)
    {

        $request->validate([
            'Name_Partner' => 'required',
            'Province_Id' => 'required',
            'District_Id' => 'required',
            'Postcode_Id' => 'required',
            'Subdistrict_Id' => 'required',
            'Tel_PTN.*' => 'required',
        ]);

        $Tel_PTN = DB::table('telptns')
            ->select('telptns.Id_Partner')
            ->where('telptns.Id_Partner', '=', $Id_Partner)->get();


        $data = json_decode(json_encode($Tel_PTN), true);

        // Telemp::destroy([$data]);

        //   dd($data);


        //  dd($Tel_Emp);

        if ($data != []) {
            Telptn::destroy([$data]);
            foreach ($request['Tel_PTN'] as $item => $value) {
                $request2 = array(
                    'Id_Partner' => $Id_Partner,
                    'Tel_PTN' => $request['Tel_PTN'][$item]
                );
                Telptn::create($request2);
            }
        } else {
            foreach ($request['Tel_PTN'] as $item => $value) {
                $request2 = array(
                    'Id_Partner' => $Id_Partner,
                    'Tel_PTN' => $request['Tel_PTN'][$item]
                );
                Telptn::create($request2);
            }
        }


        $partner = Partner::find($Id_Partner);
        $partner->Name_Partner = $request->Name_Partner;
        $partner->Address_Partner = $request->Address_Partner;
        $partner->Province_Id = $request->Province_Id;
        $partner->District_Id = $request->District_Id;
        $partner->Postcode_Id = $request->Postcode_Id;
        $partner->Subdistrict_Id = $request->Subdistrict_Id;
        $partner->save();
        return redirect('/Stminishow/showPartner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($Id_Partner)
    {

        // dd($Id_Partner);
        Partner::destroy($Id_Partner);
        return redirect('/Stminishow/showPartner');
    }
}
