@section('title', 'Task管理ツール')

@extends('layouts.application')

@section('content')

<h3>タスク登録</h3>
<table style="background-color : #FFFFFF" width="400" border="2">
    <tr align="center">
        <th>作成日</th>
        <th>更新日</th>
    </tr>
    <tr align="center">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
</table>
<br>
<form action="/task/store" method="post">
    {{ csrf_field() }}
    <!-- Value = "1"はtrueを "0"はfalseを意味する -->
    <label>
        <input type="radio" name="task_flg" value="1" disabled="disabled">実施済み
    </label>
    <label>
        <input type="radio" name="task_flg" value="0" checked require>非実施
    </label>
    <table style="background-color : #FFFFFF" width="100%" height= "200"  border="3">
        <tr height= "50" bgcolor="skyblue" align="center"><th width="150">項目</th><td width="500" >詳細</td></tr>
        <tr><th width="150" align="center">タスク</th><td height= "40"><input style = 'width:100%; height: 100%;' type="text" name="task" placeholder="タスク名を入力" maxlength="30" required></td></tr>
        <tr><th width="150">メモ</th><td height= "120"><textarea style = 'width:100%; height: 100%; resize: none' name="memo" placeholder="タスクについてのメモを入力" required></textarea></td></tr>
    </table>
    <br>
    <input type="submit" value="送信">
    <button type="button" onclick="location.href='{{ route('task.index')}}'">もどる</button>
</form>
<br>


@endsection
