<meta charset="utf-8">
    <title>LaisvaiSamdomas - paslaugų portalas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tables.css') }}">
    <link href="img/favicon.png" rel="icon">
    @if (Auth::check())
    <h2>Vartotojai table</h2>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Vardas</th>
                <th>Pavarde</th>
                <th>El pastas</th>
                <th>Asmens tipas</th>
                <th>Role</th>
                <th>miestas</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($vartotojai as $vartotojas )
            <tr>
                <td>{{$vartotojas->vartotojo_id}}</td>
                <td>{{$vartotojas->vardas}}</td>
                <td>{{$vartotojas->pavarde}}</td>
                <td>{{$vartotojas->el_pastas}}</td>
                <td>{{$vartotojas->asmens_tipas}}</td>
                <td>{{$vartotojas->role}}</td>
                <td>{{$vartotojas->miestas}}</td>
    
            </tr>
            @endforeach
            <tbody>
        </table>
    </div>
    <div>
        {{ $vartotojai->links() }}
    </div>
    @else
    {{abort(403, 'Unauthorized action.');}}
    @endif
