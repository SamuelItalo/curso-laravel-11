<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // Obtém os chamados do usuário autenticado e carrega o relacionamento com User
        //$tickets = Ticket::where('user_id', Auth::id())->with('user')->get();
        // Mostra os Chamados e pagina todos diacordo com a quantidade que escolher
        

        if (Auth::user()->isAdm()){

            // Administradores veem todos os chamados
            $tickets = Ticket::paginate(10);
            return view('admin.users.index-admin', [
                'tickets' => $tickets,
                'user' => auth()->user()
            ]);
        }

        // Usuários comuns veem apenas seus chamados
        $tickets = Ticket::where('user_id', Auth::id())->paginate(10);
        return view('users.tickets.index-user', [
            'tickets' => $tickets,
            'user' => auth()->user()
        ]);
        
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create', [
            'user' => auth()->user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'setor' => 'required|string|max:255',
            'descricao' =>  'required|string'
        ]);
        
        Ticket::create([
            'user_id' => auth()->id(),
            'setor' => $request->setor,
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
        ]);

        if (Auth::user()->isAdm()) {
            return redirect()
            ->route('tickets.index')
            ->with('success', 'Chamado registrado com sucesso!');
        }
        return redirect()
        ->route('tickets.index')
        ->with('success', 'Chamado registrado com sucesso!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = Ticket::find($id);
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ticket = Ticket::findOrFail($id);
        // Verifica se o usuário é administrador antes de permitir a atualização
        if (!auth()->user()->isAdm()) {
            return redirect()->route('tickets.index')->with('error', 'Você não tem permissão para alterar o status.');
            }

         // Validação do status
        $request->validate([
            'status' => 'required|in:aberto,em andamento,fechado',
        ]);

        // Atualiza o status do ticket
        
        $ticket->update([
        'status' => $request->status,
        ]);

        return redirect()->route('tickets.index')->with('success', 'Status do chamado atualizado com sucesso!');
    }

        

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'Apaguei';
    }

    
    
    // ---> Ticktes para usuarios comuns

    public function mytickets() 
    {

        return view('users.tickets.create', [
            'user' => auth()->user()
        ]);
    }
}
