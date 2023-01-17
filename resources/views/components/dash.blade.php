<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DORL Dashboard</title>
        <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/grid.css') }}">
        <script src="https://kit.fontawesome.com/b52dd26012.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="d-nav">
            <div class="logo">
                <h1>
                    <a href="/dashboard">
                        DORL.KR
                    </a>
                </h1>
                <div class="menu-icon">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            <ul>
                <li><a href="/dashboard">대시보드</a></li>
                <li><a href="/dashboard/support">지원</a></li>
                <li><a href="#">로그</a></li>
            </ul>
        </nav>
        {{ $slot }}
    </body>
</html>