<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/kurti.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
@include('layouts.header')
<body>
    <div class="col-12 col-md-9">
        <div class="container mt-5 px-5">
        <div class="mb-4">
            <h3>Klausimų redagavimas!</h3>
            <h6>Neprivaloma užpildyti visus 5 klausimus ir jų atsakymus.</h6>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card p-3">
                    <form action="/updateKlausimus" method="post" id="/updateKlausimus">
                    @csrf  
                    <input type="hidden" name="id" id="id" value="{{$data->id}}"/>
                    <div class="row"> 
                        <div class="col-md-8">
                            <h6 class="text-uppercase">Klausimų sąrašo pavadinimas *</h6>
                            <div class="inputbox mt-3 mr-2"> <input type="text" id="pavadinimas" name="pavadinimas" placeholder="{{$data->pavadinimas}}" value="{{$data->pavadinimas}}"></div>
                        </div>
                    </div>
                    <div class="card p-3">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="text-uppercase">Pirmas klausimas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="klausimas1" name="klausimas1" placeholder="{{$data->klausimas1}}" value="{{$data->klausimas1}}"></div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-uppercase">Pirmo klausimo atsakymas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="atsakymas1" name="atsakymas1" placeholder="{{$data->atsakymas1}}" value="{{$data->atsakymas1}}"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card p-3">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="text-uppercase">Antras klausimas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="klausimas2" name="klausimas2" placeholder="{{$data->klausimas2}}" value="{{$data->klausimas2}}"></div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-uppercase">Antro klausimo atsakymas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="atsakymas2" name="atsakymas2" placeholder="{{$data->atsakymas2}}" value="{{$data->atsakymas2}}"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card p-3">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="text-uppercase">Trečias klausimas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="klausimas3" name="klausimas3" placeholder="{{$data->klausimas3}}" value="{{$data->klausimas3}}"></div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-uppercase">Trečio klausimo atsakymas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="atsakymas3" name="atsakymas3" placeholder="{{$data->atsakymas3}}" value="{{$data->atsakymas3}}"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card p-3">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="text-uppercase">Ketvirtas klausimas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="klausimas4" name="klausimas4" placeholder="{{$data->klausimas4}}" value="{{$data->klausimas4}}"></div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-uppercase">Ketvirto klausimo atsakymas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="atsakymas4" name="atsakymas4" placeholder="{{$data->atsakymas4}}" value="{{$data->atsakymas4}}"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card p-3">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="text-uppercase">Penktas klausimas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="klausimas5" name="klausimas5" placeholder="{{$data->klausimas5}}" value="{{$data->klausimas5}}"></div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-uppercase">Penkto klausimo atsakymas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="atsakymas5" name="atsakymas5" placeholder="{{$data->atsakymas5}}" value="{{$data->atsakymas5}}"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-4 d-flex justify-content-between"> <span></span> <button class="btn btn-success px-3" id="card-button" type="submit">Atnaujinti DUK</button></div>
            </div>
        </div>
    </div>
</div>
    @include('layouts.footer')
</body>
<script src="js/main.js"></script>
</html>
