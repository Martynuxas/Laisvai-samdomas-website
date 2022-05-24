<head>
<link rel="stylesheet" type="text/css" href="{{ asset('css/profilis.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/ranks.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
@include('layouts.header')
<body>
<div class="container">
    <div class="main-body">
    
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Pagrindinis</a></li>
              <li class="breadcrumb-item active" aria-current="page">Profilis</li>
            </ol>
          </nav>
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="/uploads/avatars/{{$data->avatar}}" alt="Image" class="rounded-circle" width="150">
                    <div class="mt-3">
                    
                      <h4>{{$data->name}}</h4>
                      @if( $data->lygis > 0)
                        <div class="RankBadge Rank{{$data->lygis}}"></div>
                      @endif
                      <p class="text-secondary mb-1">Atlikti užsakymai</p><b>{{$data->uzsakymuKiekis}}</b>
                      <p class="text-muted font-size-sm">{{$data->miestas}}</p>
                      @if (\Illuminate\Support\Facades\Auth::check())
                        @if(App\Http\Controllers\IsimintiController::arVartotojasIsimintas($data->id, Auth::user()->id) == false && $data->id != Auth::user()->id)
                      <form action="/isimintiVartotojaPrideti">
                        <input type="hidden" name="vartotojoid" id="vartotojoid" value="{{ $data->id }}">
                        <input type="hidden" name="kuriisimineid" id="kuriisimineid" value="{{ Auth::user()->id }}">
                          <button type="submit" class="btn btn-primary">Įsiminti</button>
                        </form>
                        @endif
                      @endif
                          <a class="btn btn-outline-primary" href="/zinutes/{{$data->id}}">Rašyti</a>
                    </div>
                  </div>
                </div>
              </div>
              @if($data->puslapis != '' || $data->github != '')
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  @if($data->puslapis != '')
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Puslapis</h6>
                    <span class="text-secondary">{{ $data->puslapis }}</span>
                  </li>
                  @endif
                  @if($data->github != '')
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                    <span class="text-secondary">{{ $data->github }}</span>
                  </li>
                  @endif
                </ul>
              </div>
              @endif
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Vardas</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$data->name}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">El. paštas</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$data->email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Telefono numeris</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$data->numeris}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Miestas</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$data->miestas}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Apie mane</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <td>{!! $data->apie !!}</td>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      @if (\Illuminate\Support\Facades\Auth::check())
                        @if ($data->id ==  Auth::user()->id)
                         <a class="btn btn-info " href="/profilisEdit">Nustatymai</a>
                         <a class="btn btn-info " href="/keistiSlaptazodi">Keisti slaptažodį</a>
                        @endif
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            <div class="container mt-5 mb-5">
                <div class="d-flex justify-content-center row">
                    <div class="d-flex flex-column col-md-8">
                        <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
                            <div class="profile-image"><img class="rounded-circle" src="/uploads/avatars/{{$data->avatar}}" width="70"></div>
                            <div class="d-flex flex-column ml-3">
                                <div class="d-flex flex-row post-title">
                                    <h5>Palikite man atsiliepimą!</h5>
                                </div>
                                <div class="d-flex flex-row align-items-center align-content-center post-title"><span class="bdge mr-1">Viso</span><span class="mr-2 comments"> {{App\Http\Controllers\ProfilisController::countAtsiliepimus( $data->id )}} atsiliepimai-(ų)&nbsp;</span></div>
                            </div>
                        </div>
                        @if (\Illuminate\Support\Facades\Auth::check())
                        <form class="form-style-5"role="form" method="POST" action="/submitAtsiliepima"> 
                        @csrf  
                          <div class="coment-bottom bg-white p-2 px-4">
                              <div class="d-flex flex-row add-comment-section mt-4 mb-4"><img class="img-fluid img-responsive rounded-circle mr-2" src="/uploads/avatars/{{Auth::user()->avatar}}" width="38">
                              <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                              <input type="text" id="tekstas" name="tekstas" class="form-control mr-3" placeholder="Rašykite atsiliepimą">
                              <button class="btn btn-primary" type="submitAtsiliepima">Pateikti</button>
                          </div>
                        </form>
                        @endif
                          @foreach($atsiliepimai as $atsiliepimas)
                            <div class="commented-section mt-2">
                                <div class="d-flex flex-row align-items-center commented-user">
                                    <h5 class="mr-2">{{$atsiliepimas->userKomentavo->name}}</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">{{$atsiliepimas->data}}</span>
                                    @if (\Illuminate\Support\Facades\Auth::check())
                                      @if ($atsiliepimas->kas_komentavo == Auth::user()->id)
                                      <form class="form-style-5"role="form" method="GET" action="/deleteAtsiliepima/{{$atsiliepimas->id}}"> 
                                      @csrf  
                                      <button type="submit" class="btn-close" onclick="javascript:return confirm('Ar tikrai norite pašalinti atsiliepimą?')" href='deleteAtsiliepima/{{$atsiliepimas->id}}'>
                                      <span class="icon-cross"></span>
                                      <span class="visually-hidden">Close</span>
                                      </button>
                                      </form>
                                      @endif
                                    @endif
                                </div>
                                <div class="comment-text-sm"><span>{{$atsiliepimas->tekstas}}.</span></div>
                            </div>
                            @endforeach
                        </div>
                        {{$atsiliepimai->links()}}
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
@include('layouts.footer')
<script src="js/main.js"></script>