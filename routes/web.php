<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Middleware\CheckIfIsAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Minahs rotas
Route::middleware('auth','admin')
    ->prefix('admin')
    ->group(function() {
        Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users', [UserController::class, 'index'])->name('users.index'); 
        
        Route::delete('/tickets/{ticket}/destroy', [TicketController::class, 'destroy'])->name('ticket.destroy')->middleware(CheckIfIsAdmin::class);
        Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('ticket.show');
        Route::post('/ticket', [TicketController::class, 'store'])->name('ticket.store');
        Route::get('/newtickets', [TicketController::class, 'create'])->name('tickets.create');
        Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
});

// ---------------


// Rotas para Usuários Comuns
Route::middleware('auth')->group(function() {

    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['verified'])
    ->name('dashboard');

    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas de Chamados para Usuário Comum
    Route::get('/mytickets', [TicketController::class, 'mytickets'])->name('tickets.mytickets');
});


Route::get('/', function () {
    return view('welcome');
})->name('home');




Route::middleware('auth')->group(function () {
    
});

require __DIR__.'/auth.php';
