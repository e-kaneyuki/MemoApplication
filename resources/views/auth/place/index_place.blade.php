@section('title', '観光地管理ツール')
@extends('layouts.application')
@section('content')
<div class="pb-4">
@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@elseif(session('delete_message'))
<div class="alert alert-danger">{{session('delete_message')}}</div>
@endif
<h3>観光リスト</h3>
<br>
<div>
    <button type="button" class="btn btn-success btn-lg" style='margin-bottom: 10px' onclick="location.href='{{ route('task.index')}}'">タスク一覧へ</button>
    <button type="button" class="btn btn-success btn-lg" style='margin-bottom: 10px' onclick="location.href='{{ route('index_task_google_calendar')}}'"><img src="../images/icons8-google-calendar-48.png" alt="サンプル画像"width="24" height="24">カレンダーリストへ</button>
</div>
<br>
    <h3>私の観光リストのうち
    @if($place_flg_zero == true && $place_flg_one == true)
        すべての
    @elseif($place_flg_zero == true && $place_flg_one == false)
        行っていない
    @else($place_flg_zero == false && $place_flg_one == true)
        すでに行った
    @endif
    観光地は 『{{count($collection)}}つ』です
</h3>
<br>
<form action="place/index" method = "GET">
    <div class="form-group">
        <label for="category-id">{{ __('絞り込み') }}
        <select class="form-select" id="category-id" name="place_flg" onChange="location.href=value;">
        <option selected="selected" value=>選択してください</option>
            <option value="/place/index">すべて</option>
            <option value="/place/search/0">行っていない</option>
            <option value="/place/search/1">観光済み</option>
        </select>
        </label>
    </div>
</form>
<button type="button" class="btn btn-success btn-sm" style='margin-bottom: 10px' onclick="location.href='{{ route('place.create')}}'">新規作成</button>
<br>
<div style="background-color : #FFFFFF">
<table cellpadding="10" class="table table-striped" width="100%" border="2">
    <tr align="center">
        <th nowrap>No.</th>
        <th nowrap>済み</th>
        <th nowrap>スポット名</th>
        <th nowrap>メモ</th>
        <th nowrap>更新日</th>
        <th nowrap>ボタン</th>
    </tr>
    @foreach($collection_page as $key => $oneplace)
    <tr>
        <td nowrap align="center">{{$key+1}}</td>
        <td align="center"><input type="checkbox" style="transform: scale(1.4);" @if($oneplace['place_flg'] == 1) checked @endif disabled="disabled"/></td>
        <td nowrap style="overflow: hidden; max-width: 0; width: 50%;"><a href="{{ url('/place/show/'.$oneplace->id) }}">{{$oneplace['place']}}</a></td>
        <td style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; max-width: 0; width: 20%;">{{$oneplace['detail']}}</td>
        <td nowrap>{{$oneplace['updated_at']->format('y年m月d日')}}</td>
        <td nowrap>
            <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='{{ route('place.edit', ['id' => $oneplace['id']])}}'">編集</button>
            <button type="button" class="btn btn-danger btn-sm" onclick="location.href='{{ route('place.delete', ['id' => $oneplace['id']])}}'">削除</button></td>
    </tr>
    @endforeach
</table>
</div>
<br>
{{$collection_page->links()}}
</div>
@endsection
