<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    @include('layouts.header')
    <body class="hm-gradient">
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
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
</body>
</html>

<!-- Modal -->
<div class="modal fade" id="BusenosKeitimas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="hidden" name="id" id="id">
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
    <script>
        function giveData(e){
            var x = e;
            $('#id').val(x);  //The id where to pass the value
            $('#keistiProgresa').modal('show'); //The id of the modal to show
        };
    </script>