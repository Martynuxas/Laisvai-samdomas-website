<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    @include('layouts.header')
    <body>
    <div class="container mt-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">Anketų patvirtinimas</h2>
                        </div>
                    </div>
                    @if (count($paslaugos) == 0 && count($uzklausos) == 0 && count($konkursai) == 0)
                        Nėra ka patvirtinti.
                    @else
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Tipas</th>
                                <th>Pavadinimas</th>
                                <th>Sukurtas</th>
                                <th>Veiksmai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paslaugos as $paslauga)
                                <tr class="text-center">
                                    <th scope="row">{{$paslauga->id}}</th>
                                    <td>Paslauga</td>
                                    <td>{{$paslauga->pavadinimas}}</td>
                                    <td>{{$paslauga->data}}</td>
                                    <td>  
                                    <a href="paslaugaPatvirtinti/{{$paslauga->id}}" class="btn btn-success">Patvirtinti</a>
                                    <a href="paslaugaEdit/{{$paslauga->id}}" class="btn btn-primary">Peržiurėti</a>
                                    <a class="btn btn-danger" onclick="javascript:return confirm('Ar tikrai nori atšaukti tai?')" href='paslaugaAtsaukti/{{$paslauga->id}}'>
                                    <span>Atšaukti</span>
                                    </a>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach($uzklausos as $uzklausa)
                                <tr class="text-center">
                                    <th scope="row">{{$uzklausa->id}}</th>
                                    <td>Užklausa</td>
                                    <td>{{$uzklausa->pavadinimas}}</td>
                                    <td>{{$uzklausa->data}}</td>
                                    <td>   
                                    <a href="uzklausaPatvirtinti/{{$uzklausa->id}}" class="btn btn-success">Patvirtinti</a>
                                    <a href="uzklausaEdit/{{$uzklausa->id}}" class="btn btn-primary">Peržiurėti</a>
                                    <a class="btn btn-danger" onclick="javascript:return confirm('Ar tikrai nori atšaukti tai?')" href='uzklausaAtsaukti/{{$uzklausa->id}}'>
                                    <span>Atšaukti</span>
                                    </a>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach($konkursai as $konkursas)
                                <tr class="text-center">
                                    <th scope="row">{{$konkursas->id}}</th>
                                    <td>Konkursas</td>
                                    <td>{{$konkursas->pavadinimas}}</td>
                                    <td>{{$konkursas->data}}</td>
                                    <td><input type="hidden" name="id" id="id" value="{{$konkursas->id}}"/>
                                    <a href="konkursasPatvirtinti/{{$konkursas->id}}" class="btn btn-success">Patvirinti</a>
                                    <a href="konkursasEdit/{{$konkursas->id}}" class="btn btn-primary">Peržiurėti</a>
                                    <a class="btn btn-danger" onclick="javascript:return confirm('Ar tikrai nori atšaukti tai?')" href='konkursasAtsaukti/{{$konkursas->id}}'>
                                    <span>Atšaukti</span>
                                    </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$paslaugos->links()}}
                    @endif
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </body>
</html>