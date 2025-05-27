<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // $category_name = '';
        $data = [
            'category_name' => 'notes',
            'page_name' => 'notes',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        $userid = \Auth::user()->id;

        $notes = Note::where('userid', $userid)->where('status','active')->orderby('id', 'DESC')->get();
        return view('pages.notes.index')->with($data)->with('notes', $notes);
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
    public function store(Request $request){
        $userid = \Auth::user()->id;

        $note_id = Note::insertGetId([
            'userid' => $userid,
            'title' => $request->get('ntitle'),
            'description' => $request->get('ndescription'),
            'status' => 'active',
            'created_at' => date("Y-m-d H:i:s", strtotime('now')),
            'updated_at' => date("Y-m-d H:i:s", strtotime('now')),
        ]);

        //$user = Note::find($note_id);
        return response()->json(['success'=>'Nota Agregador','noteid'=>$note_id]);

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
    public function destroy(Request $request){
        $note = Note::find($request->note_id);
        $note->status = 'trashed';
        $note->save();

        return response()->json(['success'=>'Trashed successfully.']);
    }

    public function changeFavourite(Request $request){
        $note = Note::find($request->note_id);
        $note->favourites = $request->favourites;
        $note->save();

        return response()->json(['success'=>'Favourite change successfully.']);
    }

    public function changeTag(Request $request){
        $note = Note::find($request->note_id);
        $note->tag = $request->tag;
        $note->save();

        return response()->json(['success'=>'Tag change successfully.']);
    }

}
