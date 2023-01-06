<x-layout>
    <header class="d-1">
        <h1><a href="/">DORL.KR</a></h1>
    </header>
    @if(Session::has('success'))
        <div class="d-noti">
            <h1><i class="fa-regular fa-circle-check"></i>URL 생성 완료</h1>
            <h2>단축된 URL이 생성되었습니다. 아래 링크를 클릭하여 복사할 수 있습니다.</h2>
            <p><a href="https://dorl.kr/{!! nl2br(session()->get('success')) !!}"><i class="fa-solid fa-arrow-up-right-from-square"></i>https://dorl.kr/{!! nl2br(session()->get('success')) !!}</a></p>
        </div>
    @endif
    @if(Session::has('error'))
        <div class="d-noti">
            <h1><i class="fa-solid fa-triangle-exclamation"></i>문제가 발생했습니다.</h1>
            <h2>{!! nl2br(session()->get('error')) !!}</h2>
        </div>
    @endif
    <div class="d-2">
        <h1>URL Shortener</h1>
        <p>
            이 서비스는 쇼핑몰이나 공유 링크 등, 길고 복잡한 URL을 간결하게 줄여 저장 또는 공유할 수 있도록 개발되었습니다. 반사회적이고 부적절한 링크는 관리자에 의해 삭제될 수 있으니 유의하시기 바라며, 링크 삭제 문의는 <a href="/support">여기</a>를 참고하시기 바랍니다.
        </p>
    </div>
    <div class="d-3">
        <form method="POST" id="link" action="/">
            @csrf
            <input type="text" name="link" class="d-input" placeholder="긴 URL을 입력하세요.">
            <p><a href="javascript:;" onclick="document.getElementById('link').submit();">생성하기<i class="fa-solid fa-arrow-up-right-from-square"></i></a></p>
        </form>
    </div>
</x-layout>