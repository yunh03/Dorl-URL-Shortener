<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DORL.KR</title>
        <link rel="stylesheet" href="assets/css/app.css">
        <script src="https://kit.fontawesome.com/b52dd26012.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assets/css/grid.css">
    </head>
    <body>
        <div class="dorl-wrap">
            <div class="container">
                <header class="d-1">
                    <h1><a href="/">DORL.KR</a></h1>
                </header>
                <div class="d-2">
                    <h1>이용약관</h1>
                    <p>
                        이 서비스는 쇼핑몰이나 공유 링크 등, 길고 복잡한 URL을 간결하게 줄여 저장 또는 공유할 수 있도록 개발되었습니다. 반사회적이고 부적절한 링크는 관리자에 의해 삭제될 수 있으니 유의하시기 바라며, 링크 삭제 문의는 <a href="/">여기</a>를 참고하시기 바랍니다.
                    </p>
                </div>
                <div class="d-3">
                    <form method="POST" id="link" action="/">
                        @csrf
                        <input type="text" name="link" class="d-input" placeholder="긴 URL을 입력하세요.">
                        <p><a href="javascript:;" onclick="document.getElementById('link').submit();">생성하기<i class="fa-solid fa-arrow-up-right-from-square"></i></a></p>
                    </form>
                </div>
            </div>
            <footer class="d-footer">
                <p>2023 DORL.KR, 모든 권한 보유.</p>
                <p>
                    <a href="/terms">이용약관</a>
                </p>
                <p>
                    <a href="https://github.com/yunh03">개발자 GitHub</a>
                </p>
                <p>
                    <a href="/support">지원</a>
                </p>
                <p>
                    <a href="/results">처리 결과 조회</a>
                </p>
            </footer>
        </div>
    </body>
</html>