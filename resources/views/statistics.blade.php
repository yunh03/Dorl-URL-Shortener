<x-layout>
    <header class="d-1">
        <h1><a href="/">DORL.KR</a></h1>
    </header>
    @if(Session::has('error'))
        <div class="d-noti">
            <h1><i class="fa-solid fa-triangle-exclamation"></i>문제가 발생했습니다.</h1>
            <h2>{!! nl2br(session()->get('error')) !!}</h2>
        </div>
    @endif
    <div class="d-4">
        <h1>조회</h1>
        <p>아래에 단축 URL 코드를 입력하여 방문자의 통계 및 정보를 확인할 수 있습니다.</p>
    </div>
    @if(Session::has('success'))
        <div class="d-stat-noti">
            <h1>
                @if(session()->get('status') == '0')
                    <i style="color: green; padding-right: 15px;" class="fa-solid fa-circle-check"></i>
                    활성화
                @else
                    <i style="color: red; padding-right: 15px;" class="fa-solid fa-circle-xmark"></i>
                    차단됨
                @endif
            </h1>
            <p>기준: {!! nl2br(session()->get('current_date_time')) !!}</p>
            <p>대상: {!! nl2br(session()->get('code')) !!}</p>
        </div>
        <div class="d-plus-wrap">
            <div class="row">
                <div class="col-sm">
                    <div class="d-plus-box">
                        <h1>총 조회 수</h1>
                        <p>
                            @if(session()->get('total_f') == 0)
                                방문자 없음
                            @else
                                {!! nl2br(session()->get('total_f')).'회' !!}
                            @endif
                        </p>
                    </div><br />
                </div>
                <div class="col-sm">
                    <div class="d-plus-box">
                        <h1>오늘 조회 수</h1>
                        <p>
                            @if(session()->get('today_f') == 0)
                                방문자 없음
                            @else
                                {!! nl2br(session()->get('today_f')).'회' !!}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-box-wrap">
            <div class="row">
                <div class="col-sm">
                    <div class="d-box">
                        <h1><i class="fa-solid fa-calendar-days"></i>생성일</h1>
                        <p>
                            {!! nl2br(session()->get('created_at')) !!}
                        </p>
                    </div><br />
                </div>
                <div class="col-sm">
                    <a href="{!! nl2br(session()->get('origin_link')) !!}">
                        <div class="d-box">
                            <h1><i class="fa-solid fa-arrow-up-right-from-square"></i>원본 링크</h1>
                            <p style="line-height: 26px;">
                                <a href="{!! nl2br(session()->get('origin_link')) !!}">
                                    {!! nl2br(session()->get('origin_link')) !!}
                                </a>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="d-3">
            <form method="POST" id="link" action="/statistics">
                @csrf
                <input type="text" name="code" class="d-input" placeholder="단축 URL 코드 입력(5자)">
                <div class="d-infor">
                    <h1><i class="fa-solid fa-question"></i>단축 URL 코드란?</h1>
                    <p>
                        https://dorl.kr/xxxxx에서, https://dorl.kr/을 제외한 xxxxx 부분이며, 5자 영문으로 이루어져 있습니다. 입력한 단축 URL 코드가 유효하지 않거나, 단축 URL 코드 이외의 코드를 입력하면 조회가 불가능하니 정확하게 입력하시기 바랍니다.
                    </p>
                </div>
                <p><a href="javascript:;" onclick="document.getElementById('link').submit();">조회하기<i class="fa-solid fa-arrow-up-right-from-square"></i></a></p>
            </form>
        </div>
    @endif
</x-layout>