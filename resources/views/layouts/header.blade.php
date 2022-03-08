<link rel="stylesheet" type="text/css" href="{{ asset('css/dropdown.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
                    <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action"><img src="/uploads/avatars/{{Auth::user()->avatar}}" alt="Image" class="rounded-circle" width="50" height="50"> <b style="color: black;">{{ Auth::user()->name }} </b><b class="caret"></b></a>
                    <div class="dropdown-menu">
                    <a href="{{ url('/paslauga')}}" class="dropdown-item"><i class="fa fa-user"></i> Sukurti paslauga</a>
                        <a href="{{ url('/kurti') }}" class="dropdown-item"><i class="fa fa-search"></i> Sukurti užklausą</a>
                        <a href="{{ url('/profilis') }}/{{ Auth::user()->id }}" class="dropdown-item"><i class="fa fa-user"></i> Profilis</a>
                        <a href="{{ url('/kalendorius') }}" class="dropdown-item"><i class="fa fa-calendar-o"></i> Kalendorius</a>
                        <a href="{{ url('/zinutes') }}" class="dropdown-item"><i class="fa fa-envelope"></i> Žinutės</a>
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
                                    <a href="{{ route('pasiulymai') }}" class="nav-item nav-link">Gauti pasiūlymus</a>
                                    <a href="{{ route('uzklausa') }}" class="nav-item nav-link">Klientų užklausos</a>
                                    <a href="{{ route('klausti') }}" class="nav-item nav-link">Klausti profesionalų</a>
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
        
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
