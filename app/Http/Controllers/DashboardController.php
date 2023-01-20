<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::check()) {
            $serves = DB::table('short_links')->orderBy('id', 'desc')->get();
            return view('dashboard/dashboard', compact('serves', $serves));
        } else {
            return Redirect('signin');
        }
    }
    public function block($code = null)
    {
        $find = DB::table('short_links')->where('id', $code)->value('status');
        
        if($find == '0') {
            DB::table('short_links')
            ->where('id', $code)
            ->update(
                [
                    'status' => "1"
                ]
            );
            return redirect()
                ->back()
                ->with('success', '선택된 단축 URL 차단이 완료되었습니다.');
        } else {
            DB::table('short_links')
            ->where('id', $code)
            ->update(
                [
                    'status' => "0"
                ]
            );
            return redirect()
                ->back()
                ->with('success', '선택된 단축 URL 차단이 해제되었습니다.');
        }
    }
    public function support()
    {
        if(Auth::check()) {
            $serves = DB::table('support')->orderBy('id', 'desc')->get();
            return view('dashboard/support', compact('serves', $serves));
        } else {
            return Redirect('signin');
        }
    }
    public function support_c($code = null)
    {
        $find = DB::table('support')->where('id', $code)->value('status');
        if($find == "0") {
            DB::table('support')
            ->where('id', $code)
            ->update(
                [
                    'status' => "1"
                ]
            );
            return redirect()
                ->back()
                ->with('success', '지원 요청이 승인 처리되었습니다.');
        } else {
            return redirect()
                ->back()
                ->with('error', '처리할 수 없음. 이미 승인된 지원 요청입니다.');
        }
    }

    // Sign
    public function signin()
    {
        if(Auth::check()) {
            return Redirect('dashboard');
        } else {
            return view('dashboard/signin');
        }
    }
    function validate_signin(Request $request)
    {
        $request->validate([
            'email' =>  'required',
            'password'  =>  'required'
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect('dashboard');
        } else {
            return redirect('signin')->with('success', 'Login details are not valid');
        }
    }
    function signout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('signin');
    }
}
