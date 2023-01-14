<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class SupportController extends Controller
{
    public function index()
    {
        return view('support');
    }

    public function store(Request $request)
    {
        $code = $request->input('code');
        $reason = $request->input('reason');
        $caseid = rand(1000, 99999);
        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();

        $validator = Validator::make($request->all(), [
            'code' => ['required', 'max:5', 'regex:/^[a-zA-Z0-9 ]+$/'],
            'reason' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect('/support')
                ->with('error', '유효한 단축 URL 또는 요청 사유 여부를 다시 확인하세요.');
        } else {
            DB::table('support')
            ->insert(
                [
                    'code' => $code,
                    'reason' => $reason,
                    'caseid' => $caseid,
                    "created_at" =>  \Carbon\Carbon::now(),
                    "updated_at" => \Carbon\Carbon::now()
                ]
            );
            return redirect()
                ->back()
                ->with('success', $caseid);
        }
    }
    public function results()
    {
        return view('results');
    }

    public function results_c(Request $request)
    {
        $caseid = $request->input('caseid');
        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        $validator = Validator::make($request->all(), [
            'caseid' => ['required', 'min:5', 'max:5']
        ]);
        
        if($validator->fails()) {
            return redirect()
                ->back()
                ->with('error', '유효한 Case ID 여부를 확인하시기 바랍니다.');
        } else {
            $case = DB::table('support')->where('caseid', $caseid)->value('code');
            $status = DB::table('support')->where('caseid', $caseid)->value('status');
            $updated_at = DB::table('support')->where('caseid', $caseid)->value('updated_at');
            $code = DB::table('short_links')->where('code', $case)->value('code');
            $is_blocked = DB::table('short_links')->where('code', $case)->value('status');
            $reason = DB::table('support')->where('caseid', $caseid)->value('reason');
            return redirect()
                ->back()
                ->with('success', '완료')
                ->with('code', $code)
                ->with('caseid', $caseid)
                ->with('reason', $reason)
                ->with('is_blocked', $is_blocked)
                ->with('updated_at', $updated_at)
                ->with('status', $status)
                ->with('current_date_time', $current_date_time);
        }
    }
}
