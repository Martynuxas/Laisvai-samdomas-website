        <!-- Top -->
        <div class="top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <h1>Laisvai<span> Samdomas</span>.lt</h1>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @if (Auth::check())
                <span class="inline-flex rounded-md">
                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                        {{ Auth::user()->name }}

                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </span>
            @else
            <div class="loginregister">
                <div class="ml-auto">
                    <a class="btn btn-custom" href="{{ route('login') }}">Prisijungti</a>
                    <a class="btn btn-custom" href="{{ route('register') }}">Registruotis</a>
                </div>
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
                                    <a href="{{ route('ieskoti') }}" class="nav-item nav-link">Ieškoti paslaugų</a>
                                    <a href="{{ route('pasiulymai') }}" class="nav-item nav-link">Gauti pasiūlymus</a>
                                    <a href="{{ route('uzklausa') }}" class="nav-item nav-link">Klientų užklausos</a>
                                    <a href="{{ route('klausti') }}" class="nav-item nav-link">Klausti profesionalų</a>
                                    <a href="{{ route('kontaktai') }}" class="nav-item nav-link">Kontaktai</a>
                                </div>
                                <div class="ml-auto">
                                    <a class="btn btn-custom" href="{{ route('kurti') }}">Sukurti puslapį</a>
                            
                                        <a class="btn btn-custom" href="{{ URL::previous() }}">Atgal</a>
                                </div>
                            </div>
                        </nav>
                    </div>
        </div>
        
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>