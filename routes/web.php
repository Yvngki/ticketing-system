<?php

use App\Http\Controllers\TicketController;
    use App\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin-home');
// Route::get('/admin/home', [TicketsController::class, 'adminHome'])->name('admin-home');
// Route::get('/admin/home', [TicketsController::class, 'index'])->name('admin.home');

    // Tickets routes accessible only to admin
    Route::get('/admin/tickets', [App\Http\Controllers\TicketController::class, 'index'])->name('tickets.index');
    Route::get('/admin/tickets/create', [App\Http\Controllers\TicketController::class, 'create'])->name('tickets.create');
    Route::post('/admin/tickets', [App\Http\Controllers\TicketController::class, 'store'])->name('tickets.store');
    Route::get('/admin/tickets/{ticket}/edit', [App\Http\Controllers\TicketController::class, 'edit'])->name('tickets.edit');
    Route::put('/admin/tickets/{ticket}', [App\Http\Controllers\TicketController::class, 'update'])->name('tickets.update');
    Route::delete('/tickets/{id}/delete', 'App\Http\Controllers\TicketController@destroy')
    ->name('tickets.destroy');

    Route::get('buy', [App\Http\Controllers\TicketController::class, 'buyTicket'])->name('buy-ticket');


    Route::get('/home/tickets/buy', [App\Http\Controllers\TicketController::class, 'buyTicket'])->name('buy');
    Route::post('/home/tickets/purchase', [App\Http\Controllers\TicketController::class, 'purchaseTicket'])->name('tickets.purchase');