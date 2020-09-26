<?php

namespace App\Http\Controllers\Stminishow;

use Illuminate\Support\Facades\DB;
use App\promotion;
use App\payment_amount;
use App\PremiumPro;
use App\premium_payments;
use App\CartPromotionPay;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ShowPromotionPay()
    {

        return view("Stminishow.ShowPromotionPayForm")->with("payment_amounts", payment_amount::paginate(5))->with("premium_pros", PremiumPro::all());
    }

    public function indexPay()
    {
        $CartPromotionPay = Session::get('CartPromotionPay'); //ดึงข้อมูลตะกร้า

        // $n = null ;
        //dd($CartPromotionPay);

        if ($CartPromotionPay) {
            return view("Stminishow.PromotionPayForm", ['CartItems' => $CartPromotionPay])->with("premium_pros", PremiumPro::all())->with("payment_amounts", payment_amount::all());
        } else {

            return view("Stminishow.PromotionPayForm", ['CartItems' => $CartPromotionPay])->with("premium_pros", PremiumPro::all())->with("payment_amounts", payment_amount::all());
        }
    }
    public function createPromotionPay(Request $request)
    {
        //dd($request);
        $CartPromotionPay = $request->session()->get('CartPromotionPay');
        $GenId = DB::table('payment_amounts')->max('Id_Promotion');

        if (is_null($GenId)) {
            $Id_Promotion = "POM" . "-" . date('Y') . date('m') . "-" . "000";
        } else {

            $GenId_POM = substr($GenId, 11, 14) + 1;

            if ($GenId_POM < 10) {
                $Id_Promotion = "POM" . "-" . date('Y') . date('m') . "-" . "00" . $GenId_POM;
            } elseif ($GenId_POM >= 10 && $GenId_POM < 100) {
                $Id_Promotion = "POM" . "-" . date('Y') . date('m') . "-" . "0" . $GenId_POM;
            } elseif ($GenId_POM >= 100) {
                $Id_Promotion = "POM" . "-" . date('Y') . date('m') . "-" . $GenId_POM;
            }
        }

        $request->validate([

            // 'Name_Promotion' => 'required',
            // 'Payment_Amount' => 'required',
            // 'Sdate_Promotion' => 'required',
            // 'Edate_Promotion' => 'required',
          
        ]);
        $payment_amount = new payment_amount;
        $payment_amount->Id_Promotion = $Id_Promotion;
        $payment_amount->Name_Promotion = $request->Name_Promotion;
        $payment_amount->Payment_Amount = $request->Payment_Amount;
        $payment_amount->Sdate_Promotion = $request->Sdate_Promotion;
        $payment_amount->Edate_Promotion = $request->Edate_Promotion;

        //  //dd($request);
         $payment_amount->save();
            
        if (empty($CartPromotionPay->items)) {
            Session()->flash("warning", "ต้องมีสินค้าของแถม 1 ชิ้น");
            return redirect('/Stminishow/createPromotionPay');
        } else {
            
            foreach ($CartPromotionPay->items as $item) {
                //dd($CartPromotionPay);
                $request2 = array(
                    'Id_Promotion' => $Id_Promotion,
                    'Id_Premium_Pro' => $item['data']['Id_Premium_Pro'],
                    'quantity' => $item['quantity']
                );
                //dd($request2);
                premium_payments::create($request2);
               
            }
            Session()->flash("success", "เพิ่มโปรโมชั่นยอดชำระสำเร็จ");
            Session::forget("CartPromotionPay");
            return redirect('/Stminishow/ShowPromotionPay');
        }
    }

    public function indexPremiumPro(Request $request)
    {

        return view("Stminishow.AddPremiunProForm")->with("premium_pros", PremiumPro::all());
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
    public function edit($Id_Promotion)

    {
        $payment_amounts = payment_amount::find($Id_Promotion);
        $premium_payments = DB::table('premium_payments')->where('Id_Promotion', $Id_Promotion)->get();
        
        $CartPromotionPay = Session::get('CartPromotionPay');
        return view("Stminishow.EditPromotionForm", ['payment_amounts' => $payment_amounts])->with("CartItems", $CartPromotionPay)->with("premium_payments", $premium_payments)->with("premium_pros", PremiumPro::all());
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

    public function addPremiumProToCartPay(Request $request, $Id_PremiumPro)
    {

        $PremiumPro = PremiumPro::find($Id_PremiumPro);
        $prevCart = $request->session()->get('CartPromotionPay');
        $CartPromotionPay = new CartPromotionPay($prevCart);
        $CartPromotionPay->addItem($Id_PremiumPro, $PremiumPro);
        //update ตะกร้าสินค้า
        $request->session()->put('CartPromotionPay', $CartPromotionPay);
        //dump($CartPromotionPay);
        //$request->session()->forget('CartPromotionPay');
        Session()->flash("success", "เพิ่มสินค้าของแถมสำเร็จ");
        return redirect('/Stminishow/createPromotionPay');
    }

    public function deleteFromCart(Request $request, $Id_PremiumPro)
    {
        $CartPromotionPay = $request->session()->get('CartPromotionPay');
        if (array_key_exists($Id_PremiumPro, $CartPromotionPay->items)) {
            unset($CartPromotionPay->items[$Id_PremiumPro]);
        }
        $afterCart = $request->session()->get('CartPromotionPay');
        $updatetPromotionPay =  new CartPromotionPay($afterCart);
        $updatetPromotionPay->updatePriceQuantity();
        $request->session()->put('CartPromotionPay', $updatetPromotionPay);
        return redirect('/Stminishow/createPromotionPay');
    }
    public function incrementCart(Request $request, $Id_PremiumPro)
    {
        $PremiumPro = PremiumPro::find($Id_PremiumPro);
        $prevCart = $request->session()->get('CartPromotionPay');
        $CartPromotionPay = new CartPromotionPay($prevCart);
        $CartPromotionPay->addItem($Id_PremiumPro, $PremiumPro);
        //update ตะกร้าสินค้า
        $request->session()->put('CartPromotionPay', $CartPromotionPay);
        //dump($CartPromotionPay);
        //$request->session()->forget('CartPromotionPay');
        return redirect('/Stminishow/createPromotionPay');
    }
    public function decrementCart(Request $request, $Id_PremiumPro)
    {
        // $PremiumPro=PremiumPro::find($Id_PremiumPro);
        $prevCart = $request->session()->get('CartPromotionPay');
        $CartPromotionPay = new CartPromotionPay($prevCart);
        if ($CartPromotionPay->items[$Id_PremiumPro]['quantity'] > 1) {
            $CartPromotionPay->items[$Id_PremiumPro]['quantity'] = $CartPromotionPay->items[$Id_PremiumPro]['quantity'] - 1;
            $CartPromotionPay->updatePriceQuantity();
            $request->session()->put('CartPromotionPay', $CartPromotionPay);
        } else {
            Session()->flash("warning", "ต้องมีสินค้าของแถม 1 ชิ้น");
        }
        return redirect('/Stminishow/createPromotionPay');
    }
}
