<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h1 { margin-bottom: 10px; }
        .meta { margin-bottom: 20px; }
        .summary { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #999; padding: 6px; text-align: left; }
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
        <p>Actifs : {{ $data['summary']['active'] }}</p>
        <p>Inactifs : {{ $data['summary']['inactive'] }}</p>
        <p>Parents : {{ $data['summary']['parents'] }}</p>
        <p>Nounous : {{ $data['summary']['nannies'] }}</p>
        <p>Admins : {{ $data['summary']['admins'] }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Statut</th>
                <th>Date création</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['users'] as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->is_active ? 'Actif' : 'Inactif' }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>