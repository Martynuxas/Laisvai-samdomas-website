<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.head')
    </head>
    <body>
        @include('layouts.header')
        <!-- Question -->
        <div class="location">
            <div class="container">
                <div class="section-header text-center">
                    <p>Forumas „Klausk profesionalų“</p>
                </div>
                <div class="location-form">
                    <h3>Klauskite profesionalų nemokamai. 
                        Jūsų klausimą išsiųsime profesionalams, kurie gali jį atsakyti. Šiuo metu duomenų bazėje turime 55543 įvairių sričių profesionalų.</h3>
                    <form>
                        <div class="control-group">
                            <input type="text" class="form-control" placeholder="Įrašykite klausimo temą" required="required" />
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" placeholder="Įrašykite klausimą profesionalams. Norėdami gauti kokybišką atsakymą, suteikite kuo daugiau susijusios informacijos." required="required"></textarea>
                        </div>
                        <div>
                            <button class="btn btn-custom" type="submit">Klausti nemokamai</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Question End -->
        <!-- Newest Questions -->
        <div class="testimonial">
            <div class="container">
                <div class="section-header text-center">
                    <p>Naujausi klausimai</p>
                </div>
                <div class="owl-carousel testimonials-carousel">
                    <div class="testimonial-item">
                        <img src="img/m.png" alt="Image">
                        <div class="testimonial-text">
                            <h3>Tomas</h3>
                            <h4>Elektra</h4>
                            <p>
                                Kokios rozetės patikimiausios?
                            </p>
                            <div class="blog-meta">
                                <p><i class="fa fa-comments"></i><a href="">4 atsakymų</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <img src="img/m.png" alt="Image">
                        <div class="testimonial-text">
                            <h3>Jonas</h3>
                            <h4>Apdaila</h4>
                            <p>
                                Kokį paklota dedat po laminatu?
                            </p>
                            <div class="blog-meta">
                                <p><i class="fa fa-comments"></i><a href="">8 atsakymų</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <img src="img/m.png" alt="Image">
                        <div class="testimonial-text">
                            <h3>Visgirdas</h3>
                            <h4>IT sritis</h4>
                            <p>
                                Kokia pirma kalba geriausiai mokintis?
                            </p>
                            <div class="blog-meta">
                                <p><i class="fa fa-comments"></i><a href="">3 atsakymų</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <img src="img/m.png" alt="Image">
                        <div class="testimonial-text">
                            <h3>Lukas</h3>
                            <h4>Transportas</h4>
                            <p>
                                Kur nebrangiai ir atsakingai poliruoja masinas Kaune?
                            </p>
                            <div class="blog-meta">
                                <p><i class="fa fa-comments"></i><a href="">8 atsakymų</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newest Questions End -->
        @include('layouts.footer')
    </body>
        <!-- JS Lib -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="js/main.js"></script>
</html>