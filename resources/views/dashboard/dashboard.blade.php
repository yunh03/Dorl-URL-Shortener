<x-dash>
    <header class="d-header">
        <div class="container">
            <h1>대시보드</h1>
        </div>
    </header>
    @if(Session::has('success'))
        <section class="container d-noti">
            <div class="container">
                <p>
                    <i class="fa-solid fa-check"></i>
                    {!! nl2br(session()->get('success')) !!}
                </p>
            </div>
        </section>
    @endif
    <section class="d-table-sec">
        <table class="d-table container">
            <thead>
                <tr>
                <th>#</th>
                <th>코드</th>
                <th>연결된 링크</th>
                <th>생성일</th>
                <th>상태</th>
                <th>관리</th>
                </tr>
            </thead>
            @foreach ($serves as $serve)
                <tbody>
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
                                <a href="/dashboard/block/{{ $serve->id }}"><button class="d-table-btn">차단</button></a>
                            @else
                                <a href="/dashboard/block/{{ $serve->id }}"><button class="d-table-btn-unblock">해제</button></a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            @endforeach
            </table>
    </section>
</x-dash>