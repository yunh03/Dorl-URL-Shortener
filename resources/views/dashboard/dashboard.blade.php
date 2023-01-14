<!doctype html>
<html lang="ko">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DORL.KR 관리자</title>
        <link rel="stylesheet" href="assets/css/dashboard.css">
    </head>

    <body>

        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">DORL.KR 관리자</a>
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                    <a class="nav-link px-3" href="#">로그아웃</a>
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3 sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/dashboard">
                                    <span data-feather="home" class="align-text-bottom"></span>
                                    홈
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard/support">
                                    <span data-feather="file" class="align-text-bottom"></span>
                                    지원
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard/log">
                                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                                    로그
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">생성된 단축 링크</h1>
                    </div>
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {!! nl2br(session()->get('success')) !!}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">코드</th>
                                    <th scope="col">연결된 링크</th>
                                    <th scope="col">생성일</th>
                                    <th scope="col">상태</th>
                                    <th scope="col">관리</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($serves as $serve)
                                    <tr>
                                        <td>
                                            {{ $serve->id }}
                                        </td>
                                        <td>
                                            {{ $serve->code }}
                                        </td>
                                        <td>
                                            {{ $serve->link }}
                                        </td>
                                        <td>
                                            {{ $serve->created_at }}
                                        </td>
                                        <td>
                                            @if($serve->status == '0')
                                                활성화
                                            @else
                                                <span style="color: red">차단됨</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($serve->status == '0')
                                                <a href="/dashboard/block/{{ $serve->id }}">차단</a>
                                            @else
                                                <a href="/dashboard/block/{{ $serve->id }}">해제</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
            integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
            integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
            crossorigin="anonymous"></script>
        <script src="dashboard.js"></script>
    </body>
</html>