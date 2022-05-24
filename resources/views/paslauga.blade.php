<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/paslauga.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ranks.css') }}">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </head>
    @include('layouts.header')
    <body>
                @csrf 
                <div class="col-container">
                    <div class="firstCol">
                        <div class="col">
                            <h1 class="text-display-3">{{$skelbimas->pavadinimas}}</h1>
                            <section class="gallery">
                                <?php 
                                $nuotraukos = App\Http\Controllers\KurtiController::gautiNuotraukas($skelbimas->id, "skelbimas");
                                ?>
                                @for ($i = 0; $i <= count($nuotraukos)-1; $i++)
                                    @if($i == 0)
                                    <div class="gallery__item">
                                        <input type="radio" id="img-{{$i}}" checked name="gallery" class="gallery__selector"/>
                                        <img class="gallery__img" src="{{ URL::to('/images')}}/{{$nuotraukos[$i]->nuoroda}}" width="300" height="400">
                                        <label for="img-{{$i}}" class="gallery__thumb"><img src="{{ URL::to('/images')}}/{{$nuotraukos[$i]->nuoroda}}" width="100" height="100"/></label>
                                    </div>
                                    @else
                                    <div class="gallery__item">
                                        <input type="radio" id="img-{{$i}}" name="gallery" class="gallery__selector"/>
                                        <img class="gallery__img" src="{{ URL::to('/images')}}/{{$nuotraukos[$i]->nuoroda}}" width="300" height="400"/>
                                        <label for="img-{{$i}}" class="gallery__thumb"><img src="{{ URL::to('/images')}}/{{$nuotraukos[$i]->nuoroda}}" width="100" height="100"/></label>
                                    </div>
                                    @endif
                                @endfor
                            </section>
                            
                            <div class="text-display">{!! $skelbimas->aprasymas !!}</div>
                        </div>
                    </div>
                        <div class="col">
                            <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                                <div class="card p-4">
                                    <?php 
                                    $vartotojas = App\Http\Controllers\SkelbimaiController::gautiVartotoja($skelbimas->vartotojo_id);
                                    ?>
                                    <div class="profileInfo">
                                        <div class=" image d-flex flex-column justify-content-center align-items-center"> <button> <img src="/uploads/avatars/{{$vartotojas->avatar}}" height="100" width="100" /></button> <span class="name mt-3"><td><div onclick="location.href='/profilis/{{$vartotojas->id}}';" style="cursor: pointer;">{{$vartotojas->name}}</div></td></span> 
                                            @if( $vartotojas->lygis > 0)
                                                <div class="RankBadge Rank{{$vartotojas->lygis}}"></div><br>
                                            @endif
                                            @if($vartotojas->email != '')
                                            <span class="idd">{{$vartotojas->email}} 
                                                <div class="miniText">el. paštas</div>
                                                <br></span>
                                            @endif
                                            @if($vartotojas->numeris != '')
                                            <span class="idd">{{$vartotojas->numeris}} 
                                                <div class="miniText">numeris</div>
                                            <br></span>
                                            @endif
                                            @if($vartotojas->puslapis != '')
                                            <span class="idd">{{$vartotojas->puslapis}} 
                                                <div class="miniText">puslapis</div>
                                                <br></span>
                                            @endif
                                            @if($vartotojas->github != '')
                                                <span class="idd">{{$vartotojas->github}}
                                                    <div class="miniText">gitub</div>
                                                    <br></span>
                                            @endif
                                            <span class="idd d-flex flex-column justify-content-center align-items-center">{{$vartotojas->uzsakymuKiekis}}
                                                <div class="miniText ">Atlikti užsakymai</div>
                                                <br></span>
                                            
                                            <div class="text mt-3"> <span>{!! $vartotojas->apie !!}</div>
                                                
                                            <div class=" px-2 rounded mt-4 date "> <span class="join">Nuo {{$vartotojas->created_at}}</span> </div>
                                            <br>
                                            <a class="btn btn-primary" href="/zinutes/{{$skelbimas->vartotojo_id}}">Rašyti</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $planai = App\Http\Controllers\SkelbimaiController::gautiSkelbimoPlanus($skelbimas->id);?>

                                
                                <div class="content">
                                    <ul class="nav nav-pills" role="tablist">
                                        @if(count($planai)>0)
                                        @for ($n = 0; $n <= count($planai)-1; $n++)
                                            @if($n == 0)
                                                <li class="nav-itemai">
                                                    <a class="nav-link active" data-toggle="pill" href="#{{$planai[$n]->pavadinimas}}">{{$planai[$n]->pavadinimas}}</a>
                                                </li>
                                            @else
                                                <li class="nav-itemai">
                                                    <a class="nav-link" data-toggle="pill" href="#{{$planai[$n]->pavadinimas}}">{{$planai[$n]->pavadinimas}}</a>
                                                </li>
                                            @endif
                                        @endfor
                                    </ul>
                                    <div class="tab-content">
                                    @for ($s = 0; $s <= count($planai)-1; $s++)
                                    @if($s == 0)
                                        <div id="{{$planai[$s]->pavadinimas}}" class="container tab-pane active">
                                            <div class="plan-info">
                                                <div class="price-name">{{$planai[$s]->pavadinimas}}</div>
                                                <div class="price-sum">{{$planai[$s]->kaina}}€</div>
                                                <div class="price-type">{{$planai[$s]->kainos_tipas}}</div>
                                            </div>
                                            @if($planai[$s]->tekstas_1 != '') <input type="text" class="form-control is-valid" id="exampleFormControlInput1" placeholder="{{$planai[$s]->tekstas_1}}" disabled><br> @endif
                                            @if($planai[$s]->tekstas_2 != '') <input type="text" class="form-control is-valid" id="exampleFormControlInput1" placeholder="{{$planai[$s]->tekstas_2}}" disabled><br> @endif
                                            @if($planai[$s]->tekstas_3 != '') <input type="text" class="form-control is-valid" id="exampleFormControlInput1" placeholder="{{$planai[$s]->tekstas_3}}" disabled><br> @endif
                                            @if($planai[$s]->tekstas_4 != '') <input type="text" class="form-control is-valid" id="exampleFormControlInput1" placeholder="{{$planai[$s]->tekstas_4}}" disabled><br> @endif
                                            @if($planai[$s]->tekstas_5 != '') <input type="text" class="form-control is-valid" id="exampleFormControlInput1" placeholder="{{$planai[$s]->tekstas_5}}" disabled><br> @endif
                                            
                                        </div>
                                    @else
                                        <div id="{{$planai[$s]->pavadinimas}}" class="container tab-pane fade">
                                            <div class="plan-info">
                                                <div class="price-name">{{$planai[$s]->pavadinimas}}</div>
                                                <div class="price-sum">{{$planai[$s]->kaina}}€</div>
                                                <div class="price-type">{{$planai[$s]->kainos_tipas}}</div>
                                            </div>
                                            @if($planai[$s]->tekstas_1 != '') <input type="text" class="form-control is-valid" id="exampleFormControlInput1" placeholder="{{$planai[$s]->tekstas_1}}" disabled><br> @endif
                                            @if($planai[$s]->tekstas_2 != '') <input type="text" class="form-control is-valid" id="exampleFormControlInput1" placeholder="{{$planai[$s]->tekstas_2}}" disabled><br> @endif
                                            @if($planai[$s]->tekstas_3 != '') <input type="text" class="form-control is-valid" id="exampleFormControlInput1" placeholder="{{$planai[$s]->tekstas_3}}" disabled><br> @endif
                                            @if($planai[$s]->tekstas_4 != '') <input type="text" class="form-control is-valid" id="exampleFormControlInput1" placeholder="{{$planai[$s]->tekstas_4}}" disabled><br> @endif
                                            @if($planai[$s]->tekstas_5 != '') <input type="text" class="form-control is-valid" id="exampleFormControlInput1" placeholder="{{$planai[$s]->tekstas_5}}" disabled><br> @endif
                                        </div>
                                    @endif
                                    @endfor
                                    </div>
                                @endif
                                <div class="duk">
                                    @if($duks != '')
                                    <b>DUK(Dažniausiai užduodami klausimai)</b>
                                            @if($duks->klausimas1 != '')
                                            <details>
                                                <summary>
                                                {{$duks->klausimas1}}
                                                </summary>
                                                <div>
                                                {{$duks->atsakymas1}}
                                                </div>
                                            </details>
                                            @endif
                                            @if($duks->klausimas2 != '')
                                            <details>
                                                <summary>
                                                {{$duks->klausimas2}}
                                                </summary>
                                                <div>
                                                {{$duks->atsakymas2}}
                                                </div>
                                            </details>
                                            @endif
                                            @if($duks->klausimas3 != '')
                                            <details>
                                                <summary>
                                                {{$duks->klausimas3}}
                                                </summary>
                                                <div>
                                                {{$duks->atsakymas3}}
                                                </div>
                                            </details>
                                            @endif
                                            @if($duks->klausimas4 != '')
                                            <details>
                                                <summary>
                                                {{$duks->klausimas4}}
                                                </summary>
                                                <div>
                                                {{$duks->atsakymas4}}
                                                </div>
                                            </details>
                                            @endif
                                            @if($duks->klausimas5 != '')
                                            <details>
                                                <summary>
                                                {{$duks->klausimas5}}
                                                </summary>
                                                <div>
                                                {{$duks->atsakymas5}}
                                                </div>
                                            </details>
                                            @endif
                                    @endif
                                    </div>
                            </div>
                    </div>
                </div>
            @if (\Illuminate\Support\Facades\Auth::check())
            <div class="container mt-5 mb-5">
                <div class="d-flex justify-content-center row">
                    <div class="d-flex flex-column col-md-8">
                        <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
                            <div class="d-flex flex-column ml-3">
                                <div class="d-flex flex-row post-title">
                                    <h5>Palikite man komentarą!</h5>
                                </div>
                                <div class="d-flex flex-row align-items-center align-content-center post-title"><span class="bdge mr-1">Viso</span><span class="mr-2 comments"> {{App\Http\Controllers\KomentarasController::countKomentarus( $skelbimas->id )}} komentarų-(ų)&nbsp;</span></div>
                            </div>
                        </div>
                        <form class="form-style-5"role="form" method="POST" action="/submitKomentara"> 
                        @csrf  
                          <div class="coment-bottom bg-white p-2 px-4">
                              <div class="d-flex flex-row add-comment-section mt-4 mb-4"><img class="img-fluid img-responsive rounded-circle mr-2" src="/uploads/avatars/{{Auth::user()->avatar}}" width="38">
                              <input type="hidden" name="vartotojoid" id="vartotojoid" value="{{ $skelbimas->vartotojo_id }}">
                              <input type="hidden" name="id" id="id" value="{{ $skelbimas->id }}">
                              <input type="text" id="tekstas" name="tekstas" class="form-control mr-3" placeholder="Rašykite komentara">
                              <button class="btn btn-primary" type="submitKomentara">Pateikti</button>
                          </div>
                        </form>
                            @foreach($komentarai as $komentaras)
                            <div class="commented-section mt-2">
                                <div class="d-flex flex-row align-items-center commented-user">
                                    <h5 class="mr-2">{{$komentaras->userKomentavo->name}}</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">{{$komentaras->data}}</span>
                                    @if ($komentaras->vartotojo_id == Auth::user()->id)
                                    <form class="form-style-5"role="form" method="GET" action="/deleteKomentara/{{$komentaras->id}}"> 
                                    @csrf  
                                    <button type="submit" class="btn-close" onclick="javascript:return confirm('Ar tikrai norite pašalinti komentara?')" href='deleteKomentara/{{$komentaras->id}}'>
                                    <span class="icon-cross"></span>
                                    <span class="visually-hidden">Close</span>
                                    </button>
                                    </form>
                                    @endif
                                </div>
                                <div class="comment-text-sm"><span>{{$komentaras->tekstas}}.</span></div>
                            </div>
                            @endforeach
                            {{$komentarai->links()}}
                    </div>
                </div>
            </div>
            @endif
        </div>
        @include('layouts.footer')
    </body>
    <script src="js/main.js"></script>
</html>