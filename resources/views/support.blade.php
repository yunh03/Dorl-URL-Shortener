<x-layout>
    <header class="d-1">
        <h1><a href="/">DORL.KR</a></h1>
    </header>
    @if(Session::has('success'))
        <div class="d-noti">
            <h1><i class="fa-regular fa-circle-check"></i>요청 완료</h1>
            <h2>단축 URL 삭제 요청이 완료되었습니다. 아래 Case ID를 저장해 두면, 추후 처리 결과를 조회할 수 있습니다. 건전한 인터넷 문화 조성에 협조해 주셔서 감사합니다.</h2>
            <p>Case ID: {!! nl2br(session()->get('success')) !!}</p>
        </div>
    @endif
    @if(Session::has('error'))
        <div class="d-noti">
            <h1><i class="fa-solid fa-triangle-exclamation"></i>문제가 발생했습니다.</h1>
            <h2>{!! nl2br(session()->get('error')) !!}</h2>
        </div>
    @endif
    <div class="d-2">
        <h1>지원</h1>
        <p>
            지나치게 반사회적이거나, 불법적인 링크를 발견하신다면, 아래 양식에 따라 요청서를 작성하여 삭제를 요청할 수 있습니다. 요청 완료 후, 처리 결과 조회가 필요하다면 요청 완료 후 표시되는 Case ID로 <a href="/results">처리 결과 조회</a> 페이지에서 조회할 수 있습니다. 건전한 인터넷 문화 조성에 협조해 주셔서 감사합니다.
        </p>
    </div>
    <div class="d-3">
        <form method="POST" id="support" action="/support">
            @csrf
            <input type="text" name="code" class="d-input" placeholder="단축 URL 코드 입력(5자)">
            <div class="d-infor">
                <h1><i class="fa-solid fa-question"></i>단축 URL 코드란?</h1>
                <p>
                    https://dorl.kr/xxxxx에서, https://dorl.kr/을 제외한 xxxxx 부분이며, 5자 영문으로 이루어져 있습니다. 입력한 단축 URL 코드가 유효하지 않거나, 단축 URL 코드 이외의 코드를 입력하면 조회가 불가능하니 정확하게 입력하시기 바랍니다.
                </p>
            </div>
            <select name="reason" id="reason" class="d-dropdown">
                <option value="0">요청 사유 선택</option>
                <option value="1">반사회적, 사회 미풍양속 저해</option>
                <option value="2">도박, 음란물 등 불법적인 페이지</option>
                <option value="3">기타(이용약관 위배 등)</option>
            </select>
            <p><a href="javascript:;" onclick="document.getElementById('support').submit();">요청하기<i class="fa-solid fa-arrow-up-right-from-square"></i></a></p>
        </form>
    </div>
</x-layout>