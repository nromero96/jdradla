<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\ProgramSession;
use App\Models\User;
use App\Models\Inscription;
use Redirect;

use App\Mail\IndividualExhibitorProgramMail;
use Illuminate\Support\Facades\Mail;


class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $category_name = '';
        $data = [
            'category_name' => 'programs',
            'page_name' => 'programs',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        $listforpage = request()->query('listforpage') ?? 20;
        $search = request()->query('search');
        
        $programs = Program::orderByRaw("CONCAT(apellido, ' ', nombre)")
                                ->where(function($query) use ($search){

                                    if (strpos($search, '#') === 0) {
                                        $searchWithoutHash = ltrim($search, '#');
                                        $query->where('insc_id', $searchWithoutHash);
                                    } else {
                                        $query->orWhere('insc_id', 'LIKE', '%'.$search.'%')
                                            ->orWhere('sesion', 'LIKE', '%'.$search.'%')
                                            ->orWhere('nombre_sesion', 'LIKE', '%'.$search.'%')
                                            ->orWhere('fecha', 'LIKE', '%'.$search.'%')
                                            ->orWhere('sala', 'LIKE', '%'.$search.'%')
                                            ->orWhere('tema', 'LIKE', '%'.$search.'%')
                                            ->orWhereRaw("CONCAT(apellido, ' ', nombre) LIKE '%".$search."%'");
                                    }
                                })
                            ->paginate($listforpage);

        //count total group by concated apellido and nombre
        $totalexpositores = Program::selectRaw("CONCAT(apellido, ' ', nombre) as nombrecompleto")
        ->where(function($query) use ($search){

            if(strpos($search, '#') === 0){
                $searchWithoutHash = ltrim($search, '#');
                $query->where('insc_id', $searchWithoutHash);
            }else{
                $query->orWhere('insc_id', 'LIKE', '%'.$search.'%')
                    ->orWhere('sesion', 'LIKE', '%'.$search.'%')
                    ->orWhere('nombre_sesion', 'LIKE', '%'.$search.'%')
                    ->orWhere('fecha', 'LIKE', '%'.$search.'%')
                    ->orWhere('sala', 'LIKE', '%'.$search.'%')
                    ->orWhere('tema', 'LIKE', '%'.$search.'%')
                    ->orWhereRaw("CONCAT(apellido, ' ', nombre) LIKE '%".$search."%'");
            }
        })
        ->groupBy('nombrecompleto')
        ->get()
        ->count();

        return view('pages.programs.index')->with($data)->with('programs', $programs)->with('totalexpositores', $totalexpositores);
    }

    public function showOnlinePrograms()
    {

        if(request()->is('programa-preliminar')) {
            return Redirect::route('onlineprograms');
        }

        // $category_name = '';
        $data = [
            'category_name' => 'programs',
            'page_name' => 'online-programs',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        
        $programsession = ProgramSession::orderBy('id', 'desc')->get();
        $programs = Program::orderBy('id', 'desc')->get();

        $programsessionimages = ProgramSession::select('id', 'image_program')->orderBy('id', 'desc')->get();

        return view('pages.programs.online-program')->with($data)->with('programsession', $programsession)->with('programs', $programs)->with('programsessionimages', $programsessionimages);
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
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //verificar permisos can('update-programs')
        if (!auth()->user()->can('programs.edit')) {
            abort(403, 'No tiene permisos para editar programas');
        }

        $data = [
            'category_name' => 'programs',
            'page_name' => 'programs_edit',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        $program = Program::find($id);

        return view('pages.programs.edit')->with($data)->with('program', $program);
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
        
        $program = Program::find($id);

        $program->insc_id = $request->insc_id;
        $program->apellido = $request->apellido;
        $program->nombre = $request->nombre;
        $program->sesion = $request->sesion;
        $program->nombre_sesion = $request->nombre_sesion;
        $program->fecha = $request->fecha;
        $program->bloque = $request->bloque;
        $program->inicio = $request->inicio;
        $program->termino = $request->termino;
        $program->sala = $request->sala;
        $program->tema = $request->tema;

        $program->save();

        return redirect()->route('programs.index')->with('success', 'Programa de '.$program->nombre.' '.$program->apellido.' actualizado exitosamente.');

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

    public function sendMailExhibitor($id){
        if(\Auth::user()->hasRole('Administrador')){
            $program = Program::find($id);

            echo 'Programa: '.$program->id.'<br>';

            $insc_id = $program->insc_id;

            echo 'Su Inscripcion es: '.$insc_id.'<br>';
            
            if($insc_id != null || $insc_id != ''){
                //buscar inscripcion
                $inscription = Inscription::where('id', $insc_id)->first();
                
                if($inscription != null){
                    echo 'Inscripcion econtrada: '.$inscription->id.'<br>';
                    
                    $user = User::where('id', $inscription->user_id)->first();

                    if($user != null){
                        echo 'Usuario econtrado: '.$user->id.'<br>';
                        echo 'Su nombre es: '.$user->name.' '.$user->lastname.' '.$user->second_lastname.'<br>';
                        echo 'Enviar a su correo: '.$user->email.'<br>';

                        try {
                            //Mail::to('niltondeveloper96@gmail.com')->send(new IndividualExhibitorProgramMail($inscription, $user));
                            Mail::to($user->email)->send(new IndividualExhibitorProgramMail($inscription, $user));
                            echo 'Correo enviado exitosamente<br>';

                            //back url
                            echo '<a href="'.url()->previous().'">Regresar</a><br>';

                            //update program notificado = si
                            $program->notificado = 'si';
                            $program->save();

                        } catch (\Throwable $th) {
                            echo 'Error al enviar correo: '.$th->getMessage().'<br>';
                        }
                    }

                    exit;
                }

                echo 'Inscripcion no econtrada: '.$insc_id.'<br>';

                exit;
            }

            return 'No se encontro inscripcion';

            //Mail::to($user->email)->cc(config('services.correonotificacion.trabajoaceptado'))->send(new IndividualExhibitorProgramMail($program));
            //return redirect()->route('works.index')->with('success', 'Correo enviado exitosamente.');
            exit;
        }else{
            echo 'No tiene permisos para enviar correo';
            exit;
        }
    }

}
