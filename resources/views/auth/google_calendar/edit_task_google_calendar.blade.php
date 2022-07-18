@section('title', 'Task管理ツール')

@extends('layouts.application')

@section('content')

<h3>私のタスク詳細</h3>
<table style="background-color : #FFFFFF" width="400" border="2">
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
<form action="/calendar/update/{{$pick_event->id}}" method="post">
    {{ csrf_field() }}
    <div style="background-color : #FFFFFF">
    <table width="100%" height= "200"  border="3">
        <tr height= "50" bgcolor="skyblue" align="center"><th width="150">項目</th><td width="500" >詳細</td></tr>
        <tr><th width="150" align="center">時間</th><td height= "40"><input style = 'width:100%; height: 100%;' type="datetime-local" name="start_date" value="{{$pick_event->startDateTime->format('Y-m-d\TH:i')}}" maxlength="30" required></td></tr>
        <tr><th width="150" align="center">時間</th><td height= "40"><input style = 'width:100%; height: 100%;' type="datetime-local" name="end_date" value="{{$pick_event->endDateTime->format('Y-m-d\TH:i')}}" maxlength="30" required></td></tr>
        <tr><th width="150" align="center">タスク</th><td height= "40"><input style = 'width:100%; height: 100%;' type="text" name="summary" value="{{$pick_event->summary}}" maxlength="30" required></td></tr>
        <tr><th width="150">メモ</th><td height= "120"><textarea style = 'width:100%; height: 100%; resize: none' name="description" required>{{$pick_event->description}}</textarea></td></tr>
    </table>
    </div>
    <br>
    <input type="hidden" name="_method" value="patch">
    <input type="submit" value="送信">
    <button type="button" onclick="location.href='{{ route('index_task_google_calendar')}}'">もどる</button>
</form>
<br>


@endsection
