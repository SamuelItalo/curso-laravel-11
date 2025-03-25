<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Chamados</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Relatório de Chamados</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Título</th>
                <th>Status</th>
                <th>Data de Criação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->user ? $ticket->user->name : 'Usuário não encontrado' }}</td>
                    <td>{{ $ticket->titulo }}</td>
                    <td>{{ $ticket->status }}</td>
                    <td>{{ $ticket->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- <a href="{{ route('relatorios.export.pdf') }}" class="px-4 py-2 bg-blue-500 text-white rounded">
    Exportar para PDF
    </a> -->

</body>
</html>
