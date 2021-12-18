@include('layouts.headertables')
    <h2>Vartotojai table</h2>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Vardas</th>
                <th>Pavarde</th>
                <th>El pastas</th>
                <th>Role</th>
                <th>Asmens tipas</th>
                <th>Miestas</th>
                <th>Sukurtas</th>
                <th>Atnaujintas</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($vartotojai as $vartotojas )
            <tr>
                <td>{{$vartotojas->id}}</td>
                <td>{{$vartotojas->name}}</td>
                <td>{{$vartotojas->lastname}}</td>
                <td>{{$vartotojas->email}}</td>
                <td>{{$vartotojas->role}}</td>
                <td>{{$vartotojas->asmens_tipas}}</td>
                <td>{{$vartotojas->miestas}}</td>
                <td>{{$vartotojas->created_at}}</td>
                <td>{{$vartotojas->updated_at}}</td>
                <td><a class="btn btn-primary" href='/vartotojaiEdit/{{$vartotojas->id}}'>
                    <span>Redaguoti</span>
                    </a>
                </td>
                <td>
                    <a class="btn btn-danger" onclick="javascript:return confirm('Ar tikrai nori pašalinti tai?')" href='/deleteVartotojus/{{$vartotojas->id}}'>
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
        <form class="form-style-5"role="form" method="POST" action="/updateVartotojus"> 
            @csrf   
            <fieldset>
            <legend><span class="number">1</span> Duomenų redagavimas</legend>
            <input type="hidden" name="id" value="{{$data->id}}">
            <label for="katg">Vardas:</label>
            <input type="text" class="form-control" name="name" value="{{$data->name}}" placeholder="Vardas">
            <label for="katg">Pavardė:</label>
            <input type="text" class="form-control" name="lastname" value="{{$data->lastname}}" placeholder="Pavardė">
            <label for="katg">El. paštas:</label>
            <input type="text" class="form-control" name="email" value="{{$data->email}}" placeholder="El paštas">
            <label for="katg">Slaptažodis:</label>
            <input type="text" class="form-control" name="password" value="{{$data->password}}" placeholder="Slaptažodis">
            <label for="katg">Asmens tipas:</label>
                <select id="name" name="asmens_tipas">
                    <option value='{{$data->asmens_tipas}}'>{{$data->asmens_tipas}} </option>
                    <option value="Fizinis">Fizinis</option>
                    <option value="Juridinis">Juridinis</option>
                </select>  
            <label for="katg">Role:</label>
                <select id="name" name="role">
                    <option value='{{$data->role}}'>{{$data->role}} </option>
                    <option value="Administratorius">Administratorius</option>
                    <option value="Moderatorius">Moderatorius</option>
                    <option value="Klientas">Klientas</option>
                </select>  
            <label for="katg">Miestas:</label>
                <select id="name" name="miestas">
                    <option value='{{$data->miestas}}'>{{$data->miestas}} </option>
                    <option value="Kaunas">Kaunas</option>
                    <option value="Vilnius">Vilnius</option>
                    <option value="Klaipeda">Klaipėda</option>
                    <option value="Alytus">Alytus</option>
                    <option value="Marijampole">Marijampole</option>
                </select>  
            <input type="submit" value="Redaguoti" />
        </div>
    </div>