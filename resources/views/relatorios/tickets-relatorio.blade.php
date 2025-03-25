@extends('tickets.layouts.app')

@section('content')
    @include('relatorios.partials.breadcrumb')
    <div class="py-2 mb-6">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-6">
            Relatório de Chamados
        </h2>
    
        <a href="{{ route('relatorios.export.pdf') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <i class="fa-solid fa-plus" aria-hidden="true"></i> Exportar
        </a>

    </div>
    <x-alert />

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-4">ID</th>
                    <th scope="col" class="px-6 py-4">Usuário</th>
                    <th scope="col" class="px-6 py-4">Título</th>
                    <th scope="col" class="px-6 py-4">Status</th>
                    <th scope="col" class="px-6 py-4">Data de Criação</th>
                </tr>
            </thead>
            
            <tbody class="text-white-600 text-sm font-normal">
                <ul>
                    @foreach ($tickets as $ticket)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 ">{{ $ticket->id }}</td>
                            <td class="px-6 py-4 !@#">{{ optional($ticket->user)->name ?? 'Usuário não encontrado' }}</td>
                            <td class="px-6 py-4 !@#">{{ $ticket->titulo }}</td>
                            <td class="px-6 py-4 !@#">{{ $ticket->status }}</td>
                            <td class="px-6 py-4 !@#">{{ \Carbon\Carbon::parse($ticket->created_at)->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </ul>
            </tbody>
        </table>
    </div>

    <div class="py-4">
        {{ $tickets->links() }}
    </div>
@endsection
