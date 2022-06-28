@section('title', 'Task管理ツール')

@extends('layouts.application')

@section('content')

<h3>私のタスク詳細</h3>
<table width="400" border="2">
    <tr>
        <th>作成日</th>
        <th>更新日</th>
    </tr>
    <tr>
        <td>{{$pick_task['created_at']}}</td>
        <td>{{$pick_task['updated_at']}}</td>
    </tr>
</table>
<br>

<table width="600" height= "200" border="3">
    <tr height= "50" bgcolor="skyblue" align="center"><th width="150">項目</th><td>詳細</td></tr>
    <tr><th width="150" align="center">タスク</th><td>{{$pick_task['task']}}</td></tr>
    <tr><th width="150">メモ</th><td>{{$pick_task['memo']}}</td></tr>
</table>
<br>
<button type="button" onclick="location.href='{{ route('index')}}'">もどる</button>

@endsection
