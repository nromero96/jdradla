<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Log;

//model country
use App\Models\Country;
use App\Models\State;

class QuotationCreated extends Mailable{
    use Queueable, SerializesModels;

    public $quotation;

    public function __construct($quotation){
        $this->quotation = $quotation;
    }

    public function build() {
        // Buscar el nombre del país de origen
        $origin_country = Country::find($this->quotation->origin_country_id);
        // Buscar el nombre del país de destino
        $destination_country = Country::find($this->quotation->destination_country_id);
        // Obtener el nombre del país, suponiendo que tengas un campo "name" en tu modelo Country
        $origin_country_name = $origin_country ? $origin_country->name : 'Unknown Country';
        $destination_country_name = $destination_country ? $destination_country->name : 'Unknown Country';

        $origin_state_name = '';
        $destination_state_name = '';
        //if origin_state_id is not null then find the state name
        if($this->quotation->origin_state_id != null){
            $origin_state = State::find($this->quotation->origin_state_id);
            //get name of state
            $origin_state_name = $origin_state ? $origin_state->name : 'Unknown State';
        }
        //if destination_state_id is not null then find the state name
        if($this->quotation->destination_state_id != null){
            $destination_state = State::find($this->quotation->destination_state_id);
            //get name of state
            $destination_state_name = $destination_state ? $destination_state->name : 'Unknown State';
        }
    
        // Construir el correo
        return $this->view('emails.quotation_created', compact('origin_country_name', 'destination_country_name', 'origin_state_name', 'destination_state_name'))
            ->subject('Quote ID #: '. $this->quotation->id .' - Your Request with Latin American Cargo - '. $this->quotation->mode_of_transport .' - ['. $origin_country_name .' - '. $destination_country_name .'].');
    
    }


}
