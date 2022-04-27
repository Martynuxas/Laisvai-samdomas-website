
<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    @include('layouts.header')
    <body>
        <!-- Queries -->
        <div class="blog">
            <div class="container">
                <div class="section-header text-center">
                    <p>Konkursai</p>
                </div>
                @foreach ($konkursai as $konkursas )
                        <div class="blog-item" style="align: center; margin: auto; text-align: center;">
                            <div class="blog-text">
                            <div class="card p-3">
                                <h3><a href="#">{{$konkursas->pavadinimas}}</a></h3>
                                <div class="blog-meta" style="align: center; margin: auto; text-align: center;">
                                    <p><i class="fa fa-user"></i><a>{{$konkursas->kategorijos->pavadinimas}}</a></p>
                                    <p><i class="fa fa-folder"></i><a><b>{{App\Http\Controllers\KonkursasController::gautiPasiulymuSkaiciu($konkursas->id)}}</b> pasiūlymų</a></p>
                                    <p><i class="fa fa-comments"></i><a>Galioja iki: <b>{{$konkursas->galutineData}}</b></a></p>
                                </div>
                                <p>
                                {{$konkursas->aprasymas}}
                                </p>
                                </div>
                                <div>
                                <div style="align: center; margin: auto; text-align: center; padding-top: 10px">
                                <a href="pasiulymas/{{$konkursas->id}}" class="btn btn-success">Žiūrėti pasiūlymus</a>
                                @if($konkursas->galutineData > Carbon::Now())
                                    @if ($konkursas->vartotojo_id != Auth::user()->id)
                                        @if (App\Http\Controllers\KonkursasController::arJauPasiule(Auth::user()->id, $konkursas->id) == false)
                                        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#konkursoPasiulymas" onclick="giveData({{$konkursas->id}})">Pasiūlyti kainą</a>
                                        @else
                                        <a class="btn btn-success" disabled>Jau pasiūlėte</a>
                                        @endif
                                    @else
                                    <a class="btn btn-danger" disabled>Negalite sau siūlyti</a>
                                    @endif
                                @else
                                <a class="btn btn-danger" disabled>Konkursas pasibaigęs</a>
                                @endif
                                </div>
                                </div>
                            </div>
                        </div>
                    @endforeach    
                </div>
            </div>
        </div>
        <!-- Queries End -->
        @include('layouts.footer')
    </body>
        <!-- JS Lib -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="js/main.js"></script>
</html>
    <!-- Modal Konkurso pasiulymo-->
    <div class="modal fade" id="konkursoPasiulymas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konkurso pasiūlymas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" action="konkursoPasiulymas" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                        @csrf
                        <div class="form-group">
                        <label>Įveskite sumą už kurią atliktumėte šį darbą:</label>
                            <input type="text" name="sumaDarbo" id="sumaDarbo" class="form-control" pattern="[1-9]+[0-9]{0,5}" required placeholder="000"/>
                            <input type="hidden" id="konkursoId" name="konkursoId"/>
                            <label>Įveskite už kelių dienų galėtumėte pradėti darbus:</label>
                            <input type="text" name="dienuSkaicius" id="dienuSkaicius" class="form-control" pattern="[1-9]+[0-9]{0,5}" required placeholder="00"/>
                        </div>  
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Siūlyti" />
                    <button  type="button" class="btn btn-danger" data-dismiss="modal">Uždaryti</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<script>
      function giveData(e){
    var x = e;
    $('#konkursoId').val(x);  //The id where to pass the value

  };
</script>