@section('title', 'Task管理ツール')

@extends('layouts.application')

@section('content')
@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif
<h3>スポット詳細</h3>
<table width="300" border="2">
    <tr align="center">
        <th>作成日</th>
        <th>更新日</th>
    </tr>
    <tr align="center">
        <td>{{$pick_place['created_at']->format('Y年m月d日')}}</td>
        <td>{{$pick_place['updated_at']->format('Y年m月d日')}}</td>
    </tr>
</table>
<br>
<label>
    <input type="radio" name="place_flg" value="1"  @if($pick_place['place_flg'] == 1) checked @endif  required>実施済み
</label>
<label>
    <input type="radio" name="place_flg" @if($pick_place['place_flg'] == 0) checked @endif value="0">非実施
</label>
<table width="100%" height= "200" cellpadding="10" border="3">
    <tr height= "50" bgcolor="skyblue" align="center"><th width="150">項目</th><td>詳細</td></tr>
    <tr><th width="150" align="center">スポット名</th><td>{{$pick_place['place']}}</td></tr>
    <tr><th width="150">メモ</th><td style= "white-space: pre-wrap;">{{$pick_place['detail']}}</td></tr>
</table>
<br>
<button type="button" onclick="location.href='{{ route('place.edit', ['id' => $pick_place['id']])}}'">編集</button>
<button type="button" onclick="location.href='{{ route('place.index')}}'">もどる</button>

<button type="button" onclick="location.href='{{ route('place.delete', ['id' => $pick_place['id']])}}'">削除</button>

@endsection
