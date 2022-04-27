    <head>
        <meta charset="utf-8">
        <title>LaisvaiSamdomas - paslaugų portalas</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link href="img/favicon.png" rel="icon">
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="{{ asset('css/dropdown.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    </head>

<!-- Top -->
        <div class="top-bar">
            <div class="container">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <h1>Laisvai<span> Samdomas</span>.lt</h1>
                            </a>
                        </div>
                </div>        
            @if (\Illuminate\Support\Facades\Auth::check())
            <div class="profile-dropdown">
                <div class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action"><img src="/uploads/avatars/{{Auth::user()->avatar}}" alt="Image" class="rounded-circle" width="50" height="50"> <b style="color: black;">{{ Auth::user()->name }}[{{ Auth::user()->id }}]</b><b class="caret"></b></a>
                    <div class="dropdown-menu">
                    <a href="{{ url('/kurtiPaslauga')}}" class="dropdown-item"><i class="fa fa-paper-plane"></i> Sukurti paslauga</a>
                        <a href="{{ url('/kurti') }}" class="dropdown-item"><i class="fa fa-search"></i> Sukurti užklausą</a>
                        <a href="{{ url('/valdymas') }}" class="dropdown-item"><i class="fa fa-check-square"></i> Valdymas</a>
                        <a href="" class="dropdown-item" data-toggle="modal" data-target="#pokalbisModal"><i class="fa fa-phone"></i> Pokalbis</a>
                        <a href="{{ url('/profilis') }}/{{ Auth::user()->id }}" class="dropdown-item"><i class="fa fa-user"></i> Profilis</a>
                        <a href="{{ url('/kalendorius') }}" class="dropdown-item"><i class="fa fa-calendar-o"></i> Kalendorius</a>
                        <a href="{{ url('/zinutes') }}" class="dropdown-item"><i class="fa fa-envelope"></i> Žinutės<?php if(App\Http\Controllers\PranesimaiController::getMessagesSum()>0)
                            echo '[' . App\Http\Controllers\PranesimaiController::getMessagesSum() . ']';
                        ?></a>
                        <a href="{{ url('/pranesimai') }}" class="dropdown-item"><i class="fa fa-bell"></i> Pranešimai</a>
                        <a href="{{ url('/tab1') }}" class="dropdown-item"><i class="fa fa-heart"></i> Įsiminti</a>
                        <a href="" class="dropdown-item" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-money"></i> Piniginė: {{ Auth::user()->valiuta }}€</a>
                        <div class="divider dropdown-divider"></div>
                        <a href="{{ url('/logout') }}" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Atsijungti</a>
                    </div>
                </div>
            </div>
            @else
                            <div class="ml-auto">
                                <a class="btn btn-custom" href="{{ route('login') }}">Prisijungti</a>
                            </div>
                            <div class="ml-auto">
                                <a class="btn btn-custom" href="{{ route('register') }}">Registruotis</a>
                            </div>
            @endif
        </div>
        <!-- Top End -->
        <div class="nav-bar">
                    <div class="container">
                        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                            <a href="#" class="navbar-brand">MENIU</a>
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                <div class="navbar-nav mr-auto">
                                    <a href="{{ route('paslaugos') }}" class="nav-item nav-link">Ieškoti paslaugų</a>
                                    <a href="{{ route('prenumeratos') }}" class="nav-item nav-link">Gauti pasiūlymus</a>
                                    <a href="{{ route('uzklausa') }}" class="nav-item nav-link">Klientų užklausos</a>
                                    <a href="{{ route('konkursai') }}" class="nav-item nav-link">Konkursai</a>
                                    <a href="{{ route('kontaktai') }}" class="nav-item nav-link">Kontaktai</a>
                                </div>
                                <div class="ml-auto">
                                    <a class="btn btn-custom" href="{{ route('kurti') }}">Sukurti užklausą</a>
                            
                                        <a class="btn btn-custom" href="{{ URL::previous() }}">Atgal</a>
                                </div>
                            </div>
                        </nav>
                    </div>
        </div>
<!-- Modal -->
 <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Valiutos pirkimas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="chooseAmount" method="post" action="mokejimasRed" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                        @csrf
                        <div class="form-group">
                            <label>Įveskite kiekį, kurį norite pirkti(3%+0.3€ mokestis):</label>
                            <input type="text" name="suma" id="suma" class="form-control" pattern="[1-9]+[0-9]{0,5}" required placeholder="000"/>
                        </div>  
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Tęsti" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Uždaryti</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for selection-->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Piniginės valdymas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="chooseAmount" method="post" action="mokejimasRed" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                        @csrf
                        <div class="form-group">
                            <label>Pasirinkite ką norite atlikti:</label><br>
                            <input data-dismiss="modal" data-toggle="modal" data-target="#exampleModal3" class="btn btn-success" value="Pervesti valiutą" />
                            <input data-dismiss="modal" data-toggle="modal" data-target="#exampleModal2" class="btn btn-success" value="Įsidėti valiutos" />
                        </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Uždaryti</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal to transfer money-->
 <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Valiutos pervedimas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="chooseAmount" method="post" action="pervedimas" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                        @csrf
                        <div class="form-group">
                        <label>Įveskite vartotojo id kuriam norite pervesti valiutą:</label>
                            <input type="text" name="vartotojoid" id="vartotojoid" class="form-control" pattern="[1-9]+[0-9]{0,5}" required placeholder="000"/>
                            <label>Įveskite kiekį, kurį norite pervesti vartotojui:</label>
                            <input type="text" name="sumaPervedimo" id="sumaPervedimo" class="form-control" pattern="[1-9]+[0-9]{0,5}" required placeholder="000"/>
                        </div>  
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Pervesti" />
                    <button  type="button" class="btn btn-danger" data-dismiss="modal">Uždaryti</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!---MODAL pokalbiam-->

 <div class="modal fade" id="pokalbisModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pokalbių kambario valdymas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="" method="post" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                        @csrf
                        <div class="form-group">
                            @if (\Illuminate\Support\Facades\Auth::check())
                             <label>Jūsų kambario slaptažodis: {{ Auth::user()->kambarioSlaptazodis }}</label><br>
                            @endif
                            <label>Pasirinkite ką norite atlikti:</label><br>
                            <a class="btn btn-success" href="manoKambarys">Mano kambarys</a>
                            <input data-dismiss="modal" data-toggle="modal" data-target="#kambarioPasirinkimasModal" class="btn btn-success" value="Kito asmens kambarys" />
                        </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Uždaryti</button>
                </div>
                </form>
            </div>
        </div>
    </div>
       <!-- Modal pasirinkti pokalbio zmogaus id -->
 <div class="modal fade" id="kambarioPasirinkimasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pokalbių kambario valdymas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" action="sveciasKambario">
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                        @csrf
                        <div class="form-group">
                        <label>Įveskite vartotojo id į kurio pokalbių kambarį norite patekti:</label>
                            <input type="text" name="kambarioid" id="kambarioid" class="form-control" pattern="[1-9]+[0-9]{0,5}" required placeholder="00"/>
                            <label>Įveskite kambario slaptažodį:</label>
                            <input type="text" name="kambariopass" id="kambariopass" class="form-control" pattern="[1-9]+[0-9]{0,5}" required placeholder="0000"/>
                        </div>  
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Eiti" />
                    <button  type="button" class="btn btn-danger" data-dismiss="modal">Uždaryti</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.options.positionClass = 'toast-bottom-right';
                toastr.success("{{ session('message') }}");
        @endif
        @if(Session::has('alert'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.options.positionClass = 'toast-bottom-right';
                toastr.error("{{ session('alert') }}");
        @endif
    </script>
    <div class="col-12 col-md-9">
        @if (\Session::has('success'))
        <div class="alert alert-success">
                <p>{!! \Session::get('success') !!}</p>
        </div>
        @endif
        @if (count($errors) > 0)
        <div class="alert alert-danger">
                <p>Klaidos:</p>
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
        </div>
        @endif
        @yield('content')
        </div>
