
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Destination\DashboardController;
use App\Http\Controllers\Destination\RegistrationController;
use App\Http\Controllers\CustomAuth\RegisterController;
use App\Http\Controllers\CustomAuth\LoginController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('about','Destination\TestController@about');






Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    
    Route::get('/', 'Auth\LoginController@home_page')->name('home_page');


    Route::get('/login/{role}', 'Auth\LoginController@showLoginForm')->name('login_role');

    Route::get('destination-register',[RegisterController::class, 'destination_register'])->name('destination_register');
    Route::post('destination-register-save',[RegisterController::class, 'destination_register_save'])->name('destination_register_save');
    Route::get('check-user-email',[RegisterController::class, 'checkUserEmail'])->name('checkUserEmail');
    
    Route::get('pioneer-register',[RegisterController::class, 'pioneer_register'])->name('pioneer_register');
    Route::post('pioneer-register-save',[RegisterController::class, 'pioneer_register_save'])->name('pioneer_register_save');

    //Route::get('/password', 'CustomAuth\LoginController@submitForgetPasswordForm')->name('s');
   
   Route::get('email-verify/{token}','CustomAuth\EmailVerificationController@email_verify')->name('email_verify');

Route::group(['middleware' => ['DestinationRegisterCheck'],'prefix' => 'destination'], function () {
    Route::get('register-step1',[RegistrationController::class, 'register_step1'])->name('destination.register.step1');
    Route::post('register-step1-save',[RegistrationController::class, 'register_step1_save'])->name('destination.register.step1.save');
    
    Route::get('register-step2',[RegistrationController::class, 'register_step2'])->name('destination.register.step2');
    Route::post('register-step2-save',[RegistrationController::class, 'register_step2_save'])->name('destination.register.step2.save');

    Route::get('register-step3',[RegistrationController::class, 'register_step3'])->name('destination.register.step3');
    Route::post('register-step3-save',[RegistrationController::class, 'register_step3_save'])->name('destination.register.step3.save');
 });   

Route::group(['middleware' => ['PioneerRegisterCheck'],'prefix' => 'pioneer'], function () {
    Route::get('register-step1','Pioneer\RegistrationController@register_step1')->name('pioneer.register.step1');
    Route::post('register-step1-save','Pioneer\RegistrationController@register_step1_save')->name('pioneer.register.step1.save');

    Route::get('register-step2','Pioneer\RegistrationController@register_step2')->name('pioneer.register.step2');
    Route::post('register-step2-save','Pioneer\RegistrationController@register_step2_save')->name('pioneer.register.step2.save');

    Route::get('register-step3','Pioneer\RegistrationController@register_step3')->name('pioneer.register.step3');
    Route::post('register-step3-save','Pioneer\RegistrationController@register_step3_save')->name('pioneer.register.step3.save');
});

Route::group(['middleware' => ['Destination'],'prefix' => 'destination'], function () {
   




    /*Route::get('about','Destination\TestController@about')->name('destination.about');
    Route::get('account','Destination\TestController@account')->name('destination.account');
    Route::get('bankdetail','Destination\TestController@bankdetail')->name('destination.bankdetail');
    Route::get('change-password','Destination\TestController@changepassword')->name('destination.changepassword');
    Route::get('terms','Destination\TestController@terms')->name('destination.terms');*/







    Route::get('home',[DashboardController::class, 'home'])->name('destination.home');
    Route::get('job-list',[DashboardController::class, 'list'])->name('destination.job.list');

    Route::get('notification',[DashboardController::class, 'notification'])->name('destination.notification');
    Route::get('notification-count',[DashboardController::class, 'notification_count'])->name('destination.notification.count');


    //Route::get('job-history','Destination\JobController@job_history')->name('destination.job.history');
    
    
    
    //Route::get('on-going-job/{id}','Destination\JobController@on_going_job_detail')->name('destination.on-going-job-detail');
    Route::post('job-close-status/{id}','Destination\JobController@job_close_status')->name('destination.job.close.status');
    
    Route::get('job-applicant/{id}','Destination\JobController@job_applicant')->name('destination.job.applicant');
    Route::post('initialize-chat','Destination\JobController@initialize_chat')->name('destination.job.applicant.initialize.chat');
    Route::get('proposal/{job_id}/{applicant_id}','Destination\JobController@proposal')->name('destination.proposal');
    Route::get('jobs','Destination\JobController@jobs')->name('destination.jobs');
    
    Route::get('open-jobs','Destination\JobController@open_jobs')->name('destination.open.jobs');
    Route::get('open-job-detail/{id}','Destination\JobController@open_job_detail')->name('destination.open.job.detail');
    Route::get('hire-jobs','Destination\JobController@hire_jobs')->name('destination.hire.jobs');
    Route::get('hire-job-detail/{id}','Destination\JobController@hire_job_detail')->name('destination.hire.job.detail');
    Route::get('closed-jobs','Destination\JobController@closed_jobs')->name('destination.closed.jobs');
    Route::get('job-closed-detail/{id}','Destination\JobController@closed_job_detail')->name('destination.job.closed.detail');

    Route::get('job-spending-detail/{id}','Destination\JobController@job_spending_detail')->name('destination.job.spending.detail');

    Route::get('setting','Destination\SettingController@setting')->name('destination.setting');
    Route::get('about','Destination\SettingController@about')->name('destination.about');
    Route::get('terms','Destination\SettingController@terms')->name('destination.terms');
    Route::post('setting-password-change','Destination\SettingController@setting_password_change')->name('destination.setting.password.change');
    Route::post('setting-profile-update','Destination\SettingController@profile_update')->name('destination.setting.profile.update');
    Route::post('setting-bank-details','Destination\SettingController@bank_details')->name('destination.setting.bank.details');
    Route::post('setting-payment-details','Destination\SettingController@payment_details')->name('destination.setting.payment.details');

    Route::post('logo-update','Destination\SettingController@logo_update')->name('destination.setting.logo.update');
    Route::post('certificate1-update','Destination\SettingController@certificate1_update')->name('destination.setting.certificate1.update');
    Route::post('certificate2-update','Destination\SettingController@certificate2_update')->name('destination.setting.certificate2.update');
    Route::post('certificate3-update','Destination\SettingController@certificate3_update')->name('destination.setting.certificate3.update');
    Route::post('certificate4-update','Destination\SettingController@certificate4_update')->name('destination.setting.certificate4.update');
    Route::post('setting-profile-update','Destination\SettingController@profile_update')->name('destination.setting.profile.update');
    Route::post('setting-profile-update','Destination\SettingController@profile_update')->name('destination.setting.profile.update');

    Route::post('setting-image-remove','Destination\SettingController@image_remove')->name('destination.setting.image.remove');
    
    Route::get('create-job','Destination\JobController@create_job')->name('destination.create.job');
    Route::post('save-job','Destination\JobController@save_job')->name('destination.save.job');    

    Route::get('chat','Destination\ChatController@chat')->name('destination.chat');
    Route::get('chat/{job_id}/{user_id}','Destination\ChatController@chat')->name('destination.chat.param');
    Route::get('chat-message/{job_id}/{user_id}','Destination\ChatController@chat_message')->name('destination.chat.message.param');
    Route::get('chat-message','Destination\ChatController@chat_message')->name('destination.chat.message');
    Route::get('chat-user-list','Destination\ChatController@user_list')->name('destination.chat.user.list');
    Route::post('chat-save','Destination\ChatController@chat_save')->name('destination.chat.save');
    Route::get('chat-html','Destination\ChatController@chat_html')->name('destination.chat.html');
    Route::get('chat-count','Destination\ChatController@chat_count')->name('destination.chat.count');
    Route::post('hire-applicant-job','Destination\ChatController@hire_applicant_job')->name('destination.hire.applicant.job');

    Route::post('rating-pioneer-job/{id}','Destination\JobController@rating_pioneer_job')->name('destination.rating.pioneer.job');

    Route::get('invoices','Destination\InvoiceController@invoices')->name('destination.invoices');
    Route::get('invoice-list','Destination\InvoiceController@invoice_list')->name('destination.invoices.list');
});


Route::group(['middleware' => ['Pioneer'],'prefix' => 'pioneer'], function () {   

        /*Route::get('about1','Pioneer\TestController@about');
    Route::get('account1','Pioneer\TestController@account');
    Route::get('bankdetail1','Pioneer\TestController@bankdetail');
    Route::get('changepassword1','Pioneer\TestController@changepassword');
    Route::get('terms1','Pioneer\TestController@terms');*/


    
    Route::get('home','Pioneer\DashboardController@home')->name('pioneer.home');
    Route::get('job-list','Pioneer\DashboardController@list')->name('pioneer.job.list');

    Route::get('apply-job/{id}','Pioneer\JobController@apply_job')->name('pioneer.apply.job');
    Route::get('proposal-submit/{id}','Pioneer\JobController@proposal_submit')->name('pioneer.proposal.submit');
    
    
    Route::get('jobs','Pioneer\DashboardController@jobs')->name('pioneer.jobs');
    //Route::get('active-job','Pioneer\JobController@active_job')->name('pioneer.active.job');
    Route::get('proposal-jobs','Pioneer\JobController@proposal_jobs')->name('pioneer.proposal.jobs');
    Route::get('proposal-closed-jobs','Pioneer\JobController@proposal_closed_jobs')->name('pioneer.proposal.closed.jobs');
    Route::get('hire-job','Pioneer\JobController@hire_job')->name('pioneer.hire.job');
    Route::get('hire-job/{job_id}','Pioneer\JobController@hire_job_detail')->name('pioneer.hire.job.detail');
    Route::get('closed-job','Pioneer\JobController@closed_job')->name('pioneer.closed.job');
    Route::get('closed-job-detail/{id}','Pioneer\JobController@closed_job_detail')->name('pioneer.closed.job.detail');
    
    Route::post('rating-destination-job/{id}','Pioneer\JobController@rating_pioneer_job')->name('pioneer.rating.destination.job');

    Route::post('dispute-job/{id}','Pioneer\JobController@dispute_job')->name('pioneer.dispute.job');

    Route::get('invoices','Pioneer\InvoiceController@invoices')->name('pioneer.invoices');
    Route::get('invoice-list','Pioneer\InvoiceController@invoice_list')->name('pioneer.invoices.list');

    Route::get('notification','Pioneer\DashboardController@notification')->name('pioneer.notification');
    Route::get('notification-count','Pioneer\DashboardController@notification_count')->name('pioneer.notification.count');
    
    Route::get('setting','Pioneer\DashboardController@setting')->name('pioneer.setting');
    

    Route::get('setting','Pioneer\SettingController@setting')->name('pioneer.setting');
    Route::get('about','Pioneer\SettingController@about')->name('pioneer.about');
    Route::get('terms','Pioneer\SettingController@terms')->name('pioneer.terms');
    Route::post('setting-password-change','Pioneer\SettingController@setting_password_change')->name('pioneer.setting.password.change');

    Route::post('logo-update','Pioneer\SettingController@logo_update')->name('pioneer.setting.logo.update');
    Route::post('certificate1-update','Pioneer\SettingController@certificate1_update')->name('pioneer.setting.certificate1.update');
    Route::post('certificate2-update','Pioneer\SettingController@certificate2_update')->name('pioneer.setting.certificate2.update');
    Route::post('certificate3-update','Pioneer\SettingController@certificate3_update')->name('pioneer.setting.certificate3.update');
    Route::post('certificate4-update','Pioneer\SettingController@certificate4_update')->name('pioneer.setting.certificate4.update');
    Route::post('setting-image-remove','Pioneer\SettingController@image_remove')->name('pioneer.setting.image.remove');
    Route::post('setting-profile-update','Pioneer\SettingController@profile_update')->name('pioneer.setting.profile.update');
    Route::post('setting-bank-details','Pioneer\SettingController@bank_details')->name('pioneer.setting.bank.details');
    Route::post('setting-payment-details','Pioneer\SettingController@payment_details')->name('pioneer.setting.payment.details');


    Route::get('chat','Pioneer\ChatController@chat')->name('pioneer.chat');
    Route::get('chat/{job_id}/{user_id}','Pioneer\ChatController@chat')->name('pioneer.chat.param');
    //Route::get('chat-message/{job_id}/{user_id}','Pioneer\ChatController@chat_message')->name('pioneer.chat.message');
    Route::get('chat-message','Pioneer\ChatController@chat_message')->name('pioneer.chat.message');
    Route::get('chat-user-list','Pioneer\ChatController@user_list')->name('pioneer.chat.user.list');
    Route::post('chat-save','Pioneer\ChatController@chat_save')->name('pioneer.chat.save');
    Route::get('chat-html','Pioneer\ChatController@chat_html')->name('pioneer.chat.html');
    Route::get('chat-count','Pioneer\ChatController@chat_count')->name('pioneer.chat.count');
    Route::get('proposal/{job_id}','Pioneer\JobController@proposal')->name('pioneer.proposal');

    Route::get('create-invoice/{job_id}','Pioneer\InvoiceController@create')->name('pioneer.invoice.create');
    Route::post('create-save/{job_id}','Pioneer\InvoiceController@save')->name('pioneer.invoice.save');

});

Route::group(['middleware' => ['Admin'],'prefix' => 'admin'], function () {   
    Route::get('dashboard','Admin\DashboardController@dashboard')->name('admin.dashboard');
    Route::get('p-d-graph','Admin\DashboardController@p_d_graph')->name('admin.p.d.graph');
    Route::get('contract-graph','Admin\DashboardController@contract_graph')->name('admin.contract.graph');

    Route::get('notification','Admin\DashboardController@notification')->name('admin.notification');
    Route::get('notification-count','Admin\DashboardController@notification_count')->name('admin.notification.count');

    Route::get('pioneer','Admin\PioneerController@index')->name('admin.pioneer.index');
    Route::get('pioneer-list','Admin\PioneerController@list')->name('admin.pioneer.list');
    Route::post('pioneer-status','Admin\PioneerController@status')->name('admin.pioneer.status');
    Route::post('pioneer-verification','Admin\PioneerController@verification')->name('admin.pioneer.verification');
    Route::get('pioneer/{id}','Admin\PioneerController@edit')->name('admin.pioneer.edit');
    Route::post('pioneer-update/{id}','Admin\PioneerController@update')->name('admin.pioneer.update');
    Route::get('pioneer-view/{id}','Admin\PioneerController@view')->name('admin.pioneer.view');
    Route::get('pioneer-job/{user_id}','Admin\PioneerController@pioneer_job')->name('admin.pioneer.job');
    Route::get('pioneer-open-jobs/{user_id}','Admin\PioneerController@open_jobs')->name('admin.pioneer.open.jobs');
    Route::get('pioneer-open-job-detail/{job_id}/{user_id}','Admin\PioneerController@open_job_detail')->name('admin.pioneer.open.job.detail');
    Route::get('pioneer-closed-proposal-jobs/{user_id}','Admin\PioneerController@closed_proposal_jobs')->name('admin.pioneer.closed.proposal.jobs');
    Route::get('pioneer-closed-proposal-job-detail/{job_id}/{user_id}','Admin\PioneerController@closed_proposal_job_detail')->name('admin.pioneer.closed.proposal.job.detail');
    Route::get('pioneer-hire-job/{user_id}','Admin\PioneerController@hire_job')->name('admin.pioneer.hire.job');
    Route::get('pioneer-hire-job/{job_id}/{user_id}','Admin\PioneerController@hire_job_detail')->name('admin.pioneer.hire.job.detail');
    Route::get('pioneer-closed-job/{user_id}','Admin\PioneerController@closed_job')->name('admin.pioneer.closed.job');
    Route::get('pioneer-closed-job-detail/{job_id}/{user_id}','Admin\PioneerController@closed_job_detail')->name('admin.pioneer.closed.job.detail');
    

    Route::get('destination','Admin\DestinationController@index')->name('admin.destination.index');
    Route::get('destination-list','Admin\DestinationController@list')->name('admin.destination.list');
    Route::post('destination-status','Admin\DestinationController@status')->name('admin.destination.status');
    Route::post('destination-verification','Admin\DestinationController@verification')->name('admin.destination.verification');
    Route::get('destination/{id}','Admin\DestinationController@edit')->name('admin.destination.edit');
    Route::post('destination-update/{id}','Admin\DestinationController@update')->name('admin.destination.update');
    Route::get('destination-view/{id}','Admin\DestinationController@view')->name('admin.destination.view');
    Route::get('destination-job/{user_id}','Admin\DestinationController@destination_job')->name('admin.destination.job');
    Route::get('destination-open-jobs/{user_id}','Admin\DestinationController@open_jobs')->name('admin.destination.open.jobs');
    Route::get('destination-open-job-detail/{job_id}','Admin\DestinationController@open_job_detail')->name('admin.destination.open.job.detail');
    Route::get('destination-hire-jobs/{user_id}','Admin\DestinationController@hire_jobs')->name('admin.destination.hire.jobs');
    Route::get('destination-hire-job-detail/{user_id}','Admin\DestinationController@hire_job_detail')->name('admin.destination.hire.job.detail');
    
    Route::get('destination-closed-jobs/{user_id}','Admin\DestinationController@closed_jobs')->name('admin.destination.closed.jobs');
    Route::get('destination-closed-job-detail/{user_id}','Admin\DestinationController@closed_job_detail')->name('admin.destination.closed.job.detail');

    Route::get('contracts','Admin\ContractorController@index')->name('admin.contractor.index');
    Route::get('contract-list','Admin\ContractorController@list')->name('admin.contractor.list');
    Route::get('contract-invoice/{id}','Admin\ContractorController@invoice')->name('admin.contractor.invoice');
    Route::get('contract-escrow/{id}','Admin\ContractorController@escrow')->name('admin.contractor.escrow');
    Route::post('contract-escrow-status','Admin\ContractorController@escrow_status')->name('admin.contractor.escrow.status');
    Route::post('contract-invoice-pay/{id}','Admin\ContractorController@invoice_pay')->name('admin.contractor.invoice.pay');

    Route::get('cms','Admin\CmsController@index')->name('admin.cms.index');
    Route::get('cms-edit/{id}','Admin\CmsController@edit')->name('admin.cms.edit');
    Route::post('cms-update/{id}','Admin\CmsController@update')->name('admin.cms.update');
});    

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
