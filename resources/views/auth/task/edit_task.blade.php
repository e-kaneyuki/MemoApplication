@section('title', 'Task管理ツール')

@extends('layouts.application')

@section('content')

<h3>私のタスク詳細</h3>
<table width="400" border="2">
    <tr align="center">
        <th>作成日</th>
        <th>更新日</th>
    </tr>
    <tr align="center">
        <td>{{$edit_task['created_at']->format('Y年m月d日')}}</td>
        <td>{{$edit_task['updated_at']->format('Y年m月d日')}}</td>
    </tr>
</table>
<br>
<form action="/task/update/{{$edit_task['id']}}" method="post">
    {{ csrf_field() }}
    <label>
        <input type="radio" name="task_flg" value="1"  @if($edit_task['task_flg'] == 1) checked @endif  required>実施済み
    </label>
    <label>
        <input type="radio" name="task_flg" @if($edit_task['task_flg'] == 0) checked @endif value="0">非実施
    </label>
    <table width="100%" height= "200"  border="3">
        <tr height= "50" bgcolor="skyblue" align="center"><th width="150">項目</th><td width="500" >詳細</td></tr>
        <tr><th width="150" align="center">タスク</th><td height= "40"><input style = 'width:100%; height: 100%;' type="text" name="task" value="{{$edit_task['task']}}" maxlength="30" required></td></tr>
        <tr><th width="150">メモ</th><td height= "120"><textarea style = 'width:100%; height: 100%; resize: none' name="memo" required>{{$edit_task['memo']}}</textarea></td></tr>
    </table>
    <br>
    <input type="hidden" name="_method" value="patch">
    <input type="submit" value="送信">
    <button type="button" onclick="location.href='{{ route('task.index')}}'">もどる</button>
    <button type="button" onclick="location.href='{{ route('task.delete', ['id' => $edit_task['id']])}}'">削除</button>
</form>
<br>


@endsection
