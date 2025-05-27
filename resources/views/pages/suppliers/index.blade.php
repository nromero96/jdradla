@extends('layouts.app')


@section('content')

<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <div class="row layout-spacing layout-top-spacing" id="cancel-row">
            <div class="col-lg-12">
                <div class="widget-content searchable-container list">

                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 filtered-list-search layout-spacing align-self-center">
                            <form class="d-flex my-2 my-lg-0">
                                <div class="w-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                    <input type="text" class="form-control product-search" id="input-search" placeholder="Search Suppliers...">
                                </div>
                                <a id="advancedfilter" class="btn w-25 ms-1 btn-secondary _effect--ripple waves-effect waves-light" href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="Advanced Filter">{{ __('Filter') }}</a>
                                @if (isset($_GET['search']))
                                    <a href="{{ route('suppliers.index') }}" class="btn ms-1 btn-light-danger px-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Clear Filter">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </a>
                                @endif
                            </form>
                        
                            

    

                            <!-- Modal Filter -->
                            <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title add-title">{{ __('Advanced Filter') }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-2">
                                                        <label for="servicecategory_id" class="form-label fw-bold mb-0">Service</label>
                                                        <select class="form-control" name="servicecategory_id" id="servicecategory_id" required="">
                                                            <option value="">{{ __('Select...') }}</option>
                                                            @foreach ($servicecategories as $servicecategory)
                                                                <option value="{{ $servicecategory->id }}">{{ $servicecategory->servicecategory_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 mb-2">
                                                        <label for="rating_supplier" class="form-label fw-bold mb-0">Rate This Supplier</label>
                                                        <select class="form-control" name="rating_supplier" id="rating_supplier" required="">
                                                            <option value="">{{ __('Select...') }}</option>
                                                            <option value="5">5 Stars</option>
                                                            <option value="4">4 Stars</option>
                                                            <option value="3">3 Stars</option>
                                                            <option value="2">2 Stars</option>
                                                            <option value="1">1 Star</option>
                                                            
                                                        </select>
                                                    </div>
                                                    

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12 mb-3" id="services">
                                                        <input name='services_list' value='' placeholder="{{ __('Select services') }}">
                                                    </div>
                                                </div>

                                                <hr class="mt-0 mb-2">

                                                <div class="row">
                                                    <div class="col-md-12" id="btnaddroute">
                                                        <label class="form-label fw-bold">{{__("Route")}}:</label>
                                                    </div>
                                                    <div class="col-md-12 d-none" id="btnaddlocation">
                                                        <label class="form-label fw-bold">{{__("Location")}}:</label>
                                                    </div>
                                                </div>
                                                <div class="row" id="listroutes">
                                                    <div class="col-md-12 routeitem">
                                                        <div class="card p-1">
                                                            <div class="card-body p-2">
                                                                <div class="row">
                                                                    <div class="col-md-6" id="dvcol_origen">
                                                                        <label class="form-label fw-bold">{{ __('Origin') }}:</label>
                                                                        <div class="form-group mt-1 mb-1">
                                                                            <select class="form-control" name="origin_country_id">
                                                                                <option value="">{{ __('Country') }}</option>
                                                                                @foreach ($countries as $countrie)
                                                                                    <option value="{{ $countrie->id }}">{{ $countrie->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group mt-1 mb-1">
                                                                            <select class="form-control" name="origin_state_id" required="">
                                                                                <option value="">{{ __('State') }}</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group mt-1 mb-1">
                                                                            <input type="text" name="origin_city" class="form-control form-control-sm" value="" placeholder="City">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6" id="dvcol_destination">
                                                                        <label class="form-label fw-bold">{{ __('Destination') }}:</label>
                                                                        <div class="form-group mt-1 mb-1">
                                                                            <select class="form-control" name="destination_country_id">
                                                                                <option value="">{{ __('Country') }}</option>
                                                                                @foreach ($countries as $countrie)
                                                                                    <option value="{{ $countrie->id }}">{{ $countrie->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group mt-1 mb-1">
                                                                            <select class="form-control" name="destination_state_id" required="">
                                                                                <option value="">State</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group mt-1 mb-1">
                                                                            <input type="text" name="destination_city" class="form-control form-control-sm" value="" placeholder="City">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group mb-1 rowcrossing">
                                                                    <div class="col-md-12">
                                                                        <select class="form-control" name="crossing">
                                                                            <option value="">Crossing</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group mb-1">
                                                                    <hr class="mt-1 mb-1">
                                                                    <div class="col-md-12">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" name="return_route" type="checkbox" id="rtreturn1">
                                                                            <label class="form-check-label" for="rtreturn1"> Return</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button id="btn_discard_filter" class="btn" data-bs-dismiss="modal"> <i class="flaticon-delete-1"></i>{{ __('Discard') }}</button>
                                                <button id="btn_apply_filter" class="btn btn-primary">{{ __('Apply') }}</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal Filter -->

                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-sm-right text-center layout-spacing align-self-center">
                            <div class="d-flex justify-content-sm-end justify-content-center">
                                <a href="{{ route('suppliers.create') }}" class="btn btn-primary ms-3 me-3" style="line-height: 25px;">{{__("Add New")}}</a>
                                <div class="switch align-self-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list view-list active-view"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid view-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                                </div>
                            </div>

                            <!-- Modal Supplier -->
                            <div class="modal fade" id="addContactModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title add-title" id="addContactModalTitleLabel1">Add Contact</h5>
                                            <h5 class="modal-title edit-title" id="addContactModalTitleLabel2" style="display: none;">Edit Contact</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                              <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="add-contact-box">
                                                <div class="add-contact-content">
                                                    <form id="addContactModalTitle">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <div class="contact-name">
                                                                    <input type="text" id="c-name" class="form-control" placeholder="Name">
                                                                    <span class="validation-text"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <div class="contact-email">
                                                                    <input type="text" id="c-email" class="form-control" placeholder="Email">
                                                                    <span class="validation-text"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <div class="contact-occupation">
                                                                    <input type="text" id="c-occupation" class="form-control" placeholder="Occupation">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 mb-3">
                                                                <div class="contact-phone">
                                                                    <input type="text" id="c-phone" class="form-control" placeholder="Phone">
                                                                    <span class="validation-text"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="contact-location">
                                                                    <input type="text" id="c-location" class="form-control" placeholder="Location">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="btn-edit" class="float-left btn btn-success">Save</button>

                                            <button class="btn" data-bs-dismiss="modal"> <i class="flaticon-delete-1"></i> Discard</button>

                                            <button id="btn-add" class="btn btn-primary">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->
                            


                        </div>
                    </div>

                    <div class="searchable-items list">
                        <div class="items items-header-section">
                            <div class="item-content">
                                <div class="d-inline-flex">
                                    <div class="n-chk align-self-center text-center">
                                        <div class="form-check form-check-primary me-0 mb-0">
                                            <input class="form-check-input inbox-chkbox" id="contact-check-all" type="checkbox">
                                        </div>
                                    </div>
                                    <h4>Name</h4>
                                </div>
                                <div class="user-email">
                                    <h4>Contact</h4>
                                </div>
                                <div class="user-location">
                                    <h4 style="margin-left: 0;">Service</h4>
                                </div>
                                <div class="user-phone">
                                    <h4 style="margin-left: 3px;">Rating</h4>
                                </div>
                                <div class="action-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </div>
                            </div>
                        </div>

                        @foreach ($suppliers as $supplier)

                        <div class="items">
                            <div class="item-content itlist">
                                <div class="user-profile">
                                    <div class="n-chk align-self-center text-center">
                                        <div class="form-check form-check-primary me-0 mb-0">
                                            <input class="form-check-input inbox-chkbox contact-chkbox" type="checkbox">
                                        </div>
                                    </div>
                                    <img src="{{ asset('assets/img/icon-company-default.png') }}" alt="avatar">
                                    <div class="user-meta-info">
                                        <p class="user-name">{{ $supplier->company_name}}</p>
                                        <p class="user-work">{{ $supplier->country_name}}</p>
                                    </div>
                                </div>
                                <div class="user-email">
                                    <p class="info-title">Email: </p>
                                    <p class="usr-email-addr">{{ $supplier->contact_email }}</p>
                                </div>
                                <div class="user-location">
                                    <p class="info-title">Service: </p>
                                    <p class="usr-location">{{ $supplier->service_category_names }}</p>
                                </div>
                                <div class="user-phone">
                                    <p class="info-title">Rating: </p>
                                    <p class="usr-ph-no">
                                        
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
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                            </svg>
                                            </label>';
                                                }
        
                                            @endphp
                                        </div>
                                    </p>
                                </div>
                                <div class="action-btn">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye show" url="{{ route('suppliers.show',$supplier->id) }}"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit" url="{{ route('suppliers.edit',$supplier->id) }}"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-minus delete" idsup="{{ $supplier->id }}"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                                </div>
                            </div>
                        </div>
                            
                        @endforeach

                    </div>

                </div>
            </div>
        </div>

    </div>
    
</div>

@endsection