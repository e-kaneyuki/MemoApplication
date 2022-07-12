@section('title', 'Task管理ツール')

@extends('layouts.application')

@section('content')
@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif
<h3>私のスケジュール詳細</h3>
<table width="400" border="2">
    <tr align="center">
        <th>作成日</th>
        <th>更新日</th>
    </tr>
    <tr align="center">
        <td>{{date('Y年m月d日',strtotime($pick_event->googleEvent->created))}}</td>
        <td>{{date('Y年m月d日',strtotime($pick_event->googleEvent->updated))}}</td>
    </tr>
</table>
<br>

<table width="100%" height= "400" cellpadding="10" border="3">
    <tr height= "50" bgcolor="skyblue" align="center"><th width="150">項目</th><td>詳細</td></tr>
    <tr><th width="150" align="center">開始時間</th><td height= "40">{{$pick_event->startDateTime->format('Y年m月d日H時i分')}}</td></tr>
    <tr><th width="150" align="center">終了時間</th><td height= "40">{{$pick_event->endDateTime->format('Y年m月d日H時i分')}}</td></tr>
    <tr><th width="150" align="center"height= "40">スケジュール</th><td>{{$pick_event->summary}}</td></tr>
    <tr><th width="150">メモ</th><td style= "white-space: pre-wrap;">{{$pick_event->description}}</td></tr>
</table>
<br>
<button type="button" onclick="location.href='{{ route('index_task_google_calendar')}}'">もどる</button>

@endsection
