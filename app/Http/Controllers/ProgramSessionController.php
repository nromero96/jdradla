<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramSession;

class ProgramSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = [
            'category_name' => 'programsessions',
            'page_name' => 'programsessions',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        //program sessions
        $programsessions = ProgramSession::all();

        return view('pages.programsessions.index')->with($data)->with('programsessions', $programsessions);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'category_name' => 'programsessions',
            'page_name' => 'programsessions_create',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('pages.programsessions.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'code_session' => 'required | unique:program_sessions',
            'name_session' => 'required',
            'date' => 'required',
            'start_time_block' => 'required',
            'end_time_block' => 'required',
            'room' => 'required',
            'color' => 'required'
        ]);

        //store
        $programsession = new ProgramSession();
        $programsession->code_session = $request->code_session;
        $programsession->name_session = $request->name_session;
        $programsession->date = $request->date;
        $programsession->start_time_block = $request->start_time_block;
        $programsession->end_time_block = $request->end_time_block;
        $programsession->room = $request->room;
        $programsession->color = $request->color;
        $programsession->save();

        return redirect()->route('programsessions.index')->with('success', 'Sesión de programa creada con éxito.');
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
        $data = [
            'category_name' => 'programsessions',
            'page_name' => 'programsessions_edit',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        $programsession = ProgramSession::find($id);

        return view('pages.programsessions.edit')->with($data)->with('programsession', $programsession);
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
        //validate
        $request->validate([
            'name_session' => 'required',
            'date' => 'required',
            'start_time_block' => 'required',
            'end_time_block' => 'required',
            'room' => 'required',
            'image_program' => 'required',
            'file_program' => 'required',
        ]);

        //update
        $programsession = ProgramSession::find($id);
        $programsession->name_session = $request->name_session;
        $programsession->date = $request->date;
        $programsession->start_time_block = $request->start_time_block;
        $programsession->end_time_block = $request->end_time_block;
        $programsession->room = $request->room;
        $programsession->image_program = $request->image_program;
        $programsession->file_program = $request->file_program;
        $programsession->save();

        return redirect()->route('programsessions.index')->with('success', 'Sesión #'.$id.' del programa actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('programsessions.index')->with('error', 'No se puede eliminar la sesión #'.$id.' del programa.');
    }

    public function getSessionById($id)
    {
        $programsession = ProgramSession::find($id);
        return response()->json($programsession);
    }


}
