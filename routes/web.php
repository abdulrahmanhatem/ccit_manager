<?php

use Illuminate\Support\Facades\Route;
use App\Invoice;
use App\Http\Controllers\VisitorController;

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
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('dump-autoload');
    return "Cleared!";
 });
 
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/quotation', 'VisitorController@quotation');
Route::get('/ar/quotation', 'VisitorController@quotation_ar');
Route::get('/jobs', 'VisitorController@jobs');



// Route::group(['middleware' => ['team']], function(){

//     //Search Routes
//     Route::resource('/', 'ProjectController', ['only' => ['index', 'destroy', 'store', 'update', 'show']]);
//     Route::get('/customers/search', 'CustomerController@search');
//     Route::get('/projects/search', 'ProjectController@search');
//     Route::get('tasks/search', 'TaskController@search');

//     // Resources Routes
//     Route::resource('notes', 'NoteController', ['only' => ['index', 'destroy', 'store', 'update']]);
//     Route::resource('projects', 'ProjectController', ['only' => ['index', 'destroy', 'store', 'update', 'show']]);
//     Route::post('tasks', 'TaskController@store');
//     Route::put('tasks/{task}', 'TaskController@update');
//     Route::get('tasks/{id}', 'TaskController@show');
//     Route::resource('customers', 'CustomerController', ['only' => ['show']]);
    
// });

// Route::group(['middleware' => ['auth']], function(){
//         // Resources Routes
//         Route::resource('customers', 'CustomerController', ['only' => ['show']]);
//         Route::resource('projects', 'ProjectController', ['only' => [ 'show']]);
//         Route::resource('/', 'CustomerController', ['only' => ['show']]);  

// });

Route::group(['middleware' => ['auth']], function(){

    //Main Route 
    Route::get('/', 'DashboardController@index');

    

    Route::get('/invoices/download/{id}', function($id){
        
        $invoice = Invoice::findOrfail($id);
        $data = array(
            'invoice' => $invoice
        );
        $pdf = PDF::loadView('invoices.show', $data);
        return $pdf->download('invoice.pdf');
    });
    

    
    
    Route::get('payment/checkout/{amount}', 'paymentController@checkout_id');
    Route::get('/projects/{id}/tasks', 'TaskController@project_tasks');
    Route::get('tasks/marked', 'TaskController@marked');
    Route::get('tasks/trash', 'TaskController@trash');
    Route::get('tasks/status/{status}', 'TaskController@status');

    //Search Routes
    Route::get('/quotations/search', 'QuoteController@search');
    Route::get('/customers/search', 'CustomerController@search');
    Route::get('/admins/search', 'AdminController@search');
    Route::get('/projects/search', 'ProjectController@search');
    Route::get('team/search', 'TeamMemberController@search');
    Route::get('tasks/search', 'TaskController@search');
    Route::get('tickets/search', 'TicketController@search');
    Route::get('/technolgies/search', 'TechnologyController@search');
    Route::get('/services/search', 'ServiceController@search');


    // Resources Routes
    Route::resource('technologies', 'TechnologyController', ['only' => ['index', 'destroy', 'store', 'update']]);
    Route::resource('comments', 'CommentController', ['only' => ['index', 'destroy', 'store', 'update']]);
    Route::resource('notes', 'NoteController', ['only' => ['index', 'destroy', 'store', 'update']]);
    Route::resource('tickets', 'TicketController', ['only' => ['index', 'destroy', 'store', 'update', 'show']]);
    Route::resource('services', 'ServiceController', ['only' => ['index', 'destroy', 'store', 'update']]);
    Route::resource('settings', 'SettingController', ['only' => ['index', 'update']]);
    Route::resource('customers', 'CustomerController', ['only' => ['index', 'store', 'update', 'show']]);
    Route::resource('admins', 'AdminController', ['only' => ['index', 'store', 'update']]);
    Route::resource('projects', 'ProjectController', ['only' => ['index', 'destroy', 'store', 'update', 'show']]);
    Route::resource('tasks', 'TaskController', ['only' => ['index', 'store', 'update', 'show']]);
    Route::resource('team/categories', 'TeamCategoryController', ['only' => ['index', 'destroy', 'store', 'update']]);
    Route::resource('team', 'TeamMemberController', ['only' => ['index', 'destroy', 'store', 'update', 'show']]);
    Route::resource('proposals', 'ProposalController', ['only' => ['index', 'store', 'update']]);
    Route::resource('invoices', 'InvoiceController', ['only' => ['index', 'store', 'update']]);
    Route::resource('contracts', 'ContractController', ['only' => ['index', 'store', 'update']]); 
    
});

Route::resource('messages', 'MessegeController', ['only' => ['index', 'destroy', 'store', 'update', 'show']]);
Route::resource('quotations', 'QuoteController');
// Route::get('inbox', 'ChatsController@index');
// Route::get('messages', 'ChatsController@fetchMessages');
// Route::post('messages', 'ChatsController@sendMessage');

Route::fallback(function () {
    return redirect()->back();
});
// Route::get('/home', 'HomeController@index')->name('home');

