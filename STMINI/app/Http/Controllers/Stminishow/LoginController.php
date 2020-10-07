<?php

namespace App\Http\Controllers\Stminishow;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'Username' => 'required',
            'Password' => 'required'
        ]);
        $Username=$request->Username;
        $Password=$request->Password;
        $Username_Emp = DB::table('employees')->select('Id_Emp','Username_Emp')->where('Username_Emp','=',"{$Username}")->get();
        $Password_Emp = DB::table('employees')->select('Id_Emp','Password_Emp')->where('Password_Emp','=',"{$Password}")->get();
        //dd($Username_Emp);
    
        $Username_Emp = json_decode(json_encode($Username_Emp), true);
        $Password_Emp = json_decode(json_encode($Password_Emp), true);
        if(empty($Username_Emp)||empty($Password_Emp)){
            Session()->flash("warning", "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง");
            return view('login');

        }else{
            Session()->flash("success", "เข้าสู่ระบบสำเร็จ");
            session()->put('login',$Username);
          
            // $value = session()->pull('login',$Username);
            
             return view('/Stminishow/indexform')->with('login',$Username);
        }
        // if(empty($Username_Emp->items)){
        //     Session()->flash("warning", "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง");
        //     return view('login');

        // }else{
        //     Session()->flash("success", "เข้าสู่ระบบสำเร็จ");
        //     return view('/Stminishow/showEmployee');
        // }
      

    }

    public function logout()
    {
        session()->flush();
        return redirect('login');
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
