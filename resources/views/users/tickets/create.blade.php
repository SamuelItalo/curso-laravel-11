@extends('users.layouts.app')

@section('title', 'Novo Chamado - ')

@section('content')
    @include('tickets.partials.breadcrumb')
    <div class="py-2">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
            Novo Chamado
        </h2>
    </div>
    <!-- {{-- @include('admin.includes.errors') --}} -->
    <form action="{{ route('ticket.store') }}" method="POST">
        @include('users.partials.form')
    </form>
@endsection
