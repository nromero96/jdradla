<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\Program;

class DashboardController extends Controller{
    public function index(){
        // $category_name = '';
        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'dashboard',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        
        //revisar si tiene alguna inscripcion en estado Pagado
        $myinscription = Inscription::where('status', 'Pagado')
                                    ->where('user_id', auth()->user()->id)
                                    ->first();
        $assistance = Inscription::where('status', 'Pagado')
                                    ->where('assistance', '!=', null)
                                    ->where('user_id', auth()->user()->id)
                                    ->first();

        if($myinscription){
            //$myprograms = Program::where('insc_id', '503')->get();
            $myprograms = Program::where('insc_id', $myinscription->id)->get();
        } else {
            $myprograms = '[]';
        }

        return view('dashboard.index')->with($data)->with('myinscription', $myinscription)->with('myprograms', $myprograms)->with('assistance', $assistance);
    }


}
