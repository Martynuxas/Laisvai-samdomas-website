<link rel="stylesheet" type="text/css" href="{{ asset('css/paslaugos.css') }}">
<head>
@include('layouts.head')
</head>
@include('layouts.header')
<body>
<div class="wrapper wrapper-light">
  <div class="scrollable-container">
    <div class="scrollable-cards">

    @foreach ($skelbimai as $skelbimas )
      <div class="card-h">
        <div class="card-thumbnail">
          <img src="img/blog-1.jpg" onclick="location.href='paslauga/{{$skelbimas->id}}';" style="cursor: pointer;">
          <div class="tag tag-primary card-tag">
            <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.32595 11.2559L5.56198 10.556C2.84698 8.094 1.05398 6.47002 1.05398 4.47702C1.0501 4.0951 1.12245 3.71623 1.26681 3.36264C1.41118 3.00904 1.62467 2.68776 1.89474 2.41769C2.16481 2.14762 2.48603 1.93425 2.83963 1.78988C3.19322 1.64552 3.57209 1.57311 3.95401 1.57699C4.40501 1.58027 4.85002 1.68009 5.25918 1.86984C5.66834 2.05958 6.0321 2.33482 6.32595 2.67697C6.61981 2.33482 6.98357 2.05958 7.39273 1.86984C7.80189 1.68009 8.24696 1.58027 8.69796 1.57699C9.07984 1.57325 9.45863 1.64571 9.81216 1.79013C10.1657 1.93454 10.4869 2.14802 10.7569 2.41806C11.027 2.68809 11.2404 3.00922 11.3849 3.36276C11.5293 3.71629 11.6017 4.09514 11.598 4.47702C11.598 6.47002 9.80599 8.094 7.08999 10.561L6.32595 11.2559Z" fill="#1A1A1A"/>
            </svg>
            Populiarus
          </div>
          
          <div class="card-specialties">
          {{$skelbimas->users->name ?? 'Nežinomas'}}
          </div>
        </div>
        <div class="card-body">
          <h3 class="card-title">
            {{$skelbimas->pavadinimas}}
          </h3>
          <div class="card-name">
            Nuo: <b>{{$skelbimas->valandinis}}eur</b>
          </div>
        </div>
        <div class="card-foot">
          @if(App\Http\Controllers\IsimintiController::arPaslaugaIsiminta(Auth::user()->id,$skelbimas->id) == false)
            <i class="far fa-heart" onclick="location.href='isimintiPaslauga/{{$skelbimas->id}}';" style="cursor: pointer;"></i>
          @else
            <i class="fas fa-heart" onclick="location.href='pamirstiPaslauga/{{$skelbimas->id}}';" style="cursor: pointer;"></i>
          @endif
        <div class="card-rating">
            <div class="stars">
              <svg width="10px" viewBox="0 0 20 20" fill="#FFD100">
                <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78">
              </svg>
              <svg width="10px" viewBox="0 0 20 20" fill="#FFD100">
                <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78">
              </svg>
              <svg width="10px" viewBox="0 0 20 20" fill="#FFD100">
                <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78">
              </svg>
              <svg width="10px" viewBox="0 0 20 20" fill="#FFD100">
                <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78">
              </svg>
              <svg width="10px" viewBox="0 0 20 20" fill="#FFD100">
                <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78">
              </svg>
            </div>
            7 komentarai    
          </div>
        </div>
      </div>
    @endforeach
    </div>
  </div>
</div>
</body>
@include('layouts.footer')