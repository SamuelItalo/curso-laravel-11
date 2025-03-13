@extends('tickets.layouts.app')

@section('title', 'Detalhes do Chamado')


@section('content')
    @include('admin.users.partials.breadcrumb')
    <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
            Detalhes do Chamado - {{ $ticket->titulo }}
        </h2>
    </div>

    <div >
        <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400 mb-6">
            <li>Nome: {{ $ticket->user->name }}</li>
            <li>Descrição: {{ $ticket->descricao }}</li>
            <li>Status: {{$ticket->status }}</li>
        </ul>
    </div>
    @can('is-admin')
        <form action="{{ route('ticket.destroy', $ticket->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit"
                class=" text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">Mudar statos</button>
        </form>
    @endcan

    
@endsection
