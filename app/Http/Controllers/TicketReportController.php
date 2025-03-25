<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TicketReportController extends Controller
{
    public function index(Request $request) {
        
    
    // Busca os chamados com os dados do usuário para evitar erros de propriedade nula
    $tickets = Ticket::with('user')->orderBy('created_at', 'desc')
    ->paginate(8);

    //dd($tickets);
    // Verifica se existem tickets na base de dados
    if ($tickets->isEmpty()) {
        return back()->with('error', 'Nenhum chamado encontrado.');
    }

    return view('relatorios.tickets-relatorio', compact('tickets'));
        
    }

    public function exportPDF() 
   {
    $tickets = Ticket::with('user')->orderBy('created_at', 'desc')->get();

    $pdf = Pdf::loadView('relatorios.tickets-pdf', compact('tickets'));


    return $pdf->download('relatorio_chamados.pdf');
   }
}