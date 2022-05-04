<!DOCTYPE html>
<html lang="en">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/paslaugos.css') }}">
    @include('layouts.header')
    <body>
        <!-- Slider -->
        <div class="carousel">
                    <div class="container-fluid">
                        <div class="owl-carousel">
                            <div class="carousel-item">
                                <div class="carousel-img">
                                    <img src="img/carousel-1.png" alt="Image">
                                </div>
                                <div class="carousel-text">
                                    <h3>Greitai ir patogiai surask, kas suteiks paslaugą</h3>
                                    <h1>talpink užklausą</h1>
                                    <div class="col-lg-5">
                                        <div class="location-form">                                
                                                <div>
                                                    <button class="btn btn-custom" type="submit">Ieškoti paslaugų</button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-img">
                                    <img src="img/carousel-2.jpg" alt="Image">
                                </div>
                                <div class="carousel-text">
                                    <h3>Greitai ir patogiai surask, kas suteiks paslaugą</h3>
                                    <h1>gauk pasiūlymus</h1>
                                    <div class="col-lg-5">
                                        <div class="location-form">
                                                <div>
                                                    <button class="btn btn-custom" type="submit">Ieškoti paslaugų</button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-img">
                                    <img src="img/carousel-3.png" alt="Image">
                                </div>
                                <div class="carousel-text">
                                    <h3>Greitai ir patogiai surask, kas suteiks paslaugą</h3>
                                    <h1>išsirink tinkamiausią</h1>
                                    <div class="col-lg-5">
                                        <div class="location-form">
                                                <div>
                                                    <button class="btn btn-custom" type="submit">Ieškoti paslaugų</button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="blog">
                    <div class="container">
                        <div class="section-header text-center">
                            <p>Naujausios paslaugos</p>
                        </div>
                        <div class="row">
                            @foreach ($skelbimai as $skelbimas )
                                <div class="card-h " style="margin-right: 10px;" >
                                    <div class="card-thumbnail" onclick="location.href='paslauga/{{$skelbimas->id}}'" style="cursor: pointer;">
                                    <img src="{{ URL::to('/images')}}/{{App\Http\Controllers\SkelbimaiController::gautiPirmaNuotrauka($skelbimas->id)}}">
                                    <div class="tag tag-primary card-tag">
                                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.32595 11.2559L5.56198 10.556C2.84698 8.094 1.05398 6.47002 1.05398 4.47702C1.0501 4.0951 1.12245 3.71623 1.26681 3.36264C1.41118 3.00904 1.62467 2.68776 1.89474 2.41769C2.16481 2.14762 2.48603 1.93425 2.83963 1.78988C3.19322 1.64552 3.57209 1.57311 3.95401 1.57699C4.40501 1.58027 4.85002 1.68009 5.25918 1.86984C5.66834 2.05958 6.0321 2.33482 6.32595 2.67697C6.61981 2.33482 6.98357 2.05958 7.39273 1.86984C7.80189 1.68009 8.24696 1.58027 8.69796 1.57699C9.07984 1.57325 9.45863 1.64571 9.81216 1.79013C10.1657 1.93454 10.4869 2.14802 10.7569 2.41806C11.027 2.68809 11.2404 3.00922 11.3849 3.36276C11.5293 3.71629 11.6017 4.09514 11.598 4.47702C11.598 6.47002 9.80599 8.094 7.08999 10.561L6.32595 11.2559Z" fill="#1A1A1A"/>
                                        </svg>
                                        Populiarus
                                    </div>
                                        <div class="card-specialties">
                                            {{$skelbimas->users->name ?? 'Nežinomas'}}[{{$skelbimas->users->id ?? ''}}]
                                            @if( $skelbimas->users->lygis > 0)
                                            @if( $skelbimas->users->lygis == 1)
                                                <br><b>Administratorius</b>
                                            @endif
                                            @if( $skelbimas->users->lygis == 2)
                                                <br><b>Moderatorius</b>
                                            @endif
                                            @if( $skelbimas->users->lygis == 3)
                                                <br><b>TOP pardavėjas</b>
                                            @endif
                                            @if( $skelbimas->users->lygis == 4)
                                                <br><b>1 lygio pardavėjas</b>
                                            @endif
                                            @if( $skelbimas->users->lygis == 5)
                                                <br><b>2 lygio pardavėjas</b>
                                            @endif
                                            @if( $skelbimas->users->lygis == 6)
                                                <br><b>3 lygio pardavėjas</b>
                                            @endif
                                            @endif        
                                        </div>
                                    </div>
                                    <div class="card-body">
                                    <h3 class="card-title">
                                        {{$skelbimas->pavadinimas}}
                                    </h3>
                                        <i class="fa fa-city"></i> {{$skelbimas->miestas}}
                                        <br>
                                        <i class="fa fa-comments"></i> {{App\Http\Controllers\PaslaugosController::KomentaruSkaicius($skelbimas->id)}} komentarų
                                        <br>
                                        @if (\Illuminate\Support\Facades\Auth::check())
                                        <div class="remember" id="remember{{$skelbimas->id}}">
                                            @if(App\Http\Controllers\IsimintiController::arPaslaugaIsiminta(Auth::user()->id,$skelbimas->id) == false)
                                            <i class="far fa-heart" onclick="isimintiPaslauga({{$skelbimas->id}},'remember{{$skelbimas->id}}')" style="cursor: pointer;">&nbsp;{{App\Http\Controllers\PaslaugosController::IsiminimuSkaicius($skelbimas->id)}} įsiminti</i>
                                            @else
                                                <i class="fas fa-heart" onclick="pamirstiPaslauga({{$skelbimas->id}},'remember{{$skelbimas->id}}')" style="cursor: pointer;">&nbsp;{{App\Http\Controllers\PaslaugosController::IsiminimuSkaicius($skelbimas->id)}} pamiršti</i>
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                        </div>
                    </div>
                </div>
                <div class="facts" data-parallax="scroll" data-image-src="img/facts.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="facts-item">
                                    <i class="fa fa-check"></i>
                                    <div class="facts-text">
                                        <h3 data-toggle="counter-up">1,105</h3>
                                        <p>aktyvių paslaugų teikėjų</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="facts-item">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <i class="fa fa-user"></i>
                                    <div class="facts-text">
                                        <h3 data-toggle="counter-up">3,325</h3>
                                        <p>paslaugų teikėjų rekomendacijų</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="facts-item">
                                    <i class="fa fa-users"></i>
                                    <div class="facts-text">
                                        <h3 data-toggle="counter-up">12,513</h3>
                                        <p>bendrų klientų užklausų</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="facts-item">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <div class="facts-text">
                                        <h3 data-toggle="counter-up">321,845</h3>
                                        <p>Apsilankymų per 2021m</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Facts End -->
                @include('layouts.footer')
                <script src="lib/owlcarousel/owl.carousel.min.js"></script>
                <!-- Template Javascript -->
                <script src="js/main.js"></script>
    </body>

</html>
<script>
    const isimintiPaslauga = (index, divName) =>{
      const div = document.getElementById(divName);
      console.log(divName.innerHTML);
      var id = index;
          if(confirm('Ar tikrai norite įsiminti paslaugą?')) {
          $.ajax({
              type: "GET",
              url: "/isimintiPaslauga/"+id,
              success: function(result) {
                  div.innerHTML =`<i class="fas fa-heart" onclick="pamirstiPaslauga({{$skelbimas->id}},'remember{{$skelbimas->id}}')" style="cursor: pointer;">&nbsp; pamiršti</i>`;
              }
          });
          }
    }
    const pamirstiPaslauga= (index, divName) =>{
      const div = document.getElementById(divName);
      console.log(divName.innerHTML);
      var id = index;
          if(confirm('Ar tikrai norite pamiršti paslaugą?')) {
          $.ajax({
              type: "GET",
              url: "/isimintiPaslauga/"+id,
              success: function(result) {
                  div.innerHTML =`<i class="far fa-heart" onclick="isimintiPaslauga({{$skelbimas->id}},'remember{{$skelbimas->id}}')" style="cursor: pointer;">&nbsp; įsiminti</i>`;
              }
          });
          }
    }
  </script>