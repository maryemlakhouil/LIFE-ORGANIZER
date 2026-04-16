<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; }
        h1 { margin-bottom: 10px; }
        .meta { margin-bottom: 20px; }
        .summary { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #999; padding: 5px; text-align: left; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>

    <div class="meta">
        Généré le : {{ $generatedAt }}
    </div>

    <div class="summary">
        <p>Total : {{ $data['summary']['total'] }}</p>
        <p>En attente : {{ $data['summary']['pending'] }}</p>
        <p>En cours : {{ $data['summary']['in_progress'] }}</p>
        <p>Terminées : {{ $data['summary']['completed'] }}</p>
        <p>Annulées : {{ $data['summary']['cancelled'] }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Enfant</th>
                <th>Créée par</th>
                <th>Affectée à</th>
                <th>Priorité</th>
                <th>Statut</th>
                <th>Échéance</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['tasks'] as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->child?->name ?? '-' }}</td>
                    <td>{{ $task->creator?->name ?? '-' }}</td>
                    <td>{{ $task->nanny?->name ?? '-' }}</td>
                    <td>{{ $task->priority }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->due_date ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>