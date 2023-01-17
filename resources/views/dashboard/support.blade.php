<x-dash>
    <header class="d-header">
        <div class="container">
            <h1>지원</h1>
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
    @if(Session::has('error'))
        <section class="container d-noti">
            <div class="container">
                <p>
                    <i class="fa-solid fa-xmark"></i>
                    {!! nl2br(session()->get('error')) !!}
                </p>
            </div>
        </section>
    @endif
    <section class="d-table-sec">
        <table class="d-table container">
            <thead>
                <tr>
                <th>#</th>
                <th>Case ID</th>
                <th>대상</th>
                <th>사유</th>
                <th>접수일</th>
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
                            {{ $serve->caseid }}
                        </td>
                        <td>
                            {{ $serve->code }}
                        </td>
                        <td>
                            {{ $serve->created_at }}
                        </td>
                        <td>
                            @if($serve->reason == "1")
                                반사회적, 사회 미풍양속 저해
                            @elseif($serve->reason == "2")
                                도박, 음란물 등 불법적인 페이지
                            @elseif($serve->reason == "3")
                                기타(이용약관 위배 등)
                            @endif
                        </td>
                        <td>
                            @if($serve->status == "0")
                                대기
                            @else
                                완료
                            @endif
                        </td>
                        <td>
                            <a href="/dashboard/support/c/{{ $serve->id }}"><button class="d-table-btn-unblock">완료</button></a>
                        </td>
                    </tr>
                </tbody>
            @endforeach
            </table>
    </section>
</x-dash>