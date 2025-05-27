@extends('layouts.app')

@section('content')

<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">
        
        <div class="row layout-top-spacing layout-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="calendar-container">
                    <div class="calendar"></div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('Add Event') }}</h5>
                        <a class="badge badge-light-danger text-start action-delete" href="javascript:void(0);" data-fc-event-public-id=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
                        
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="">
                                    <label class="form-label">{{ __('Title') }}</label>
                                    <input id="event-title" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="">
                                    <label class="form-label">{{ __('Enter Start Date') }}</label>
                                    <input id="event-start-date" type="datetime-local" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="">
                                    <label class="form-label">{{ __('Enter End Date') }}</label>
                                    <input id="event-end-date" type="datetime-local" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-md-12">

                                <div class="d-flex mt-4">
                                    <div class="n-chk">
                                        <div class="form-check form-check-primary form-check-inline">
                                            <input class="form-check-input" type="radio" name="event-level" value="Work" id="rwork">
                                            <label class="form-check-label" for="rwork">{{ __('Work') }}</label>
                                        </div>
                                    </div>
                                    <div class="n-chk">
                                        <div class="form-check form-check-warning form-check-inline">
                                            <input class="form-check-input" type="radio" name="event-level" value="Travel" id="rtravel">
                                            <label class="form-check-label" for="rtravel">{{ __('Travel') }}</label>
                                        </div>
                                    </div>
                                    <div class="n-chk">
                                        <div class="form-check form-check-success form-check-inline">
                                            <input class="form-check-input" type="radio" name="event-level" value="Personal" id="rPersonal">
                                            <label class="form-check-label" for="rPersonal">{{ __('Personal') }}</label>
                                        </div>
                                    </div>
                                    <div class="n-chk">
                                        <div class="form-check form-check-danger form-check-inline">
                                            <input class="form-check-input" type="radio" name="event-level" value="Important" id="rImportant">
                                            <label class="form-check-label" for="rImportant">{{ __('Important') }}</label>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="button" class="btn btn-success btn-update-event" data-fc-event-public-id="">{{ __('Update changes') }}</button>
                        <button type="button" class="btn btn-primary btn-add-event">{{ __('Add Event') }}</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
</div>

@endsection