<meta charset="utf-8">
    <title>LaisvaiSamdomas - paslaugų portalas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tables.css') }}">
    <link href="img/favicon.png" rel="icon">

<h2>Skelbimai table</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Pavadinimas</th>
            <th>valandinis</th>
            <th>Biudzetas</th>
            <th>Data</th>
            <th>Telefonas</th>
            <th>El pastas</th>
            <th>Galerijos nuoroda</th>
            <th>Patirtis</th>
            <th>Kategorija</th>
            <th>Paslaugu atstumai</th>
            <th>Statusas</th>
            <th>Asmens tipas</th>
            <th>Miestas</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($skelbimai as $skelbimas )
        <tr>
            <td>{{$skelbimas->skelbimo_id}}</td>
            <td>{{$skelbimas->pavadinimas}}</td>
            <td>{{$skelbimas->valandinis}}</td>
            <td>{{$skelbimas->biudzetas}}</td>
            <td>{{$skelbimas->data}}</td>
            <td>{{$skelbimas->telefonas}}</td>
            <td>{{$skelbimas->el_pastas}}</td>
            <td>{{$skelbimas->galerijos_nuoroda}}</td>
            <td>{{$skelbimas->patirtis}}</td>
            <td>{{$skelbimas->kategorijos->pavadinimas}}</td>
            <td>{{$skelbimas->paslaugu_atstumai}}</td>
            <td>{{$skelbimas->statusai->pavadinimas}}</td>
            <td>{{$skelbimas->asmens_tipas}}</td>

        </tr>
        @endforeach
        <tbody>
    </table>
</div>