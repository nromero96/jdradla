<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UploadController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\HotelReservationController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ExhibitorController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\SpecialCodeController;


use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\CountryStateController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProgramSessionController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\GafeteController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\FileManagerController;


use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

//register
Route::get('/register', function () {
    return view('auth.register');
});

//password recovery
Route::get('/password-recovery', function () {
    return view('auth.passwords.email');
});

//Programs
Route::get('programa-preliminar', [ProgramController::class, 'showOnlinePrograms'])->name('onlineprograms.preliminary');
Route::get('programa-general', [ProgramController::class, 'showOnlinePrograms'])->name('onlineprograms');
//get sessions by id
Route::get('online-get-sessions/{id}', [ProgramSessionController::class, 'getSessionById'])->name('getsessions');

Route::get('/online-form-invitations', [InvitationController::class, 'showOnlineForm_invitations'])->name('onlineforminvitations');
Route::post('/send-invitation', [InvitationController::class, 'sendInvitation'])->name('invitationsend');

Route::get('getcountry', [App\Http\Controllers\CountryStateController::class, 'getcountry'])->name('getcountry');

Route::post('upload',[UploadController::class, 'store']);
Route::delete('delete-file', [UploadController::class, 'deleteFile']);

Route::get('online-file-upload', [FileManagerController::class, 'viewOnlineRegisterFile'])->name('filemanager.onlineupload');
Route::post('verificar-clave-pagina', [FileManagerController::class, 'verificarClave'])->name('verificar-clave-pagina');

Route::post('store-online-register-file', [FileManagerController::class, 'storeOnlineRegisterFile'])->name('filemanager.storeonlinefile');

//Search Online Posters
Route::get('online-search-posters', [PosterController::class, 'searchPostersPage'])->name('searchPostersPage');

//routes for user login
Route::group(['middleware' => ['auth', 'check.inscription','ensureStatusActive']], function () {

    //Ejecutar migración
    Route::get('/ejecutar-migraciones', function () {
        Artisan::call('migrate');
        return 'Migraciones ejecutadas con éxito.';
    });

    //Optimize
    Route::get('/optimize', function () {
        Artisan::call('optimize');
        return 'Optimizado.';
    });

    //Cache todo
    Route::get('/cache-todo', function () {
        Artisan::call('optimize');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        // Artisan::call('livewire:discover');
        return 'Cache todo.';
    });

    //storage link
    Route::get('/storage-link', function () {
        Artisan::call('storage:link');
        return 'Storage link creado correctamente en cpanel.';
    });

    //Search Online Posters
    Route::get('online-search-posters', [PosterController::class, 'searchPostersPage'])->name('searchPostersPage');

    // $this->middleware
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/my-profile', [App\Http\Controllers\UserController::class, 'myprofile'])->name('users.myprofile');
    Route::post('/update-my-profile', [App\Http\Controllers\UserController::class, 'updatemyprofile'])->name('users.updatemyprofile');

    //Users
    Route::resource('users', UserController::class)->names('users');

    //Roles
    Route::resource('roles', RoleController::class)->names('roles');

    //Programs
    Route::resource('programs', ProgramController::class)->names('programs');
    Route::resource('programsessions', ProgramSessionController::class)->names('programsessions');
    Route::post('program_sendmail-exhibitor/{id}', [ProgramController::class, 'sendMailExhibitor'])->name('programs.sendmailexhibitor');

    //Inscriptions
    Route::resource('inscriptions', InscriptionController::class)->names('inscriptions');
    Route::get('inscriptions-accompanists', [InscriptionController::class, 'indexAccompanists'])->name('inscriptions.accompanists');
    Route::put('inscriptions/{id}/update-status', [InscriptionController::class, 'updateStatus'])->name('inscriptions.updatestatus');
    Route::get('inscriptions-rejects', [InscriptionController::class, 'indexRejects'])->name('inscriptions.rejects');
    Route::post('/inscriptions-request-comprobante/{id}', [InscriptionController::class, 'requestComprobante'])->name('inscriptions.requestcomprobante');
    Route::get('/exportar-excel-inscriptions', [InscriptionController::class, 'exportExcelInscriptions'])->name('inscriptions.exportexcel');


    Route::get('/my-inscription', [InscriptionController::class, 'registerMyInscription'])->name('inscriptions.myinscription');
    Route::post('/store-my-inscription', [InscriptionController::class, 'storeMyInscription'])->name('inscriptions.storemyinscription');

    Route::get('/manual-registration-participant', [InscriptionController::class, 'formManualRegistrationParticipant'])->name('inscriptions.manualregistrationparticipant');
    Route::post('/store-manual-registration-participant', [InscriptionController::class, 'storeManualRegistrationParticipant'])->name('inscriptions.storemanualregistrationparticipant');

    Route::get('payment-niubiz/{inscription}', [InscriptionController::class, 'paymentNiubiz'])->name('inscriptions.paymentniubiz');
    Route::post('confirm-payment-niubiz', [InscriptionController::class, 'confirmPaymentNiubiz'])->name('inscriptions.confirmpaymentniubiz');

    //HotelReservations
    Route::resource('hotelreservations', HotelReservationController::class)->names('hotelreservations');

    //Works
    Route::resource('works', WorkController::class)->names('works');
    Route::delete('/delete-file/{workId}/{fileNumber}', [WorkController::class, 'deleteFile'])->name('works.deletefile');
    Route::get('works-rejects', [WorkController::class, 'indexRejects'])->name('works.rejects');
    Route::put('works/{id}/update-status', [WorkController::class, 'updateStatus'])->name('works.updatestatus');
    Route::get('/exportar-excel-works', [WorkController::class, 'exportExcelWorks'])->name('works.exportexcel');
    Route::put('sendmail-workaccepted/{id}', [WorkController::class, 'sendMailWorkAccepted'])->name('works.sendmailworkaccepted');

    //Posters
    Route::resource('posters', PosterController::class)->names('posters');
    //poster.upload
    Route::post('/upload-poster-file', [PosterController::class, 'uploadPosterFile'])->name('posters.uploadfile');
    Route::delete('/delete-poster-file/{posterId}/', [PosterController::class, 'deletePosterFile'])->name('posters.deletefile');
    Route::put('/confirm-poster-file/{posterId}/', [PosterController::class, 'confirmPosterFile'])->name('posters.confirmfile');


    //ExhibitorsController
    Route::resource('exhibitors', ExhibitorController::class)->names('exhibitors');

    //SpecialCodes
    Route::resource('specialcodes', SpecialCodeController::class)->names('specialcodes');
    Route::post('validate-specialcode', [SpecialCodeController::class, 'validateSpecialCode'])->name('specialcodes.validatespecialcode');

    //Invitations
    Route::resource('invitations', InvitationController::class)->names('invitations');


    //::::Administracio::::://
    //coupons
    Route::resource('coupons', CouponController::class)->names('coupons');
    Route::get('couponmails-listmails/{id}', [CouponController::class, 'couponmailsllist'])->name('couponmails.listmails');
    Route::post('couponmails-storemail', [CouponController::class, 'storemail'])->name('couponmails.storemail');
    Route::delete('couponmails-destroymail/{id}', [CouponController::class, 'destroymail'])->name('couponmails.destroymail');
    Route::post('/couponmails-masivestoremail', [CouponController::class, 'masivestoremail'])->name('couponmails.masivestoremail');


    //Beneficiarios de becas
    Route::get('beneficiarios-becas', [App\Http\Controllers\BeneficiarioBecaController::class, 'index'])->name('beneficiarios_becas.index');
    Route::post('beneficiarios-becas-store', [App\Http\Controllers\BeneficiarioBecaController::class, 'store'])->name('beneficiarios_becas.store');
    Route::delete('beneficiarios-becas-delete/{id}', [App\Http\Controllers\BeneficiarioBecaController::class, 'destroy'])->name('beneficiarios_becas.destroy');

    //Gafete
    Route::get('gafetes', [GafeteController::class, 'index'])->name('gafetes.index');
    Route::get('gafete-for-participant/{id}', [GafeteController::class, 'gafeteForParticipant'])->name('gafetes.gafeteforparticipant');
    Route::get('gafete-for-accompanist/{id}', [GafeteController::class, 'gafeteForAccompanist'])->name('gafetes.gafeteforaccompanist');

    //exportar gafetes
    Route::get('exportar-gafetes', [GafeteController::class, 'exportListaBusquedaPdf'])->name('gafetes.exportpdf');


    //marcar asistencia/entrega de gafete
    Route::get('register-assit-partic/{id}', [GafeteController::class, 'registerAssitPartic'])->name('gafetes.registerassitpartic');
    Route::get('register-assit-accomp/{id}', [GafeteController::class, 'registerAssitAccomp'])->name('gafetes.registerassitaccomp');


    Route::get('calendar', [CalendarController::class, 'index'])->name('calendars.index');
    Route::get('calendar-listevents', [CalendarController::class, 'listevents'])->name('calendars.listevents');
    Route::post('calendar-ajax', [CalendarController::class, 'calendarajax'])->name('calendars.calendarajax');

    Route::get('notes', [NoteController::class,'index'])->name('notes.index');
    Route::post('store-notes', [NoteController::class,'store'])->name('notes.store');

    Route::get('changefavourite-note', [NoteController::class, 'changeFavourite'])->name('notes.changefavourite');
    Route::get('changetag-note', [NoteController::class, 'changeTag'])->name('notes.changetag');
    Route::get('destroy-note', [NoteController::class, 'destroy'])->name('notes.destroy');

    //certificados
    Route::get('my-certicate/{id}', [CertificadoController::class, 'my_certicate'])->name('certificates.mycertificate');
    Route::get('certicate-for', [CertificadoController::class, 'certicate_for'])->name('certificates.certificatefor');
    Route::get('list-certicates', [CertificadoController::class, 'list_certicates'])->name('certificates.listcertificates');

    //File Manager
    Route::get('file-manager', [FileManagerController::class, 'index'])->name('filemanager.index');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');



//Localization Route
Route::get("locale/{lange}", [LocalizationController::class,'setLang']);

