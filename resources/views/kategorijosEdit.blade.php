@include('layouts.headertables')

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
            <td><a class="btn btn-primary" href='/kategorijosEdit/{{$kategorija->id}}'>
                <span>Redaguoti</span>
                </a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('Ar tikrai nori pašalinti tai?')" href='/deleteKategorijas/{{$kategorija->id}}'>
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
    <form class="form-style-5"role="form" method="POST" action="/update"> 
        @csrf   
        <fieldset>
        <legend><span class="number">1</span> Duomenų redagavimas</legend>
        <input type="hidden" name="id" value="{{$data->id}}">
        <label for="katg">Kategorijos pavadinimas:</label>
        <input type="text" class="form-control" name="pavadinimas" value="{{$data->pavadinimas}}" placeholder="Kategorijos pavadinimas"/>
        <input type="submit" value="Redaguoti" />
    </div>
</div>