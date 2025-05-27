@extends('layouts.app')


@section('content')


<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <!-- BREADCRUMB -->
        <div class="page-meta">
            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('suppliers.index')}}">{{__("Suppliers")}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__("Edit")}}</li>
                </ol>
            </nav>
        </div>
        <!-- /BREADCRUMB -->

        <div class="row layout-spacing">
            <div class="col-lg-12 layout-top-spacing mt-2">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>
                                    {{__("Supplier Information")}}
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area pt-0">
                        <form class="row g-3" action="{{ route('suppliers.update',$supplier->id) }}" method="POST" enctype="multipart/form-data" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-4">
                                <label for="company_name" class="form-label fw-bold">{{__("Company Name")}}<span class="text-danger">*</span> </label>
                                <input type="text" name="company_name" class="form-control" id="company_name" value="{{ $supplier->company_name }}" placeholder="{{__('Type here')}}" required>
                                {!!$errors->first("company_name", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-8">
                                <label for="company_address" class="form-label fw-bold">{{__("Company Address")}}<span class="text-danger">*</span></label>
                                <input type="text" name="company_address" class="form-control" id="company_address" value="{{ $supplier->company_address }}" placeholder="{{__('Type here')}}" required>
                                {!!$errors->first("company_address", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="country_id" class="form-label fw-bold">{{__("Country")}}<span class="text-danger">*</span></label>
                                <select class="form-control" name="country_id" id="country_id" required>
                                    <option value="">{{ __('Select a country...') }}</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}" @if($country->id == $supplier->country_id) selected @endif>{{$country->name}}</option>
                                    @endforeach
                                </select>
                                {!!$errors->first("country_id", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="state_id" class="form-label fw-bold">{{__("State")}}<span class="text-danger">*</span></label>
                                <select class="form-control" name="state_id" id="state_id" required>
                                    <option value="">{{ __('Select a state...') }}</option>
                                    @foreach($states as $state)
                                        <option value="{{$state->id}}" @if($state->id == $supplier->state_id) selected @endif>{{$state->name}}</option>
                                    @endforeach
                                </select>
                                {!!$errors->first("state_id", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-4">
                                <label for="city" class="form-label fw-bold">{{__("City")}}<span class="text-danger">*</span></label>
                                <input type="text" name="city" class="form-control" id="city" value="{{ $supplier->city }}" placeholder="{{__('Type here')}}" required>
                                {!!$errors->first("city", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-12">
                                <label for="contact_company" class="form-label fw-bold">{{__("Contact Information")}}:</label>
                                <button type="button" class="btn btn-primary mb-2 me-4" id="add_contact">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                    <span class="btn-text-inner">Add</span>
                                </button>
                                

                                <div class="row" id="listcontas">
                                    @php
                                        // Valor de n para el bucle
                                        $n = 0;
                                    @endphp
                                
                                    @forelse ($suppliercontacts as $item)
                                        @php
                                            // $i es un número aleatorio único
                                            $i = rand(1, 1000000);
                                            $checkedmaincontact = ($item->contact_main == 'yes') ? 'checked' : '';
                                        @endphp

                                        <div class="col-md-4 contacitem mb-3">
                                            <input type="hidden" name="contact_id[]" value="{{ $item->id }}">
                                            <div class="card p-1">
                                                <button type="button" class="btn btn-danger p-0 btn-sm remove_contact">X</button>
                                                <div class="card-body p-2">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row mt-1 mb-1">
                                                                <label class="col-sm-4 col-form-label col-form-label-sm pe-0">Name:<span class="text-danger">*</span></label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="contact_name[]" class="form-control form-control-sm" value="{{ $item->contact_name }}" placeholder="Type here">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-1">
                                                                <label class="col-sm-4 col-form-label col-form-label-sm pe-0">Position:</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="contact_position[]" class="form-control form-control-sm" value="{{ $item->contact_position }}" placeholder="Type here">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-1">
                                                                <label class="col-sm-4 col-form-label col-form-label-sm pe-0">Email:<span class="text-danger">*</span></label>
                                                                <div class="col-sm-8">
                                                                    <input type="email" name="contact_email[]" class="form-control form-control-sm" value="{{ $item->contact_email }}" placeholder="Type here">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-1">
                                                                <div class="col-sm-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="contact_main" value="{{ $n++ }}" id="contact_main{{ $i }}" {{ $checkedmaincontact }}>
                                                                        <label class="form-check-label" for="contact_main{{ $i }}">
                                                                            Is this a main contact?
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr class="p-0 mt-0 mb-2">
                                                            <div class="form-group row mb-1">
                                                                <label class="col-sm-5 col-form-label col-form-label-sm pe-0">Telephone(s):</label>
                                                                <div class="col-sm-7">
                                                                    <button type="button" class="btn btn-secondary mb-2 me-4 btn-sm add_contacttype">Add</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="listphonecontact">
                                                        @for ($ctitm = 1; $ctitm <= 5; $ctitm++)
                                                            @php
                                                                $numtext = '';
                                                                $cntselct = '';
                                                                $cntypval = '';
                                
                                                                if ($ctitm == 1) {
                                                                    $numtext = 'one';
                                                                    $cntselct = $item->contact_typeone;
                                                                    $cntypval = $item->contact_typeone_value;
                                                                } elseif ($ctitm == 2) {
                                                                    $numtext = 'two';
                                                                    $cntselct = $item->contact_typetwo;
                                                                    $cntypval = $item->contact_typetwo_value;
                                                                } elseif ($ctitm == 3) {
                                                                    $numtext = 'three';
                                                                    $cntselct = $item->contact_typethree;
                                                                    $cntypval = $item->contact_typethree_value;
                                                                } elseif ($ctitm == 4) {
                                                                    $numtext = 'four';
                                                                    $cntselct = $item->contact_typefour;
                                                                    $cntypval = $item->contact_typefour_value;
                                                                } elseif ($ctitm == 5) {
                                                                    $numtext = 'five';
                                                                    $cntselct = $item->contact_typefive;
                                                                    $cntypval = $item->contact_typefive_value;
                                                                }
                                                            @endphp
                                                            <div class="row itemcontact {{ empty($cntselct) && empty($cntypval) ? 'd-none' : '' }}">
                                                                <div class="col-md-4 mb-2 pe-0">
                                                                    <select name="contact_type{{ $numtext }}[]" class="form-control form-control-sm">
                                                                        <option value="" {{ empty($cntselct) ? 'selected' : '' }}>Type</option>
                                                                        <option value="Home" {{ $cntselct == 'Home' ? 'selected' : '' }}>Home</option>
                                                                        <option value="Office" {{ $cntselct == 'Office' ? 'selected' : '' }}>Office</option>
                                                                        <option value="Direct" {{ $cntselct == 'Direct' ? 'selected' : '' }}>Direct</option>
                                                                        <option value="Mobile" {{ $cntselct == 'Mobile' ? 'selected' : '' }}>Mobile</option>
                                                                        <option value="Fax" {{ $cntselct == 'Fax' ? 'selected' : '' }}>Fax</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6 mb-2 pe-1">
                                                                    <input type="text" name="contact_type{{ $numtext }}_value[]" class="form-control form-control-sm" value="{{ $cntypval }}" placeholder="Type Here">
                                                                </div>
                                                                <div class="col-md-2 mb-2 ps-1">
                                                                    <button type="button" class="btn btn-danger px-2 py-2 btn-sm remove_contacttype d-none">X</button>
                                                                </div>
                                                            </div>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p>No supplier contacts found.</p>
                                    @endforelse
                                </div>
                                
                                


                            </div>

                            <div class="col-md-6">
                                <label for="company_website" class="form-label fw-bold">{{__("Company Website")}}</label>
                                <input type="text" name="company_website" class="form-control" id="company_website" value="{{ $supplier->company_website }}" placeholder="{{__('Ex:- https://mycompany.com')}}">
                                {!!$errors->first("company_website", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-6">
                                <label for="company_rating" class="form-label fw-bold">{{__("Rate This Supplier")}}</label>
                                <div class="rating-group pt-1">


                                    @php
                                        $rating = $supplier->company_rating;
                                        // verificar y agregar active class a los radio buttons
                                        for ($i=1; $i <= 5; $i++) { 
                                            if($i <= $rating){
                                                $classactive = "active";
                                            }else{
                                                $classactive = "";
                                            }

                                            if($i == $rating){
                                                $checked = "checked";
                                            }else{
                                                $checked = "";
                                            }

                                            echo '<input type="radio" id="star'.$i.'" name="company_rating" value="'.$i.'" '.$checked.' />
                                    <label for="star'.$i.'" class="'.$classactive.'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                    </svg>
                                    </label>';
                                        }

                                    @endphp
                                </div>
                                {!!$errors->first("company_rating", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-12">
                                <label for="company_documents" class="form-label fw-bold">{{ __('Documents') }}</label>
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                            <input type="file" 
                                            class="filepond suppliers_document_one"
                                            name="document_one"
                                            data-allow-reorder="true"
                                            data-max-file-size="3MB"/>
                                            @if ($supplier->document_one != null)
                                                <a href="{{ asset('storage/uploads/supplier_documents/'.$supplier->document_one) }}" target="_blank">(View current document)</a>    
                                            @endif
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <input type="file" 
                                            class="filepond suppliers_document_two"
                                            name="document_two"
                                            data-allow-reorder="true"
                                            data-max-file-size="3MB"/>
                                            @if ($supplier->document_two != null)
                                                <a href="{{ asset('storage/uploads/supplier_documents/'.$supplier->document_two) }}" target="_blank">(View current document)</a>
                                            @endif
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <input type="file" 
                                            class="filepond suppliers_document_three"
                                            name="document_three"
                                            accept="application/pdf"
                                            data-allow-reorder="true"
                                            data-max-file-size="3MB"/>
                                            @if ($supplier->document_three != null)
                                                <a href="{{ asset('storage/uploads/supplier_documents/'.$supplier->document_three) }}" target="_blank">(View current document)</a>
                                            @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="company_note" class="form-label fw-bold">{{__("Special Notes")}}</label>
                                <textarea name="company_note" id="company_note" class="form-control" rows="3" placeholder="{{__('Type here')}}">{{ $supplier->company_note }}</textarea>
                                {!!$errors->first("company_note", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">{{__("Update & Add Service")}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection