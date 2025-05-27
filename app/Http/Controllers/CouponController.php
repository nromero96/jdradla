<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\CategoryInscription;
use App\Models\CouponEmail;

class CouponController extends Controller
{
    public function __construct(){
        $this->middleware('can:coupons.index')->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'category_name' => 'coupons',
            'page_name' => 'coupons',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        //get coupons order by id desc
        $coupons = Coupon::orderBy('id', 'desc')->get();

        return view('pages.coupons.index')->with($data)->with('coupons', $coupons);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'category_name' => 'coupons',
            'page_name' => 'coupons_create',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        //get categories
        $categories = CategoryInscription::all();

        return view('pages.coupons.create')->with($data)->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ///validate
        $this->validate($request, [
            'code' => 'required',
            'description' => 'nullable',
            'type' => 'required',
            'amount' => 'required',
            'quantity' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'inscripcion_category' => 'nullable',
            'is_email_restrict' => 'nullable',
            'status' => 'required',
        ]);

        //create coupon
        $coupon = new Coupon;
        $coupon->code = $request->input('code');
        $coupon->description = $request->input('description');
        $coupon->type = $request->input('type');
        $coupon->amount = $request->input('amount');
        $coupon->quantity = $request->input('quantity');
        $coupon->start_date = $request->input('start_date');
        $coupon->end_date = $request->input('end_date');
        $coupon->inscripcion_category = $request->input('inscripcion_category');
        $coupon->is_email_restrict = $request->input('is_email_restrict');
        $coupon->status = $request->input('status');
        $coupon->save();

        //redirect a coupons con mensaje de exito
        return redirect('/coupons')->with('success', 'Cupón creado exitosamente!');

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
            'category_name' => 'coupons',
            'page_name' => 'coupons_edit',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        //get categories
        $categories = CategoryInscription::all();

        //get coupon
        $coupon = Coupon::find($id);

        //get coupon emails
        $couponemails = CouponEmail::where('coupon_id', $id)
                                    ->orderBy('id', 'desc')
        ->get();

        return view('pages.coupons.edit')->with($data)->with('coupon', $coupon)->with('categories', $categories)->with('couponemails', $couponemails);

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
        ///validate
        $this->validate($request, [
            'description' => 'nullable',
            'type' => 'required',
            'amount' => 'required',
            'quantity' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'inscripcion_category' => 'nullable',
            'is_email_restrict' => 'nullable',
            'status' => 'required',
        ]);

        //update coupon
        $coupon = Coupon::find($id);
        $coupon->description = $request->input('description');
        $coupon->type = $request->input('type');
        $coupon->amount = $request->input('amount');
        $coupon->quantity = $request->input('quantity');
        $coupon->start_date = $request->input('start_date');
        $coupon->end_date = $request->input('end_date');
        $coupon->inscripcion_category = $request->input('inscripcion_category');
        $coupon->is_email_restrict = $request->input('is_email_restrict');
        $coupon->status = $request->input('status');
        $coupon->save();

        //redirect a edit page con mensaje de exito
        return redirect('/coupons/'.$id.'/edit')->with('success', 'Cupón actualizado exitosamente!');
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

    public function couponmailsllist($id) {
        try {
            // Obtener correos electrónicos del cupón
            $couponemails = CouponEmail::where('coupon_id', $id)
                                        ->orderBy('id', 'desc')        
                                        ->get();
    
            return response()->json($couponemails);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function storemail(Request $request)
{
    // validate
    $request->validate([
        'email' => 'required|email',
        'coupon_id' => 'required',
    ]);

    // check if the email is already registered for this coupon
    $existingEmail = CouponEmail::where('email', $request->input('email'))
                                  ->where('coupon_id', $request->input('coupon_id'))
                                  ->first();

    if ($existingEmail) {
        // email already registered for this coupon
        return response()->json(['error' => 'El correo ya está registrado para este cupón.'], 422);
    }

    // Validar el formato del correo electrónico
    $validEmail = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL);

    if (!$validEmail) {
        // El correo electrónico no tiene un formato válido
        return response()->json(['error' => 'El formato del correo electrónico no es válido.'], 422);
    }

    // create coupon email
    $couponemail = new CouponEmail;
    $couponemail->coupon_id = $request->input('coupon_id');
    $couponemail->email = $request->input('email');
    $couponemail->save();

    // return success message
    return response()->json(['success' => 'Email agregado exitosamente!']);
}


    public function destroymail($id){
        try {
            // Obtener correo electrónico del cupón
            $couponemail = CouponEmail::find($id);
            // Eliminar correo electrónico del cupón
            $couponemail->delete();
            return response()->json(['success' => 'Email eliminado exitosamente!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    
    public function masivestoremail(Request $request)
{
    // get emails
    $emails = explode("\n", $request->input('emails'));

    // array to store errors
    $errors = [];

    // array to store successfully added emails
    $successEmails = [];

    // loop through emails
    foreach ($emails as $email) {
        // trim whitespace from each email
        $email = trim($email);

        // check if the email is already registered for this coupon
        $existingEmail = CouponEmail::where('email', $email)
            ->where('coupon_id', $request->input('masive_coupon_id'))
            ->first();

        // validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Correo: ' . $email . ' no es válido.';
        } elseif ($existingEmail) {
            // email already registered for this coupon
            $errors[] = 'Correo: ' . $email . ' ya existe en este cupón.';
        } else {
            // create coupon email
            $couponemail = new CouponEmail;
            $couponemail->coupon_id = $request->input('masive_coupon_id');
            $couponemail->email = $email;
            $couponemail->save();

            // add the successfully added email to the successEmails array
            $successEmails[] = $email;
        }
    }

    // return success message or errors
    if (empty($errors)) {
        return response()->json(['success' => 'Emails agregados exitosamente!', 'successEmails' => $successEmails]);
    } else {
        return response()->json(['errors' => $errors], 422);
    }
}




}

