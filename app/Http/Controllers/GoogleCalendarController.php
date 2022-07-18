<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;

class GoogleCalendarController extends Controller
{
    public function index() {
        $time = Carbon::now();
        $collection = Event::get();
        $google_event = $collection->pluck('googleEvent');
        $collection_page = $google_event->paginate(3);
        $event_start = $google_event->pluck('start');
        $event_start_date_time = $event_start->pluck('dateTime');


        return view('auth.google_calendar.index_task_google_calendar', compact('time','collection_page','event_start_date_time'));
    }
    public function show($id) {

        $pick_event = Event::find($id);

        return view('auth.google_calendar.show_task_google_calendar', compact('pick_event'));
    }

    public function create_google_calendar() {
        return view('auth.google_calendar.create_task_google_calendar');
    }

    public function store_google_calendar(Request $request) {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $dt = Carbon::create(
            $start_date,
        );
        $dm = Carbon::create(
            $end_date,
        );
        $event = new Event;
        $event->summary = $request->summary;
        $event->startDateTime = $dt;
        $event->endDateTime = $dm;
        $event->description = $request->description;
        $new_event = $event->save();

        return redirect('/calendar/index')->with('message', 'タスクを作成しました');
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
