<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        <div class="navbar-nav theme-brand flex-row  text-center">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="{{ route('dashboard.index') }}">
                        <img src="{{ asset('assets/img/logo.png') }}" class="navbar-logo" alt="logo">
                    </a>
                </div>
                <div class="nav-item theme-text text-center">
                    <a href="{{ route('dashboard.index') }}" class="nav-link">JD RADLA</a>
                </div>
            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                </div>
            </div>
        </div>

        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories" id="menudashboardaccordion">

            {{-- <li class="menu {{ ($category_name === 'dashboard') ? 'active' : '' }}">
                <a href="#dashboard" data-bs-toggle="collapse" aria-expanded="{{ ($category_name === 'dashboard') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>{{ __("Dashboard") }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ ($category_name === 'dashboard') ? 'show' : '' }}" id="dashboard" data-bs-parent="#menudashboardaccordion">
                    <li class="{{ ($page_name === 'analytics') ? 'active' : '' }}">
                        <a href="{{route('dashboard.analytics')}}"> {{ __("Analytics") }} </a>
                    </li>
                    <li class="{{ ($page_name === 'sales') ? 'active' : '' }}">
                        <a href="{{route('dashboard.sales')}}"> {{ __("Sales") }} </a>
                    </li>
                </ul>
            </li> --}}

            <li class="menu mt-1 {{ ($category_name === 'dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard.index') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span> {{ __("Dashboard") }} </span>
                    </div>
                </a>
            </li>

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>{{__("DATOS")}}</span></div>
            </li>

            <li class="menu {{ ($category_name === 'profile') ? 'active' : '' }}">
                <a href="{{ route('users.myprofile') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" viewBox="0 0 24 24" stroke-linejoin="round"><path d="M12 10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z"></path><path d="M21 22a9 9 0 1 0-18 0"></path><path d="m15 18-4 4-2-2"></path></svg>
                        <span> {{ __("Información Personal") }} </span>
                    </div>
                </a>
            </li>

            @can('users.index', 'roles.index', 'programs.index')
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>{{__("GESTION")}}</span></div>
            </li>
            @endcan

            @can('users.index')
            <li class="menu {{ ($category_name === 'users') ? 'active' : '' }}">
                <a href="{{route('users.index')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>{{ __("Usuarios") }}</span>
                    </div>
                </a>
            </li>
            @endcan

            @can('roles.index')
            <li class="menu {{ ($category_name === 'roles') ? 'active' : '' }}">
                <a href="{{route('roles.index')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-toggle-left"><rect x="1" y="5" width="22" height="14" rx="7" ry="7"/><circle cx="8" cy="12" r="3"/></svg>
                        <span>{{ __("Roles & Permisos") }}</span>
                    </div>
                </a>
            </li>
            @endcan

            @can('programs.index')
            <li class="menu {{ ($category_name === 'programs' || $category_name === 'programsessions') ? 'active' : '' }}">
                <a href="{{route('programs.index')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24"><path d="M19 10H9v4h10v-4Z"></path><path d="M16 3H9v4h7V3Z"></path><path d="M22 17H9v4h13v-4Z"></path><path d="M8.5 5h-6"></path><path d="M8.5 12h-6"></path><path d="M8.5 19h-6"></path><path d="M2.5 22V2"></path></svg>
                        <span>{{ __("Programa") }}</span>
                    </div>
                </a>
            </li>
            @endcan

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>{{__("EVENTO")}}</span></div>
            </li>

            @can('inscriptions.index')
            <li class="menu {{ ($category_name === 'inscriptions') ? 'active' : '' }}">
                <a href="{{route('inscriptions.index')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24"><path d="M19.5 3h-15A1.5 1.5 0 0 0 3 4.5v15A1.5 1.5 0 0 0 4.5 21h15a1.5 1.5 0 0 0 1.5-1.5v-15A1.5 1.5 0 0 0 19.5 3Z"></path><path d="M10.5 6.5h-4v4h4v-4Z"></path><path d="M10.5 13.5h-4v4h4v-4Z"></path><path d="M13.5 14h4"></path><path d="M13.5 17.5h4"></path><path d="M13.5 6.5h4"></path><path d="M13.5 10h4"></path></svg>
                        <span>{{ __("Inscripciones") }}</span>
                    </div>
                </a>
            </li>
            @endcan

            @can('gafetes.index')
            <li class="menu {{ ($category_name === 'gafetes') ? 'active' : '' }}">
                <a href="{{route('gafetes.index')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg width="46" height="46" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="m9 11 3 3L22 4"></path>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg>
                        <span>{{ __("Gafetes") }}</span>
                    </div>
                </a>
            </li>
            @endcan

            @can('hotelreservations.index')
            <li class="menu {{ ($category_name === 'hotelreservations') ? 'active' : '' }}">
                <a href="{{route('hotelreservations.index')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24"><path d="M2 2h20"></path><path d="M19 2H5a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1Z"></path><path d="M10 16h4v6h-4v-6Z"></path><path d="M7.5 6h1"></path><path d="M7.5 9h1"></path><path d="M11.5 6h1"></path><path d="M11.5 9h1"></path><path d="M15.5 6h1"></path><path d="M15.5 9h1"></path><path d="M2 22h20"></path><path d="M14 16h1c.276 0 .505-.226.452-.497C15.176 14.083 13.735 13 12 13c-1.736 0-3.176 1.083-3.452 2.503-.053.271.176.497.452.497h1"></path></svg>
                        <span>{{ __("Alojamientos") }}</span>
                    </div>
                </a>
            </li>
            @endcan

            {{-- <li class="menu {{ ($category_name === 'posters') ? 'active' : '' }}">
                <a href="{{route('posters.index')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                            <path d="m12 15 5 6H7l5-6z"></path>
                          </svg>
                          <span>{{ __("Posters") }}</span>
                          <span class="badge badge-primary sidebar-label"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle badge-icon"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg> Nuevo</span>
                    </div>
                </a>
            </li> --}}

            @can('works.index')
            <li class="menu {{ ($category_name === 'works') ? 'active' : '' }}">
                <a href="{{route('works.index')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        <span>{{ __("Trabajos") }}</span>
                    </div>
                </a>
            </li>
            @endcan

            @can('exhibitors.index')
            <li class="menu {{ ($category_name === 'exhibitors') ? 'active' : '' }}">
                <a href="{{route('exhibitors.index')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>{{ __("Expositores/Expertos") }}</span>
                    </div>
                </a>
            </li>
            @endcan

            @can('invitations.index', 'specialcodes.index')
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>{{__('OTROS')}}</span></div>
            </li>
            @endcan

            @can('invitations.index')
            <li class="menu {{ ($page_name === 'invitations') ? 'active' : '' }}">
                <a href="{{route('invitations.index')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24"><path d="M20 11.5V7l-4.5-5H5a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h6"></path><path d="M15.425 15c-1.063 0-1.925 1.004-1.925 2.243 0 2.243 2.275 4.283 3.5 4.757 1.225-.474 3.5-2.514 3.5-4.757 0-1.239-.862-2.243-1.925-2.243-.651 0-1.227.377-1.575.953-.348-.576-.924-.953-1.575-.953Z"></path><path d="M15 2v5h5"></path></svg>
                        <span> {{ __("Carta de invitación") }} </span>
                    </div>
                </a>
            </li>
            @endcan

            @can('filemanager.index')
            <li class="menu {{ ($category_name === 'filemanager') ? 'active' : '' }}">
                <a href="{{route('filemanager.index')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 8v13H3V8"></path>
                            <path d="M1 3h22v5H1z"></path>
                            <path d="M10 12h4"></path>
                          </svg>
                        <span>{{ __("Archivos") }}</span>
                    </div>
                </a>
            </li>
            @endcan

            @can('specialcodes.index')
            <li class="menu {{ ($category_name === 'specialcodes') ? 'active' : '' }}">
                <a href="{{route('specialcodes.index')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>
                        <span>{{ __("Código Especial") }}</span>
                    </div>
                </a>
            </li>
            @endcan

            @can('coupons.index', 'beneficiarios_becas.index')
            <li class="menu">
                <a href="#datatables" data-bs-toggle="collapse" aria-expanded="{{ trim($category_name == 'beneficiarios_becas' || $category_name == 'coupons') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg width="46" height="46" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.296 9.015a3 3 0 1 0-.59 5.97 3 3 0 0 0 .59-5.97v0ZM19.518 12a7.238 7.238 0 0 1-.072.975l2.12 1.662a.507.507 0 0 1 .114.644l-2.005 3.469a.507.507 0 0 1-.615.215l-2.105-.847a.753.753 0 0 0-.711.082 7.703 7.703 0 0 1-1.01.588.747.747 0 0 0-.413.569l-.316 2.244a.519.519 0 0 1-.5.43h-4.01a.52.52 0 0 1-.501-.415l-.315-2.242a.753.753 0 0 0-.422-.573 7.278 7.278 0 0 1-1.006-.59.75.75 0 0 0-.708-.08l-2.105.848a.507.507 0 0 1-.616-.215L2.32 15.295a.506.506 0 0 1 .114-.644l1.792-1.406a.752.752 0 0 0 .28-.66 6.392 6.392 0 0 1 0-1.165.75.75 0 0 0-.284-.654L2.431 9.36a.507.507 0 0 1-.111-.641L4.325 5.25a.507.507 0 0 1 .616-.215l2.105.847a.755.755 0 0 0 .71-.082 7.71 7.71 0 0 1 1.01-.587.747.747 0 0 0 .414-.57L9.495 2.4a.52.52 0 0 1 .5-.43h4.01a.52.52 0 0 1 .502.416l.315 2.241a.753.753 0 0 0 .421.573c.351.17.687.366 1.006.59a.75.75 0 0 0 .709.08l2.104-.848a.507.507 0 0 1 .616.215l2.005 3.469a.506.506 0 0 1-.115.644l-1.791 1.406a.752.752 0 0 0-.284.66c.016.195.026.39.026.585Z"></path>
                        </svg>
                        <span>{{ __("Administración") }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled @if($category_name == 'beneficiarios_becas' || $category_name == 'coupons') show @else no @endif" id="datatables" data-bs-parent="#menudashboardaccordion">
                    @can('coupons.index')
                    <li class="{{ ($category_name === 'coupons') ? 'active' : '' }}">
                        <a href="{{route('coupons.index')}}"> {{ __("Cupones") }} </a>
                    </li>
                    @endcan
                    @can('beneficiarios_becas.index')
                    <li class="{{ ($category_name === 'beneficiarios_becas') ? 'active' : '' }}">
                        <a href="{{route('beneficiarios_becas.index')}}"> {{ __("Beneficiarios Becas") }} </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan


            {{-- <li class="menu {{ ($page_name === 'calendar') ? 'active' : '' }}">
                <a href="{{route('calendars.index')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <span>{{ __('Calendario') }}</span>
                        <span class="badge badge-primary sidebar-label"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle badge-icon"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg> {{__('New')}}</span>
                    </div>
                </a>
            </li> --}}

            {{-- <li class="menu {{ ($page_name === 'notes') ? 'active' : '' }}">
                <a href="{{route('notes.index')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        <span>{{ __("Notas") }}</span>
                    </div>
                </a>
            </li> --}}

        </ul>
    </nav>

</div>
