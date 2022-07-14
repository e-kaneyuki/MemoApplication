<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;

class GoogleCalendarController extends Controller
{
    public function index() {
        // $user = Auth::user();
        $time = Carbon::now();
        $collection = Event::get();
        $google_event = $collection->pluck('googleEvent');
        $event_start = $google_event->pluck('start');
        $event_start_date_time = $event_start->pluck('dateTime');


        return view('auth.google_calendar.index_task_google_calendar', compact('time','google_event', 'event_start_date_time'));
    }
    public function show($id) {

        $pick_event = Event::find($id);

        return view('auth.google_calendar.show_task_google_calendar', compact('pick_event'));
    }

    public function index_google_calendar() {
        $events = Event::get(); // 未来の全イベントを取得する
        foreach ($events as $event) {
            //dump(
            echo "calendar_id：".'configに登録している'.'<br>';
            echo "event_id：".$event->id.'<br>'; // カレンダーID
            echo "event_name：".$event->name.'<br>'; // タイトル
            echo "event_description：".$event->description.'<br>'; // 説明文
            echo "event_startDateTime：".$event->startDateTime.'<br>'; // 開始日時
            echo "event_endDateTime：".$event->endDateTime.'<br>'; // 終了日時
            echo "####################".'<br>';
            //);
        }
    }
    public function create_google_calendar() {
        return view('auth.google_calendar.create_task_google_calendar');
    }

    public function store_google_calendar(Request $request) {
        $start_date = $request->start_date;

        $end_date = $request->end_date;

        // $start_time = $request->start_time;
        // $end_time = $request->end_time;
        $dt = Carbon::create(
            $start_date,
        );
        $dm = Carbon::create(
            $end_date,
        );
        $event = new Event;
        $event->summary = $request->summary;
        //StartDateTime 文字列でいいなら$start_time オブジェクトなら$dt
        $event->startDateTime = $dt;
        $event->endDateTime = $dm;
        $event->description = $request->description;
        $new_event = $event->save();

        return redirect('/calendar/index')->with('message', 'タスクを作成しました');
        // dd($new_event->id); // 新しく作成したイベントのID
    }
    public function edit_google_calendar($id) {
        $pick_event = Event::find($id);
        return view('auth.google_calendar.edit_task_google_calendar', compact('pick_event'));
    }
    public function update_google_calendar(Request $request, $id) {
        $event = Event::find($id);
        $event->summary = $request->summary;
        $event->description = $request->description;
        $updated_event = $event->save();
        return redirect()->route('show_task_google_calendar', ['id' => $id])->with('message', 'タスクを編集しました');
    }
    public function delete_google_calendar($id) {
        $event = Event::find($id);
        $event->delete();
        return redirect('/calendar/index')->with('delete_message', 'タスクを削除しました');
    }

}
