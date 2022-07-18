@section('title', 'Task管理ツール')
@extends('layouts.application')
@section('content')
<div class="pb-4">
<h3><img src="../images/icons8-google-calendar-48.png" alt="サンプル画像">カレンダーリスト</h3>
<br>
<div>
    <button type="button" class="btn btn-success btn-lg" style='margin-bottom: 10px' onclick="location.href='{{ route('task.index')}}'">タスク一覧へ</button>
    <button type="button" class="btn btn-success btn-lg" style='margin-bottom: 10px' onclick="location.href='{{ route('place.index')}}'">観光リストへ</button>
</div>
<br>
<h3>{{date('n月d日',strtotime($time))}}以降のスケジュールです</h3>
<br>
    <button type="button"  class="btn btn-success btn-sm" style='margin-bottom: 10px'  onclick="location.href='{{ route('create_task_google_calendar')}}'">新規作成</button>
<div style="background-color : #FFFFFF">
    <table cellpadding="10" class="table table-striped" width="100%" border="2">
    <tr align="center">
        <th nowrap>No.</th>
        <th nowrap>タスク名</th>
        <th nowrap>メモ</th>
        <th nowrap>予定日</th>
        <th nowrap>ボタン</th>
    </tr>
    @foreach($collection_page as $key => $onetask)
    <tr>
        <td nowrap align="center">{{$key+1}}</td>
        <td nowrap style="overflow: hidden; max-width: 0; width: 50%;"><a href="{{ url('/calendar/show/'.$onetask['id']) }}">{{$onetask['summary']}}</a></td>
        <td style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; max-width: 0; width: 20%;">{{$onetask['description']}}</td>
        <td nowrap>{{date('Y年m月d日',strtotime($onetask['start']['dateTime']))}}~{{date('m月d日',strtotime($onetask['end']['dateTime']))}}</td>
        <td nowrap>
            <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='{{ route('edit_task_google_calendar', ['id' => $onetask['id']])}}'">編集</button>
            <button type="button" class="btn btn-danger btn-sm" onclick="location.href='{{ route('delete_task_google_calendar', ['id' => $onetask['id']])}}'">削除</button>
        </td>
    </tr>
    @endforeach
</table>
</div>
<br>
{{$collection_page->links()}}
</div>
@endsection
