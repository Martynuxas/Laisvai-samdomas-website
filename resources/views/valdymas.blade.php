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
                            <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">Užsakymai</h2>
                        </div>
                        <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#sukurtiUzsakyma" class="btn btn-primary">Sukurti užsakymą</button>
                    </div>
                    @if (count($uzsakymai) == 0)
                    Neturite užsakymų.
                    @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tema</th>
                                <th>Uzsakovas</th>
                                <th>Specialistas</th>
                                <th>Atnaujintas</th>
                                <th>Progresas</th>
                                <th>Veiksmai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($uzsakymai as $uzsakymas)
                                <tr>
                                    <td>{{$uzsakymas->tema}}</td>
                                    <td>{{$uzsakymas->uzsakovai->name}}[{{$uzsakymas->uzsakovai->id}}]</td>
                                    <td>{{$uzsakymas->specialistai->name}}[{{$uzsakymas->specialistai->id}}]</td>
                                    <td>{{$uzsakymas->data}}</td>
                                    <td>{{$uzsakymas->progresai->pavadinimas}}</td>
                                    <!------- Užsakovas------->
                                    @if( $uzsakymas->uzsakovo_id == Auth::user()->id && $uzsakymas->progresai->pavadinimas == 'Laukiama patvirtinimo')
                                    <form class="form-style-5"role="form" method="POST" action="/patvirtintiUzsakyma"> 
                                    @csrf  
                                    <input type="hidden" id="uzsakymoid" name="uzsakymoid" value="{{$uzsakymas->id}}"/>
                                    <td><button type="submit" class="btn btn-success">Patvirtinti</button>
                                    </form>
                                    <a class="btn btn-danger" onclick="javascript:return confirm('Ar tikrai nori pašalinti tai?')" href='deleteUzsakyma/{{$uzsakymas->id}}'>
                                    <span>Pašalinti</span>    
                                    </a>
                                    @endif
                                    
                                    <!------Specialistas------>
                                    @if( $uzsakymas->specialisto_id == Auth::user()->id && $uzsakymas->progresai->pavadinimas != 'Baigta' && $uzsakymas->progresai->pavadinimas != 'Laukiama patvirtinimo')
                                    <td><button type="button" onclick="giveData({{$uzsakymas->id}})" class="btn btn-primary">Keisti būsena</button>
                                    @endif
                                    @if( $uzsakymas->uzsakovo_id == Auth::user()->id && $uzsakymas->progresai->pavadinimas == 'Baigta' && $uzsakymas->progresai->pavadinimas != 'Laukiama patvirtinimo')
                                    <td><button type="button" onclick="" class="btn btn-warning">Įvertinti</button>
                                    @endif
                                    @if( $uzsakymas->specialisto_id == Auth::user()->id && $uzsakymas->progresai->pavadinimas == 'Laukiama patvirtinimo')
                                    <td><a class="btn btn-danger" onclick="javascript:return confirm('Ar tikrai nori pašalinti tai?')" href='deleteUzsakyma/{{$uzsakymas->id}}'>
                                    <span>Pašalinti</span>
                                    </a>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {{$uzsakymai->links()}}
                        </nav>
                @endif
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
                                <th>Būsena</th>
                                <th>Veiksmai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paslaugos as $paslauga)
                                <tr class="text-center">
                                    <th scope="row">{{$paslauga->id}}</th>
                                    <td><div onclick="location.href='paslauga/{{$paslauga->id}}';" style="cursor: pointer;"><b>{{$paslauga->pavadinimas}}</b></td></div>
                                    <td>{{$paslauga->busena}}</td>
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
                        Neturite sukurtų užklausų.
                    @else
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Pavadinimas</th>
                                <th>Būsena</th>
                                <th>Veiksmai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($uzklausos as $uzklausa)
                                <tr class="text-center">
                                    <th scope="row">{{$uzklausa->id}}</th>
                                    <td>{{$uzklausa->pavadinimas}}</td>
                                    <td>{{$uzklausa->busena}}</td>
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
                        Neturite sukurtų konkursų.
                    @else
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Pavadinimas</th>
                                <th>Būsena</th>
                                <th>Veiksmai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($konkursai as $konkursas)
                                <tr class="text-center">
                                    <th scope="row">{{$konkursas->id}}</th>
                                    <td>{{$konkursas->pavadinimas}}</td>
                                    <td>{{$konkursas->busena}}</td>
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
                                <th>Veiksmai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($klausimai as $klausimas)
                                <tr class="text-center">
                                    <th scope="row">{{$klausimas->id}}</th>
                                    <td>{{$klausimas->pavadinimas}}</td>
                                    <input type="hidden" name="id" id="id" value="{{$klausimas->id}}"/>
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
<script>
    function giveData(e){
        var x = e;
        $('#idas').val(x);  //The id where to pass the value
        $('#keistiProgresa').modal('show'); //The id of the modal to show
    };
</script>
<!-- Modal -->
<div class="modal fade" id="keistiProgresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Užsakymo būsenos keitimas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="keistiProgresa" method="post" action="keistiProgresa" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                    @csrf
                    <div class="inputbox mt-3 mr-2">
                            <input type="hidden" name="idas" id="idas">
                            <input type="hidden" name="progresas" id="progresas">

                            <select id="progresas" name="progresas">
                                <option style="display:none">Pasirinkite progresą</option>
                                        @foreach($progresai as $progresas)
                                        <option value="{{$progresas->id}}">{{$progresas->pavadinimas}}</option>
                                        @endforeach
                             
                            </select>
                    </div>
                </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Keisti" />
                <button type="button" class="btn btn-danger" data-dismiss="modal">Uždaryti</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="sukurtiUzsakyma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Užsakymo kūrimas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="sukurtiUzsakyma" method="post" action="sukurtiUzsakyma" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                    @csrf
                    <div class="inputbox mt-3 mr-2">
                            <input type="hidden" name="vartotojoid" id="vartotojoid">
                            <label for="uzsakovasLabel">Užsakovas:</label><br>
                            <select id="vartotojoid" name="vartotojoid" required>
                                <option style="display:none">Pasirinkite vartotoją</option>
                                    @foreach($vartotojai as $vartotojas)
                                    <option value="{{$vartotojas->id}}">{{$vartotojas->name}}[{{$vartotojas->id}}]</option>
                                    @endforeach
                            </select><br><br>
                            <label for="temaLabel">Užsakymo tema:</label>
                            <input type="text" class="form-control" name="tema" id="tema" required/>
                    </div>
                </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Sukurti" />
                <button type="button" class="btn btn-danger" data-dismiss="modal">Uždaryti</button>
            </div>
            </form>
        </div>
    </div>
</div>