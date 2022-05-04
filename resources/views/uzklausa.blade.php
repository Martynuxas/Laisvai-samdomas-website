<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    @include('layouts.header')
    <body>
        <div class="blog">
            <div class="container">
                <div class="section-header text-center">
                    
                    <p>Klientų užklausos</p>
                </div>
                @foreach ($uzklausos as $uzklausa )
                
                        <div class="blog-item">
                            <div class="blog-text">
                                <h3><a href="#">{{$uzklausa->pavadinimas}}</a></h3>
                                <div class="blog-meta">
                                    @if($uzklausa->users->name != '')
                                    <b><p><i class="fa fa-user"></i>{{$uzklausa->users->name}}[{{$uzklausa->users->id}}] </p><p></p></b>
                                    @endif
                                    @if($uzklausa->kategorijos->pavadinimas != '')
                                    <b><p><i class="fa fa-folder"></i>{{$uzklausa->kategorijos->pavadinimas}} </p><p></p></b>
                                    @endif
                                    @if($uzklausa->laikas != '')
                                    <b><p><i class="fa fa-calendar"></i>{{$uzklausa->laikas}} </p><p></p></b>
                                    @endif
                                    @if($uzklausa->biudzetas != '')
                                    <b><p><i class="fa fa-money"></i>{{$uzklausa->biudzetas}}eur </p><p></p></b>
                                    @endif
                                    @if($uzklausa->data != '')
                                    <b><p><i class="fa fa-clock-o"></i>{{$uzklausa->data}}</p><p></p></b>
                                    @endif
                                </div>
                                <p>
                                    {{$uzklausa->aprasymas}}
                                </p>
                                @foreach(App\Http\Controllers\KurtiController::gautiNuotraukas($uzklausa->id, "uzklausa") as $nuotrauka)
                                <img src="{{ URL::to('/images')}}/{{$nuotrauka->nuoroda}}" alt="Image" width="200" height="200"/>
                                @endforeach
                                <div>
                                    <a class="btn btn-outline-primary" href="/zinutes/{{$uzklausa->vartotojo_id}}">Pateikti pasiūlymą</a>
                                </div>
                            </div>
                        </div>
                @endforeach    
                {{$uzklausos->links()}}
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </body>
</html>