<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index()
    {
        $serves = DB::table('short_links')->orderBy('id', 'desc')->get();
        return view('dashboard/dashboard', compact('serves', $serves));
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
        $serves = DB::table('support')->orderBy('id', 'desc')->get();
        return view('dashboard/support', compact('serves', $serves));
    }
}
