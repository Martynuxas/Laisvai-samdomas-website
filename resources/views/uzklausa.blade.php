<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.head')
    </head>
    <body>
        @include('layouts.header')
        <!-- Queries -->
        <div class="blog">
            <div class="container">
                <div class="section-header text-center">
                    
                    <p>Klientų užklausos</p>
                </div>
                @foreach ($kategorijos as $kategorija )
                
                        <div class="blog-item">
                            <div class="blog-text">
                                <h3><a href="#">{{$kategorija->pavadinimas}}</a></h3>
                                <div class="blog-meta">
                                    <p><i class="fa fa-user"></i><a href="">Virgis</a></p>
                                    <p><i class="fa fa-folder"></i><a href="">Žemės kasimas</a></p>
                                    <p><i class="fa fa-comments"></i><a href="">10 pasiūlymų</a></p>
                                </div>
                                <p>
                                    Sveiki,

                                    Ieškome „virtuvės ant ratų“ gruodžio 11 d. Organizuojame renginį, kuriame dalyvautų iki 40 žmonių. Ieškome maisto tiekėjo, kuris galėtų pasirūpinti karštais patiekalais ir užkandžiais.
                                </p>
                                <div>
                                    <a class="btn btn-custom" href="#">Pateikti pasiūlymą</a>
                                </div>
                            </div>
                        </div>
                    @endforeach    
                </div>
            </div>
        </div>
        <!-- Queries End -->
        @include('layouts.footer')
    </body>
        <!-- JS Lib -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="js/main.js"></script>
</html>