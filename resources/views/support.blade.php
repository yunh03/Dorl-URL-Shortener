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
                    <h1>지원</h1>
                    <p>
                        지나치게 반사회적이거나, 불법적인 링크를 발견하신다면, 아래 양식에 따라 요청서를 작성하여 삭제를 요청할 수 있습니다. 요청 완료 후, 처리 결과 조회가 필요하다면 요청 완료 후 표시되는 Case ID로 <a href="/">처리 결과 조회</a> 페이지에서 조회할 수 있습니다. 건전한 인터넷 문화 조성에 협조해 주셔서 감사합니다.
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