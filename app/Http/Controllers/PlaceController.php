<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class PlaceController extends Controller
{
    /**
     * place一覧表示
     * @param Illuminate\Database\Eloquent\Collection $collection
     * @param Illuminate\Support\Collection $place_flg_base
     * @param array boolean[] $array_place_flg trueは非実施 falseは実施済み
     */
    public function index() {
        $user = Auth::user();
        $collection = $user->place()->orderBy('created_at', 'asc')->get();
        $collection_page = $collection->paginate(3);
        $place_flg_base = $collection_page->pluck('place_flg');
        $array_place_flg = $place_flg_base->toArray();
        $place_flg_zero = in_array(false,$array_place_flg);
        $place_flg_one = in_array(true,$array_place_flg);

        return view('auth.place.index_place', compact('collection','collection_page','place_flg_zero','place_flg_one'));
    }
    /**
     * place詳細表示
     * @param App\Models\Place $id
     * @var array boolean[] $array_place_flg
     */
    public function show($id) {
        $pick_place = Place::find($id);

        return view('auth.place.show_place', compact('pick_place'));
    }
    //place新規作成画面への遷移
    public function create() {
        return view('auth.place.create_place');
    }
    /**
     * place新規登録
     * @param Illuminate\Http\Request  $request
     * @param App\Models\Place $place
     *
     */
    public function store(Request $request) {
        $place = new Place;
        $place->place = $request->place;
        $place->detail = $request->detail;
        $place->user_id = Auth::id();
        $place->save();
        return redirect('/place/index')->with('message', 'タスクを作成しました');
    }
    public function edit($id) {
        $edit_place = Place::find($id);
        return view('auth.place.edit_place', compact('edit_place'));
    }
    /**
     * place情報更新
     *
     * @param Illuminate\Http\Request
     * @param int $id
     *
     */
    public function update(Request $request, $id) {
        $place = Place::find($id);
        $place->place = $request->place;
        $place->detail = $request->detail;
        $place->place_flg = $request->place_flg;
        $place->user_id = Auth::id();
        $place->save();
        return redirect()->route('place.show', ['id' => $id])->with('message', 'タスクを編集しました');
    }
    public function delete($id) {
        $place = Place::find($id);
        $place->delete();
        return redirect('/place/index')->with('delete_message', 'タスクを削除しました');
    }
    /**
     * place実施状況でのSort
     * @param Illuminate\Database\Eloquent\Collection $collection
     * @param Illuminate\Support\Collection $place_flg_base
     * @param array boolean[] $array_place_flg trueは非実施 falseは実施済み
     *
     */
    public function search($place_fig) {
        $user = Auth::user();
        $collection = $user->place()->where('place_flg',$place_fig)->orderBy('created_at', 'asc')->get();
        $collection_page = $collection->paginate(3);
        $place_flg_base = $collection->pluck('place_flg');
        $array_place_flg = $place_flg_base->toArray();
        $place_flg_zero = in_array(false,$array_place_flg);
        $place_flg_one = in_array(true,$array_place_flg);

        return view('auth.place.index_place', compact('collection','collection_page','place_flg_zero','place_flg_one'));
    }
}
