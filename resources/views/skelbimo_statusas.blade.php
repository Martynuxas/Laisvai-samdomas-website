@include('layouts.headertables')

<h2>Statuso table</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Pavadinimas</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($statusai as $statusas )
        <tr>
            <td>{{$statusas->id}}</td>
            <td>{{$statusas->pavadinimas}}</td>
            <td><a class="btn btn-primary" href='skelbimo_statusasEdit/{{$statusas->id}}'>
                <span>Redaguoti</span>
                </a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('Ar tikrai nori pašalinti tai?')" href='deleteStatusus/{{$statusas->id}}'>
                <span>Pašalinti</span>
                </a>
            </td>
               
        </tr>
        @endforeach
        <tbody>
    </table>
    <div class="col-12 col-md-9">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{!! \Session::get('success') !!}</p>
        </div>
        @endif
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <p>Klaidos:</p>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @yield('content')
    </div>
    <form class="form-style-5"role="form" method="POST" action="submitStatusus"> 
        @csrf   
        <fieldset>
        <legend><span class="number">1</span> Duomenų pridėjimas</legend>
        <label for="katg">Statuso pavadinimas:</label>
        <input type="text" class="form-control" name="pavadinimas" value="" placeholder="Statuso pavadinimas">
        <input type="submit" value="Pridėti" />
    </div>
</div>