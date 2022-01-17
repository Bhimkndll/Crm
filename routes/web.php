<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PurposeController;
use App\Http\Controllers\TaskassignController;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TicketController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::group(['prefix' => 'admin'], function () {
});

Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
Route::get('/tabs', [App\Http\Controllers\AdminController::class, 'tabs'])->name('tabs');
/*Route::post('/add/client', [AdminController::class, 'add'])->name('add.client');
*/Route::post('/register', [ App\Http\Controllers\Auth\RegisterController::class,'register'])->name('user.register');

/*users */
Route::get('/users/show', [AdminController::class, 'users'])->name('users.show');

Route::get('/users/edit/{id}', [AdminController::class, 'user_edit'])->name('user.edit');
Route::get('/users/delete/{id}', [AdminController::class, 'user_delete'])->name('user.delete');
Route::post('/users/update/{id}', [AdminController::class, 'user_update'])->name('user.update');
/*end for users*/

/*department*/
Route::get('/department/show', [DepartmentController::class, 'show'])->name('department.show');
Route::post('/department/add', [DepartmentController::class, 'add'])->name('department.add');

Route::get('/department/edit/{id}', [DepartmentController::class, 'department_edit'])->name('department.edit');
Route::get('/department/delete/{id}', [DepartmentController::class, 'department_delete'])->name('department.delete');
Route::post('/department/update/{id}', [DepartmentController::class, 'department_update'])->name('department.update');

/*end for deparment*/


/* starting for client*/
Route::get('/client/show', [ClientController::class, 'show'])->name('client.show');
Route::post('/client/add', [ClientController::class, 'add'])->name('client.add');
Route::post('/client/register', [ClientController::class, 'add'])->name('client.register');

Route::get('/client/edit/{id}', [ClientController::class, 'client_edit'])->name('client.edit');
Route::get('/client/delete/{id}', [ClientController::class, 'client_delete'])->name('client.delete');
Route::post('/client/update/{id}', [ClientController::class, 'client_update'])->name('client.update');

/* end for client controller*/

/*purpose*/
/*
Route::post('/client/purpose/{id}', [PurposeController::class, 'add'])->name('client.purpose.add');

*/


/*stating for purpose*/

Route::get('/purpose/show', [PurposeController::class, 'show'])->name('purpose.show');
Route::post('/purpose/add', [PurposeController::class, 'add'])->name('purpose.add');

Route::get('/purpose/edit/{id}', [PurposeController::class, 'purpose_edit'])->name('purpose.edit');
Route::get('/purpose/delete/{id}', [PurposeController::class, 'purpose_delete'])->name('purpose.delete');
Route::post('/purpose/update/{id}', [PurposeController::class, 'purpose_update'])->name('purpose.update');
/*ending for purpose*/

/*task assign */

Route::get('/task/assign/{id}', [TaskassignController::class, 'show'])->name('task.assign');
Route::post('/task/add/{id}', [TaskassignController::class, 'add'])->name('task.add');
/*end for tsk assign*/


/*Task show overall for admin*/

Route::get('/task/assign/{id}', [TaskassignController::class, 'show'])->name('task.assign');
Route::get('/task/show', [TaskController::class, 'show'])->name('task.show');

/*mytask*/
Route::get('/mytask', [TaskController::class, 'mytask'])->name('mytask');
Route::get('/mytask/completed/{id}', [TaskController::class, 'complete'])->name('mytask.completed');
Route::get('/mytask/cancelled/{id}', [TaskController::class, 'cancel'])->name('mytask.cancelled');

Route::get('/mytask/processing/{id}', [TaskController::class, 'processing'])->name('mytask.processing');

Route::get('/mytask/pending/{id}', [TaskController::class, 'pending'])->name('mytask.pending');

/*end of my task*/

/*Route::get('/task/pending/{id}', [TaskController::class, 'all'])->name('task.pending');
Route::get('/task/process/{id}', [TaskController::class, 'all'])->name('task.process');
Route::get('/task/all/{id}', [TaskController::class, 'all'])->name('task.alls');
Route::get('/task/{id}', [TaskController::class, 'all'])->name('all.task');*/

/*to cancel or complete*/
/*Route::get('/task/{id}', [TaskController::class, 'all'])->name('task.cancel');
*/Route::get('/task/compeleted/{id}', [TaskController::class, 'complete'])->name('task.completed');
Route::get('/task/{id}', [TaskController::class, 'all'])->name('task.cancel');
/*end for my task action */




Route::get('/task/{id}', [TaskController::class, 'all'])->name('task.all');


/*ticket related activities*/

Route::get('/ticket', [TicketController::class, 'ticket_confirm'])->name('ticket');
Route::get('/client/ticket', [TicketController::class, 'client_show'])->name('client.ticket.show');

Route::get('/ticket/select', [TicketController::class, 'show'])->name('ticket.select');



Route::get('client/ticket/select/{id}', [TicketController::class, 'ticket_select'])->name('ticket.book');
/*select for data*/

Route::post('/ticket/select', [TicketController::class, 'booking'])->name('ticket.add');


Route::post('/ticket/booking/{id}', [TicketController::class, 'ticket_booking'])->name('ticket.booking');


/*end of ticket activities */


/*ticket booking confirm*/

Route::get('ticket/confirm', [TicketController::class, 'ticket_confirm'])->name('ticket.confirm');


/*ticket confirm */
Route::get('ticket/confirm/update/{id}', [TicketController::class, 'ticket_update'])->name('ticket.confirm.update');

Route::get('ticket/confirm/delete/{id}', [TicketController::class, 'ticket_delete'])->name('ticket.confirm.delete');


Route::get('ticket/booking/update/{id}', [TicketController::class, 'ticket_save'])->name('ticket.booking.update');


Route::get('ticket/fill', [TicketController::class, 'index'])->name('ticket.fill');

Route::get('client/detail/{id}', [ClientController::class, 'detail'])->name('client.detail');
