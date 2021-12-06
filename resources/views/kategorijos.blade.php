<meta charset="utf-8">
    <title>LaisvaiSamdomas - paslaugų portalas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tables.css') }}">
    <link href="img/favicon.png" rel="icon">

<h2>Kategorijos table</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Pavadinimas</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($kategorijos as $kategorija )
        <tr>
            <td>{{$kategorija->id}}</td>
            <td>{{$kategorija->pavadinimas}}</td>
        </tr>
        @endforeach
        <tbody>
    </table>
</div>