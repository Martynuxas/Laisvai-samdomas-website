<meta charset="utf-8">
    <title>LaisvaiSamdomas - paslaugų portalas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tables.css') }}">
    <link href="img/favicon.png" rel="icon">

<h2>Įsiminti table</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Vartotojo id</th>
            <th>Skelbimo id</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($isiminti as $isimintas )
        <tr>
            <td>{{$isimintas->isiminti_id}}</td>
            <td>{{$isimintas->vartotojo_id}}</td>
            <td>{{$isimintas->skelbimo_id}}</td>
        </tr>
        @endforeach
        <tbody>
    </table>
</div>