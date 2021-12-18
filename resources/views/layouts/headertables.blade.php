<head>
    @include('layouts.head')
</head>
<meta charset="utf-8">
    <title>LaisvaiSamdomas - paslaugų portalas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tables.css') }}">
    <link href="img/favicon.png" rel="icon">
<!-- Top -->
<!-- Top End -->
    <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="{{ route('skelbimai') }}" class="nav-item nav-link">Skelbimai</a>
                            <a href="{{ route('vartotojai') }}" class="nav-item nav-link">Vartotojai</a>
                            <a href="{{ route('kategorijos') }}" class="nav-item nav-link">Kategorijos</a>
                            <a href="{{ route('prenumeratos') }}" class="nav-item nav-link">Prenumaratos</a>
                            <a href="{{ route('statusai') }}" class="nav-item nav-link">Statusai</a>
                            <a href="{{ route('isiminti') }}" class="nav-item nav-link">Įsiminti</a>
                        </div>
                        <div class="ml-auto">
                                <a class="btn btn-custom" href="{{ URL::previous() }}">Atgal</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="js/main.js"></script>
