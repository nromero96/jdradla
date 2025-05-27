@extends('layouts.app')


@section('content')


<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <!-- BREADCRUMB -->
        <div class="page-meta">
            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('suppliers.index')}}">{{__("Suppliers")}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__("Detail")}}</li>
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
                                <h4 class="d-flex justify-content-between">
                                    <span>{{__("Supplier Information")}}</span>
                                    <div class="dropdown-list dropdown text-end" role="group">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('suppliers.edit',$supplier->id) }}">
                                                <span>{{ __('Edit') }}</span> 
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            </a>
                                            <a class="dropdown-item" id="print_supplier" href="javascript:void(0);">
                                                <span>{{ __('Print') }}</span> 
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                                            </a>
                                        </div>
                                    </div>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area pt-0">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold mb-1">{{__("Company Name")}}:</label>
                                <p class="form-control px-2 bg-text-control-form border-0 mb-0">{{ $supplier->company_name }}</p>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label fw-bold mb-1">{{__("Company Address")}}:</label>
                                <p class="form-control px-2 bg-text-control-form border-0 mb-0">{{ $supplier->company_address }}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold mb-1">{{__("Country")}}:</label>
                                <p class="form-control px-2 bg-text-control-form border-0 mb-0">{{ $supplier->country_name }}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold mb-1">{{__("State")}}:</label>
                                <p class="form-control px-2 bg-text-control-form border-0 mb-0">{{ $supplier->state_name }}</p>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold mb-1">{{__("City")}}:</label>
                                <p class="form-control px-2 bg-text-control-form border-0 mb-0">{{ $supplier->city }}</p>
                            </div>

                            <div class="col-md-12">
                                <label  class="form-label fw-bold">{{__("Contact Information")}}:</label>
                                <div class="row" id="listcontas">
                                    
                                    @foreach ($suppliercontacts as $item)
                                            

                                    <div class="col-md-4">
                                        <div class="card bg-text-control-form p-1">
                                          <div class="card-body p-2">
                                            <div class="row">
                                              <div class="col-md-12">
                                                <div class="form-group row mt-1 mb-0">
                                                  <label class="col-sm-12 col-form-label col-form-label-sm mb-0 pe-0"><b>Name:</b> {{ $item->contact_name }}</label>
                                                </div>
                                                <div class="form-group row  mb-0">
                                                    <label class="col-sm-12 col-form-label col-form-label-sm mb-0 pe-0"><b>Position:</b> {{ $item->contact_position }}</label>
                                                </div>
                                                <div class="form-group row mb-0">
                                                  <label class="col-sm-12 col-form-label col-form-label-sm mb-0 pe-0"><b>Email:</b> {{ $item->contact_email }}</label>
                                                </div>
                                                <div class="form-group row  mb-0">
                                                  <label class="col-sm-8 col-form-label col-form-label-sm mb-0 pe-0">Is this a main contact?</label>
                                                  <div class="col-sm-4 pt-1">
                                                    <div class="form-check form-switch">
                                                        @php
                                                            $checkedmaincontact = ($item->contact_main == 'yes') ? 'checked' : '';

                                                        @endphp
                                                      <input class="form-check-input" name="contact_main[]" value="yes" type="checkbox" {{ $checkedmaincontact }} disabled>
                                                    </div>
                                                  </div>
                                                </div>
                                      
                                                <hr class="p-0 mt-0 mb-2">
                                                <div class="form-group row  mb-1">
                                                  <label class="col-sm-12 col-form-label col-form-label-sm pe-0 mb-0">{{ __('Telephone(s)') }}:</label>
                                                </div>
                                              </div>
                                            </div>
                                      
                                            <div class="listphonecontact">
                                              <!-- Agregar los bloques de contacto -->
                                                @php
                                                    if($item->contact_typeone_value != ''){
                                                        echo '<div class="row itemcontact">
                                                                <div class="col-md-12 mb-2 pe-0">
                                                                    <b>'.$item->contact_typeone.':</b> '.$item->contact_typeone_value.'
                                                                </div>
                                                            </div>';
                                                    }
                                                    if($item->contact_typetwo_value != ''){
                                                        echo '<div class="row itemcontact">
                                                                <div class="col-md-12 mb-2 pe-0">
                                                                    <b>'.$item->contact_typetwo.':</b> '.$item->contact_typetwo_value.'
                                                                </div>
                                                            </div>';
                                                    }
                                                    if($item->contact_typethree_value != ''){
                                                        echo '<div class="row itemcontact">
                                                                <div class="col-md-12 mb-2 pe-0">
                                                                    <b>'.$item->contact_typethree.':</b> '.$item->contact_typethree_value.'
                                                                </div>
                                                                
                                                            </div>';
                                                    }
                                                    if($item->contact_typefour_value != ''){
                                                        echo '<div class="row itemcontact">
                                                                <div class="col-md-12 mb-2 pe-0">
                                                                    <b>'.$item->contact_typefour.':</b> '.$item->contact_typefour_value.'
                                                                </div>
                                                            </div>';
                                                    }
                                                    if($item->contact_typefive_value != ''){
                                                        echo '<div class="row itemcontact">
                                                                <div class="col-md-12 mb-2 pe-0">
                                                                    <b>'.$item->contact_typefive.':</b> '.$item->contact_typefive_value.'
                                                                </div>
                                                            </div>';
                                                    }

                                                    //si no hay contactos
                                                    if($item->contact_typeone_value == '' && $item->contact_typetwo_value == '' && $item->contact_typethree_value == '' && $item->contact_typefour_value == '' && $item->contact_typefive_value == ''){
                                                        echo '<div class="row itemcontact">
                                                                <div class="col-md-12 pe-0">
                                                                    <p class="text-center">N/A</p>
                                                                </div>
                                                            </div>';
                                                    }

                                                @endphp
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                    @endforeach

                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">{{__("Company Website")}}:</label>
                                <p class="form-control px-2 bg-text-control-form border-0 mb-0">{{ $supplier->company_website }}</p>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">{{__("Rate This Supplier")}}:</label>
                                <div class="rating-group pt-1">

                                    @php
                                        $rating = $supplier->company_rating;
                                        // verificar y agregar active class a los radio buttons
                                        for ($i=1; $i <= 5; $i++) { 
                                            if($i <= $rating){
                                                $active = "checked";
                                                $classactive = "active";
                                            }else{
                                                $active = "";
                                                $classactive = "";
                                            }
                                            echo '<input type="radio" id="star'.$i.'" name="company_rating" value="'.$i.'" />
                                    <label for="star'.$i.'" class="'.$classactive.'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                    </svg>
                                    </label>';
                                        }

                                    @endphp
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-bold">{{ __('Documents') }}</label>
                                <div class="row">

                                    <?php
                                        $document_one = $supplier->document_one;
                                        if($document_one){
                                        ?>

                                        <div class="col-md-4">
                                            <div class="text-center bg-text-control-form rounded px-2 py-4 bg-file-cocuments" style="background-image: url({{ asset('assets/img/icons8-file.svg') }})">
                                                @php
                                                    // Obtener los primeros 30 caracteres del resultado y agregar puntos suspensivos
                                                    $document_one_short = strlen($document_one) > 30 ? substr($document_one, 0, 30) . '...' : $document_one;
                                                    
                                                    // Mostrar la imagen icons8-file.svg dentro del link
                                                    echo '<u><a href="'.asset('storage/uploads/supplier_documents/'.$document_one).'" target="_blank" class="">'.$document_one_short.'</a></u>';
                                                @endphp
                                            </div>
                                        </div>


                                        <?php
                                        }
                                    ?>

                                    <?php
                                    $document_two = $supplier->document_two;
                                    if($document_two){
                                    ?>

                                    <div class="col-md-4">
                                        <div class="text-center bg-text-control-form rounded px-2 py-4 bg-file-cocuments" style="background-image: url({{ asset('assets/img/icons8-file.svg') }})">
                                            @php
                                                // Obtener los primeros 30 caracteres del resultado y agregar puntos suspensivos
                                                $document_two_short = strlen($document_two) > 30 ? substr($document_two, 0, 30) . '...' : $document_two;
                                                
                                                // Mostrar la imagen icons8-file.svg dentro del link
                                                echo '<u><a href="'.asset('storage/uploads/supplier_documents/'.$document_two).'" target="_blank" class="">'.$document_two_short.'</a></u>';
                                            @endphp
                                        </div>
                                    </div>


                                    <?php
                                    }
                                    ?>

                                    <?php
                                    $document_three = $supplier->document_three;
                                    if($document_three){
                                    ?>

                                    <div class="col-md-4">
                                        <div class="text-center bg-text-control-form rounded px-2 py-4 bg-file-cocuments" style="background-image: url({{ asset('assets/img/icons8-file.svg') }})">
                                            @php
                                                // Obtener los primeros 20 caracteres del resultado y agregar puntos suspensivos
                                                $document_three_short = strlen($document_three) > 30 ? substr($document_three, 0, 30) . '...' : $document_three;
                                                // Mostrar la imagen icons8-file.svg dentro del link
                                                echo '<u><a href="'.asset('storage/uploads/supplier_documents/'.$document_three).'" target="_blank" class="">'.$document_three_short.'</a></u>';
                                            @endphp
                                        </div>
                                    </div>


                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <label class="form-label fw-bold">{{__("Special Notes")}}:</label>
                                <p class="form-control px-2 bg-text-control-form border-0 mb-0">{{ $supplier->company_note }}</p>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-bold">Services:</label>
                                <button type="button" class="btn btn-primary mb-2 me-4 _effect--ripple waves-effect waves-light" id="add_service">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                                    <span class="btn-text-inner">Add</span>
                                </button>
                                <hr class="mt-1 mb-2">
                                <div class="row mb-3" id="listservices">
                                    
                                </div>
                            </div>
                        </div>


                        <!-- Modal Service -->
                        <div class="modal fade modal-lg" id="serviceModal" tabindex="-1" role="dialog" aria-labelledby="serviceModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form name="formservicesupplier" id="formservicesupplier" action="" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="service_supplier_id" value="">
                                        <input type="hidden" name="supplier_id" value="{{ $supplier->id }}">
                                        <div class="modal-header">
                                            <h5 class="modal-title add-title">{{ __('Service Informations') }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="servicecategory_id" class="form-label fw-bold mb-0">{{ __('Service') }}</label>
                                                            <select class="form-control" name="servicecategory_id" id="servicecategory_id" required="">
                                                                <option value="">{{ __('Select...') }}</option>
                                                                @foreach ($servicecategories as $servicecategory)
                                                                    <option value="{{ $servicecategory->id }}">{{ $servicecategory->servicecategory_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12 mb-3" id="services">
                                                            <input name='services_list' value='' placeholder="{{ __('Select services') }}">
                                                        </div>
                                                    </div>

                                                    <hr class="m-0">
                                                    <div class="row">
                                                        <div class="col-md-12" id="btnaddroute">
                                                            <label class="form-label fw-bold">{{__("Routes")}}:</label>
                                                            <button type="button" class="btn btn-primary mb-2 me-4" id="add_route">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
                                                                <span class="btn-text-inner">{{ __('Add') }}</span>
                                                            </button>
                                                        </div>

                                                        <div class="col-md-12 d-none" id="btnaddlocation">
                                                            <label class="form-label fw-bold">{{__("Locations")}}:</label>
                                                            <button type="button" class="btn btn-primary mb-2 me-4" id="add_location">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
                                                                <span class="btn-text-inner">{{ __('Add') }}</span>
                                                            </button>
                                                        </div>

                                                    </div>
                                                    <hr class="mt-0 mb-2">

                                                    <div class="row" id="listroutes">

                                                    </div>
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn discard_btn" data-bs-dismiss="modal"> <i class="flaticon-delete-1"></i>{{ __('Discard') }}</a>
                                            <button id="btn-add" class="btn btn-primary">{{ __('Save') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Service -->


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection