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
                            <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">Paslaugos</h2>
                        </div>
                        <a href="{{ url('/kurtiPaslauga') }}" class="btn btn-primary">Talpinti paslaugą</a>
                    </div>
                    @if (count($paslaugos) == 0)
                        Nėra paslaugų.
                    @else
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Pavadinimas</th>
                                <th>Būsena</th>
                                <th>Sukurtas</th>
                                <th>Veiksmai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paslaugos as $paslauga)
                                <tr class="text-center">
                                    <th scope="row">{{$paslauga->id}}</th>
                                    <td><div onclick="location.href='paslauga/{{$paslauga->id}}';" style="cursor: pointer;"><b>{{$paslauga->pavadinimas}}</b></td></div>
                                    <td>{{$paslauga->busena}}</td>
                                    <td>{{$paslauga->data}}</td>
                                    <td>
                                    <a href="paslaugaEdit/{{$paslauga->id}}" class="btn btn-primary">Redaguoti</a>
                                    <a class="btn btn-danger" onclick="javascript:return confirm('Ar tikrai nori pašalinti tai?')" href='deletePaslauga/{{$paslauga->id}}'>
                                    <span>Pašalinti</span>
                                    </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$paslaugos->links()}}
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">Užklausos</h2>
                        </div>
                        <a type="button" href="{{ url('/kurti') }}" class="btn btn-primary">Talpinti užklausą</a>
                    </div>
                    @if (count($uzklausos) == 0)
                        Nėra užklausų.
                    @else
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Pavadinimas</th>
                                <th>Būsena</th>
                                <th>Sukurtas</th>
                                <th>Veiksmai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($uzklausos as $uzklausa)
                                <tr class="text-center">
                                    <th scope="row">{{$uzklausa->id}}</th>
                                    <td>{{$uzklausa->pavadinimas}}</td>
                                    <td>{{$uzklausa->busena}}</td>
                                    <td>{{$uzklausa->data}}</td>
                                    <td>   
                                    <a href="uzklausaEdit/{{$uzklausa->id}}" class="btn btn-primary">Redaguoti</a>
                                    <a class="btn btn-danger" onclick="javascript:return confirm('Ar tikrai nori pašalinti tai?')" href='deleteUzklausa/{{$uzklausa->id}}'>
                                    <span>Pašalinti</span>
                                    </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$uzklausos->links()}}
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">Konkursai</h2>
                        </div>
                        <a href="{{ url('/konkursoKurimas') }}" class="btn btn-primary">Sukurti konkursą</a>
                    </div>
                    @if (count($konkursai) == 0)
                        Nėra konkursų.
                    @else
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Pavadinimas</th>
                                <th>Būsena</th>
                                <th>Atnaujintas</th>
                                <th>Veiksmai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($konkursai as $konkursas)
                                <tr class="text-center">
                                    <th scope="row">{{$konkursas->id}}</th>
                                    <td>{{$konkursas->pavadinimas}}</td>
                                    <td>{{$konkursas->busena}}</td>
                                    <td>{{$konkursas->atnaujintas}}</td>
                                    <td><input type="hidden" name="id" id="id" value="{{$konkursas->id}}"/>
                                    <a href="pasiulymas/{{$konkursas->id}}" class="btn btn-success">Pasiūlymai</a>
                                    <a href="konkursasEdit/{{$konkursas->id}}" class="btn btn-primary">Redaguoti</a>
                                    <a class="btn btn-danger" onclick="javascript:return confirm('Ar tikrai nori pašalinti tai?')" href='deleteKonkursa/{{$konkursas->id}}'>
                                    <span>Pašalinti</span>
                                    </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$konkursai->links()}}
                    @endif
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </body>
    <script src="js/main.js"></script>
</html>