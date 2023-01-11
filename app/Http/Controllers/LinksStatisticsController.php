<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LinksStatisticsController extends Controller
{
    public function index()
    {
        return view('statistics');
    }
    public function lookup(Request $request)
    {
        $code = $request->input('code');
        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();

        $validator = Validator::make($request->all(), [
            'code' => ['required', 'max:5', 'regex:/^[a-zA-Z0-9 ]+$/']
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->with('error', '유효한 단축 URL 코드를 입력하시기 바랍니다.');
        } else {
            $total_f = count(DB::table('links_log')->where('code', $code)->get());
            $today_f = count(DB::table('links_log')->where('code', $code)->select(DB::raw('*'))->whereRaw('Date(created_at) = CURDATE()')->get());
            $origin_link = DB::table('short_links')->where('code', $code)->value('link');
            $created_at = DB::table('short_links')->where('code', $code)->value('created_at');
            return redirect()
                ->back()
                ->with('success', '완료')
                ->with('origin_link', $origin_link)
                ->with('created_at', $created_at)
                ->with('current_date_time', $current_date_time)
                ->with('total_f', $total_f)
                ->with('code', $code)
                ->with('today_f', $today_f);
        }
    }
}