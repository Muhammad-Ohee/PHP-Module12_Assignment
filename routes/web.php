<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

Route::resource('trips', TripController::class);
Route::get('trips/{trip}/book', [TicketController::class, 'book']);


Route::get('/', [HomeController::class, 'index'])->name('home');

// Location routes
Route::resource('locations', LocationController::class)->except(['show']);

// Profile routes
Route::get('profiles/{profile}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
Route::put('profiles/{profile}', [ProfileController::class, 'update'])->name('profiles.update');
Route::delete('profiles/{profile}', [ProfileController::class, 'destroy'])->name('profiles.destroy');

// Seat Allocation routes
Route::resource('seat_allocations', SeatAllocationController::class)->except(['show']);

// Ticket routes
Route::get('trips/{trip}/book', [TicketController::class, 'book'])->name('tickets.book');
Route::post('trips/{trip}/purchase', [TicketController::class, 'purchase'])->name('tickets.purchase');
Route::get('tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::delete('seat_allocations/{seatAllocation}', [TicketController::class, 'cancel'])->name('tickets.cancel');
Route::get('user/{user}/tickets', [TicketController::class, 'userTickets'])->name('tickets.user_tickets');

// Trip routes
Route::resource('trips', TripController::class)->except(['show']);

// User route
Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
