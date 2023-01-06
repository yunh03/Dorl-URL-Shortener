<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class ShortLinkController extends Controller
{
    public function index()
    {
        $all_links_num = count(DB::table('short_links')->get());
        $today_links_num = count(DB::table('short_links')->select(DB::raw('*'))->whereRaw('Date(created_at) = CURDATE()')->get());
        
        return view('main', compact('all_links_num', $all_links_num, 'today_links_num', $today_links_num));
    }

    public function store(Request $request)
    {
        $link = $request->input('link');
        $code = Str::random(5);
        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();

        $validator = Validator::make($request->all(), [
            'link' => ['required', 'url']
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->with('error', '유효한 URL을 입력하시기 바랍니다.');
        } else {
            DB::table('short_links')
            ->insert(
                [
                    'code' => $code,
                    'link' => $link,
                    "created_at" =>  \Carbon\Carbon::now(),
                    "updated_at" => \Carbon\Carbon::now()
                ]
            );
            return redirect()
                ->back()
                ->with('success', $code);
        }
    }

    public function shortenLink($code)
    {
        $find = DB::table('short_links')->where('code', $code)->value('link');
        if($find == "") {
            return redirect()
                ->back()
                ->with('error', '등록된 단축 링크가 아니거나, 이용약관 위반 등의 사유로 관리자에 의해 삭제되었습니다. 유효한 단축 URL 여부를 다시 한 번 확인하시기 바랍니다.');
        } else {
            return Redirect::to($find);
        }
    }
}
