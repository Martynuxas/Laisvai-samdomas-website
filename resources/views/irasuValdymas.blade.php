<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/valdymas.css') }}">
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
                                <th>Suma</th>
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
                                    <td>{{$uzsakymas->suma}}</td>
                                    <td>{{$uzsakymas->data}}</td>
                                    <td>{{$uzsakymas->progresai->pavadinimas}}</td>
                                    <!------- Užsakovas------->
                                    @if($uzsakymas->uzsakovo_id == Auth::user()->id && $uzsakymas->progresai->pavadinimas == 'Laukiama patvirtinimo')
                                    <form class="form-style-5"role="form" method="POST" action="/patvirtintiUzsakyma"> 
                                    @csrf  
                                    <input type="hidden" id="uzsakymoid" name="uzsakymoid" value="{{$uzsakymas->id}}"/>
                                    <td><button type="submit" class="btn btn-success">Patvirtinti</button>
                                    </form>
                                    <a class="btn btn-danger" onclick="javascript:return confirm('Ar tikrai nori pašalinti tai?')" href='deleteUzsakyma/{{$uzsakymas->id}}'>
                                    <span>Pašalinti</span>    
                                    </a>
                                    @endif
                                    @if($uzsakymas->uzsakovo_id == Auth::user()->id && $uzsakymas->patvirtinimas == 1)
                                    <form class="form-style-5"role="form" method="POST" action="/patvirtintiProgresa"> 
                                        @csrf  
                                        <input type="hidden" id="uzsakymoid" name="uzsakymoid" value="{{$uzsakymas->id}}"/>
                                        <td><button type="submit" class="btn btn-success">Patvirtinti</button>
                                    </form>
                                    <form class="form-style-5"role="form" method="POST" action="/grazintiProgresa"> 
                                        @csrf  
                                        <input type="hidden" id="uzsakymoid" name="uzsakymoid" value="{{$uzsakymas->id}}"/>
                                        <td><button type="submit" class="btn btn-danger">Atšaukti</button>
                                    </form>
                                    @endif
                                    @if( $uzsakymas->uzsakovo_id == Auth::user()->id && $uzsakymas->progresai->pavadinimas == 'Baigta' && $uzsakymas->progresai->pavadinimas != 'Laukiama patvirtinimo' && $uzsakymas->patvirtinimas == 0 && (App\Http\Controllers\PaslaugosController::arJauIvertintas($uzsakymas->id) == false))
                                    <td><button type="button" onclick="ivertintiPaslauga({{$uzsakymas->id}},{{$uzsakymas->specialisto_id}})" class="btn btn-warning">Įvertinti</button>
                                    @endif
                                    <!------Specialistas------>
                                    @if( $uzsakymas->specialisto_id == Auth::user()->id && $uzsakymas->progresai->pavadinimas != 'Baigta' && $uzsakymas->progresai->pavadinimas != 'Laukiama patvirtinimo' && $uzsakymas->patvirtinimas != 1)
                                    <td><button type="button" onclick="giveData({{$uzsakymas->id}},{{$uzsakymas->progresas}})" class="btn btn-primary">Keisti progresa</button>
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
    <script src="js/main.js"></script>
</html>
<script>
    function giveData(e, progresas){
        $('#idas').val(e);  //The id where to pass the value
        $('#keistiProgresa').modal('show'); //The id of the modal to show
    };
    function ivertintiPaslauga(e, b){
        $('#paslaugosId').val(e);  //The id where to pass the value
        $('#specialistoId').val(b);  //The id where to pass the value
        $('#ivertintiPaslauga').modal('show'); //The id of the modal to show
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
                                        @if(2 < $progresas->id)
                                        <option value="{{$progresas->id}}">{{$progresas->pavadinimas}}</option>
                                        @endif
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
                            <label for="uzsakovasLabel"><b>! Užsakymą kuria specialistas !</b></label><br>
                            <label for="uzsakovasLabel">Užsakovas:</label><br>
                            <select id="vartotojoid" name="vartotojoid" required>
                                <option style="display:none">Pasirinkite vartotoją</option>
                                    @foreach($vartotojai as $vartotojas)
                                    <option value="{{$vartotojas->id}}">{{$vartotojas->name}}[{{$vartotojas->id}}]</option>
                                    @endforeach
                            </select><br><br>
                            <label for="temaLabel">Tema:</label>
                            <input type="text" class="form-control" name="tema" id="tema" required/>
                            <label for="temaLabel">Suma:</label>
                            <input type="text" class="form-control" name="suma" id="suma" required/>
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
<!-- Modal įvertinimo-->
<div class="modal fade" id="ivertintiPaslauga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atliktos paslaugos įvertinimas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="ivertintiPaslauga" method="post" action="ivertintiPaslauga" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                    @csrf
                    <input type="hidden" name="paslaugosId" id="paslaugosId">
                    <input type="hidden" name="specialistoId" id="specialistoId">
                    <div id="full-stars-example-two">
                        <p class="desc" style="font-family: sans-serif; font-size:0.9rem">
                            Ar specialistas paslaugą atliko laiku?</p>
                        <div class="rating-group">
                            <input disabled checked class="rating__input rating__input--none" name="rating1" id="rating1-none" value="0" type="radio" required>
                            <label aria-label="1 star" class="rating__label" for="rating1-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating1" id="rating1-1" value="1" type="radio" required>
                            <label aria-label="2 stars" class="rating__label" for="rating1-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating1" id="rating1-2" value="2" type="radio">
                            <label aria-label="3 stars" class="rating__label" for="rating1-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating1" id="rating1-3" value="3" type="radio">
                            <label aria-label="4 stars" class="rating__label" for="rating1-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating1" id="rating1-4" value="4" type="radio">
                            <label aria-label="5 stars" class="rating__label" for="rating1-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating1" id="rating1-5" value="5" type="radio">
                        </div>
                    </div>
                    <div id="full-stars-example-two">
                        <p class="desc" style="font-family: sans-serif; font-size:0.9rem">
                            Ar specialistas atliko paslaugą taip kaip buvo sutarta?</p>
                        <div class="rating-group">
                            <input disabled checked class="rating__input rating__input--none" name="rating2" id="rating2-none" value="0" type="radio" required>
                            <label aria-label="1 star" class="rating__label" for="rating2-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating2" id="rating2-1" value="1" type="radio" required>
                            <label aria-label="2 stars" class="rating__label" for="rating2-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating2" id="rating2-2" value="2" type="radio">
                            <label aria-label="3 stars" class="rating__label" for="rating2-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating2" id="rating2-3" value="3" type="radio">
                            <label aria-label="4 stars" class="rating__label" for="rating2-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating2" id="rating2-4" value="4" type="radio">
                            <label aria-label="5 stars" class="rating__label" for="rating2-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating2" id="rating2-5" value="5" type="radio">
                        </div>
                    </div>
                    <div id="full-stars-example-two">
                        <p class="desc" style="font-family: sans-serif; font-size:0.9rem">
                            Ar specialistas greit suteikė atgalinį ryšį?</p>
                        <div class="rating-group">
                            <input disabled checked class="rating__input rating__input--none" name="rating3" id="rating3-none" value="0" type="radio" required>
                            <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating3" id="rating3-1" value="1" type="radio" required>
                            <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating3" id="rating3-2" value="2" type="radio">
                            <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating3" id="rating3-3" value="3" type="radio">
                            <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating3" id="rating3-4" value="4" type="radio">
                            <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating3" id="rating3-5" value="5" type="radio">
                        </div>
                    </div>
                    <div id="full-stars-example-two">
                        <p class="desc" style="font-family: sans-serif; font-size:0.9rem">
                            Ar specialistas davė pasiūlymų/sprendimų?</p>
                        <div class="rating-group">
                            <input disabled checked class="rating__input rating__input--none" name="rating4" id="rating4-none" value="0" type="radio" required>
                            <label aria-label="1 star" class="rating__label" for="rating4-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating4" id="rating4-1" value="1" type="radio" required>
                            <label aria-label="2 stars" class="rating__label" for="rating4-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating4" id="rating4-2" value="2" type="radio">
                            <label aria-label="3 stars" class="rating__label" for="rating4-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating4" id="rating4-3" value="3" type="radio">
                            <label aria-label="4 stars" class="rating__label" for="rating4-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating4" id="rating4-4" value="4" type="radio">
                            <label aria-label="5 stars" class="rating__label" for="rating4-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating4" id="rating4-5" value="5" type="radio">
                        </div>
                    </div>
                    <div id="full-stars-example-two">
                        <p class="desc" style="font-family: sans-serif; font-size:0.9rem">
                            Ar specialistas paslauga atliko kokybiškai?</p>
                        <div class="rating-group">
                            <input disabled checked class="rating__input rating__input--none" name="rating5" id="rating5-none" value="0" type="radio" required>
                            <label aria-label="1 star" class="rating__label" for="rating5-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating5" id="rating5-1" value="1" type="radio" required>
                            <label aria-label="2 stars" class="rating__label" for="rating5-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating5" id="rating5-2" value="2" type="radio">
                            <label aria-label="3 stars" class="rating__label" for="rating5-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating5" id="rating5-3" value="3" type="radio">
                            <label aria-label="4 stars" class="rating__label" for="rating5-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating5" id="rating5-4" value="4" type="radio">
                            <label aria-label="5 stars" class="rating__label" for="rating5-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating5" id="rating5-5" value="5" type="radio">
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Įvertinti" />
                <button type="button" class="btn btn-danger" data-dismiss="modal">Uždaryti</button>
            </div>
            </form>
        </div>
    </div>
</div>