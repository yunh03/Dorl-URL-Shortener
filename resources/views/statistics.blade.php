<x-layout>
    <header class="d-1">
        <h1><a href="/">DORL.KR</a></h1>
    </header>
    <div class="d-2">
        <h1>조회</h1>
        <p>
            단축 URL 코드를 이용하여 단축 URL에 대한 통계를 확인할 수 있습니다.
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