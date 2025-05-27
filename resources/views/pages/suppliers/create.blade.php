@extends('layouts.app')


@section('content')


<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <!-- BREADCRUMB -->
        <div class="page-meta">
            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('suppliers.index')}}">{{__("Suppliers")}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__("Create")}}</li>
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
                                <h4>{{__("Supplier Information")}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area pt-0">
                        <form class="row g-3" action="{{ route('suppliers.index') }}" method="POST" enctype="multipart/form-data" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-4">
                                <label for="company_name" class="form-label fw-bold">{{__("Company Name")}}<span class="text-danger">*</span> </label>
                                <input type="text" name="company_name" class="form-control" id="company_name" value="{{old('company_name')}}" placeholder="{{__('Type here')}}" required>
                                {!!$errors->first("company_name", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-8">
                                <label for="company_address" class="form-label fw-bold">{{__("Company Address")}}<span class="text-danger">*</span></label>
                                <input type="text" name="company_address" class="form-control" id="company_address" value="{{old('company_address')}}" placeholder="{{__('Type here')}}" required>
                                {!!$errors->first("company_address", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="country_id" class="form-label fw-bold">{{__("Country")}}<span class="text-danger">*</span></label>
                                <select class="form-control" name="country_id" id="country_id" required>
                                    <option value="">{{ __('Select a country...') }}</option>
                                    @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                                {!!$errors->first("country_id", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="state_id" class="form-label fw-bold">{{__("State")}}<span class="text-danger">*</span></label>
                                <select class="form-control" name="state_id" id="state_id" required>
                                    <option value="">{{ __('Select a state...') }}</option>
                                    
                                </select>
                                {!!$errors->first("state_id", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-4">
                                <label for="city" class="form-label fw-bold">{{__("City")}}<span class="text-danger">*</span></label>
                                <input type="text" name="city" class="form-control" id="city" value="{{old('city')}}" placeholder="{{__('Type here')}}" required>
                                {!!$errors->first("city", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-12">
                                <label for="contact_company" class="form-label fw-bold">{{__("Contact Information")}}:</label>
                                <button type="button" class="btn btn-primary mb-2 me-4" id="add_contact">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                    <span class="btn-text-inner">Add</span>
                                </button>
                                <div class="row" id="listcontas">
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="company_website" class="form-label fw-bold">{{__("Company Website")}}</label>
                                <input type="text" name="company_website" class="form-control" id="company_website" value="{{old('company_website')}}" placeholder="{{__('Ex:- https://mycompany.com')}}">
                                {!!$errors->first("company_website", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-6">
                                <label for="company_rating" class="form-label fw-bold">{{__("Rate This Supplier")}}</label>
                                <div class="rating-group pt-1">
                                    <input type="radio" id="star1" name="company_rating" value="1" />
                                    <label for="star1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                    </svg>
                                    </label>
                                    <input type="radio" id="star2" name="company_rating" value="2" />
                                    <label for="star2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                    </svg>
                                    </label>
                                    <input type="radio" id="star3" name="company_rating" value="3" />
                                    <label for="star3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                    </svg>
                                    </label>
                                    <input type="radio" id="star4" name="company_rating" value="4" />
                                    <label for="star4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                    </svg>
                                    </label>
                                    <input type="radio" id="star5" name="company_rating" value="5" />
                                    <label for="star5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                    </svg>
                                    </label>
                                </div>
                                {!!$errors->first("company_rating", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-12">
                                <label for="company_documents" class="form-label fw-bold">{{ __('Documents') }}</label>
                                <div class="row">
                                    <div class="col-md-4">
                                            <input type="file" 
                                            class="filepond suppliers_document_one"
                                            name="document_one"
                                            data-allow-reorder="true"
                                            data-max-file-size="3MB"/>
                                            {!!$errors->first("document_one", "<span class='text-danger'>:message</span>")!!}
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" 
                                            class="filepond suppliers_document_two"
                                            name="document_two"
                                            data-allow-reorder="true"
                                            data-max-file-size="3MB"/>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" 
                                            class="filepond suppliers_document_three"
                                            name="document_three"
                                            accept="application/pdf"
                                            data-allow-reorder="true"
                                            data-max-file-size="3MB"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="company_note" class="form-label fw-bold">{{__("Special Notes")}}</label>
                                <textarea name="company_note" id="company_note" class="form-control" rows="3" placeholder="{{__('Type here')}}">{{old('company_note')}}</textarea>
                                {!!$errors->first("company_note", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">{{__("Save & Add Service")}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection