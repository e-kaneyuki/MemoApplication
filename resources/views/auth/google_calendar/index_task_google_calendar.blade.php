@section('title', 'Task管理ツール')
@extends('layouts.application')
@section('content')
<h3>カレンダーリスト</h3>
<br>
<div>
    <button type="button" style='margin-bottom: 10px' onclick="location.href='{{ route('task.index')}}'">タスク一覧へ</button>
    <button type="button" style='margin-bottom: 10px' onclick="location.href='{{ route('place.index')}}'">観光リストへ</button>
</div>
<br>
<h3>本日以降のスケジュールです</h3>
<br>
    <button type="button" style='margin-bottom: 10px'  onclick="location.href='{{ route('create_task_google_calendar')}}'">新規作成</button>
<table cellpadding="10"  width="100%" border="2">
    <tr align="center">
        <th>No.</th>
        <th>タスク名</th>
        <th>メモ</th>
        <th>予定日</th>
        <th>ボタン</th>
    </tr>
    @foreach($google_event as $key => $onetask)
    <tr>
        <td nowrap align="center">{{$key+1}}</td>
        <td nowrap style="overflow: hidden; max-width: 0; width: 50%;"><a href="{{ url('/calendar/show/'.$onetask->id) }}">{{$onetask['summary']}}</a></td>
        <td style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; max-width: 0; width: 20%;">{{$onetask['description']}}</td>
        <td nowrap>{{date('Y年m月d日 H時i分',strtotime($onetask['start']['dateTime']))}}</td>
        <td nowrap><button type="button" onclick="location.href='{{ route('edit_task_google_calendar', ['id' => $onetask->id])}}'">編集</button>
        <button type="button" onclick="location.href='{{ route('delete_task_google_calendar', ['id' => $onetask->id])}}'">削除</button></td>
    </tr>
    @endforeach
</table>

@endsection
