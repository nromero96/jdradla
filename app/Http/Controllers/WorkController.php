<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\User;
use App\Models\TemporaryFile;
use App\Models\WorksNote;
use Illuminate\Support\Facades\Storage;

use App\Mail\WorkCreatedMail;
use App\Mail\WorkAccepted;
use Illuminate\Support\Facades\Mail;

use Maatwebsite\Excel\Facades\Excel;

use App\Exports\WorkExport;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = \Auth::user()->id;

        $data = [
            'category_name' => 'works',
            'page_name' => 'works',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        //show all works for role admin and user
        if (\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria')) {
            
            //get works join with user
            $works = Work::join('users', 'works.user_id', '=', 'users.id')
                ->select('works.*', 'users.name as user_name', 'users.lastname as user_lastname', 'users.second_lastname as user_second_lastname', 'users.country as user_country')
                ->where('works.status', '!=', 'rechazado')
                ->orderBy('id', 'desc')
                ->get();
        } elseif(\Auth::user()->hasRole('Calificador')){
            
            //si id de usuario es calificador  es 122
            if(\Auth::user()->id == 867){
                //solo para el calificador 867 
                $works = Work::join('users', 'works.user_id', '=', 'users.id')
                    ->select('works.*', 'users.name as user_name', 'users.lastname as user_lastname', 'users.second_lastname as user_second_lastname', 'users.country as user_country')
                    ->where('works.category', 'Mini Caso')
                    ->where('works.status', '!=', 'rechazado')
                    ->orderBy('id', 'desc')
                    ->get();
            } else if(\Auth::user()->id == 614){
                //solo para el calificador 614 
                $works = Work::join('users', 'works.user_id', '=', 'users.id')
                    ->select('works.*', 'users.name as user_name', 'users.lastname as user_lastname', 'users.second_lastname as user_second_lastname', 'users.country as user_country')
                    ->where('works.status', '!=', 'rechazado')
                    ->orderBy('id', 'desc')
                    ->get();
            }else{
                //get works for calificador join with user
                $works = Work::join('users', 'works.user_id', '=', 'users.id')
                    ->select('works.*', 'users.name as user_name', 'users.lastname as user_lastname', 'users.second_lastname as user_second_lastname', 'users.country as user_country')
                    ->where('works.user_id_calificador', $userid)
                    ->where('works.status', '!=', 'rechazado')
                    ->orderBy('id', 'desc')
                    ->get();
            }
        } else {

            //get works by user id join with user
            $works = Work::join('users', 'works.user_id', '=', 'users.id')
                ->select('works.*', 'users.name as user_name', 'users.lastname as user_lastname', 'users.second_lastname as user_second_lastname', 'users.country as user_country')
                ->where('works.user_id', $userid)
                ->where('works.status', '!=', 'rechazado')
                ->orderBy('id', 'desc')
                ->get();

        }
        return view('pages.works.index')->with($data)->with('works', $works);
    }

    //works-rejects
    public function indexRejects()
    {
        $userid = \Auth::user()->id;

        $data = [
            'category_name' => 'works',
            'page_name' => 'works_rejects',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        //show all works for role admin and user
        if (\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria')) {
            
            //get works join with user
            $works = Work::join('users', 'works.user_id', '=', 'users.id')
                ->select('works.*', 'users.name as user_name', 'users.lastname as user_lastname', 'users.second_lastname as user_second_lastname', 'users.country as user_country')
                ->where('works.status', 'rechazado')
                ->orderBy('id', 'desc')
                ->get();
        } else {
            
            //get works by user id join with user
            $works = Work::join('users', 'works.user_id', '=', 'users.id')
                ->select('works.*', 'users.name as user_name', 'users.lastname as user_lastname', 'users.second_lastname as user_second_lastname', 'users.country as user_country')
                ->where('works.user_id', $userid)
                ->where('works.status', 'rechazado')
                ->orderBy('id', 'desc')
                ->get();

        }
        return view('pages.works.rejects')->with($data)->with('works', $works);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = \Auth::user()->id;

        $data = [
            'category_name' => 'works',
            'page_name' => 'works_create',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        $user = User::find($id);

        return view('pages.works.create')->with($data)->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $id = \Auth::user()->id;

    $request->validate([
        'knowledge_area' => 'required',
        'category' => 'required',
    ]);

    $action = $request->input('action'); // Obtén el valor del botón presionado

    $workData = [
        'knowledge_area' => $request->get('knowledge_area'),
        'category' => $request->get('category'),
        'author_coauthors' => $request->get('author_coauthors'),
        'institution' => $request->get('institution'),
        'user_id' => $id,
        'title' => $request->get('title'),
        'description' => $request->get('description'),
        'references' => $request->get('references'),
        'status' => $action,
    ];

    $fileFields = ['file_1', 'file_2', 'file_3', 'file_4', 'file_5', 'file_6'];

    foreach ($fileFields as $fieldName) {
        $temporaryfile = TemporaryFile::where('folder', $request->input($fieldName))->first();

        if ($temporaryfile) {
            $filename = $temporaryfile->filename;
            $sourcePath = 'public/uploads/tmp/' . $request->input($fieldName) . '/' . $filename;
            $destinationPath = 'public/uploads/abstract_file/' . $filename;

            Storage::move($sourcePath, $destinationPath);
            $workData[$fieldName] = $filename;

            $temporaryfile->delete();

            $folderPath = storage_path('app/public/uploads/tmp/' . $request->input($fieldName));

            if (is_dir($folderPath)) {
                rmdir($folderPath);
            }
        }
    }

    $work = new Work($workData);
    $work->save();

    // Redirigir según el valor de $action
    if ($action == 'borrador') {
        return redirect()->route('works.edit', ['work' => $work->id])->with('success', 'Trabajo agregado exitosamente.');
    } elseif ($action == 'finalizado') {
        $work = Work::find($work->id);
        $iduser = \Auth::user()->id;
        $user = User::find($iduser);
        Mail::to($user->email)->cc(config('services.correonotificacion.trabajo'))->send(new WorkCreatedMail($work));
        return redirect()->route('works.index')->with('success', 'Trabajo agregado exitosamente.');
    }
}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //validate if work is from user logged
        $work = Work::find($id);
        $iduser = \Auth::user()->id;

        //get works_notes by work id
        $works_notes = WorksNote::join('users', 'works_notes.user_id', '=', 'users.id')
            ->select('works_notes.*', 'users.name', 'users.lastname', 'users.second_lastname')
            ->where('works_notes.work_id', $id)
            ->orderBy('id', 'desc')
            ->get();

        if ($work->user_id != $iduser && !\Auth::user()->hasRole('Administrador') && !\Auth::user()->hasRole('Calificador')) {
            return redirect()->route('works.index')->with('error', 'No tienes permiso para ver este trabajo.');
        }

        $data = [
            'category_name' => 'works',
            'page_name' => 'works_show',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        $user = User::find($iduser);

        //get works by id join with user
        $work = Work::join('users', 'works.user_id', '=', 'users.id')
            ->select('works.*', 'users.name', 'users.lastname', 'users.second_lastname')
            ->where('works.id', $id)
            ->first();

        //user has role calificador
        $calificadores = User::role('Calificador')->get();

        return view('pages.works.show')->with($data)->with('work', $work)->with('calificadores', $calificadores)->with('works_notes', $works_notes);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //validate if work is from user logged
        $work = Work::find($id);
        $iduser = \Auth::user()->id;

        if ($work->user_id != $iduser) {
            return redirect()->route('works.index')->with('error', 'No tienes permiso para editar este trabajo.');
        }

        $data = [
            'category_name' => 'works',
            'page_name' => 'works_edit',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        $user = User::find($iduser);

        //get works by id join with user
        $work = Work::join('users', 'works.user_id', '=', 'users.id')
            ->select('works.*', 'users.name', 'users.lastname', 'users.second_lastname')
            ->where('works.id', $id)
            ->first();
        return view('pages.works.edit')->with($data)->with('work', $work);
    

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
        //update work and files except knowledge_area and category
        //no validation
        $work = Work::find($id);

        $action = $request->input('action'); // Obtén el valor del botón presionado

        $work->author_coauthors = $request->get('author_coauthors');
        $work->institution = $request->get('institution');
        $work->title = $request->get('title');
        $work->description = $request->get('description');
        $work->references = $request->get('references');
        $work->status = $action;

        $fileFields = ['file_1', 'file_2', 'file_3', 'file_4', 'file_5', 'file_6'];

        foreach ($fileFields as $fieldName) {
            $temporaryfile = TemporaryFile::where('folder', $request->input($fieldName))->first();

            if ($temporaryfile) {
                $filename = $temporaryfile->filename;
                $sourcePath = 'public/uploads/tmp/' . $request->input($fieldName) . '/' . $filename;
                $destinationPath = 'public/uploads/abstract_file/' . $filename;

                Storage::move($sourcePath, $destinationPath);
                $work[$fieldName] = $filename;

                $temporaryfile->delete();

                $folderPath = storage_path('app/public/uploads/tmp/' . $request->input($fieldName));

                if (is_dir($folderPath)) {
                    rmdir($folderPath);
                }
            }
        }

        $work->save();

        // Redirigir según el valor de $action
        if ($action == 'borrador') {
            return redirect()->route('works.edit', ['work' => $work->id])->with('success', 'Trabajo actualizado exitosamente.');
        } elseif ($action == 'finalizado') {
            $work = Work::find($work->id);
            $iduser = \Auth::user()->id;
            $user = User::find($iduser);
            Mail::to($user->email)->cc(config('services.correonotificacion.trabajo'))->send(new WorkCreatedMail($work));
            return redirect()->route('works.index')->with('success', 'Trabajo actualizado exitosamente.');
        }

    }

    //update status
    public function updateStatus(Request $request, $id)
    {

        $work = Work::find($id);
        $worknote = new WorksNote();

        //insert note in table works_notes
        $worknote->work_id = $id;
        $worknote->action = 'Pasó de "'.$work->status.'" a "'.$request->input('status').'"';
        $worknote->note = $request->input('note');
        $worknote->user_id = \Auth::user()->id;
        $worknote->save();


        $work->status = $request->input('status');
        
        //if calificador
        if (\Auth::user()->hasRole('Calificador')) {
            $work->qualification = $request->input('qualification');
        }

        if (\Auth::user()->hasRole('Administrador')) {
            $work->user_id_calificador = $request->input('user_id_calificador');
        }

        $work->save();

        //redirect to show work
        return redirect()->route('works.show', ['work' => $work->id])->with('success', 'Estado actualizado exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            //validate if work is from user logged
            $work = Work::find($id);
            $iduser = \Auth::user()->id;
        
            if ($work->user_id != $iduser) {
                return redirect()->route('works.index')->with('error', 'No tienes permiso para eliminar este trabajo.');
            }
            $work->delete();
            return redirect()->route('works.index')->with('success', 'Trabajo eliminado exitosamente.');
    }


    public function deleteFile(Request $request, $workId, $fileNumber)
    {
        // Encuentra el trabajo por su ID
        $work = Work::find($workId);

        if (!$work) {
            return response()->json(['success' => false, 'message' => 'Trabajo no encontrado.']);
        }

        // Verifica si el archivo existe en función del número proporcionado
        $fileColumn = 'file_' . $fileNumber;

        if (!$work->$fileColumn) {
            return response()->json(['success' => false, 'message' => 'Archivo no encontrado para este trabajo.']);
        }

        // Obtiene la ruta del archivo desde la base de datos
        $filePath = 'public/uploads/' . $work->$fileColumn;

        // Verifica si el archivo existe en el sistema de archivos
        if (Storage::exists($filePath)) {
            // Elimina el archivo del sistema de archivos
            Storage::delete($filePath);
        }

        // Luego, establece el campo del archivo en nulo en la base de datos
        $work->$fileColumn = null;
        $work->save();

        return response()->json(['success' => true, 'message' => 'Archivo eliminado con éxito.']);
    }

    public function exportExcelWorks()
    {
        //if user is admin or secretary
        if(\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria')){
            //get datetime
            $date = date('Y-m-d_H-i-s');
            return Excel::download(new \App\Exports\WorkExport, 'works-'.$date.'.xlsx');
        }else{
            echo 'No tiene permisos para exportar';
            exit;
        }

    }

    //send mail WorkAccepted
    public function sendMailWorkAccepted($id)
    {
        
        if(\Auth::user()->hasRole('Administrador')){
            $work = Work::find($id);
            
            //get email user work send
            $user = User::find($work->user_id);


            //update status
            $work->status = 'aceptado';
            $work->save();

            //register note
            $worknote = new WorksNote();
            $worknote->work_id = $id;
            $worknote->action = 'Pasó de "'.$work->status.'" a "aceptado"';
            $worknote->note = 'Correo enviado de trabajo aceptado.';
            $worknote->user_id = \Auth::user()->id;
            $worknote->save();

            Mail::to($user->email)->cc(config('services.correonotificacion.trabajoaceptado'))->send(new WorkAccepted($work));
            return redirect()->route('works.index')->with('success', 'Correo enviado exitosamente.');
        }else{
            echo 'No tiene permisos para enviar correo';
            exit;
        }

    }

}
