<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelReservation;
use App\Models\User;

class HotelReservationController extends Controller
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
            'category_name' => 'hotelreservations',
            'page_name' => 'hotelreservations',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        if (\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria') || \Auth::user()->hasRole('Hotelero') ) {
            //get hotelreservations and join with users table
            $hotelreservations = HotelReservation::join('users', 'hotel_reservations.user_id', '=', 'users.id')
                ->select('hotel_reservations.*', 'users.name', 'users.lastname', 'users.second_lastname', 'users.email')
                ->orderBy('hotel_reservations.id', 'desc')
                ->get();
        } else {
            //get hotelreservations and join with users table
            $hotelreservations = HotelReservation::join('users', 'hotel_reservations.user_id', '=', 'users.id')
                ->select('hotel_reservations.*', 'users.name', 'users.lastname', 'users.second_lastname', 'users.email')
                ->where('hotel_reservations.user_id', $userid)
                ->orderBy('hotel_reservations.id', 'desc')
                ->get();
        }

        return view('pages.hotelreservations.index')->with($data)->with('hotelreservations', $hotelreservations);

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
            'category_name' => 'hotelreservations',
            'page_name' => 'hotelreservations_create',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        $user = User::find($id);

        return view('pages.hotelreservations.create')->with($data)->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                //get logged in user id
                $user_id = \Auth::user()->id;

                //validate form data
                $this->validate($request, [
                    'hotel_name' => 'required',
                    'habitacion_type' => 'required',
                    'number_guests' => 'required',
                    'check_in' => 'required',
                    'check_out' => 'required',
                    'comment' => 'required',
                ]);

                //store form data
                $hotelreservation = new HotelReservation;

                $hotelreservation->user_id = $user_id;
                $hotelreservation->hotel_name = $request->input('hotel_name');
                $hotelreservation->habitacion_type = $request->input('habitacion_type');
                $hotelreservation->number_guests = $request->input('number_guests');
                $hotelreservation->check_in = $request->input('check_in');
                $hotelreservation->check_out = $request->input('check_out');
                $hotelreservation->comment = $request->input('comment');

                $hotelreservation->save();

                //flash success message redirect route hotelreservations.index
                return redirect()->route('hotelreservations.index')->with('success', 'Reserva de hotel creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //solo puede ver la reserva el hotelero o Administrador o Secretaria o el usuario que la creo
        if (!\Auth::user()->hasRole('Hotelero') && !\Auth::user()->hasRole('Administrador') && !\Auth::user()->hasRole('Secretaria')) {
            $userid = \Auth::user()->id;
            $hotelreservation = HotelReservation::find($id);
            if ($hotelreservation->user_id != $userid) {
                return redirect()->route('hotelreservations.index')->with('error', 'No tienes permiso para ver esta reserva de hotel');
            } 

        }

        //show hotelreservation by id and join with users table
        $hotelreservation = HotelReservation::join('users', 'hotel_reservations.user_id', '=', 'users.id')
            ->select(
                'hotel_reservations.*', 
                'users.name as user_name',
                'users.lastname as user_lastname',
                'users.second_lastname as user_second_lastname',
                'users.phone_code as user_phone_code',
                'users.phone_code_city as user_phone_code_city',
                'users.phone_number as user_phone_number',
                'users.whatsapp_code as user_whatsapp_code',
                'users.whatsapp_number as user_whatsapp_number',
                'users.email as user_email',
            )
            ->where('hotel_reservations.id', $id)
            ->first();

        $data = [
            'category_name' => 'hotelreservations',
            'page_name' => 'hotelreservations_show',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('pages.hotelreservations.show')->with($data)->with('hotelreservation', $hotelreservation);
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

        //actualizar solo la nota y status
        $hotelreservation = HotelReservation::find($id);

        $hotelreservation->note = $request->input('note');
        $hotelreservation->status = $request->input('status');

        $hotelreservation->save();

        //flash success message refresh this reservation
        return redirect()->route('hotelreservations.show', $id)->with('success', 'Reserva de hotel actualizada con éxito');

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
