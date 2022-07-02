@section('title', 'Task管理ツール')

@extends('layouts.application')

@section('content')

<h3>私のタスク数は 『{{count($collection)}}』です</h3>

<button type="button" style='margin-bottom: 10px' onclick="location.href='{{ route('create')}}'">新規作成</button>
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
        <td nowrap style="overflow: hidden; max-width: 0; width: 50%;"><a href="{{ url('/show/'.$onetask->id) }}">{{$onetask['task']}}</a></td>
        <td style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; max-width: 0; width: 20%;">{{$onetask['memo']}}</td>
        <td nowrap>{{$onetask['updated_at']->format('y年m月d日')}}</td>
        <td nowrap><button type="button" onclick="location.href='{{ route('edit', ['id' => $onetask['id']])}}'">編集</button>
        <button type="button" onclick="location.href='{{ route('delete', ['id' => $onetask['id']])}}'">削除</button></td>
    </tr>
    @endforeach
</table>

@endsection
