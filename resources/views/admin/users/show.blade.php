@extends('admin.layouts.app')

@section('title', 'Detalhes do Usuário')

@section('content')
    @include('admin.users.partials.breadcrumb')
    <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
            Detalhes do Usuário {{ $user->name }}
        </h2>
    </div>

        <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400 mb-6">
            <li >Nome: {{ $user->name }}</li>
            <li>E-mail: {{ $user->email }}</li>
        </ul>
   
    <x-alert />

    {{-- @can('owner', $user)
        pode deletar
    @endcan --}}


    @can('is-admin')
        <form action="{{ route('ticket.update', $ticket->id) }}" method="post">
            @csrf
            @method('PATCH')
            <select name="status" class="form-select">
                <option value="aberto" {{ $ticket->status == 'aberto' ? 'selected' : '' }}>Aberto</option>
                <option value="em andamento" {{ $ticket->status == 'em andamento' ? 'selected' : '' }}>Em andamento</option>
                <option value="fechado" {{ $ticket->status == 'fechado' ? 'selected' : '' }}>Fechado</option>
            </select>
            
            <!-- <button type="submit"
                class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Deletar</button> -->
        </form>
    @endcan
@endsection
