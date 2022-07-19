@section('title', 'Task管理ツール')

@extends('layouts.application')

@section('content')
@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif
<h3>タスク詳細</h3>
<table style="background-color : #FFFFFF" width="300" border="2">
    <tr align="center">
        <th>作成日</th>
        <th>更新日</th>
    </tr>
    <tr align="center">
        <td>{{$pick_task['created_at']->format('Y年m月d日')}}</td>
        <td>{{$pick_task['updated_at']->format('Y年m月d日')}}</td>
    </tr>
</table>

<br>
<label>
    <input type="radio" name="task_flg" value="1"  @if($pick_task['task_flg'] == 1) checked @endif  required>実施済み
</label>
<label>
    <input type="radio" name="task_flg" @if($pick_task['task_flg'] == 0) checked @endif value="0">非実施
</label>
<div style="background-color : #FFFFFF">
<table class="table" width="100%" height= "200" cellpadding="10" border="3">
    <tr height= "50" bgcolor="skyblue" align="center"><th width="150">項目</th><td>詳細</td></tr>
    <tr><th width="150" align="center">タスク</th><td>{{$pick_task['task']}}</td></tr>
    <tr><th width="150">メモ</th><td style= "white-space: pre-wrap;">{{$pick_task['memo']}}</td></tr>
</table>
</div>
<br>
<button type="button" onclick="location.href='{{ route('task.edit', ['id' => $pick_task['id']])}}'">編集</button>
<button type="button" onclick="location.href='{{ route('task.index')}}'">もどる</button>

<button type="button" onclick="location.href='{{ route('task.delete', ['id' => $pick_task['id']])}}'">削除</button>

@endsection
