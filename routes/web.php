<?php

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
use Illuminate\Support\Facades\Route;




Route::get('/', 'HomeController@index')->name('index');

//Auth::routes();
Route::get('/login/{service_code?}', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@store');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/signup', 'Auth\SignupController@signup')->name('auth.signup');
Route::post('/signup_create', 'Auth\Signupcontroller@create')->name('auth.signup.create');



Route::group(['middleware' => 'auth'], function () {

    //////////// ajax calls /////////////////
    Route::post('get_budgets_per_agency', ['as' => 'get_budgets_per_agency', 'uses' => 'AjaxRequestController@getBudgetsPerAgency']);
    Route::post('load_agence_bydget_year', ['as' => 'load_agence_bydget_year', 'uses' => 'AjaxRequestController@getBudgetYear']);

    /////////// end ajax calls //////////////


    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/agencies', 'Setup\AgencyController');
    Route::resource('/budget_item_categories', 'Setup\BudgetItemCategoryController');
    Route::resource('/budget_items', 'Setup\BudgetItemController');
    Route::get('/budget_items_/{id}', 'Setup\BudgetItemController@edit')->name('budget_items.edit');
    Route::resource('/users', 'Setup\UserController');
    Route::get('/view_mdas', 'Setup\UserController@showmda')->name('mda.showmda');
    Route::resource('/approval_users', 'Setup\ApprovalUserController');
    Route::resource('/budgets', 'Setup\BudgetController');
    Route::get('/budgets_view_uploaded_budget', 'Setup\BudgetController@view')->name('budgets.view');
    Route::resource('/budget_implementation', 'Setup\BudgetImplementationController');
    Route::resource('/budget_plan', 'Setup\BudgetPlanController');
    Route::resource('/approve_budgets', 'Approval\ApproveBudgetController');


    Route::resource('revenue_streams', 'Setup\RevenuestreamController');
    Route::resource('individual_registration', 'Registration\IndividualRegistrationController');
    Route::resource('company_registration', 'Registration\CompanyRegistrationController');
    Route::resource('payment_report', 'Report\PaymentReportController');
    Route::get('general_business_report', 'Report\PaymentReportController@general_business_report')->name('general_business_report');
    Route::get('/approve_client', 'Approval\ApproveClientController@approveclient')->name('approve.client');

    Route::get('/enable_budget/{budget_plan_id}', 'Setup\BudgetPlanController@Enableplan')->name('budget.enableplan');
    Route::get('/minute_upload', 'Setup\AgencyController@upload')->name('Agency.upload');



    //////////// procurement /////////////////

    Route::get('/procurement_officer', 'Procurement\ProcurementOfficerController@index')->name('procurement.officer');
    Route::get('/chairman_bureau_procurement', 'Procurement\ChairmanController@index')->name('chairman.bureau');
    Route::post('/goods_create', 'Procurement\ProcurementOfficerController@creategoods')->name('procurement.creategoods');
    Route::get('/procurement/edit_goods/{plan_id}', 'Procurement\ProcurementOfficerController@editGoods')->name('procurement.editGoods');
    Route::put('/procurement/view_plan/{plan_id}', 'Procurement\ProcurementOfficerController@updateGoods')->name('procurement.updateGoods');

    Route::get('/goods_plan', 'Procurement\ProcurementOfficerController@showgoods')->name('procurement.showgoods');
    Route::get('/goods_plan_form', 'Procurement\ProcurementOfficerController@showgoodsform')->name('procurement.showgoods.form');
    Route::get('/view_plan', 'Procurement\ProcurementOfficerController@viewplan')->name('procurement.viewplan');
    Route::get('/works_create', 'Procurement\ProcurementOfficerController@createworks')->name('procurement.createworks');
    Route::get('/service_create', 'Procurement\ProcurementOfficerController@createservice')->name('procurement.createservice');
    Route::get('/uploads', 'Procurement\ProcurementOfficerController@uploadtender')->name('procurement.uploads');
    Route::get('/upload_document', 'Procurement\ProcurementOfficerController@uploads')->name('procurement.upload_documents');
    Route::get('/display_plan/{plan_id}', 'Procurement\ProcurementOfficerController@displayplan')->name('procurement.displayplan');
    Route::get('/delete_goods/{plan_id}', 'Procurement\ProcurementOfficerController@deleteGoods')->name('procurement.deleteGoods');


    /////////// end procurement //////////////

    // CONTRACTORS
    Route::get('/contractor_dashboard', 'Procurement\ContractorController@index')->name('procurement.dashboard');
    Route::get('/contractor_dashboard', 'Procurement\ContractorController@index')->name('procurement.dashboard');
    Route::get('/complete_setup', 'Procurement\ContractorController@setup')->name('contractor.setup');
    Route::post('/create', 'Procurement\ContractorController@companysetup')->name('contractor.companysetup');
    Route::get('/upload_documents', 'Procurement\ContractorController@upload')->name('contractor.uploads');
    Route::post('/upload_cac', 'Procurement\ContractorController@uploadcac')->name('contractor.uploadcac');



    // Director's Route
    Route::get('/find_plan_status', 'Procurement\DirectorController@findplan')->name('Director.findplan');
    Route::get('/procurement_plans', 'Procurement\DirectorController@countPlan')->name('Director.countPlan');
    Route::get('/approve_plan/{plan_id}', 'Procurement\DirectorController@approvePlan')->name('Director.approveplan');
    Route::get('/approve_fund_request/{request_id}', 'Procurement\DirectorController@approverequest')->name('Director.approverequest');
    Route::get('/reject_plan/{plan_id}', 'Procurement\DirectorController@rejectPlan')->name('Director.rejectplan');
    Route::get('/request', 'Procurement\DirectorController@request')->name('Director.request');
    Route::post('/storerequest', 'Procurement\DirectorController@storerequest')->name('Director.storerequest');
    Route::get('/show_imprest', 'Procurement\DirectorController@imprestShow')->name('Director.showimprest');
    Route::post('/pay_imprest', 'Procurement\DirectorController@imprestPay')->name('Director.payimprest');
    Route::get('/send_bulk_payments/{paymentApproval}/{batchName}/{source_account}', 'Procurement\DirectorController@sendbulkpayment')->name('Director.Payment');

// approval from commissioner of finance.
Route::get('/approval_fund_request', 'Procurement\DirectorController@fundrequest')->name('Director.fundrequest');


    //Dropdowns
    Route::get('/dropdown/product_title/{refNo}', 'DropdownController@getProjectTitle')->name('dropdown.product_title');





});