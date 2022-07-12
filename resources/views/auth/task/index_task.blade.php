@section('title', 'Task管理ツール')
@extends('layouts.application')
@section('content')
@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@elseif(session('delete_message'))
<div class="alert alert-danger">{{session('delete_message')}}</div>
@endif
<h3>タスク一覧</h3>
<br>
<div>
    <button type="button" style='margin-bottom: 10px' onclick="location.href='{{ route('place.index')}}'">観光リストへ</button>
    <button type="button" style='margin-bottom: 10px' onclick="location.href='{{ route('index_task_google_calendar')}}'">カレンダーリストへ</button>
</div>
<br>
<h3>私の
    @if($task_flg_zero == true && $task_flg_one == true)
        すべての
    @elseif($task_flg_zero == true && $task_flg_one == false)
        非実施の
    @else($task_flg_zero == false && $task_flg_one == true)
        実施済みの
    @endif
    タスク数は 『{{count($collection)}}』です
</h3>
<br>
<form action="task/index" method = "GET">
    <div class="form-group">
        <label for="category-id">{{ __('絞り込み') }}
        <select class="form-select" id="category-id" name="task_flg" onChange="location.href=value;">
        <option selected="selected" value=>選択してください</option>
            <option value="/task/index">すべて</option>
            <option value="/task/search/0">非実施</option>
            <option value="/task/search/1">実施済み</option>
        </select>
        </label>
    </div>
</form>
<button type="button" style='margin-bottom: 10px' onclick="location.href='{{ route('task.create')}}'">新規作成</button>
<br>

<table cellpadding="10"  width="100%" border="2">
    <tr align="center">
        <th>No.</th>
        <th nowrap>済み</th>
        <th>タスク名</th>
        <th>メモ</th>
        <th>更新日</th>
        <th>ボタン</th>
    </tr>
    @foreach($collection as $key => $onetask)
    <tr>
        <td nowrap align="center">{{$key+1}}</td>
        <td align="center"><input type="checkbox" style="transform: scale(1.4);" @if($onetask['task_flg'] == 1) checked @endif disabled="disabled"/></td>
        <td nowrap style="overflow: hidden; max-width: 0; width: 50%;"><a href="{{ url('/task/show/'.$onetask->id) }}">{{$onetask['task']}}</a></td>
        <td style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; max-width: 0; width: 20%;">{{$onetask['memo']}}</td>
        <td nowrap>{{$onetask['updated_at']->format('y年m月d日')}}</td>
        <td nowrap><button type="button" onclick="location.href='{{ route('task.edit', ['id' => $onetask['id']])}}'">編集</button>
        <button type="button" onclick="location.href='{{ route('task.delete', ['id' => $onetask['id']])}}'">削除</button></td>
    </tr>
    @endforeach
</table>

@endsection
