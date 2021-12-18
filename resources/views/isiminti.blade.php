@include('layouts.headertables')

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
            <td>{{$isimintas->id}}</td>
            <td>{{$isimintas->vartotojo_id}}</td>
            <td>{{$isimintas->skelbimo_id}}</td>
            <td><a class="btn btn-primary" href='isimintiEdit/{{$isimintas->id}}'>
                <span>Redaguoti</span>
                </a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('Ar tikrai nori pašalinti tai?')" href='deleteIsimintus/{{$isimintas->id}}'>
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
    <form class="form-style-5"role="form" method="POST" action="submitIsimintus"> 
        @csrf   
        <fieldset>
        <legend><span class="number">1</span> Duomenų pridėjimas</legend>
        <label for="katg">Vartotojo id:</label>
        <select id="name" name="vartotojo_id">
            <option selected="true" value="" disabled>Pasirinkite</option>
            @foreach($vartotojai as $vartotojas)
            <option value="{{$vartotojas->id}}">{{$vartotojas->id}} </option>
            @endforeach
        </select>  
        <label for="katg">Skelbimo id:</label>
        <select id="name" name="skelbimo_id">
            <option selected="true" value="" disabled>Pasirinkite</option>
            @foreach($skelbimai as $skelbimas)
            <option value="{{$skelbimas->id}}">{{$skelbimas->id}}</option>
            @endforeach
        </select>  
        <input type="submit" value="Pridėti" />
    </div>
</div>