<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Payment;
use App\Models\CategoryInscription;
use App\Models\Inscription;
use App\Models\TemporaryFile;
use App\Models\Accompanist;
use App\Models\Statusnote;
use App\Models\SpecialCode;
use App\Models\BeneficiarioBeca;
use App\Models\Country;

use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;

use Maatwebsite\Excel\Facades\Excel;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Log;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser = \Auth::user()->id;

        $data = [
            'category_name' => 'inscriptions',
            'page_name' => 'inscriptions',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        $listforpage = request()->query('listforpage') ?? 10;
        $search = request()->query('search');

        if (\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria') || \Auth::user()->hasRole('Hotelero') || \Auth::user()->hasRole('Check-in')) {

            $inscriptions = Inscription::join('category_inscriptions', 'inscriptions.category_inscription_id', '=', 'category_inscriptions.id')
                ->join('users', 'inscriptions.user_id', '=', 'users.id')
                ->select('inscriptions.*', 'category_inscriptions.name as category_inscription_name', 'users.name as user_name', 'users.lastname as user_lastname', 'users.second_lastname as user_second_lastname', 'users.country as user_country')
                ->where('inscriptions.status', '!=', 'Rechazado')
                ->where(function ($query) use ($search) {
                    if(strcasecmp($search, 'pendiente pagar') === 0){
                        $query->where('inscriptions.status', 'Pendiente')
                        ->where('inscriptions.payment_method', 'Tarjeta')
                        ->where('inscriptions.total', '>', 0)
                        ->where(function ($subQuery) {
                            $subQuery->whereNull('inscriptions.special_code')
                                ->orWhere('inscriptions.special_code', '');
                        });
                    } else {
                        // Si la búsqueda comienza con #, buscar exactamente inscriptions.id
                        if (strpos($search, '#') === 0) {
                            $searchWithoutHash = ltrim($search, '#');
                            $query->where('inscriptions.id', $searchWithoutHash);
                        } else {
                            // Si no comienza con #, buscar cualquier coincidencia parcial
                            $query->where('inscriptions.id', 'LIKE', "%{$search}%");
                        }

                        // Búsqueda por nombre completo o primer nombre y primer apellido
                        $search = str_replace(' ', '%', $search);
                        $query->orWhereRaw('CONCAT(COALESCE(users.name, ""), " ", COALESCE(users.lastname, ""), " ", COALESCE(users.second_lastname, "")) LIKE ?', ["%{$search}%"]);

                        $query->orWhere('users.country', 'LIKE', "%{$search}%")
                            ->orWhere('category_inscriptions.name', 'LIKE', "%{$search}%")
                            ->orWhere('inscriptions.special_code', 'LIKE', "%{$search}%")
                            ->orWhere('inscriptions.status', 'LIKE', "%{$search}%")
                            ->orWhere('inscriptions.payment_method', 'LIKE', "%{$search}%")
                            ->orWhere('inscriptions.created_at', 'LIKE', "%{$search}%");
                    }
                })
                ->orderBy('inscriptions.id', 'desc')
                ->paginate($listforpage);
        } else {
            $inscriptions = Inscription::join('category_inscriptions', 'inscriptions.category_inscription_id', '=', 'category_inscriptions.id')
                ->join('users', 'inscriptions.user_id', '=', 'users.id')
                ->select('inscriptions.*', 'category_inscriptions.name as category_inscription_name', 'users.name as user_name', 'users.lastname as user_lastname', 'users.second_lastname as user_second_lastname', 'users.country as user_country')
                ->where('inscriptions.user_id', $iduser)
                ->orderBy('inscriptions.id', 'desc')
                ->paginate($listforpage);
        }


        return view('pages.inscriptions.index')->with($data)->with('inscriptions', $inscriptions);
    }

    public function indexAccompanists(){

        $data = [
            'category_name' => 'inscriptions',
            'page_name' => 'inscriptions_ccompanists',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        $listforpage = request()->query('listforpage') ?? 10;
        $search = request()->query('search');

        //list inscriptions with accompanists
        $accompanists = Inscription::join('accompanists', 'inscriptions.accompanist_id', '=', 'accompanists.id')
            ->join('category_inscriptions', 'inscriptions.category_inscription_id', '=', 'category_inscriptions.id')
            ->select('accompanists.*', 'category_inscriptions.name as category_inscription_name', 'inscriptions.id as inscription_id', 'inscriptions.status as inscription_status', 'inscriptions.payment_method as inscription_payment_method', 'inscriptions.price_accompanist as inscription_price_accompanist', 'inscriptions.special_code as inscription_special_code')
            ->where('inscriptions.status', '!=', 'Rechazado')
            ->where(function ($query) use ($search) {
                // Si la búsqueda comienza con #, buscar exactamente inscriptions.id
                if (strpos($search, '#') === 0) {
                    $searchWithoutHash = ltrim($search, '#');
                    $query->where('inscriptions.id', $searchWithoutHash);
                } else {
                    // Si no comienza con #, buscar cualquier coincidencia parcial
                    $query->where('inscriptions.id', 'LIKE', "%{$search}%");
                }

                $query->orWhere('accompanists.accompanist_name', 'LIKE', "%{$search}%")
                    ->orWhere('accompanists.accompanist_numdocument', 'LIKE', "%{$search}%")
                    ->orWhere('accompanists.accompanist_solapin', 'LIKE', "%{$search}%")
                    ->orWhere('category_inscriptions.name', 'LIKE', "%{$search}%")
                    ->orWhere('inscriptions.status', 'LIKE', "%{$search}%")
                    ->orWhere('inscriptions.payment_method', 'LIKE', "%{$search}%")
                    ->orWhere('inscriptions.price_accompanist', 'LIKE', "%{$search}%")
                    ->orWhere('inscriptions.special_code', 'LIKE', "%{$search}%");
            })

            ->paginate($listforpage);

        return view('pages.inscriptions.accompanists')->with($data)->with('accompanists', $accompanists);


    }

    public function indexRejects(){
        $iduser = \Auth::user()->id;

        $data = [
            'category_name' => 'inscriptions',
            'page_name' => 'inscriptions_rejects',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        if (\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria') || \Auth::user()->hasRole('Hotelero')) {
            $inscriptions = Inscription::join('category_inscriptions', 'inscriptions.category_inscription_id', '=', 'category_inscriptions.id')
                ->join('users', 'inscriptions.user_id', '=', 'users.id')
                ->select('inscriptions.*', 'category_inscriptions.name as category_inscription_name', 'users.name as user_name', 'users.lastname as user_lastname', 'users.second_lastname as user_second_lastname', 'users.country as user_country')
                ->where('inscriptions.status', 'Rechazado')
                ->orderBy('inscriptions.id', 'desc')
                ->get();
        } else {
            $inscriptions = Inscription::join('category_inscriptions', 'inscriptions.category_inscription_id', '=', 'category_inscriptions.id')
                ->join('users', 'inscriptions.user_id', '=', 'users.id')
                ->select('inscriptions.*', 'category_inscriptions.name as category_inscription_name', 'users.name as user_name', 'users.lastname as user_lastname', 'users.second_lastname as user_second_lastname', 'users.country as user_country')
                ->where('inscriptions.user_id', $iduser)
                ->where('inscriptions.status', 'Rechazado')
                ->orderBy('inscriptions.id', 'desc')
                ->get();
        }


        return view('pages.inscriptions.rejects')->with($data)->with('inscriptions', $inscriptions);
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
            'category_name' => 'inscriptions',
            'page_name' => 'inscriptions_create',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        $user = User::find($id);

        //verificar si usuario logeado es BeneficiarioBeca por email tru o false
        $beneficiariobeca = BeneficiarioBeca::where('email', $user->email)->first();
        if($beneficiariobeca){
            $data['beneficiariobeca'] = 'si';
        }else{
            $data['beneficiariobeca'] = 'no';
        }

        //get CategoryInscription
        $category_inscriptions = CategoryInscription::orderBy('order', 'asc')->get();

        return view('pages.inscriptions.create')->with($data)->with('user', $user)->with('category_inscriptions', $category_inscriptions, $beneficiariobeca);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $amount_especialcode = 0;
        //si $request->category_inscription_id == 7 validar que exista el código especial
        if($request->category_inscription_id == 7){
            //get amount code special
            $specialcode = SpecialCode::where('code', $request->specialcode)->first();
            if($specialcode){
                $amount_especialcode = $specialcode->amount;
            }else{
                return redirect()->route('inscriptions.create')->with('error', 'El código especial no existe');
            }
        }

        //get logged user id
        $iduser = \Auth::user()->id;

        //validar si el usuario ya tiene en la misma categoría
        $verificarinscription = Inscription::where('user_id', $iduser)
                                            ->where('category_inscription_id', $request->category_inscription_id)
                                            ->where('status', '!=', 'Rechazado')
                                            ->first();
        if($verificarinscription){
            return redirect()->route('inscriptions.create')->with('error', 'Ya tiene una inscripción en proceseo en esa categoría.');
        }

        //verificar si existe acompañante en la inscripcion, registrar y devolver id
        if($request->accompanist != ''){
            $accompanist = new Accompanist();
            $accompanist->accompanist_name = $request->accompanist_name;
            $accompanist->accompanist_typedocument = $request->accompanist_typedocument;
            $accompanist->accompanist_numdocument = $request->accompanist_numdocument;
            $accompanist->accompanist_solapin = $request->accompanist_solapin;
            $accompanist->save();
            $data_accompanist_id = $accompanist->id;
        }else{
            $data_accompanist_id = null;
        }

        //insert data
        $inscription = new Inscription();
        $inscription->user_id = $iduser;
        $inscription->category_inscription_id = $request->category_inscription_id;

        $category_inscription = CategoryInscription::find($request->category_inscription_id);

        //si $amount_especialcode es mayor a 0, poner el precio del código especial
        if($amount_especialcode > 0){
            $inscription->price_category = $amount_especialcode;
        }else{
            $inscription->price_category = $category_inscription->price;
        }

        if($request->accompanist != ''){
            $inscription->accompanist_id = $data_accompanist_id;
            $category_inscription_accompanist = CategoryInscription::where('name', 'Acompañante')->first();

            if($request->category_inscription_id == 9 || $request->category_inscription_id == 11){
                $inscription->price_accompanist = 0;
            }else{
                $inscription->price_accompanist = $category_inscription_accompanist->price;
            }
        }else{
            $inscription->accompanist_id = $data_accompanist_id;
            $inscription->price_accompanist = 0;
        }


        if($request->category_inscription_id == 9 || $request->category_inscription_id == 11){
            $inscription->total = 0;
        }else{
            $inscription->total = $inscription->price_category + $inscription->price_accompanist;
        }

        $inscription->special_code = $request->specialcode;
        $inscription->invoice = $request->invoice;
        $inscription->invoice_ruc = $request->invoice_ruc;
        $inscription->invoice_social_reason = $request->invoice_social_reason;
        $inscription->invoice_address = $request->invoice_address;
        $inscription->payment_method = $request->payment_method;
        $inscription->voucher_file = '';
        $inscription->save();

        //$request->document_file estarer solo lo que esta dentro de la comillas ["6712c41ae74fc-1729283098"]
        $documentFile = trim($request->document_file, '[]"');
        $temporaryfile_document_file = TemporaryFile::where('folder', $documentFile)->first();
        if($temporaryfile_document_file){
            Storage::move('public/uploads/tmp/'.$documentFile.'/'.$temporaryfile_document_file->filename, 'public/uploads/document_file/'.$temporaryfile_document_file->filename);
            $inscription->document_file = $temporaryfile_document_file->filename;
            $inscription->save();
            rmdir(storage_path('app/public/uploads/tmp/'.$documentFile));
            $temporaryfile_document_file->delete();
        }

        $voucherFile = trim($request->voucher_file, '[]"');
        $temporaryfile_voucher_file = TemporaryFile::where('folder', $voucherFile)->first();
        if($temporaryfile_voucher_file){
            Storage::move('public/uploads/tmp/'.$voucherFile.'/'.$temporaryfile_voucher_file->filename, 'public/uploads/voucher_file/'.$temporaryfile_voucher_file->filename);
            $inscription->voucher_file = $temporaryfile_voucher_file->filename;
            $inscription->save();
            rmdir(storage_path('app/public/uploads/tmp/'.$voucherFile));
            $temporaryfile_voucher_file->delete();
        }

        if($request->payment_method == 'Transferencia/Depósito'){

            $beneficiariobeca = BeneficiarioBeca::where('email', \Auth::user()->email)->first();
            if($beneficiariobeca && $request->category_inscription_id == '4' && $inscription->total == 0){
                $inscription->status = 'Pagado';
            }else{
                $inscription->status = 'Procesando';
            }

            $inscription->save();

            //send email
            $user = User::find($iduser);
            $datainscription = Inscription::join('category_inscriptions', 'inscriptions.category_inscription_id', '=', 'category_inscriptions.id')
            ->select('inscriptions.*', 'category_inscriptions.name as category_inscription_name')
            ->where('inscriptions.id', $inscription->id)
            ->first();
            $data = [
                'user' => $user,
                'datainscription' => $datainscription,
            ];

            Mail::to($user->email)
                ->cc(config('services.correonotificacion.inscripcion'))
                ->send(new \App\Mail\InscriptionCreated($data));


            //redirect
            return redirect()->route('inscriptions.index')->with('success', 'Inscripción realizada con éxito');
        } else if($request->payment_method == 'Tarjeta'){

            //verica si es beneficiario beca y el monto es 0
            $beneficiariobeca = BeneficiarioBeca::where('email', \Auth::user()->email)->first();
            if($beneficiariobeca && $request->category_inscription_id == '4' && $inscription->total == 0){
                $inscription->status = 'Pagado';
            }else{
                $inscription->status = 'Pendiente';
            }

            $inscription->save();

            //send email
            $user = User::find($iduser);
            $datainscription = Inscription::join('category_inscriptions', 'inscriptions.category_inscription_id', '=', 'category_inscriptions.id')
            ->select('inscriptions.*', 'category_inscriptions.name as category_inscription_name')
            ->where('inscriptions.id', $inscription->id)
            ->first();
            $data = [
                'user' => $user,
                'datainscription' => $datainscription,
            ];

            Mail::to($user->email)
                ->cc(config('services.correonotificacion.inscripcion'))
                ->send(new \App\Mail\InscriptionCreated($data));

            //redirect to payment page with inscription id
            //return redirect()->route('inscriptions.paymentniubiz', ['inscription' => $inscription->id]);
            return redirect()->route('inscriptions.show', ['inscription' => $inscription->id])->with('success', 'Inscripción realizada con éxito, validaremos tu pago en breve');
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
        //solo mostrar su inscripciones del usuario logueado y para roles de Administrador y Secretaria
        $iduser = \Auth::user()->id;
        $inscription = Inscription::where('id', $id)->where('user_id', $iduser)->first();

        if (\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria') || \Auth::user()->hasRole('Hotelero') || \Auth::user()->hasRole('Check-in')  || $inscription) {

            $data = [
                'category_name' => 'inscriptions',
                'page_name' => 'inscriptions_show',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
            ];

            $inscription = Inscription::join('category_inscriptions', 'inscriptions.category_inscription_id', '=', 'category_inscriptions.id')
            ->join('users', 'inscriptions.user_id', '=', 'users.id')
            ->leftJoin('accompanists', 'inscriptions.accompanist_id', '=', 'accompanists.id')
            ->select('inscriptions.*',
                    'category_inscriptions.name as category_inscription_name',
                    'users.name as user_name',
                    'users.lastname as user_lastname',
                    'users.second_lastname as user_second_lastname',
                    'users.document_type as user_document_type',
                    'users.document_number as user_document_number',
                    'users.country as user_country',
                    'users.state as user_state',
                    'users.city as user_city',
                    'users.address as user_address',
                    'users.postal_code as user_postal_code',
                    'users.phone_code as user_phone_code',
                    'users.phone_code_city as user_phone_code_city',
                    'users.phone_number as user_phone_number',
                    'users.whatsapp_code as user_whatsapp_code',
                    'users.whatsapp_number as user_whatsapp_number',
                    'users.email as user_email',
                    'users.workplace as user_workplace',
                    'users.solapin_name as user_solapin_name',
                    'accompanists.accompanist_name as accompanist_name',
                    'accompanists.accompanist_typedocument as accompanist_typedocument',
                    'accompanists.accompanist_numdocument as accompanist_numdocument',
                    'accompanists.accompanist_solapin as accompanist_solapin')
            ->where('inscriptions.id', $id)
            ->first();

            $paymentcard = Payment::where('inscription_id', $id)->first();
            $accompanist = Accompanist::find($inscription->accompanist_id);

            //notes status
            $statusnotes = StatusNote::where('inscription_id', $id)->orderBy('id', 'desc')->get();

            return view('pages.inscriptions.show')->with($data)->with('inscription', $inscription)->with('accompanist', $accompanist)->with('paymentcard', $paymentcard)->with('statusnotes', $statusnotes);
        }else{
            return redirect()->route('inscriptions.index')->with('error', 'No tiene permisos para ver esta inscripción');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //solo mostrar al rol de Administrador y Secretaria
        if (\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria')) {

            $data = [
                'category_name' => 'inscriptions',
                'page_name' => 'inscriptions_edit',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
            ];

            $inscription = Inscription::join('category_inscriptions', 'inscriptions.category_inscription_id', '=', 'category_inscriptions.id')
            ->join('users', 'inscriptions.user_id', '=', 'users.id')
            ->leftJoin('accompanists', 'inscriptions.accompanist_id', '=', 'accompanists.id')
            ->select('inscriptions.*',
                    'category_inscriptions.name as category_inscription_name',
                    'users.name as user_name',
                    'users.lastname as user_lastname',
                    'users.second_lastname as user_second_lastname',
                    'users.document_type as user_document_type',
                    'users.document_number as user_document_number',
                    'users.country as user_country',
                    'users.state as user_state',
                    'users.city as user_city',
                    'users.address as user_address',
                    'users.postal_code as user_postal_code',
                    'users.phone_code as user_phone_code',
                    'users.phone_code_city as user_phone_code_city',
                    'users.phone_number as user_phone_number',
                    'users.whatsapp_code as user_whatsapp_code',
                    'users.whatsapp_number as user_whatsapp_number',
                    'users.email as user_email',
                    'users.workplace as user_workplace',
                    'users.solapin_name as user_solapin_name',
                    'accompanists.accompanist_name as accompanist_name',
                    'accompanists.accompanist_typedocument as accompanist_typedocument',
                    'accompanists.accompanist_numdocument as accompanist_numdocument',
                    'accompanists.accompanist_solapin as accompanist_solapin')
            ->where('inscriptions.id', $id)
            ->first();

            $category_inscriptions = CategoryInscription::orderBy('order', 'asc')->get();

            $paymentcard = Payment::where('inscription_id', $id)->first();
            $accompanist = Accompanist::find($inscription->accompanist_id);

            //notes status
            $statusnotes = StatusNote::where('inscription_id', $id)->orderBy('id', 'desc')->get();

            return view('pages.inscriptions.edit')->with($data)->with('inscription', $inscription)->with('accompanist', $accompanist)->with('paymentcard', $paymentcard)->with('statusnotes', $statusnotes)->with('category_inscriptions', $category_inscriptions);

        }else{
            return redirect()->route('inscriptions.index')->with('error', 'No tiene permisos para editar esta inscripción');
        }
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
        //solo mostrar al rol de Administrador y Secretaria
        if (\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria')) {

            // Obtener la inscripción actual
            $inscription = Inscription::findOrFail($id);

            // Validación de datos (ajusta estas reglas según tus necesidades)
            $validatedData = $request->validate([
                'category_inscription_id' => 'required|numeric',
                'price_category' => 'required|numeric',
                'price_accompanist' => 'required|numeric',
                'total' => 'required|numeric',
                'special_code' => 'nullable|string',
            ]);

            // Actualizar la inscripción
            $inscription->update($validatedData);

            // actualizar acompañante si existe si no insertar
            if($request->accompanist != ''){
                $accompanist = new Accompanist();
                $accompanist->accompanist_name = $request->accompanist_name;
                $accompanist->accompanist_typedocument = $request->accompanist_typedocument;
                $accompanist->accompanist_numdocument = $request->accompanist_numdocument;
                $accompanist->accompanist_solapin = $request->accompanist_solapin;
                $accompanist->save();
                $inscription->accompanist_id = $accompanist->id;
                $inscription->save();
            }else{
                //buscar si existe acompañante y actualizar
                $accompanist = Accompanist::find($inscription->accompanist_id);
                if($accompanist){
                    //update
                    $accompanist->accompanist_name = $request->accompanist_name;
                    $accompanist->accompanist_typedocument = $request->accompanist_typedocument;
                    $accompanist->accompanist_numdocument = $request->accompanist_numdocument;
                    $accompanist->accompanist_solapin = $request->accompanist_solapin;
                    $accompanist->save();
                }
            }

            //subir archivo a la carpeta uploads/document_file
            if($request->document_file){
                $file = $request->file('document_file');
                $fileName = str_replace(' ', '-', $file->getClientOriginalName());
                $fileNameWithTimestamp = pathinfo($fileName, PATHINFO_FILENAME) . '_' . Carbon::now()->format('YmdHis') . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/uploads/document_file', $fileNameWithTimestamp);
                $inscription->document_file = $fileNameWithTimestamp;
                $inscription->save();
            }

            //subir archivo a la carpeta uploads/voucher_file
            if($request->voucher_file){
                $file = $request->file('voucher_file');
                $fileName = str_replace(' ', '-', $file->getClientOriginalName());
                $fileNameWithTimestamp = pathinfo($fileName, PATHINFO_FILENAME) . '_' . Carbon::now()->format('YmdHis') . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/uploads/voucher_file', $fileNameWithTimestamp);
                $inscription->voucher_file = $fileNameWithTimestamp;
                $inscription->save();
            }


            return redirect()->route('inscriptions.show', ['inscription' => $id])->with('success', 'Inscripción actualizada con éxito');
        }else{
            return redirect()->route('inscriptions.index')->with('error', 'No tiene permisos para editar esta inscripción');
        }
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


    public function registerMyInscription(){

        //verificar si el usuario ya tiene una inscripción
        $inscription = Inscription::where('user_id', \Auth::user()->id)->first();
        if($inscription){
            return redirect()->route('inscriptions.index')->with('error', 'Ya tiene una inscripción, revise su inscripción en la sección de inscripciones');
        }

        $id = \Auth::user()->id;

        $data = [
            'category_name' => 'inscriptions',
            'page_name' => 'inscriptions_myinscription',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        //get CategoryInscription
        $category_inscriptions = CategoryInscription::orderBy('order', 'asc')->get();
        $countries = Country::orderByRaw("CASE WHEN name = 'Perú' THEN 0 ELSE 1 END, name ASC")->get();

        $user = User::find($id);

        //verificar si usuario logeado es BeneficiarioBeca por email tru o false
        $beneficiariobeca = BeneficiarioBeca::where('email', $user->email)->first();
        if($beneficiariobeca){
            $data['beneficiariobeca'] = 'si';
        }else{
            $data['beneficiariobeca'] = 'no';
        }

        //verificar si tengo alguna inscripcion
        $myinscription = Inscription::where('user_id', $id);

        //solo los roles de Administrador y Secretaria pueden ver esta vista
        if ($myinscription) {
            return view('pages.inscriptions.my-inscription')->with($data)->with('category_inscriptions', $category_inscriptions)->with('countries', $countries)->with('beneficiariobeca', $beneficiariobeca)->with('user', $user);
        }else{
            return redirect()->route('inscriptions.index')->with('error', 'Ya tiene una inscripción, revise su inscripción en la sección de inscripciones');
        }
    }

    public function storeMyInscription(Request $request){

        //get logged user id
        $iduser = \Auth::user()->id;

        Log::info('Datos de la inscripción: '.json_encode($request->all()));


        //Datos de la inscripción: {"_token":"FXRvSF1L7B6m9MNI9Askne0SC0GaGp64k6ftBVqQ","name":"NILTO","lastname":"ROMERO","second_lastname":"AGURTO","document_type":"DNI","document_number":"71213062","country":"Alemania","state":"Liam","city":"Citi","address":"Calle Uno 133","postal_code":"3432","phone_code":"51","phone_code_city":"01","phone_number":"987654321","whatsapp_code":"51","whatsapp_number":"98283976","workplace":"ExcelData","email":"niltonromagu@gmail.com","inputSolapin":"ROM NIL","category_inscription_id":"4","specialcode":null,"specialcode_verify":null,"accompanist_name":null,"accompanist_typedocument":"Seleccione...","accompanist_numdocument":null,"accompanist_solapin":null,"invoice":"no","invoice_ruc":null,"invoice_social_reason":null,"invoice_address":null,"payment_method":"Tarjeta"}  


        //validar datos
        $validatedData = request()->validate([
            //data user
            'name' => 'required|string',
            'lastname' => 'required|string',
            'second_lastname' => 'nullable|string',
            'email' => 'required|email',
            'document_type' => 'required|string',
            'document_number' => 'required|string',
            'country' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'postal_code' => 'required|string',
            'phone_code' => 'required|string',
            'phone_code_city' => 'required|string',
            'phone_number' => 'required|string',
            'whatsapp_code' => 'required|string',
            'whatsapp_number' => 'required|string',
            'workplace' => 'required|string',
            'solapin_name' => 'required|string',
            //data inscription
            'category_inscription_id' => 'required|numeric',
            'specialcode' => 'nullable|string',
            'specialcode_verify' => 'nullable|string',
            'accompanist_name' => 'nullable|string',
            'accompanist_typedocument' => 'nullable|string',
            'accompanist_numdocument' => 'nullable|string',
            'accompanist_solapin' => 'nullable|string',
            'invoice' => 'required|string',
            'invoice_ruc' => 'nullable|string',
            'invoice_social_reason' => 'nullable|string',
            'invoice_address' => 'nullable|string',
            'payment_method' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            // Actualizar usuario
            $user = User::find($iduser);
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->second_lastname = $request->second_lastname;
            $user->email = $request->email;
            $user->document_type = $request->document_type;
            $user->document_number = $request->document_number;
            $user->country = $request->country;
            $user->state = $request->state;
            $user->city = $request->city;
            $user->address = $request->address;
            $user->postal_code = $request->postal_code;
            $user->phone_code = $request->phone_code;
            $user->phone_code_city = $request->phone_code_city;
            $user->phone_number = $request->phone_number;
            $user->whatsapp_code = $request->whatsapp_code;
            $user->whatsapp_number = $request->whatsapp_number;
            $user->workplace = $request->workplace;
            $user->solapin_name = $request->solapin_name;
            $user->confir_information = 'si';
            $user->save();
            
            // Insertar inscripción
            $inscription = new Inscription();
            $inscription->user_id = $iduser;
            $inscription->category_inscription_id = $request->category_inscription_id;

            $category_inscription = CategoryInscription::find($request->category_inscription_id);

            $inscription->price_category = $category_inscription->price;
            $inscription->price_accompanist = 0;
            $inscription->total = $inscription->price_category + $inscription->price_accompanist;
            $inscription->special_code = $request->specialcode;
            $inscription->invoice = $request->invoice;
            $inscription->invoice_ruc = $request->invoice_ruc;
            $inscription->invoice_social_reason = $request->invoice_social_reason;
            $inscription->invoice_address = $request->invoice_address;
            $inscription->payment_method = $request->payment_method;

            $inscription->save();

            // Manejo de documentos temporales
            $documentFile = trim($request->document_file, '[]"');
            $temporaryfile_document_file = TemporaryFile::where('folder', $documentFile)->first();
            if ($temporaryfile_document_file) {
                Storage::move('public/uploads/tmp/'.$documentFile.'/'.$temporaryfile_document_file->filename, 'public/uploads/document_file/'.$temporaryfile_document_file->filename);
                $inscription->document_file = $temporaryfile_document_file->filename;
                $inscription->save();
                rmdir(storage_path('app/public/uploads/tmp/'.$documentFile));
                $temporaryfile_document_file->delete();
            }

            $voucherFile = trim($request->voucher_file, '[]"');
            $temporaryfile_voucher_file = TemporaryFile::where('folder', $voucherFile)->first();
            if ($temporaryfile_voucher_file) {
                Storage::move('public/uploads/tmp/'.$voucherFile.'/'.$temporaryfile_voucher_file->filename, 'public/uploads/voucher_file/'.$temporaryfile_voucher_file->filename);
                $inscription->voucher_file = $temporaryfile_voucher_file->filename;
                $inscription->save();
                rmdir(storage_path('app/public/uploads/tmp/'.$voucherFile));
                $temporaryfile_voucher_file->delete();
            }

            if ($request->payment_method == 'Transferencia/Depósito') {
                $inscription->status = 'Procesando';
                $inscription->save();

                // Enviar correo
                $user = User::find($iduser);
                $datainscription = Inscription::join('category_inscriptions', 'inscriptions.category_inscription_id', '=', 'category_inscriptions.id')
                    ->select('inscriptions.*', 'category_inscriptions.name as category_inscription_name')
                    ->where('inscriptions.id', $inscription->id)
                    ->first();
                $data = [
                    'user' => $user,
                    'datainscription' => $datainscription,
                ];

                Mail::to($user->email)
                    ->cc(config('services.correonotificacion.inscripcion'))
                    ->send(new \App\Mail\InscriptionCreated($data));

                DB::commit();

                return redirect()->route('inscriptions.index')->with('success', 'Inscripción realizada con éxito, validaremos tu información en breve');
            } else if ($request->payment_method == 'Tarjeta') {
                $inscription->status = 'Pendiente';
                $inscription->save();

                // Enviar correo
                $user = User::find($iduser);
                $datainscription = Inscription::join('category_inscriptions', 'inscriptions.category_inscription_id', '=', 'category_inscriptions.id')
                    ->select('inscriptions.*', 'category_inscriptions.name as category_inscription_name')
                    ->where('inscriptions.id', $inscription->id)
                    ->first();
                $data = [
                    'user' => $user,
                    'datainscription' => $datainscription,
                ];

                Mail::to($user->email)
                    ->cc(config('services.correonotificacion.inscripcion'))
                    ->send(new \App\Mail\InscriptionCreated($data));

                DB::commit();

                return redirect()->route('inscriptions.show', ['inscription' => $inscription->id])->with('success', 'Inscripción realizada con éxito, validaremos tu información en breve');
            }

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al registrar inscripción: '.$e->getMessage());
            return redirect()->route('inscriptions.myinscription')->with('error', 'Error al registrar inscripción');
        }


    }


    public function formManualRegistrationParticipant(){
        $id = \Auth::user()->id;

        $data = [
            'category_name' => 'inscriptions',
            'page_name' => 'inscriptions_manual',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        //get CategoryInscription
        $category_inscriptions = CategoryInscription::orderBy('order', 'asc')->get();
        $countries = Country::orderByRaw("CASE WHEN name = 'Perú' THEN 0 ELSE 1 END, name ASC")->get();

        $user = User::find($id);

        //verificar si usuario logeado es BeneficiarioBeca por email tru o false
        $beneficiariobeca = BeneficiarioBeca::where('email', $user->email)->first();
        if($beneficiariobeca){
            $data['beneficiariobeca'] = 'si';
        }else{
            $data['beneficiariobeca'] = 'no';
        }

        //solo los roles de Administrador y Secretaria pueden ver esta vista
        if (\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria')) {
            return view('pages.inscriptions.manual-registration-participant')->with($data)->with('category_inscriptions', $category_inscriptions)->with('countries', $countries)->with('beneficiariobeca', $beneficiariobeca);
        }else{
            return redirect()->route('inscriptions.index')->with('error', 'No tiene permisos para ver esta vista');
        }


    }

    public function storeManualRegistrationParticipant(Request $request){

        // Validación email único
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        DB::beginTransaction();

        try {
            // Registrar usuario y devolver ID
            $user = new User();
            $user->name = $request->name ?? '';
            $user->lastname = $request->lastname ?? '';
            $user->second_lastname = $request->second_lastname ?? '';
            $user->email = $request->email ?? '';
            $user->document_type = $request->document_type ?? '';
            $user->document_number = $request->document_number ?? '';
            $user->country = $request->country ?? '';
            $user->password = bcrypt($request->inputPassword) ?? '';
            $user->solapin_name = $request->inputSolapin ?? '';
            $user->photo = 'default-profile.jpg';
            $user->status = 'active';
            $user->save();
            $user->assignRole('Participante');
            $iduser = $user->id;

            // Insertar inscripción
            $inscription = new Inscription();
            $inscription->user_id = $iduser;
            $inscription->category_inscription_id = $request->category_inscription_id;

            $category_inscription = CategoryInscription::find($request->category_inscription_id);

            $inscription->price_category = $category_inscription->price;
            $inscription->price_accompanist = 0;
            $inscription->total = $inscription->price_category + $inscription->price_accompanist;
            $inscription->special_code = $request->specialcode;
            $inscription->invoice = $request->invoice;
            $inscription->invoice_ruc = $request->invoice_ruc;
            $inscription->invoice_social_reason = $request->invoice_social_reason;
            $inscription->invoice_address = $request->invoice_address;
            $inscription->payment_method = $request->payment_method;
            $inscription->voucher_file = '';
            $inscription->save();

            // Manejo de documentos temporales
            $documentFile = trim($request->document_file, '[]"');
            $temporaryfile_document_file = TemporaryFile::where('folder', $documentFile)->first();
            if ($temporaryfile_document_file) {
                Storage::move('public/uploads/tmp/'.$documentFile.'/'.$temporaryfile_document_file->filename, 'public/uploads/document_file/'.$temporaryfile_document_file->filename);
                $inscription->document_file = $temporaryfile_document_file->filename;
                $inscription->save();
                rmdir(storage_path('app/public/uploads/tmp/'.$documentFile));
                $temporaryfile_document_file->delete();
            }

            $voucherFile = trim($request->voucher_file, '[]"');
            $temporaryfile_voucher_file = TemporaryFile::where('folder', $voucherFile)->first();
            if ($temporaryfile_voucher_file) {
                Storage::move('public/uploads/tmp/'.$voucherFile.'/'.$temporaryfile_voucher_file->filename, 'public/uploads/voucher_file/'.$temporaryfile_voucher_file->filename);
                $inscription->voucher_file = $temporaryfile_voucher_file->filename;
                $inscription->save();
                rmdir(storage_path('app/public/uploads/tmp/'.$voucherFile));
                $temporaryfile_voucher_file->delete();
            }

            if ($request->payment_method == 'Transferencia/Depósito') {
                $inscription->status = 'Procesando';
                $inscription->save();

                // Enviar correo
                $user = User::find($iduser);
                $datainscription = Inscription::join('category_inscriptions', 'inscriptions.category_inscription_id', '=', 'category_inscriptions.id')
                    ->select('inscriptions.*', 'category_inscriptions.name as category_inscription_name')
                    ->where('inscriptions.id', $inscription->id)
                    ->first();
                $data = [
                    'user' => $user,
                    'datainscription' => $datainscription,
                ];

                Mail::to($user->email)
                    ->cc(config('services.correonotificacion.inscripcion'))
                    ->send(new \App\Mail\InscriptionCreated($data));

                DB::commit(); // Confirmar la transacción
                return redirect()->route('inscriptions.index')->with('success', 'Inscripción realizada con éxito');
            } else if ($request->payment_method == 'Tarjeta') {
                $inscription->status = 'Pendiente';
                $inscription->save();

                // Enviar correo
                $user = User::find($iduser);
                $datainscription = Inscription::join('category_inscriptions', 'inscriptions.category_inscription_id', '=', 'category_inscriptions.id')
                    ->select('inscriptions.*', 'category_inscriptions.name as category_inscription_name')
                    ->where('inscriptions.id', $inscription->id)
                    ->first();
                $data = [
                    'user' => $user,
                    'datainscription' => $datainscription,
                ];

                Mail::to($user->email)
                    ->cc(config('services.correonotificacion.inscripcion'))
                    ->send(new \App\Mail\InscriptionCreated($data));

                DB::commit(); // Confirmar la transacción
                return redirect()->route('inscriptions.index')->with('success', 'Inscripción realizada con éxito');
            }

        } catch (\Exception $e) {
            DB::rollBack(); // Revertir la transacción en caso de error
            Log::error('Error en el registro manual: '.$e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al realizar la inscripción.');
        }
    }


    public function paymentNiubiz(Inscription $inscription)
    {

        $specialcode = SpecialCode::where('code', $inscription->special_code)->first();

        if($specialcode){
            if($specialcode->payment_required == 'No'){
                if($specialcode->amount == $inscription->total){
                    return redirect()->route('inscriptions.index')->with('success', 'Inscripción realizada con éxito, no requiere pago.');
                }else{

                }
            }
        }

        if($inscription->total == 0){
            return redirect()->route('inscriptions.index')->with('success', 'Inscripción realizada con éxito, no requiere pago.');
        }

        //get logged user id
        $iduser = \Auth::user()->id;
        $data = [
            'category_name' => 'inscriptions',
            'page_name' => 'inscriptions_paymentniubiz',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        $user = User::find($iduser);
        //data inscription inner join category_inscriptions
        $datainscription = Inscription::join('category_inscriptions', 'inscriptions.category_inscription_id', '=', 'category_inscriptions.id')
        ->select('inscriptions.*', 'category_inscriptions.name as category_inscription_name')
        ->where('inscriptions.id', $inscription->id)
        ->first();

        if($specialcode){
            if($specialcode->payment_required == 'No'){
                $amount = $datainscription->total - $specialcode->amount;
            }else{
                $amount = $datainscription->total;
            }
        }else{
            $amount = $datainscription->total;
        }

        $sessionToken = $this->generateSessionToken($amount);

        return view('pages.inscriptions.paymentniubiz')->with($data)->with('user', $user)->with('datainscription', $datainscription)->with('sessionToken', $sessionToken)->with('amount', $amount);
    }

    private function generateSessionToken($amount){
        $auth = base64_encode(config('services.niubiz.user').':'.config('services.niubiz.password'));
        $accessToken = Http::withHeaders([
                'Authorization' => 'Basic '.$auth,
            ])->get(config('services.niubiz.url_api').'/api.security/v1/security')
            ->body();

        $accessToken = Http::withHeaders([
            'Authorization' => $accessToken,
            'Content-Type' => 'application/json',
        ])->post(config('services.niubiz.url_api').'/api.ecommerce/v2/ecommerce/token/session/'.config('services.niubiz.merchant_id'),[
            'channel' => 'web',
            'amount' => $amount,
            'antifraud' => [
                'clientIp' => request()->ip(),
                'merchantDefineData' => [
                    'MDD4' => auth()->user()->email,
                    'MDD21' => 0,
                    'MDD32' => auth()->user()->id,
                    'MDD75' => 'Registrado',
                    'MDD77' => now()->diffInDays(auth()->user()->created_at) + 1,
                ],
            ],
        ])->json();

        return $accessToken['sessionKey'];

    }

    public function confirmPaymentNiubiz(Request $request){

        $auth = base64_encode(config('services.niubiz.user').':'.config('services.niubiz.password'));
        $accessToken = Http::withHeaders([
                'Authorization' => 'Basic '.$auth,
            ])->get(config('services.niubiz.url_api').'/api.security/v1/security')
            ->body();

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => $accessToken,
        ])->post(config('services.niubiz.url_api').'/api.authorization/v3/authorization/ecommerce/'.config('services.niubiz.merchant_id'),[
            'channel' => 'web',
            'captureType' => 'manual',
            'countable' => true,
            'order' => [
                'tokenId' => $request->transactionToken,
                'purchaseNumber' => $request->purchasenumber,
                'amount' => $request->amount,
                'currency' => config('services.niubiz.currency'),
            ],
        ])->json();

        session()->flash('niubiz', [
            'inscription' => $request->inscription,
            'response' => $response,
            'purchaseNumber' => $request->purchasenumber,
        ]);


        if(isset($response['dataMap']) && $response['dataMap']['ACTION_CODE'] === '000'){
            //update status inscription
            $inscription = Inscription::find($request->inscription);
            $inscription->status = 'Procesando';
            $inscription->updated_at = now();
            $inscription->save();

            //insert payment
            $payment = new Payment();
            $payment->inscription_id = $request->inscription;
            $payment->user_id = \Auth::user()->id;
            $payment->action_description = $response['dataMap']['ACTION_DESCRIPTION'];
            $payment->purchasenumber = $request->purchasenumber;
            $payment->card_brand = $response['dataMap']['BRAND'];
            $payment->card_number = $response['dataMap']['CARD'];
            $payment->amount = $response['order']['amount'];
            $payment->currency = $response['order']['currency'];
            $payment->transaction_date = $response['dataMap']['TRANSACTION_DATE'];
            $payment->save();

        }else{

        }

        $data = [
            'category_name' => 'inscriptions',
            'page_name' => 'inscriptions_paymentconfirmniubiz',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('pages.inscriptions.paymentconfirmniubiz')->with($data);

    }

    public function updateStatus(Request $request, $id)
    {
        try {
            // Obtener la inscripción actual
            $inscription = Inscription::findOrFail($id);

            // Validación de datos (ajusta estas reglas según tus necesidades)
            $validatedData = $request->validate([
                'action' => 'required',
                'note' => 'nullable|string',
            ]);

            // Insertar la nota de estado
            StatusNote::create([
                'inscription_id' => $id,
                'action' => "Cambió de '{$inscription->status}' a '{$validatedData['action']}'",
                'note' => $validatedData['note'] ?? 'Ninguna nota',
                'user_id' => auth()->id(),
            ]);

            // Actualizar el estado de la inscripción después de registrar la nota
            $inscription->update([
                'status' => $validatedData['action'],
                'updated_at' => now(),
            ]);

            //Si action es igual a Pagado enviar correo
            if($validatedData['action'] == 'Pagado'){
                // Enviar correo
                $user = User::find($inscription->user_id);
                $datainscription = Inscription::join('category_inscriptions', 'inscriptions.category_inscription_id', '=', 'category_inscriptions.id')
                    ->select('inscriptions.*', 'category_inscriptions.name as category_inscription_name')
                    ->where('inscriptions.id', $inscription->id)
                    ->first();
                $data = [
                    'user' => $user,
                    'datainscription' => $datainscription,
                ];

                Mail::to($user->email)
                    ->cc(config('services.correonotificacion.inscripcion'))
                    ->send(new \App\Mail\InscriptionConfirmation($data));
            }


            return redirect()->route('inscriptions.show', ['inscription' => $id])->with('success', 'Estado actualizado con éxito');
        } catch (\Exception $e) {
            // Manejo de errores
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el estado.');
        }
    }

    public function requestComprobante(Request $request, $id)
    {
        // Validar si el usuario logueado es Administrador o Secretaria
        if (\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria')) {
            // Obtener la inscripción
            $inscription = Inscription::find($id);

            // Actualizar status_compr = Pendiente si el status es Ninguna
            if ($inscription->status_compr == 'Ninguna') {
                $inscription->status_compr = 'Pendiente';
                $inscription->save();
            } else {
                // Devolver un mensaje de error en formato JSON
                return response()->json(['error' => 'Ya se solicitó el comprobante'], 403);
            }

            // Devolver "ok" como indicador de éxito
            return response()->json(['status' => 'ok']);
        } else {
            // Devolver un mensaje de error en formato JSON
            return response()->json(['error' => 'No tiene permisos para solicitar comprobante'], 403);
        }
    }


    public function exportExcelInscriptions()
    {

        //if user is admin or secretary
        if(\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria')){
            return Excel::download(new \App\Exports\ExporInscriptions, 'inscriptions.xlsx');
        }else{
            echo 'No tiene permisos para exportar';
            exit;
        }


    }

}
