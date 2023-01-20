<x-dash>
    <section class="d-sign">
        <div class="container">
            @if($message = Session::get('success'))
                <div class="alert alert-info">
                    {{ $message }}
                </div>
            @endif
            <h1>관리자 로그인</h1>
            <p>
                대시보드에 접근하려면,<br />
                관리자 권한이 필요합니다.
            </p>
            <form action="signin/validate" id="sign" name="sign" method="post">
                @csrf
                <div class="d-sign-input-box">
                    <input type="text" name="email" class="d-input" placeholder="관리자 E-Mail">
                </div>
                <div class="d-sign-input-box">
                    <input type="password" name="password" class="d-input" placeholder="관리자 PW">
                </div>
                <div class="d-sign-post-box">
                    <a href="javascript:;" onclick="document.getElementById('sign').submit();">
                        로그인
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                </div>
            </form>
        </div>
    </section>
</x-dash>