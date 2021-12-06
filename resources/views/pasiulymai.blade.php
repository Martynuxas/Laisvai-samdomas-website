<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.head')
    </head>
    <body>
        @include('layouts.header')
        <!-- Suggestions Start -->
        <div class="location">
            <div class="container">
                        <div class="section-header text-center">
                            <p>Greitai rask, kas suteiks paslaugą</p>
                        </div>
                        <div class="location-form">
                            <h3>Siųsk užklausą, gauk pasiūlymus, išsirink tinkamiausią.</h3>
                            <form>
                                <div class="control-group">
                                    <input type="text" class="form-control" placeholder="Įrašykite kokios paslaugos ieškai (trumpai)" required="required" />
                                </div>
                                <h6>Pvz. nufotografuoti vestuves, pastatyti namą, nuvalyti langus.</h6>
                                <div>
                                    <button class="btn btn-custom" type="submit">Tęsti</button>
                                </div>
                            </form>
                        </div>
                
                </div>
            </div>
        </div>
        <!-- Suggestions End -->
        @include('layouts.footer')
    </body>
        <!-- JS Lib -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="js/main.js"></script>
</html>