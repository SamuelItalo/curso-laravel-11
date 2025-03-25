<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketReportController;
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
        
        Route::get('/tickets/relatorios', [TicketReportController::class, 'index'])->name('tickets.relatorios');
        Route::get('relatorios/export/pdf', [TicketReportController::class, 'exportPDF'])->name('relatorios.export.pdf');
        Route::patch('/tickets/{ticket}/update', [TicketController::class, 'update'])
        ->name('ticket.update');
        Route::delete('/tickets/{ticket}/destroy', [TicketController::class, 'destroy'])->name('ticket.destroy')->middleware(CheckIfIsAdmin::class);
        Route::get('/tickets/{id}', [TicketController::class, 'show'])->name('tickets.show');
        Route::get('/newtickets', [TicketController::class, 'create'])->name('tickets.create');
        Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
        
});

// ---------------


// Rotas para Usuários Comuns

Route::middleware('auth')->group(function() {

    

    Route::post('/ticket', [TicketController::class, 'store'])->name('ticket.store');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])
    ->middleware(['verified'])
    ->name('dashboard');

    Route::get('/tickets', [IndexController::class, 'index'])
    ->middleware(['verified'])
    ->name('index');

    Route::get('/mytickets', [TicketController::class, 'mytickets'])->name('tickets.mytickets');
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas de Chamados para Usuário Comum
    
});


Route::get('/', function () {
    return view('welcome');
})->name('home');




Route::middleware('auth')->group(function () {
    
});

require __DIR__.'/auth.php';
