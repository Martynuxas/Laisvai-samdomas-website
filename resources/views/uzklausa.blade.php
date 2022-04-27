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
                                    <p><i class="fa fa-user"></i><a href="">Virgis</a></p>
                                    <p><i class="fa fa-folder"></i><a href="">Žemės kasimas</a></p>
                                    <p><i class="fa fa-comments"></i><a href="">10 pasiūlymų</a></p>
                                </div>
                                <p>
                                    Sveiki,

                                    Ieškome „virtuvės ant ratų“ gruodžio 11 d. Organizuojame renginį, kuriame dalyvautų iki 40 žmonių. Ieškome maisto tiekėjo, kuris galėtų pasirūpinti karštais patiekalais ir užkandžiais.
                                </p>
                                @foreach(App\Http\Controllers\KurtiController::gautiNuotraukas($uzklausa->id, "uzklausa") as $nuotrauka)
                                <img src="{{ URL::to('/images')}}/{{$nuotrauka->nuoroda}}" alt="Image" width="100" height="100"/>
                                @endforeach
                                <div>
                                    <a class="btn btn-custom" href="#">Pateikti pasiūlymą</a>
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