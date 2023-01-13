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
                {{ $slot }}
                <footer class="d-footer">
                <p>2023 DORL.KR, 모든 권한 보유.</p>
                <p>
                    <a href="/terms">이용약관</a>
                </p>
                <p>
                    <a href="https://github.com/yunh03">개발자 GitHub</a>
                </p>
            </footer>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
</html>