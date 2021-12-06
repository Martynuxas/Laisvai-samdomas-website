<meta charset="utf-8">
    <title>LaisvaiSamdomas - paslaugų portalas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tables.css') }}">
    <link href="img/favicon.png" rel="icon">

<h2>Prenumerata table</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Kategorija</th>
            <th>Vartotojo id</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($prenumeratos as $prenumerata )
        <tr>
            <td>{{$prenumerata->prenumeratos_id}}</td>
            <td>{{$prenumerata->kategorijos->pavadinimas}}</td>
            <td>{{$prenumerata->vartotojo_id}}</td>
        </tr>
        @endforeach
        <tbody>
    </table>
</div>