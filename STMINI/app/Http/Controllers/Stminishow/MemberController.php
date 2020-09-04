<?php

namespace App\Http\Controllers\Stminishow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;

class MemberController extends Controller
{
    public function ShowMem()
    {
        $members= Member::all();
        return view('Stminishow.ShowMemberForm',compact("members"));
    }

}
