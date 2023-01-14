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
    <div class="d-2">
        <h1>처리 결과 조회</h1>
    </div>
    @if(Session::has('success'))
        <div class="d-stat-noti">
            <h1>
                @if(session()->get('status') == '1')
                    <i style="color: green; padding-right: 15px;" class="fa-solid fa-circle-check"></i>
                    완료
                @else
                    <i style="color: red; padding-right: 15px;" class="fa-solid fa-circle-xmark"></i>
                    대기
                @endif
            </h1>
            <p>기준: {!! nl2br(session()->get('current_date_time')) !!}</p>
            <p>Case ID: {!! nl2br(session()->get('caseid')) !!}</p>
        </div>
        <div class="d-plus-wrap">
            <div class="row">
                <div class="col-sm">
                    <a href="https://dorl.kr/{!! nl2br(session()->get('code')) !!}">
                        <div class="d-plus-box">
                            <h1><i class="fa-solid fa-arrow-up-right-from-square"></i>신고된 단축 URL</h1>
                            <p>
                                https://dorl.kr/{!! nl2br(session()->get('code')) !!}
                            </p>
                        </div><br />
                    </a>
                </div>
                <div class="col-sm">
                    <div class="d-plus-box">
                        <h1>사유</h1>
                        <p>
                            @if(session()->get('reason') == "1")
                                반사회적, 사회 미풍양속 저해
                            @elseif(session()->get('reason') == "2")
                                도박, 음란물 등 불법적인 페이지
                            @elseif(session()->get('reason') == "3")
                                기타(이용약관 위배 등)
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
                        <h1>처리 결과</h1>
                        <p>
                            @if(session()->get('status') == '1')
                                @if(session()->get('is_blocked') == 1)
                                    요청 승인, 차단 됨
                                @else
                                    요청 거부
                                @endif
                            @else
                                대기 중
                            @endif
                        </p>
                    </div><br />
                </div>
                <div class="col-sm">
                    <div class="d-box">
                        <h1>처리 완료 일시</h1>
                        <p>
                            @if(session()->get('status') == '1')
                                {!! nl2br(session()->get('updated_at')) !!}
                            @else
                                대기 중
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="d-3">
            <form method="POST" id="link" action="/results">
                @csrf
                <input type="text" name="caseid" class="d-input" placeholder="Case ID를 입력하세요. (5자)">
                <div class="d-infor">
                    <h1><i class="fa-solid fa-question"></i>Case ID란?</h1>
                    <p>
                        Case ID는 반사회적, 불법적인 페이지 등의 이유로 삭제 요청 이후, 요청 완료 팝업에 표시됩니다. Case ID를 잃어버렸더라도, URL 조회 페이지를 통해 단축 URL의 운영 상태를 확인할 수 있습니다.
                    </p>
                </div>
                <p><a href="javascript:;" onclick="document.getElementById('link').submit();">조회하기<i class="fa-solid fa-arrow-up-right-from-square"></i></a></p>
            </form>
        </div>
    @endif
</x-layout>