<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    @include('layouts.header')
    <body>
        <!-- Contact -->
        <div class="contact">
            <div class="container">
                <div class="section-header text-center">
                    <p>Susisiek su mumis</p>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact-info">
                            <h2>Informacija</h2>
                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fa fa-phone-alt"></i>
                                </div>
                                <div class="contact-info-text">
                                    <h3>Telefonas</h3>
                                    <p>+370 674 64288</p>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="contact-info-text">
                                    <h3>El. paštas</h3>
                                    <p>info@laisvaisamdomas.lt</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="contact-form">
                            <div id="success"></div>
                            <form name="sentMessage" id="contactForm" novalidate="novalidate">
                                <div class="control-group">
                                    <input type="text" class="form-control" id="name" placeholder="Vardas" required="required" data-validation-required-message="Prašome įvesti jūsų vardą" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="email" class="form-control" id="email" placeholder="El. paštas" required="required" data-validation-required-message="Prašome įvesti el. pašto adresą" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="text" class="form-control" id="subject" placeholder="Tema" required="required" data-validation-required-message="Prašome įvesti tema" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <textarea class="form-control" id="message" placeholder="Pranešimas" required="required" data-validation-required-message="Prašome įvesti pranešimą"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div>
                                    <button class="btn btn-custom" type="submit" id="sendMessageButton">Siųsti pranešimą</button>
                                </div>
                            </form>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
        <!-- Queries End -->
        @include('layouts.footer')
    </body>
    <script src="js/main.js"></script>
</html>