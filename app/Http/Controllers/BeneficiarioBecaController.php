<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeneficiarioBeca;
use App\Models\Country;
use App\Models\User;
use App\Models\Inscription;

class BeneficiarioBecaController extends Controller
{

    public function __construct(){
        $this->middleware('can:beneficiarios_becas.index')->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $category_name = '';
        $data = [
            'category_name' => 'beneficiarios_becas',
            'page_name' => 'beneficiarios_becas',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        $countries = Country::all();

        $beneficiarios_becas = BeneficiarioBeca::all();

        return view('pages.beneficiariosbecas.index')->with($data)->with('beneficiarios_becas', $beneficiarios_becas)->with('countries', $countries);
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
        // Validar si el correo ya existe
        $existingEmail = BeneficiarioBeca::where('email', $request->email)->first();

        if ($existingEmail) {
            return response()->json(['error' => 'El correo ya está registrado.'], 422);
        }

        // Si el correo no existe, proceder con el registro
        try {
            $beneficiario_beca = new BeneficiarioBeca();
            $beneficiario_beca->name = $request->name;
            $beneficiario_beca->email = $request->email;
            $beneficiario_beca->country = $request->country;

            $beneficiario_beca->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
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
        
        //validar si es el usuario logueado es Administrador
        if (auth()->user()->hasRole('Administrador')) {
            //obtener el email del beneficiario
            $beneficiario_beca = BeneficiarioBeca::find($id);
            $email = $beneficiario_beca->email;

            //Buscar usuario con el email del beneficiario
            $user = User::where('email', $email)->first();

            //Si el usuario no existe, proceder puede eliminar el beneficiario
            if (!$user) {
                try {
                    $beneficiario_beca->delete();
                    return redirect()->back()->with('success', 'Beneficiario eliminado con éxito.');
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', $e->getMessage());
                }
            }else{
                //verificar si el usuario ya esta inscrito en category_inscription_id 4
                $inscription = Inscription::where('user_id', $user->id)->where('category_inscription_id', 4)->first();

                if ($inscription) {
                    return redirect()->back()->with('error', 'El beneficiario ya está inscrito en el programa de becas.');
                }else{
                    try {
                        $beneficiario_beca->delete();
                        return redirect()->back()->with('success', 'Beneficiario eliminado con éxito.');
                    } catch (\Exception $e) {
                        return redirect()->back()->with('error', $e->getMessage());
                    }
                }
            }
        }else{
            return redirect()->back()->with('error', 'No tiene permisos para realizar esta acción.');
        }
    }
}
