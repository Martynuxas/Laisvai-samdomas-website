<!DOCTYPE html>
<html lang="en">
    <head>
    @include('layouts.head')
    </head>
    <body>
    @include('layouts.header')
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
                        Neturite sukurtų paslaugų.
                    @else
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Pavadinimas</th>
                                <th>Data</th>
                                <th>Veiksmai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paslaugos as $paslauga)
                                <tr class="text-center">
                                    <th scope="row">{{$paslauga->id}}</th>
                                    <td>{{$paslauga->pavadinimas}}</td>
                                    <td>{{$paslauga->data}}</td>
                                    <td>
                                    <a href="paslauga/{{$paslauga->id}}" class="btn btn-success">Žiurėti</a>    
                                    <button type="button" href="{{ url('/kurtiPaslauga') }}" class="btn btn-primary">Redaguoti</button>
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
                        Neturite sukurtų užklausų.
                    @else
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Pavadinimas</th>
                                <th>Data</th>
                                <th>Veiksmai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($uzklausos as $uzklausa)
                                <tr class="text-center">
                                    <th scope="row">{{$uzklausa->id}}</th>
                                    <td>{{$uzklausa->pavadinimas}}</td>
                                    <td>{{$uzklausa->data}}</td>
                                    <td>
                                    <a href="uzklausa/{{$uzklausa->id}}" class="btn btn-success">Žiurėti</a>    
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
                            <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">DUK(Dažniausiai užduodami klausimai)</h2>
                        </div>
                        <a href="{{ url('/kurtiKlausimus') }}" class="btn btn-primary">Sukurti DUK</a>
                    </div>
                    @if (count($klausimai) == 0)
                        Neturite sukurtų DUK.
                    @else
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Pavadinimas</th>
                                <th>Atnaujintas</th>
                                <th>Veiksmai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($klausimai as $klausimas)
                                <tr class="text-center">
                                    <th scope="row">{{$klausimas->id}}</th>
                                    <td>{{$klausimas->pavadinimas}}</td>
                                    <td>{{$klausimas->atnaujintas}}</td>
                                    <input type="hidden" name="id" id="id" value="{{$klausimas->id}}"></input>
                                    <td><a href="klausimaiEdit/{{$klausimas->id}}" class="btn btn-primary">Redaguoti</a>
                                    <a class="btn btn-danger" onclick="javascript:return confirm('Ar tikrai nori pašalinti tai?')" href='deleteKlausima/{{$klausimas->id}}'>
                                    <span>Pašalinti</span>
                                    </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$klausimai->links()}}
                    @endif
                    </div>
                </div>
            </div>
        </div>
    @include('layouts.footer')
    </body>
</html>