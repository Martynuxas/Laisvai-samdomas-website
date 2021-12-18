@include('layouts.headertables')

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
            <th>Galerijos nuoroda</th>
            <th>Patirtis</th>
            <th>Kategorija</th>
            <th>Paslaugu atstumai</th>
            <th>Statusas</th>
            <th>Asmens tipas</th>
            <th>Miestas</th>
            <th>Vartotojas</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($skelbimai as $skelbimas )
        <tr>
            <td>{{$skelbimas->id}}</td>
            <td>{{$skelbimas->pavadinimas}}</td>
            <td>{{$skelbimas->valandinis}}</td>
            <td>{{$skelbimas->biudzetas}}</td>
            <td>{{$skelbimas->data}}</td>
            <td>{{$skelbimas->telefonas}}</td>
            <td>{{$skelbimas->galerijos_nuoroda}}</td>
            <td>{{$skelbimas->patirtis}}</td>
            <td>{{$skelbimas->kategorijos->pavadinimas}}</td>
            <td>{{$skelbimas->paslaugu_atstumai}}</td>
            <td>{{$skelbimas->statusai->pavadinimas}}</td>
            <td>{{$skelbimas->asmens_tipas}}</td>
            <td>{{$skelbimas->miestas}}</td>
            <td>{{$skelbimas->vartotojo_id}}</td>
            @if (Auth::check())
            <td><a class="btn btn-primary" href='isimintiSkelbima/{{$skelbimas->id}}'>
                <span>Įsiminti</span>
                </a>
            </td>
            @endif
            <td><a class="btn btn-primary" href='skelbimaiEdit/{{$skelbimas->id}}'>
                <span>Redaguoti</span>
                </a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('Ar tikrai nori pašalinti tai?')" href='deleteSkelbimus/{{$skelbimas->id}}'>
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
    <form class="form-style-5"role="form" method="POST" action="submitSkelbimus"> 
        @csrf   
        <fieldset>
        <legend><span class="number">1</span> Duomenų pridėjimas</legend>
        <label for="katg">Pavadinimas:</label>
        <input type="text" class="form-control" name="pavadinimas" value="" placeholder="Pavadinimas">
        <label for="katg">Aprašymas:</label>
        <input type="text" class="form-control" name="aprasymas" value="" placeholder="Aprašymas">
        <label for="katg">Kategorija:</label>
        <select id="name" name="kategorijos_id">
            <option selected="true" value="" disabled>Pasirinkite</option>
            @foreach($kategorijos as $kategorija)
            <option value="{{$kategorija->id}}">{{$kategorija->pavadinimas}}</option>
            @endforeach
        </select> 
        <label for="katg">Asmens tipas:</label>
        <select id="name" name="asmens_tipas">
            <option selected="true" value="" disabled>Pasirinkite</option>
            <option value="Fizinis">Fizinis</option>
            <option value="Juridinis">Juridinis</option>
        </select> 
        <label for="katg">Biudzetas(eur):</label>
        <input type="text" class="form-control" name="biudzetas" value="" placeholder="Biudzetas">
        <label for="katg">Valandinis(eur/h):</label>
        <input type="text" class="form-control" name="valandinis" value="" placeholder="Valandinis">
        <label for="katg">Telefonas:</label>
        <input type="text" class="form-control" name="telefonas" value="" placeholder="Telefonas">
        <label for="katg">El. paštas:</label>
        <input type="text" class="form-control" name="el_pastas" value="" placeholder="El. paštas">
        <label for="katg">Patirtis(metai):</label>
        <input type="text" class="form-control" name="patirtis" value="" placeholder="Patirtis">
        <label for="katg">Paslaugu atstumai iki(km):</label>
        <input type="text" class="form-control" name="paslaugu_atstumai" value="" placeholder="Paslaugu atstumai">
        <label for="katg">Statusas:</label>
        <select id="name" name="statuso_id">
            <option selected="true" value="" disabled>Pasirinkite</option>
            @foreach($statusai as $statusas)
            <option value="{{$statusas->id}}">{{$statusas->pavadinimas}}</option>
            @endforeach
        </select> 
        <label for="katg">Miestas:</label>
        <select id="name" name="miestas">
            <option selected="true" value="" disabled>Pasirinkite</option>
            <option value="Kaunas">Kaunas</option>
            <option value="Vilnius">Vilnius</option>
            <option value="Klaipeda">Klaipėda</option>
            <option value="Alytus">Alytus</option>
            <option value="Marijampole">Marijampole</option>
        </select>  
        <label for="katg">Galerijos nuoroda:</label>
        <input type="text" class="form-control" name="galerijos_nuoroda" value="" placeholder="Galerijos nuoroda">
        <label for="katg">Vartotojo ID:</label>
        <select id="name" name="vartotojo_id">
            <option selected="true" value="" disabled>Pasirinkite</option>
            @foreach($vartotojai as $vartotojas)
            <option value="{{$vartotojas->id}}">{{$vartotojas->id}}</option>
            @endforeach
        </select> 
        <input type="submit" value="Pridėti" />
    </div>
</div>