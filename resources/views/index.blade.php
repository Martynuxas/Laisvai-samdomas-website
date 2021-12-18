<!DOCTYPE html>
<html lang="en">
    <head>
        @extends('layouts.head')
    </head>
    <body>
        @include('layouts.header')
        
        <!-- Slider -->
        <div class="carousel">
                    <div class="container-fluid">
                        <div class="owl-carousel">
                            <div class="carousel-item">
                                <div class="carousel-img">
                                    <img src="img/carousel-1.jpg" alt="Image">
                                </div>
                                <div class="carousel-text">
                                    <h3>Greitai rask, kas suteiks paslaugą</h3>
                                    <h1>siųsk užklausą</h1>
                                    <div class="col-lg-5">
                                        <div class="location-form">
                                            <h3>Ieškoti paslaugų</h3>
                                            <form>
                                                <div class="control-group">
                                                    <textarea class="text" placeholder="Raktažodis" required="required"></textarea>
                                                </div>
                                                <div>
                                                    <button class="btn btn-custom" type="submit">Ieškoti</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-img">
                                    <img src="img/carousel-2.jpg" alt="Image">
                                </div>
                                <div class="carousel-text">
                                    <h3>Greitai rask, kas suteiks paslaugą</h3>
                                    <h1>gauk pasiūlymus</h1>
                                    <div class="col-lg-5">
                                        <div class="location-form">
                                            <h3>Ieškoti paslaugų</h3>
                                            <form>
                                                <div class="control-group">
                                                    <textarea class="text" placeholder="Raktažodis" required="required"></textarea>
                                                </div>
                                                <div>
                                                    <button class="btn btn-custom" type="submit">Ieškoti</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-img">
                                    <img src="img/carousel-3.jpg" alt="Image">
                                </div>
                                <div class="carousel-text">
                                    <h3>Greitai rask, kas suteiks paslaugą</h3>
                                    <h1>išsirink tinkamiausią</h1>
                                    <div class="col-lg-5">
                                        <div class="location-form">
                                            <h3>Ieškoti paslaugų</h3>
                                            <form>
                                                <div class="control-group">
                                                    <textarea class="text" placeholder="Raktažodis" required="required"></textarea>
                                                </div>
                                                <div>
                                                    <button class="btn btn-custom" type="submit">Ieškoti</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- Slider End -->
                                <!-- Blog -->
                                <div class="blog">
                    <div class="container">
                        <div class="section-header text-center">
                            <p>Naujausi skelbimai</p>
                        </div>
                        <div class="row">
                        @foreach ($skelbimai as $skelbimas )
                            <div class="col-lg-4">
                                <div class="blog-item">
                                    <div class="blog-img">
                                        <img src="img/blog-1.jpg" alt="Image">
                                    </div>
                                    <div class="blog-text">
                                        <h3><a href="#">{{$skelbimas->pavadinimas}}</a></h3>
                                        <p>
                                            Visi elektros darbai bei dokumentų tvarkymas; ESO RANGA; Elektros instaliacija; El.Įvadai; Oro linijų iškėlimas/panaikinimas Avariniai darbai; Kabelių movavimas; Įžeminimas; Giluminis įžeminimas; Paskambink ir pakonsultuosim nemokamai.
                                        </p>
                                    </div>
                                    <div class="blog-meta">
                                        <p><i class="fa fa-user"></i><a href="">{{$skelbimas->miestas}}</a></p>
                                        <p><i class="fa fa-folder"></i><a href="">Elektra</a></p>
                                        <p><i class="fa fa-comments"></i><a href="">10 atsiliepimų</a></p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Blog End --> 
                <!-- Testimonial -->
                <div class="testimonial">
                    <div class="container">
                        <div class="section-header text-center">
                            <p>Naujausi atsiliepimai</p>
                        </div>
                        <div class="owl-carousel testimonials-carousel">
                            <div class="testimonial-item">
                                <img src="img/m.png" alt="Image">
                                <div class="testimonial-text">
                                    <h3>Tomas</h3>
                                    <h4>Elektros darbai</h4>
                                    <p>
                                        "Greitai ir patikimai atliktas darbas"
                                    </p>
                                </div>
                            </div>
                            <div class="testimonial-item">
                                <img src="img/m.png" alt="Image">
                                <div class="testimonial-text">
                                    <h3>Jonas</h3>
                                    <h4>Apdailos darbai</h4>
                                    <p>
                                        "Puikiai profesionaliai atliktas darbas!"
                                    </p>
                                </div>
                            </div>
                            <div class="testimonial-item">
                                <img src="img/m.png" alt="Image">
                                <div class="testimonial-text">
                                    <h3>Visgirdas</h3>
                                    <h4>IT sritis</h4>
                                    <p>
                                        "Esu visiskai patenkinta logotipu sukurimu! Lengvas bendravimas , greitai pagaunama mintis, viskas lengvai derinama. Puikus lankstumas."
                                    </p>
                                </div>
                            </div>
                            <div class="testimonial-item">
                                <img src="img/m.png" alt="Image">
                                <div class="testimonial-text">
                                    <h3>Lukas</h3>
                                    <h4>Transportas</h4>
                                    <p>
                                        "Greitai atvyko I ivykio vieta, puikiai atliko savo darba. Dar karta dekoju"
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial End -->
                <!-- Facts -->
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
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>

</html>