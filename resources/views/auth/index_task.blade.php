@section('title', 'Task管理ツール')

@extends('layouts.application')

@section('content')
{{--
<h3>送られてきた変数は</h3>
<h4 class="text-danger">{{ $task }}</h4>
<h4 class="text-danger">{{ $task_memo }}</h4>
<h3>です</h3>
--}}

<h3>私のタスクは</h3>
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
        <td>{{$onetask['task']}}</td>
        <td>{{$onetask['memo']}}</td>
        <td>{{$onetask['created_at']}}</td>
        <td>{{$onetask['updated_at']}}</td>
    </tr>
    @endforeach

</table>

<h3>です</h3>

@endsection
