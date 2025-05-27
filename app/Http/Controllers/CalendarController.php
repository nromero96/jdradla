<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class CalendarController extends Controller
{

    public function index(){
        // $category_name = '';
        $data = [
            'category_name' => 'calendar',
            'page_name' => 'calendar',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('pages.calendar.index')->with($data);
    }

    public function listevents(Request $request){
            $userid = \Auth::user()->id;
            $eventslist = Event::whereDate('start','>=', $request->start)
                                ->whereDate('end','<=', $request->end)
                                ->where('userid', $userid)
                                ->get(['id','title','tag','start','end']);

            $data = array();
            foreach($eventslist as $row){
                $data[] = array(
                    'id'   => $row["id"],
                    'title'   => $row["title"],
                    'start'   => $row["start"],
                    'end'   => $row["end"],
                    'extendedProps' => array(
                    'calendar' => $row["tag"]
                    )
                );
            }

            return response()->json($data);
    }

    public function calendarajax(Request $request){
        $userid = \Auth::user()->id;
        switch ($request->type) {
            case 'add':
                $event = Event::create([
                    'userid' => $userid,
                    'title' => $request->title,
                    'tag' => $request->tag,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);
                return response()->json($event);
                break;

            case 'update':
                $event = Event::find($request->id)->update([
                    'title' => $request->title,
                    'tag' => $request->tag,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);
                return response()->json($event);
                break;

            case 'delete':
                $event = Event::find($request->id)->delete();
                return response()->json($event);
                break;
            default:
                # code...
                break;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
