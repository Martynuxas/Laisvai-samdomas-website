<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.head')
    </head>
    <body>
    @include('layouts.header')
        <!-- Form -->
        <div class="contact">
            <div class="container">
                <div class="section-header text-center">
                    <p>Puslapio kurimas</p>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact-info">
                            <h2>Informacija</h2>
                            <div class="contact-info-item">
                                <div class="contact-info-text">
                                    <h3>Pradžia</h3>
                                    <p>Įveskite pagrindinę informaciją. Vėliau galėsite įvesti daugiau informacijos ir ją redaguoti.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="contact-form">
                            <div id="success"></div>
                            <form name="sentMessage" id="contactForm" novalidate="novalidate">
                                <div class="control-group">
                                    <input type="text" class="form-control" id="name" placeholder="Puslapio antraštė" required="required" data-validation-required-message="Prašome įvesti puslapio antraštę" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <textarea class="form-control" class="form-control" id="subject" placeholder="Trumpas aprašymas" required="required" data-validation-required-message="Prašome įvesti aprašymą"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="text" class="form-control" id="name" placeholder="Miestas" required="required" data-validation-required-message="Prašome įvesti miestą" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="text" id="name" placeholder="Atstumas" required="required" data-validation-required-message="Prašome įvesti atstumą">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div>
                                    <button class="btn btn-custom" type="submit" id="sendMessageButton">Tęsti</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form End -->
        @include('layouts.footer')
    </body>
        <!-- JS Lib -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="js/main.js"></script>
</html>