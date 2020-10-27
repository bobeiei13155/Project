<?php

namespace App\Http\Controllers\Stminishow;

use Illuminate\Support\Facades\DB;
use App\promotion;
use App\payment_amount;
use App\PremiumPro;
use App\premium_payments;
use App\CartPromotionPay;
use App\Http\Controllers\Controller;
use App\Product;
use App\promotion_prod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\promotionpays;
class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function searchPOP(Request $request)
    {
        Session()->forget("echo", "คุณไม่มีสิทธิ์");
        if (session()->has('login')) {
            if (session()->has('loginpermission6')) {


                $searchPOP = $request->searchPOP;

                $Promotion = DB::table('promotion_prods')->orderBy('promotion_prods.Id_Promotion', 'DESC')
                    ->join('products', 'promotion_prods.Id_Product', "LIKE", 'products.Id_Product')
                    ->join('promotions', 'promotion_prods.Id_Promotion', "LIKE", 'promotions.Id_Promotion')
                    ->where('promotions.Status', '=', 0)
                    ->where('promotion_prods.Id_Promotion', "LIKE", "%{$searchPOP}%")
                    ->orwhere('products.Name_Product', "LIKE", "%{$searchPOP}%")
                    ->orwhere('promotions.Name_Promotion', "LIKE", "%{$searchPOP}%")
                    ->orwhere('promotions.Sdate_Promotion', "LIKE", "%{$searchPOP}%")
                    ->orwhere('promotions.Edate_Promotion', "LIKE", "%{$searchPOP}%")
                    ->paginate(5);
                $product = Product::all();
                $PremiumPro = PremiumPro::all();


                $Promotion_Prod = promotion_prod::all();


                return view("Stminishow.SearchPromotionProForm")->with('promotion_prods', $Promotion_Prod)->with('promotions', $Promotion)->with('products', $product)->with('PremiumPros', $PremiumPro);
            } else {
                Session()->flash("echo", "คุณไม่มีสิทธิ์");
                return view('layouts.stmininav');
            }
        } else {

            return redirect('/login');
        }
    }
    public function ShowPromotionPro()
    {
        Session()->forget("echo", "คุณไม่มีสิทธิ์");
        if (session()->has('login')) {
            if (session()->has('loginpermission6')) {
                $product = Product::all();
                $PremiumPro = PremiumPro::all();
                $Promotion = DB::table('promotions')->orderBy('promotions.Id_Promotion', 'DESC')->where('Status', '=', 0)->paginate(5);;

                $Promotion_Prod = promotion_prod::all();
                return view("Stminishow.ShowPromotionProForm")->with('promotion_prods', $Promotion_Prod)->with('promotions', $Promotion)->with('products', $product)->with('PremiumPros', $PremiumPro);
            } else {
                Session()->flash("echo", "คุณไม่มีสิทธิ์");
                return view('layouts.stmininav');
            }
        } else {

            return redirect('/login');
        }
    }
    public function indexPro()
    {
        $product = Product::all();
        $PremiumPro = PremiumPro::all();

        return view("Stminishow.PromotionProForm")->with('products', $product)->with('PremiumPros', $PremiumPro);
    }


    public function createPromotionPro(Request $request)
    {
        //dd($request);
        $GenId = DB::table('promotions')->max('Id_Promotion');

        if (is_null($GenId)) {
            $Id_Promotion = "POP" . "-" . date('Y') . date('m') . "-" . "000";
        } else {

            $GenId_POP = substr($GenId, 11, 14) + 1;

            if ($GenId_POP < 10) {
                $Id_Promotion = "POP" . "-" . date('Y') . date('m') . "-" . "00" . $GenId_POP;
            } elseif ($GenId_POP >= 10 && $GenId_POP < 100) {
                $Id_Promotion = "POP" . "-" . date('Y') . date('m') . "-" . "0" . $GenId_POP;
            } elseif ($GenId_POP >= 100) {
                $Id_Promotion = "POP" . "-" . date('Y') . date('m') . "-" . $GenId_POP;
            }
        }

        $request->validate([

            'Name_Promotion' => 'required|unique:promotions'
            //'Payment_Amount' => 'required',
            // 'Sdate_Promotion' => 'required',
            // 'Edate_Promotion' => 'required',

        ]);
        $promotions = new promotion;
        $promotions->Id_Promotion = $Id_Promotion;
        $promotions->Name_Promotion = $request->Name_Promotion;
        $promotions->Sdate_Promotion = $request->Sdate_Promotion;
        $promotions->Edate_Promotion = $request->Edate_Promotion;


        $promotions->save();



        $request2 = array(
            'Id_Promotion' => $Id_Promotion,
            'Id_Product' => $request['Id_Product'],
            'Id_Premium_Pro' => $request['Id_Premium_Pro']
        );
        promotion_prod::create($request2);

        return redirect('/Stminishow/ShowPromotionPro');
    }


    public function editPro($Id_Promotion)
    {
        Session()->forget("echo", "คุณไม่มีสิทธิ์");
        if (session()->has('login')) {
            if (session()->has('loginpermission6')) {
                $product = Product::all();
                $PremiumPro = PremiumPro::all();
                $Promotion = promotion::find($Id_Promotion);
                $Promotion_Prod = promotion_prod::all();

                $join = DB::table('promotion_prods')
                    ->join('products', 'products.Id_Product', '=', 'promotion_prods.Id_Product')
                    ->select('products.Name_Product', 'promotion_prods.Id_Product', 'products.Id_Product')
                    ->where('Id_Promotion', $Id_Promotion)->get();
                $joinpro = $join[0]->Id_Product;

                $join1 = DB::table('promotion_prods')
                    ->join('premium_pros', 'premium_pros.Id_Premium_Pro', '=', 'promotion_prods.Id_Premium_Pro')
                    ->select('premium_pros.Name_Premium_Pro', 'promotion_prods.Id_Premium_Pro', 'premium_pros.Id_Premium_Pro')
                    ->where('Id_Promotion', $Id_Promotion)->get();
                $joinpre = $join1[0]->Id_Premium_Pro;

                return view("Stminishow.EditPromotionProForm", ['promotions' => $Promotion])->with('joinpro', $joinpro)
                    ->with('joinpre', $joinpre)
                    ->with('promotion_prods', $Promotion_Prod)->with('products', $product)->with('PremiumPros', $PremiumPro);
            } else {
                Session()->flash("echo", "คุณไม่มีสิทธิ์");
                return view('layouts.stmininav');
            }
        } else {

            return redirect('/login');
        }
    }

    public function updatePro(Request $request, $Id_Promotion)
    {
        $request->validate([]);

        $promotions = promotion::find($Id_Promotion);
        $promotions->Name_Promotion = $request->Name_Promotion;
        $promotions->Sdate_Promotion = $request->Sdate_Promotion;
        $promotions->Edate_Promotion = $request->Edate_Promotion;
        $promotions->save();

        $data = DB::table('promotion_prods')
            ->select('Id_Promotion')
            ->where('Id_Promotion', '=', $Id_Promotion)->get();


        $data1 = json_decode(json_encode($data), true);
        promotion_prod::destroy([$data1]);
        $request2 = array(
            'Id_Promotion' => $Id_Promotion,
            'Id_Product' => $request['Id_Product'],
            'Id_Premium_Pro' => $request['Id_PremiumPro']
        );
        promotion_prod::create($request2);

        return redirect('/Stminishow/ShowPromotionPro');
    }

    public function deletePro($Id_Promotion)
    {

        // dd($Id_Partner);
        $promotions = promotion::find($Id_Promotion);
        $promotions->Status = 1;
        $promotions->save();
        return redirect('/Stminishow/ShowPromotionPro');
    }



    public function ShowPromotionPay()
    {
        Session()->forget("echo", "คุณไม่มีสิทธิ์");
        if (session()->has('login')) {
            if (session()->has('loginpermission6')) {
                return view("Stminishow.ShowPromotionPayForm")->with("promotionpays", promotionpays::paginate(5))->with("premium_pros", PremiumPro::all());
            } else {
                Session()->flash("echo", "คุณไม่มีสิทธิ์");
                return view('layouts.stmininav');
            }
        } else {

            return redirect('/login');
        }
    }

    public function indexPay()
    {
    }
    public function createPromotionPay(Request $request)
    {
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
    public function editPay($Id_Promotion)

    {
        $payment_amounts = payment_amount::find($Id_Promotion);
        $premium_payments = DB::table('premium_payments')->where('Id_Promotion', $Id_Promotion)->get();

        $CartPromotionPay = session()->get('CartPromotionPay.teams', $premium_payments);
        // dd($CartPromotionPay);
        return view("Stminishow.EditPromotionForm", ['payment_amounts' => $payment_amounts])->with("CartItems", $CartPromotionPay)->with("premium_payments", $premium_payments)->with("premium_pros", PremiumPro::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePay(Request $request, $id)
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


    public function deletePay($Id_PremiumPro)
    {
        payment_amount::destroy($Id_PremiumPro);
        Session::forget("CartPromotionPay");
        return redirect('/Stminishow/ShowPromotionPay');
    }
}
