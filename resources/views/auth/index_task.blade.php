@section('title', 'Task管理ツール')

@extends('layouts.application')

@section('content')

<h3>私のタスク数は 『{{count($collection)}}』です</h3>
<br>
<table border="2">
    <tr>
        <th>No.</th>
        <th>タスク名</th>
        <th>メモ</th>
        <th>作成日</th>
        <th>更新日</th>
    </tr>
    @foreach($collection as $key => $onetask)
    <tr>
        <td>{{$key+1}}</td>
        <td><a href="{{ url('/show/'.$onetask->id) }}">{{$onetask['task']}}</a></td>
        <td>{{$onetask['memo']}}</td>
        <td>{{$onetask['created_at']}}</td>
        <td>{{$onetask['updated_at']}}</td>
    </tr>
    @endforeach
</table>

@endsection
