@section('title', 'home画面')

@extends('layouts.application')
@section('content')
<div>
    <h2 style="text-align:center">これは、普段スケジュール管理が下手くそな私のために作ったアプリです！</h2>
    <br>
</div>
<div>
    <h3 style="text-align:center">スケジュールは金行の<img src="../images/icons8-google-calendar-48.png" alt="サンプル画像">Googleカレンダーと連携させており共有が可能です</h3>
    <br>
</div>
<div>
    <h4 style="text-align:center">★★ご要望があれば別の個人用のアプリも作成いたします★★</h4>
    <br>
</div>
<br>
<br>

<div>
@if (Route::has('login'))
                <div  style="text-align: center" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <h4>ログイン済みです<br>
                        以下の一覧へお進みください</h4>
                        <br>
                        <button type="button" class="btn btn-success btn-lg" style='margin-bottom: 10px' onclick="location.href='{{ route('task.index')}}'">タスク一覧へ</button>
                        <button type="button" class="btn btn-success btn-lg" style='margin-bottom: 10px' onclick="location.href='{{ route('place.index')}}'">観光リストへ</button>
                        <button type="button" class="btn btn-success btn-lg" style='margin-bottom: 10px' onclick="location.href='{{ route('index_task_google_calendar')}}'"><img src="../images/icons8-google-calendar-48.png" alt="サンプル画像"width="24" height="24">カレンダーリストへ</button>
                    @else
                        <h4>ログイン後はタスク一覧へ移ります</h4>
                        <br>
                        <button type="button" class="btn btn-success btn-lg" onclick="location.href='{{ route('login')}}'">ログイン</button>

                        @if (Route::has('register'))
                            <button type="button" class="btn btn-success btn-lg" onclick="location.href='{{ route('register')}}'">新規登録</button>
                            <!-- <button href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</button> -->
                        @endif
                    @endauth
                </div>
            @endif
</div>

@endsection
