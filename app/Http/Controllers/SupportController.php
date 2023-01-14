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
}
