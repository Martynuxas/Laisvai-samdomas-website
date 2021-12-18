@include('layouts.headertables')

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
            <td>{{$prenumerata->id}}</td>
            <td>{{$prenumerata->kategorijos->pavadinimas}}</td>
            <td>{{$prenumerata->vartotojo_id}}</td>
            <td><a class="btn btn-primary" href='prenumeratosEdit/{{$prenumerata->id}}'>
                <span>Redaguoti</span>
                </a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('Ar tikrai nori pašalinti tai?')" href='deletePrenumeratas/{{$prenumerata->id}}'>
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
    <form class="form-style-5"role="form" method="POST" action="submitPrenumeratas"> 
        @csrf   
        <fieldset>
        <legend><span class="number">1</span> Duomenų pridėjimas</legend>
        <label for="katg">Kategorijos pavadinimas:</label>
        <select id="name" name="kategorijos_id">
            <option selected="true" value="" disabled>Pasirinkite</option>
            @foreach($kategorijos as $kategorija)
            <option value="{{$kategorija->id}}">{{$kategorija->pavadinimas}}</option>
            @endforeach
        </select>  
        <label for="katg">Vartotojo id:</label>
        <select id="name" name="vartotojo_id">
            <option selected="true" value="" disabled>Pasirinkite</option>
            @foreach($vartotojai as $vartotojas)
            <option value="{{$vartotojas->id}}">{{$vartotojas->id}} </option>
            @endforeach
        </select>  
        <input type="submit" value="Pridėti" />
    </div>
</div>